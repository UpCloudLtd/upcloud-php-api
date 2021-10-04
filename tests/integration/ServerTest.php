<?php

use PHPUnit\Framework\TestCase;

use UpCloud\ApiClient;

class ServerTest extends TestCase
{
  protected $ubuntuTemplate = '01000000-0000-4000-8000-000030200200';

  /**
   * @var UpCloud\ApiClient
   */
  protected $client;

  private $num = 0;

  protected function setUp(): void
  {
    if (empty($this->client)) {
      $this->client = new ApiClient();
    }
  }

  private function waitForState($uuid, $state, $maxRetries = 50)
  {
    $retries = 0;

    while (true) {
      $retries++;

      $resp = $this->client->getServerDetails($uuid);

      if ($resp->state === $state) {
        break;
      }

      if ($retries > $maxRetries) {
        echo "Server ${state} is taking too long (${uuid})" . PHP_EOL;
        break;
      }

      sleep(6);
    }
  }

  private function createOrFindServer()
  {
    $this->num++;

    $servers = $this->client->getServers();

    foreach ($servers as $server) {
      if ($server->state === 'started' || $server->state === 'stopped') {
        $foundServer = $server;
      }
    }

    if (isset($foundServer)) {
      return $this->client->getServerDetails($foundServer->uuid);
    }

    $response = $this->client->createServer([
      'hostname' => 'test.example',
      'plan' => '1xCPU-1GB',
      'title' => "php-integration-test-server-$this->num",
      'zone' => 'de-fra1',
      'storage_devices' => [
        'storage_device' => [
          'action' => 'create',
          'address' => 'virtio',
          'size' => 10,
          'title' => 'test-storage'
        ]
      ]
    ]);

    $this->waitForState($response->uuid, 'started');

    return $response;
  }

  /**
   * Test that we can create a server & fetch its details
   */
  public function testServerCreateAndDetails()
  {
    $server = $this->client->createServer([
      'plan' => '1xCPU-1GB',
      'title' => 'php-integration-test-server-1',
      'hostname' => 'test.example',
      'zone' => 'de-fra1',
      'storage_devices' => [
        'storage_device' => [
          'action' => 'clone',
          'storage' => $this->ubuntuTemplate,
          'size' => 25,
          'tier' => 'maxiops',
          'title' => 'root disk'
        ]
      ]
    ]);

    $this->assertEquals($server->core_number, '1');
    $this->assertEquals($server->hostname, 'test.example');
    $this->assertEquals($server->plan, '1xCPU-1GB');
    $this->assertEquals($server->title, 'php-integration-test-server-1');
    $this->assertEquals($server->zone, 'de-fra1');
    $this->assertEquals(count($server->storage_devices->storage_device), 1);

    $serverDetails = $this->client->getServerDetails($server->uuid);

    $this->assertEquals($serverDetails->core_number, '1');
    $this->assertEquals($serverDetails->hostname, 'test.example');
    $this->assertEquals($serverDetails->plan, '1xCPU-1GB');
    $this->assertEquals($serverDetails->title, 'php-integration-test-server-1');
    $this->assertEquals($serverDetails->zone, 'de-fra1');
    $this->assertEquals(count($serverDetails->storage_devices->storage_device), 1);
  }

  /**
   * Test attaching and detaching a storage
   */
  public function testAttachAndDetachStorage()
  {
    $server = $this->createOrFindServer();

    $storage = $this->client->createStorage([
      'size' => 10,
      'title' => 'attachable storage',
      'zone' => $server->zone,
    ]);

    // attach
    $attachResponse = $this->client->attachStorage(
      $server->uuid,
      ['storage' => $storage->uuid]
    );

    $this->assertEquals(
      count($attachResponse->storage_devices->storage_device),
      count($server->storage_devices->storage_device) + 1
    );

    $this->assertContains(
      $storage->uuid,
      array_column($attachResponse->storage_devices->storage_device, 'storage')
    );

    // detach
    $detachResponse = $this->client->detachStorage($server->uuid, $storage->uuid);

    $this->assertEquals(
      count($detachResponse->storage_devices->storage_device),
      count($server->storage_devices->storage_device)
    );
  }
}

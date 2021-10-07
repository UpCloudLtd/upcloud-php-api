<?php

use PHPUnit\Framework\TestCase;
use UpCloud\Tests\IntegrationUtils;
use UpCloud\ApiClient;

class ServerTest extends TestCase
{
  /**
   * @var UpCloud\ApiClient
   */
  protected $client;

  protected $ubuntuTemplate = '01000000-0000-4000-8000-000030200200';

  protected $server;

  protected function setUp(): void
  {
    if (empty($this->client)) {
      $this->client = new ApiClient();
    }
  }

  protected function getServer()
  {
    if (empty($this->server)) {
      // create a server to be used in the tests
      $this->server = IntegrationUtils::createServer($this->client);
      \UpCloud\Utils::waitForServerState($this->client, $this->server->uuid, 'started');

      // Wait a bit to make sure the server is properly started and ready to serve requests
      sleep(5);
    }

    return $this->server;
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
    $server = $this->getServer();

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

  /**
   * Test attaching a CDROM device and loading & ejecting CDROMs in it.
   */
  public function testCdroms(): void
  {
    $server = $this->getServer();

    if ($server->state !== 'stopped') {
      $response = $this->client->stopServer($server->uuid, ['stop_type' => 'hard']);
      \UpCloud\Utils::waitForServerState($this->client, $server->uuid, 'stopped');
    }

    // TODO: detach cdrom device if one already exists
    // $cdromIndex = array_search('cdrom', array_column($server->storage_devices->storage_device, 'type'));

    $attachResponse = $this->client->attachStorage($server->uuid, ['type' => 'cdrom']);
    $cdromIndex = array_search('cdrom', array_column($attachResponse->storage_devices->storage_device, 'type'));
    $cdromDevice = $attachResponse->storage_devices->storage_device[$cdromIndex];

    $loadResponse = $this->client->loadCdrom($server->uuid, '01000000-0000-4000-8000-000070030101');
    $loadedCdromDevice = $loadResponse->storage_devices->storage_device[$cdromIndex];
    $this->assertSame('01000000-0000-4000-8000-000070030101', $loadedCdromDevice->storage);
    $this->assertSame('Arch Linux 2020.04.01 Installation CD', $loadedCdromDevice->storage_title);

    $ejectResponse = $this->client->ejectCdrom($server->uuid);
    $ejectedCdromDevice = $ejectResponse->storage_devices->storage_device[$cdromIndex];
    $this->assertSame('', $ejectedCdromDevice->storage);
    $this->assertSame('', $ejectedCdromDevice->storage_title);

    $response = $this->client->detachStorage($server->uuid, $cdromDevice->address);
    $cdromIndex = array_search('cdrom', array_column($response->storage_devices->storage_device, 'type'));
    $this->assertFalse($cdromIndex);
  }
}

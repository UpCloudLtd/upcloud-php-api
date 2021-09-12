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

  protected function setUp(): void
  {
    if (empty($this->client)) {
      $this->client = new ApiClient();
    }
  }

  public static function tearDownAfterClass(): void
  {
    /** @todo remove all created servers */
  }

  public function testServerCreate()
  {
    $response = $this->client->createServer([
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

    $this->assertEquals($response->title, 'php-integration-test-server-1');

    $serverDetails = $this->client->getServer($response->uuid);

    $this->assertEquals($serverDetails->title, 'php-integration-test-server-1');
    $this->assertEquals(count($serverDetails->storage_devices->storage_device), 1);
  }
}

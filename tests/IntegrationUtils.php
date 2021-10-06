<?php

namespace UpCloud\Tests;

class IntegrationUtils
{
  public static $num = 1;

  /**
   * Find a stopped or started server, or create a new one if none was found.
   *
   * @param \UpCloud\ApiClient $client
   *
   * @return object Server.
   */
  public static function createServer($client)
  {
    self::$num++;

    $response = $client->createServer([
      'hostname' => 'test.example',
      'plan' => '1xCPU-1GB',
      'title' => 'php-integration-test-server-' . self::$num,
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

    \UpCloud\Utils::waitForServerState($client, $response->uuid, 'started');

    return $response;
  }
}

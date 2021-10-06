<?php

namespace UpCloud\Tests;

class IntegrationUtils
{
  public static $num = 1;

  /**
   * Wait for a server to enter the given state.
   *
   * @param \UpCloud\ApiClient $client
   */
  public static function waitForState($client, string $uuid, string $state, $maxRetries = 50): void
  {
    $retries = 0;

    while (true) {
      $retries++;

      $resp = $client->getServerDetails($uuid);

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

    self::waitForState($client, $response->uuid, 'started');

    return $response;
  }
}

<?php

namespace UpCloud;

/**
 * Utilities for working with the UpCloud API.
 */
class Utils
{
  /**
   * Wait for server to enter the given state. Polls the API and checks for the state to change.
   *
   * @param \UpCloud\ApiClient $client     Instance of the UpCloud API client.
   * @param string             $serverUuid UUID of the server to watch.
   * @param string             $state      The state to wait for: started|stopped|maintenance
   * @param number             $maxRetries Number of times to poll for the state.
   * @param number             $sleep      Seconds to sleep for between state checks.
   */
  public static function waitForServerState($client, string $serverUuid, string $state, $maxRetries = 50, $sleep = 6)
  {
    $retries = 0;

    while (true) {
      $retries++;
      $server = $client->getServerDetails($serverUuid);

      if ($server->state === $state) {
        break;
      }

      if ($retries > $maxRetries) {
        echo "Server (${serverUuid}) is taking too long to reach state \"${state}\". Stopping waitForState, server state is $server->state." . PHP_EOL;
        break;
      }

      sleep($sleep);
    }
  }

  /**
   * Wait for storage to enter the given state. Polls the API and checks for the state to change.
   *
   * @param \UpCloud\ApiClient $client      Instance of the UpCloud API client.
   * @param string             $storageUuid UUID of the storage to watch.
   * @param string             $state       The state to wait for: started|stopped|maintenance
   * @param number             $maxRetries  Number of times to poll for the state.
   * @param number             $sleep       Seconds to sleep for between state checks.
   */
  public static function waitForStorageState($client, string $storageUuid, string $state, $maxRetries = 50, $sleep = 6)
  {
    $retries = 0;

    while (true) {
      $retries++;
      $storage = $client->getStorage($storageUuid);

      if ($storage->state === $state) {
        break;
      }

      if ($retries > $maxRetries) {
        echo "Storage (${storageUuid}) is taking too long to reach state \"${state}\". Stopping waitForState, storage state is \"$storage->state\"." . PHP_EOL;
        break;
      }

      sleep($sleep);
    }
  }
}

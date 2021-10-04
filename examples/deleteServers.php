<?php

/**
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();
$servers = $client->getServers();

// WARNING! This example will really delete all your servers!
foreach ($servers as $server) {
  if ($server->state != 'stopped') {
    if ($server->state == 'started') {
      echo "Stopping server $server->uuid\n";
      $response = $client->stopServer($server->uuid, ['stop_type' => 'hard']);
    }

    while (true) {
      $serverCheck = $client->getServerDetails($server->uuid);

      if ($serverCheck->state == 'stopped') {
        echo "Server stopped!\n";
        break;
      } else {
        echo "Waiting for server to stop…\n";
        sleep(5);
      }
    }
  }

  $client->deleteServer($server->uuid, ['storages' => 1, 'backups' => 'delete']);

  echo $server->uuid . " deleted!\n";
}

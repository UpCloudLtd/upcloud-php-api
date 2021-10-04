<?php

/**
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();

// Change this UUID to your server's UUID
$SERVER_UUID = '00be005f-cc7a-414c-a999-5850170c3767';

$server = $client->getServerDetails($SERVER_UUID);

if ($server->state == 'started') {
  $client->stopServer($server->uuid, ['stop_type' => 'soft', 'timeout' => 30]);
}

while ($server->state != 'stopped') {
  echo "Waiting for server to stop… (state: $server->state)\n";
  sleep(5);
}

$response = $client->modifyServer(
  $server->uuid,
  [
    'core_number' => 2,
    'memory_amount' => 4096,
    'plan' => 'custom'
  ]
);

echo "Server modified!\n";
print_r($response);

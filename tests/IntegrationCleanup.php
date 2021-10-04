<?php

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();

function waitForState($uuid, $state, $maxRetries = 50)
{
  global $client;
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

function getServers()
{
  global $client;
  echo 'Fetching servers...' . PHP_EOL;
  $serversResponse = $client->getServers();
  return $serversResponse;
}

function stopServer($uuid)
{
  global $client;
  echo "stopping ${uuid}" . PHP_EOL;

  $response = $client->getServerDetails($uuid);

  if ($response->state === 'stopped') {
    return;
  }

  if ($response->state === 'maintenance') {
    sleep(10);
  }

  $client->stopServer($uuid, ['stop_type' => 'hard', 'timeout' => 1]);

  waitForState($uuid, 'stopped');
}

function deleteServer($uuid, $state)
{
  global $client;
  if ($state !== 'stopped') {
    stopServer($uuid);
  }

  echo "deleting ${uuid}" . PHP_EOL;

  $client->deleteServer($uuid, ['storages' => 1, 'backups' => 'delete']);
}

function getStorages()
{
  global $client;
  echo 'Fetching storages...' . PHP_EOL;
  $response = $client->getStoragesByType('private');
  return $response;
}

function deleteStorage($uuid)
{
  global $client;
  echo "deleting ${uuid}" . PHP_EOL;
  try {
    $client->deleteStorage($uuid);
  } catch (Error $error) {
    echo $error;
  }
}

// main
$servers = getServers();

if (count($servers) > 0) {
  echo 'Deleting all servers and storages...' . PHP_EOL;

  for ($index = 0; $index < count($servers); $index++) {
    deleteServer($servers[$index]->uuid, $servers[$index]->state);
  }
}

$storages = getStorages();
if (count($storages) > 0) {
  echo "Deleting all storages..." . PHP_EOL;

  // forEach is not async, so we use for()
  for ($index = 0; $index < count($storages); $index++) {
    deleteStorage($storages[$index]->uuid);
  }
}

// add deletions for backups, subaccounts, etc. as needed

echo 'Done.' . PHP_EOL;

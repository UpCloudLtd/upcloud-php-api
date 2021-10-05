<?php

/**
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();

// Define the storage
$storage = [
  'size' => 10,
  'tier' => 'maxiops',
  'title' => 'my awesome server',
  'zone' => 'de-fra1',
  'backup_rule' => [
    'interval' => 'daily',
    // number of days to keep tbe backups
    'retention' => 7,
    // UTC time of day when backup is scheduled
    'time' => '0430',
  ],
];

$server = $client->createStorage($storage);

echo "Storage created!\n";
echo $server->uuid . "\n";

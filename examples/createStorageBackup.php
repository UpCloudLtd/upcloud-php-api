<?php

/**
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();

// change to match your storage UUID:
$storageUuid = '0160727f-c461-4524-921a-2e132205a3f4';

$backup = $client->createBackup($storageUuid, ['title' => 'manual backup']);

echo "Backup is being created!\n";
echo "$backup->uuid progress $backup->progress%\n";

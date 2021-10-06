<?php

/**
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();

// change to match your backup's UUID:
$backupUuid = '017a41f3-0667-49fe-a59f-f881b521da17';

// WARNING! this will restore the backup to its origin storage,
// any data on the storage will be reverted to the backup state!
$response = $client->restoreBackup($backupUuid);

echo "Backup is now being restored to the storage!\n";

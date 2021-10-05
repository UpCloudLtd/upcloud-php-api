<?php

/**
 * Import an image from a local file into a storage.
 *
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();

// WARNING! This storage will lose all its data when doing the import!!
$storageUuid = '0160727f-c461-4524-921a-2e132205a3f4';

// URL to the image to import, must be .raw, .img, .iso or similar
$imageUrl = 'https://cdimage.debian.org/debian-cd/current/amd64/iso-cd/debian-11.0.0-amd64-netinst.iso';

// Change this to an ISO file placed into the same directory as this example code
$file = dirname(__FILE__) . '/mini.iso';

// You can also pass a file resource:
// $file = fopen(dirname(__FILE__) . '/mini.iso', 'r');

$storageImport = $client->createStorageImportUpload($storageUuid);

echo "Storage import created!" . PHP_EOL;
print_r($storageImport);
echo PHP_EOL;

echo 'Uploading...' . PHP_EOL;
$uploadUrl = $storageImport->direct_upload_url;
$upload = $client->uploadToStorageImport($uploadUrl, $file);

echo "Storage import completed!" . PHP_EOL;
print_r($upload);
echo PHP_EOL;

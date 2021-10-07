<?php

/**
 * Add a CDROM device to a server & load an image into it.
 *
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();

// Arch Linux CDROM image:
$cdromUuid = '01000000-0000-4000-8000-000070030101';

// Change this to your server UUID:
$serverUuid = '00147072-86a5-494d-822b-546bf419022c';

$server = $client->attachStorage($serverUuid, ['type' => 'cdrom']);
echo "CDROM device attached!\n";

$client->loadCdrom($serverUuid, $cdromUuid);
echo "CDROM image loaded!\n";

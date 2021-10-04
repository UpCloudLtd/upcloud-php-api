<?php

/**
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();
$storage = $client->getStorage('013a4bb1-0741-4c83-9711-eca7d7b74ccf');
print_r($storage);

<?php

/**
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();
$templates = $client->getPublicTemplates();

print_r(json_encode($templates));

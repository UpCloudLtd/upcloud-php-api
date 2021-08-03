<?php

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

// add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
$client = new ApiClient();

$servers = $client->getServers();

print_r($servers);

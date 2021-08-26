<?php
/**
 * Add your username & password to UPCLOUD_USERNAME and UPCLOUD_PASSWORD env variables
 * to run this example.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient();

// Find the Ubuntu 20 template UUID
$templates = $client->getPublicTemplates();
$ubuntuKey = array_search('Ubuntu Server 20.04 LTS (Focal Fossa)', array_column($templates, 'title'));
$ubuntu = $templates[$ubuntuKey];

// Create the server
$server = [
  'plan' => '1xCPU-1GB',
  'title' => 'my awesome server',
  'hostname' => 'awesome.example',
  'zone' => 'de-fra1',
  // FIXME: should we add a nicer way to do this?
  'storage_devices' => [
    'storage_device' => [
      'action' => 'clone',
      'storage' => $ubuntu->uuid,
      'size' => 25,
      'tier' => 'maxiops',
      'title' => 'root'
    ]
  ]
];

$server = $client->createServer($server);

echo "Server created!\n";
print_r($server);

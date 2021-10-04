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

// SSH key for accessing the server
$sshKey = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIKe4zpMKPcoOBoakYdDpijz0VtgYD1f/5JhyMyzodhnr example-key';

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
      'address' => 'virtio',
      'size' => 10,
      'storage' => $ubuntu->uuid,
      'tier' => 'maxiops',
      'title' => 'root',
    ]
  ],
  'login_user' => [
    'create_password' => 'no',
    'ssh_keys' => [
      'ssh_key' => [$sshKey]
    ]
  ]
];

$server = $client->createServer($server);

echo "Server created!\n";
echo $server->uuid . "\n";

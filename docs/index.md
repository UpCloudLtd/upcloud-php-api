---
layout: sdk
title: UpCloud PHP SDK
---
# UpCloud PHP SDK

A typed PHP client for the UpCloud API. Browse service methods, request parameters, and PHP usage examples.

## Getting started

Requires PHP **8.1 or later** and Composer.

```sh
composer require upcloudltd/upcloud-php-api
```

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$client = new \Upcloud\UpcloudClient(token: getenv('UPCLOUD_TOKEN'));
$account = $client->account->details();
```

Set `UPCLOUD_TOKEN` to your API token before running the example.

[Installation, authentication, and error handling](https://github.com/UpCloudLtd/upcloud-php-api#requirements)

Latest follows the generated SDK on main, including prerelease development. Stable Composer installs do not opt into alpha versions.

[Legacy v3 source and documentation](https://github.com/UpCloudLtd/upcloud-php-api/tree/v3.0.0)

## API reference

[Browse the latest reference](latest/reference.html). Choose a service below to jump to its methods. Expand a method to see its description, usage, and parameters.

### Services

<div class="service-grid" markdown="block">

- [Account](latest/reference.html#accountAnchor)
- [Kubernetes](latest/reference.html#kubernetesAnchor)
- [Currency](latest/reference.html#currencyAnchor)
- [Device](latest/reference.html#deviceAnchor)
- [Events](latest/reference.html#eventsAnchor)
- [Ip Address](latest/reference.html#ip_addressAnchor)
- [Network Peering](latest/reference.html#network-peeringAnchor)
- [Network](latest/reference.html#networkAnchor)
- [Audit Logs](latest/reference.html#audit-logsAnchor)
- [Partner](latest/reference.html#partnerAnchor)
- [Permission](latest/reference.html#permissionAnchor)
- [Plan](latest/reference.html#planAnchor)
- [Price](latest/reference.html#priceAnchor)
- [Router](latest/reference.html#routerAnchor)
- [Server Group](latest/reference.html#server-groupAnchor)
- [Server](latest/reference.html#serverAnchor)
- [Server Size](latest/reference.html#server_sizeAnchor)
- [Storage](latest/reference.html#storageAnchor)
- [Tag](latest/reference.html#tagAnchor)
- [Timezone](latest/reference.html#timezoneAnchor)
- [Account Tokens](latest/reference.html#account-tokensAnchor)
- [Object Storage 2](latest/reference.html#object-storage-2Anchor)
- [File Storage](latest/reference.html#file-storageAnchor)
- [Database](latest/reference.html#databaseAnchor)
- [Gateway](latest/reference.html#gatewayAnchor)
- [Load Balancer](latest/reference.html#load-balancerAnchor)
- [Firewall Ruleset](latest/reference.html#firewall-rulesetAnchor)
- [Vnc Keymap](latest/reference.html#vnc_keymapAnchor)
- [Zone](latest/reference.html#zoneAnchor)

</div>

## Tagged releases

Versioned SDK reference snapshots. The v0.0.x snapshots predate migration and are not legacy Packagist v1-v3 releases.

- [v4.0.0-alpha.1](v4.0.0-alpha.1/reference.html)
- [v0.0.105](v0.0.105/reference.html)
- [v0.0.65](v0.0.65/reference.html)
- [v0.0.11](v0.0.11/reference.html)

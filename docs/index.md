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

Latest contains only the newest stable v4-or-later SDK reference. Alpha, beta, and RC documentation is available under Tagged releases below.

[Legacy v3 source and documentation](https://github.com/UpCloudLtd/upcloud-php-api/tree/v3.0.0)

## API reference

No stable v4 SDK reference has been published yet. Choose a version under Tagged releases below, or use the legacy v3 documentation linked above.

## Tagged releases

Versioned SDK reference snapshots. The v0.0.x snapshots predate migration and are not legacy Packagist v1-v3 releases.

- [v4.0.0-alpha.3](v4.0.0-alpha.3/reference.html)
- [v4.0.0-alpha.2](v4.0.0-alpha.2/reference.html)
- [v4.0.0-alpha.1](v4.0.0-alpha.1/reference.html)
- [v0.0.105](v0.0.105/reference.html)
- [v0.0.65](v0.0.65/reference.html)
- [v0.0.11](v0.0.11/reference.html)

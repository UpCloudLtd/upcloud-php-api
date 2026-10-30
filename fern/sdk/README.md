# UpCloud PHP SDK

The **UpCloud PHP SDK** provides a convenient, strongly-typed way to interact with the **UpCloud API** from PHP applications.

It is automatically generated from UpCloud’s official OpenAPI specification and kept up to date through an automated release process, ensuring alignment with the latest publicly released API versions.

---

## ✨ Features

- Official UpCloud SDK for PHP
- Generated from the public OpenAPI specification
- Fully typed API client
- Automatically updated as the API evolves
- Versioned releases matching API changes
- Open-source and MIT licensed

---

## 📦 Installation

# UpCloud PHP SDK

The UpCloud PHP SDK is a typed PHP client for the UpCloud API. Its clients and
API reference are generated from UpCloud's public OpenAPI specification.

## Requirements

- PHP `^8.1`
- Composer

Composer installs the SDK's HTTP and JSON dependencies automatically.

## Installation

```sh
composer require upcloudltd/upcloud-php-api
```

## Authentication

Create an API token for your UpCloud account and provide it to the client. Keep
the token outside source control; the example reads it from an environment
variable.

## Quick Start

```php
<?php

use Upcloud\Exceptions\UpcloudApiException;
use Upcloud\Exceptions\UpcloudException;
use Upcloud\Server\Requests\ListServersRequest;
use Upcloud\UpcloudClient;

require __DIR__ . '/vendor/autoload.php';

$token = getenv('UPCLOUD_TOKEN');
if ($token === false || $token === '') {
    throw new RuntimeException('Set the UPCLOUD_TOKEN environment variable.');
}

$client = new UpcloudClient(token: $token);

try {
    $response = $client->server->listServers(
        new ListServersRequest([
            'limit' => 25,
            'offset' => 0,
        ]),
    );

    foreach ($response->servers->server ?? [] as $server) {
        printf("%s\n", $server->uuid);
    }
} catch (UpcloudApiException $exception) {
    fprintf(STDERR, "UpCloud API returned HTTP %d\n", $exception->getCode());
    var_dump($exception->getBody());
} catch (UpcloudException $exception) {
    fprintf(STDERR, "UpCloud SDK request failed: %s\n", $exception->getMessage());
}
```

Service clients are properties of `UpcloudClient`, such as `$client->server`
and `$client->database`. Request objects accept associative arrays of typed
fields, and successful operations return typed response objects. The API
reference lists each operation's parameters and return type.

## Errors

`UpcloudApiException` represents a non-success API response. `getCode()` returns
the HTTP status code, and `getBody()` returns the response payload.
`UpcloudException` represents other SDK failures, including transport and
response-deserialization errors.

## Client Options

Pass options to the client to set defaults, or to an operation to override them.
Supported options include `baseUrl`, `timeout` in seconds, `maxRetries`,
additional `headers`, and a custom Guzzle-compatible `client`. The retry limit
defaults to two retries after the initial request.

```php
$client = new UpcloudClient(
    token: $token,
    options: [
        'timeout' => 10.0,
        'maxRetries' => 2,
    ],
);

$response = $client->server->listServers(
    options: ['timeout' => 5.0],
);
```

## API Reference

Browse the [versioned SDK API reference](https://upcloudltd.github.io/upcloud-php-api/)
for operation descriptions, parameters, response types, and examples.

## Upgrading from v3

Version 4 is a breaking replacement of the legacy client, published under the same
Composer package name. Existing v1-v3 tags remain unchanged. Applications staying
on v3 should keep their Composer constraint within `^3.0`.

The generated v4 client uses `Upcloud\UpcloudClient` and service/request classes
instead of the legacy `Upcloud\ApiClient\` API. Review authentication, request
objects, response models, and exception handling against the examples above; this
is not a drop-in upgrade. Test an alpha explicitly with:

```sh
composer require 'upcloudltd/upcloud-php-api:4.0.0-alpha.1@alpha'
```

The [v3 source and documentation](https://github.com/UpCloudLtd/upcloud-php-api/tree/v3.0.0)
remain available at the original tag. The `v0.0.x` reference snapshots in Pages
belong to pre-migration SDK development, not to the legacy Packagist releases.

## Releases and Contributions

SDK releases follow semantic versioning and correspond to reviewed API
specification releases. The SDK source is generated; make generator changes in
the `generator/` sources rather than editing generated files directly. Issues,
bug reports, and documentation contributions are welcome.

## License

This project is licensed under the MIT License. See the
[LICENSE file](https://github.com/UpCloudLtd/upcloud-php-api/blob/main/LICENSE).
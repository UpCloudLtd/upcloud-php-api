# UpCloud PHP API client library

![UpCloud php api test](https://github.com/UpCloudLtd/upcloud-php-api/workflows/UpCloud%20php%20api%20test/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/upcloudltd/upcloud-php-api/v/stable)](https://packagist.org/packages/upcloudltd/upcloud-php-api)
[![License](https://poser.pugx.org/upcloudltd/upcloud-php-api/license)](https://packagist.org/packages/upcloudltd/upcloud-php-api)
[![Total Downloads](https://poser.pugx.org/upcloudltd/upcloud-php-api/downloads)](https://packagist.org/packages/upcloudltd/upcloud-php-api)

This PHP API client library provides integration with the UpCloud API allowing operations used to manage resources on UpCloud. The client is a web service interface that uses HTTPS to connect to the API. The API follows the principles of a RESTful web service wherever possible.

The base URL for all API operations is https://api.upcloud.com/ and require basic authentication using UpCloud username and password. We recommend [creating a subaccount](https://www.upcloud.com/support/server-tags-and-group-accounts/) dedicated for the API communication for security purposes. This allows you to restrict API access by servers, storages, and tags ensuring you will never accidentally affect critical systems.

NOTE: Please test all of your use cases thoroughly before actual production use. Using a separate UpCloud account for testing / developing the client is recommended.

## Table of content

- [Installation](#installation)
- [Usage](#usage)
- [Documentation](#documentation)
- [Issues](#issues)
- [License](#license)

## Requirements

Using this library requires the PHP version 7.2 and later.

## Installation

### Composer

[Composer](http://getcomposer.org/) is the recommended way to install:

```
composer require upcloudltd/upcloud-php-api
```

The upcloudltd/upcloud-php-api can be found from packagist.org, https://packagist.org/packages/upcloudltd/upcloud-php-api

### Manual installation

Download the files from https://github.com/UpCloudLtd/upcloud-php-api, place them in your project and require the classes that you wish to use.

## Usage

Here's a quick example for fetching your account info using the SDK in a Composer project:

```php
<?php
// require the Composer autoloader
require_once 'vendor/autoload.php';

use UpCloud\ApiClient;

$client = new ApiClient([
  'username' => 'your_username_here',
  'password' => 'Some_Secret_1234'
]);

$result = $client->getAccount();
print_r($result);
```

## Development

Install all the packages:

```
composer install
```

### Coding standard

See [ecs.php] for the set coding styles & standards.

To check for code style problems:

```
vendor/bin/ecs check src
```

To fix code style problems:

```
vendor/bin/ecs check src --fix
```

### Tests

To run the unit tests:

```
vendor/bin/phpunit --testsuite unit
```

For integration tests (replace env vars with valid ones):

```
UPCLOUD_USERNAME=some_user UPCLOUD_PASSWORD=some_secret vendor/bin/phpunit --testsuite integration
```

And to clean up after the integration tests:

```
UPCLOUD_USERNAME=some_user UPCLOUD_PASSWORD=some_secret php tests/IntegrationCleanup.php
```

For development, you can run the unit tests continually using:

```
vendor/bin/phpunit-watcher watch --testsuite unit
```

### Documentation

Generate the documentation using docker & [phpDocumentator](https://docs.phpdoc.org/).

```
docker run --rm -v $(pwd):/data phpdoc/phpdoc:3 run
```

## Issues

Found a bug, have a problem using the client, or anything else about the library you would want to mention? [Open a new issue here](https://github.com/UpCloudLtd/upcloud-php-api/issues/new) to get in contact.

## License

[MIT License](LICENSE)

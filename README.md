# UpCloud PHP API client library

[![Build Status](https://travis-ci.org/UpCloudLtd/upcloud-php-api.svg?branch=master)](https://travis-ci.org/UpCloudLtd/upcloud-php-api)
[![Latest Stable Version](https://poser.pugx.org/upcloudltd/upcloud-php-api/v/stable)](https://packagist.org/packages/upcloudltd/upcloud-php-api)
[![License](https://poser.pugx.org/upcloudltd/upcloud-php-api/license)](https://packagist.org/packages/upcloudltd/upcloud-php-api)
[![Total Downloads](https://poser.pugx.org/upcloudltd/upcloud-php-api/downloads)](https://packagist.org/packages/upcloudltd/upcloud-php-api)

This PHP API client library provides integration with the UpCloud API allowing operations used to manage resources on UpCloud. The client is a web service interface that uses HTTPS to connect to the API. The API follows the principles of a RESTful web service wherever possible.

The base URL for all API operations is  https://api.upcloud.com/ and require basic authentication using UpCloud username and password. We recommend [creating a subaccount](https://www.upcloud.com/support/server-tags-and-group-accounts/) dedicated for the API communication for security purposes. This allows you to restrict API access by servers, storages, and tags ensuring you will never accidentally affect critical systems.

## Table of content
* [Installation](#installation)
* [Usage](#usage)
* [Documentation](#documentation)
* [Issues](#issues)
* [License](#license)

## Requirements

Using this library requires the PHP version 7.2 and later.

## Installation
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "require": {
    "upcloudltd/upcloud-php-api": "v1.0.3"
  }
}
```

Then run `composer install`

The upcloudltd/upcloud-php-api can be found from packagist.org, https://packagist.org/packages/upcloudltd/upcloud-php-api

### Manual installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to//vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
UPCLOUD_API_TEST_USER=user UPCLOUD_API_TEST_PASSWORD=pass ./vendor/bin/phpunit
```

Note: You need to supply an UpCloud account's details to run the tests. The tests will create/modify/delete servers under this account in the actual UpCloud environment, so please use a test account.

## Usage

Please follow the [installation procedure](#installation--usage) and then run the following (**NOTE**: In real production applications you should use for example ENV variables instead of inserting credentials directly to code and to version control):

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Upcloud\ApiClient\Upcloud\AccountApi();
$config = $api_instance->getConfig();
$config->setUsername('YOUR UPCLOUD USERNAME');
$config->setPassword('YOUR UPCLOUD PASSWORD');

try {
    $result = $api_instance->getAccount();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->getAccount: ', $e->getMessage(), PHP_EOL;
}

?>
```

To create a server:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Upcloud\ApiClient\Upcloud\AccountApi();
$config = $api_instance->getConfig();
$config->setUsername('YOUR UPCLOUD USERNAME');
$config->setPassword('YOUR UPCLOUD PASSWORD');

try {
        $result = $api_instance->getAccount();
            print_r($result);
} catch (Exception $e) {
        echo 'Exception when calling AccountApi->getAccount: ', $e->getMessage(), PHP_EOL;
}

$server = new Upcloud\ApiClient\Model\Server();
$server->setTitle('php-test-machine');
$server->setZone('fi-hel1');
$server->setHostname('phptest');
$server->setPlan('1xCPU-1GB');

$storage = new Upcloud\ApiClient\Model\StorageDevice();
$storage->setStorage('01000000-0000-4000-8000-000030040200');
$storage->setSize(50.0);
$storage->setAction('clone');
$storage->setTitle('php-test-storage');

$storage_devices = new Upcloud\ApiClient\Model\ServerStorageDevices();
$storage_devices->setStorageDevice($storage);

$server->setStorageDevices($storage_devices);

$server_request = new Upcloud\ApiClient\Model\CreateServerRequest();
$server_request->setServer($server);
$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
try {
        $result = $api_instance->createServer($server_request);
            print_r($result);
} catch (Exception $e) {
        echo 'Exception when calling ServerApi->createServer: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation

All URIs are relative to *https://api.upcloud.com/1.3*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccountApi* | [**getAccount**](docs/Api/AccountApi.md#getaccount) | **GET** /account | Account information
*FirewallApi* | [**createFirewallRule**](docs/Api/FirewallApi.md#createfirewallrule) | **POST** /server/{serverId}/firewall_rule | Create firewall rule
*FirewallApi* | [**deleteFirewallRule**](docs/Api/FirewallApi.md#deletefirewallrule) | **DELETE** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Remove firewall rule
*FirewallApi* | [**getFirewallRule**](docs/Api/FirewallApi.md#getfirewallrule) | **GET** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Get firewall rule details
*FirewallApi* | [**serverServerIdFirewallRuleGet**](docs/Api/FirewallApi.md#serverserveridfirewallruleget) | **GET** /server/{serverId}/firewall_rule | List firewall rules
*IPAddressApi* | [**addIp**](docs/Api/IPAddressApi.md#addip) | **POST** /ip_address | Assign IP address
*IPAddressApi* | [**deleteIp**](docs/Api/IPAddressApi.md#deleteip) | **DELETE** /ip_address/{ip} | Release IP address
*IPAddressApi* | [**getDetails**](docs/Api/IPAddressApi.md#getdetails) | **GET** /ip_address/{ip} | Get IP address details
*IPAddressApi* | [**listIps**](docs/Api/IPAddressApi.md#listips) | **GET** /ip_address | List IP addresses
*IPAddressApi* | [**modifyIp**](docs/Api/IPAddressApi.md#modifyip) | **PUT** /ip_address/{ip} | Modify IP address
*PlanApi* | [**listPlans**](docs/Api/PlanApi.md#listplans) | **GET** /plan | List available plans
*PricesApi* | [**listPrices**](docs/Api/PricesApi.md#listprices) | **GET** /price | List prices
*ServerApi* | [**assignTag**](docs/Api/ServerApi.md#assigntag) | **POST** /server/{serverId}/tag/{tagList} | Assign tag to a server
*ServerApi* | [**attachStorage**](docs/Api/ServerApi.md#attachstorage) | **POST** /server/{serverId}/storage/attach | Attach storage
*ServerApi* | [**createFirewallRule**](docs/Api/ServerApi.md#createfirewallrule) | **POST** /server/{serverId}/firewall_rule | Create firewall rule
*ServerApi* | [**createServer**](docs/Api/ServerApi.md#createserver) | **POST** /server | Create server
*ServerApi* | [**deleteFirewallRule**](docs/Api/ServerApi.md#deletefirewallrule) | **DELETE** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Remove firewall rule
*ServerApi* | [**deleteServer**](docs/Api/ServerApi.md#deleteserver) | **DELETE** /server/{serverId} | Delete server
*ServerApi* | [**detachStorage**](docs/Api/ServerApi.md#detachstorage) | **POST** /server/{serverId}/storage/detach | Detach storage
*ServerApi* | [**ejectCdrom**](docs/Api/ServerApi.md#ejectcdrom) | **POST** /server/{serverId}/cdrom/eject | Eject CD-ROM
*ServerApi* | [**getFirewallRule**](docs/Api/ServerApi.md#getfirewallrule) | **GET** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Get firewall rule details
*ServerApi* | [**listServerConfigurations**](docs/Api/ServerApi.md#listserverconfigurations) | **GET** /server_size | List server configurations
*ServerApi* | [**listServers**](docs/Api/ServerApi.md#listservers) | **GET** /server | List of servers
*ServerApi* | [**loadCdrom**](docs/Api/ServerApi.md#loadcdrom) | **POST** /server/{serverId}/storage/cdrom/load | Load CD-ROM
*ServerApi* | [**modifyServer**](docs/Api/ServerApi.md#modifyserver) | **PUT** /server/{serverId} | Modify server
*ServerApi* | [**restartServer**](docs/Api/ServerApi.md#restartserver) | **POST** /server/{serverId}/restart | Restart server
*ServerApi* | [**serverDetails**](docs/Api/ServerApi.md#serverdetails) | **GET** /server/{serverId} | Get server details
*ServerApi* | [**serverServerIdFirewallRuleGet**](docs/Api/ServerApi.md#serverserveridfirewallruleget) | **GET** /server/{serverId}/firewall_rule | List firewall rules
*ServerApi* | [**startServer**](docs/Api/ServerApi.md#startserver) | **POST** /server/{serverId}/start | Start server
*ServerApi* | [**stopServer**](docs/Api/ServerApi.md#stopserver) | **POST** /server/{serverId}/stop | Stop server
*ServerApi* | [**untag**](docs/Api/ServerApi.md#untag) | **POST** /server/{serverId}/untag/{tagName} | Remove tag from server
*StorageApi* | [**attachStorage**](docs/Api/StorageApi.md#attachstorage) | **POST** /server/{serverId}/storage/attach | Attach storage
*StorageApi* | [**backupStorage**](docs/Api/StorageApi.md#backupstorage) | **POST** /storage/{storageId}/backup | Create backup
*StorageApi* | [**cancelOperation**](docs/Api/StorageApi.md#canceloperation) | **POST** /storage/{storageId}/cancel | Cancel storage operation
*StorageApi* | [**cloneStorage**](docs/Api/StorageApi.md#clonestorage) | **POST** /storage/{storageId}/clone | Clone storage
*StorageApi* | [**createStorage**](docs/Api/StorageApi.md#createstorage) | **POST** /storage | Create storage
*StorageApi* | [**deleteStorage**](docs/Api/StorageApi.md#deletestorage) | **DELETE** /storage/{storageId} | Delete storage
*StorageApi* | [**detachStorage**](docs/Api/StorageApi.md#detachstorage) | **POST** /server/{serverId}/storage/detach | Detach storage
*StorageApi* | [**ejectCdrom**](docs/Api/StorageApi.md#ejectcdrom) | **POST** /server/{serverId}/cdrom/eject | Eject CD-ROM
*StorageApi* | [**favoriteStorage**](docs/Api/StorageApi.md#favoritestorage) | **POST** /storage/{storageId}/favorite | Add storage to favorites
*StorageApi* | [**getStorageDetails**](docs/Api/StorageApi.md#getstoragedetails) | **GET** /storage/{storageId} | Get storage details
*StorageApi* | [**listStorageTypes**](docs/Api/StorageApi.md#liststoragetypes) | **GET** /storage/{type}/ | List of storages by type
*StorageApi* | [**listStorages**](docs/Api/StorageApi.md#liststorages) | **GET** /storage | List of storages
*StorageApi* | [**loadCdrom**](docs/Api/StorageApi.md#loadcdrom) | **POST** /server/{serverId}/storage/cdrom/load | Load CD-ROM
*StorageApi* | [**modifyStorage**](docs/Api/StorageApi.md#modifystorage) | **PUT** /storage/{storageId} | Modify storage
*StorageApi* | [**restoreStorage**](docs/Api/StorageApi.md#restorestorage) | **POST** /storage/{storageId}/restore | Restore backup
*StorageApi* | [**templatizeStorage**](docs/Api/StorageApi.md#templatizestorage) | **POST** /storage/{storageId}/templatize | Templatize storage
*StorageApi* | [**unfavoriteStorage**](docs/Api/StorageApi.md#unfavoritestorage) | **DELETE** /storage/{storageId}/favorite | Remove storage from favorites
*TagApi* | [**assignTag**](docs/Api/TagApi.md#assigntag) | **POST** /server/{serverId}/tag/{tagList} | Assign tag to a server
*TagApi* | [**createTag**](docs/Api/TagApi.md#createtag) | **POST** /tag | Create a new tag
*TagApi* | [**deleteTag**](docs/Api/TagApi.md#deletetag) | **DELETE** /tag/{tagName} | Delete tag
*TagApi* | [**listTags**](docs/Api/TagApi.md#listtags) | **GET** /tag | List existing tags
*TagApi* | [**modifyTag**](docs/Api/TagApi.md#modifytag) | **PUT** /tag/{tagName} | Modify existing tag
*TagApi* | [**untag**](docs/Api/TagApi.md#untag) | **POST** /server/{serverId}/untag/{tagName} | Remove tag from server
*TimezoneApi* | [**listTimezones**](docs/Api/TimezoneApi.md#listtimezones) | **GET** /timezone | List timezones
*ZoneApi* | [**listZones**](docs/Api/ZoneApi.md#listzones) | **GET** /zone | List available zones


## Documentation of the models

 - [Account](docs/Model/Account.md)
 - [AccountResponse](docs/Model/AccountResponse.md)
 - [AddIpRequest](docs/Model/AddIpRequest.md)
 - [AddressFamily](docs/Model/AddressFamily.md)
 - [AssignIpResponse](docs/Model/AssignIpResponse.md)
 - [AttachStorageDeviceRequest](docs/Model/AttachStorageDeviceRequest.md)
 - [AvailablePlanListResponse](docs/Model/AvailablePlanListResponse.md)
 - [AvailablePlanListResponsePlans](docs/Model/AvailablePlanListResponsePlans.md)
 - [BackupRule](docs/Model/BackupRule.md)
 - [CloneStorageRequest](docs/Model/CloneStorageRequest.md)
 - [ConfigurationListResponse](docs/Model/ConfigurationListResponse.md)
 - [ConfigurationListResponseServerSizes](docs/Model/ConfigurationListResponseServerSizes.md)
 - [CreateBackupStorageRequest](docs/Model/CreateBackupStorageRequest.md)
 - [CreateNewTagResponse](docs/Model/CreateNewTagResponse.md)
 - [CreateServerRequest](docs/Model/CreateServerRequest.md)
 - [CreateServerResponse](docs/Model/CreateServerResponse.md)
 - [CreateStorageRequest](docs/Model/CreateStorageRequest.md)
 - [CreateStorageResponse](docs/Model/CreateStorageResponse.md)
 - [Error](docs/Model/Error.md)
 - [ErrorCode](docs/Model/ErrorCode.md)
 - [ErrorError](docs/Model/ErrorError.md)
 - [ErrorStatus](docs/Model/ErrorStatus.md)
 - [FirewallRule](docs/Model/FirewallRule.md)
 - [FirewallRuleCreateResponse](docs/Model/FirewallRuleCreateResponse.md)
 - [FirewallRuleListResponse](docs/Model/FirewallRuleListResponse.md)
 - [FirewallRuleListResponseFirewallRules](docs/Model/FirewallRuleListResponseFirewallRules.md)
 - [FirewallRuleRequest](docs/Model/FirewallRuleRequest.md)
 - [IpAddress](docs/Model/IpAddress.md)
 - [IpAddressListResponse](docs/Model/IpAddressListResponse.md)
 - [IpAddresses](docs/Model/IpAddresses.md)
 - [ModifyIpRequest](docs/Model/ModifyIpRequest.md)
 - [ModifyStorageRequest](docs/Model/ModifyStorageRequest.md)
 - [ModifyTagRequest](docs/Model/ModifyTagRequest.md)
 - [Plan](docs/Model/Plan.md)
 - [Price](docs/Model/Price.md)
 - [PriceListResponse](docs/Model/PriceListResponse.md)
 - [PriceListResponsePrices](docs/Model/PriceListResponsePrices.md)
 - [PriceZone](docs/Model/PriceZone.md)
 - [RestartServer](docs/Model/RestartServer.md)
 - [Server](docs/Model/Server.md)
 - [ServerListResponse](docs/Model/ServerListResponse.md)
 - [ServerListResponseServers](docs/Model/ServerListResponseServers.md)
 - [ServerSize](docs/Model/ServerSize.md)
 - [ServerState](docs/Model/ServerState.md)
 - [ServerStorageDevices](docs/Model/ServerStorageDevices.md)
 - [ServerTags](docs/Model/ServerTags.md)
 - [StopServer](docs/Model/StopServer.md)
 - [StopServerRequest](docs/Model/StopServerRequest.md)
 - [Storage](docs/Model/Storage.md)
 - [StorageAccessType](docs/Model/StorageAccessType.md)
 - [StorageBackups](docs/Model/StorageBackups.md)
 - [StorageDevice](docs/Model/StorageDevice.md)
 - [StorageDeviceDetachRequest](docs/Model/StorageDeviceDetachRequest.md)
 - [StorageDeviceLoadRequest](docs/Model/StorageDeviceLoadRequest.md)
 - [StorageServers](docs/Model/StorageServers.md)
 - [StorageState](docs/Model/StorageState.md)
 - [StorageTier](docs/Model/StorageTier.md)
 - [StorageType](docs/Model/StorageType.md)
 - [SuccessStoragesResponse](docs/Model/SuccessStoragesResponse.md)
 - [SuccessStoragesResponseStorages](docs/Model/SuccessStoragesResponseStorages.md)
 - [Tag](docs/Model/Tag.md)
 - [TagCreateRequest](docs/Model/TagCreateRequest.md)
 - [TagListResponse](docs/Model/TagListResponse.md)
 - [TagListResponseTags](docs/Model/TagListResponseTags.md)
 - [TagServers](docs/Model/TagServers.md)
 - [TemplitizeStorageRequest](docs/Model/TemplitizeStorageRequest.md)
 - [Timezone](docs/Model/Timezone.md)
 - [TimezoneListResponse](docs/Model/TimezoneListResponse.md)
 - [TimezoneListResponseTimezones](docs/Model/TimezoneListResponseTimezones.md)
 - [Zone](docs/Model/Zone.md)
 - [ZoneListResponse](docs/Model/ZoneListResponse.md)
 - [ZoneListResponseZones](docs/Model/ZoneListResponseZones.md)


## Documentation for authorization

It's recommended to store the username and password in a separate configuration file while developing API applications to avoid accidentally publishing your account credentials.

### baseAuth

- **Type**: HTTP basic authentication
- **Username**: Your UpCloud API username
- **Password**: Your UpCloud API user's password

## Issues

Found a bug, have a problem using the client, or anything else about the library you would want to mention? [Open a new issue here](https://github.com/UpCloudLtd/upcloud-php-api/issues/new) to get in contact.


## License

This project is distributed under the [MIT License](https://opensource.org/licenses/MIT), see LICENSE.txt for more information.

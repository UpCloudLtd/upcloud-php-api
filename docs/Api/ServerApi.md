# Upcloud\ApiClient\ServerApi

All URIs are relative to _https://api.upcloud.com/1.3_

| Method                                                                          | HTTP request                                                     | Description                |
| ------------------------------------------------------------------------------- | ---------------------------------------------------------------- | -------------------------- |
| [**assignTag**](ServerApi.md#assignTag)                                         | **POST** /server/{serverId}/tag/{tagList}                        | Assign tag to a server     |
| [**attachStorage**](ServerApi.md#attachStorage)                                 | **POST** /server/{serverId}/storage/attach                       | Attach storage             |
| [**createFirewallRule**](ServerApi.md#createFirewallRule)                       | **POST** /server/{serverId}/firewall_rule                        | Create firewall rule       |
| [**createServer**](ServerApi.md#createServer)                                   | **POST** /server                                                 | Create server              |
| [**deleteFirewallRule**](ServerApi.md#deleteFirewallRule)                       | **DELETE** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Remove firewall rule       |
| [**deleteServer**](ServerApi.md#deleteServer)                                   | **DELETE** /server/{serverId}                                    | Delete server              |
| [**detachStorage**](ServerApi.md#detachStorage)                                 | **POST** /server/{serverId}/storage/detach                       | Detach storage             |
| [**ejectCdrom**](ServerApi.md#ejectCdrom)                                       | **POST** /server/{serverId}/cdrom/eject                          | Eject CD-ROM               |
| [**getFirewallRule**](ServerApi.md#getFirewallRule)                             | **GET** /server/{serverId}/firewall_rule/{firewallRuleNumber}    | Get firewall rule details  |
| [**listServerConfigurations**](ServerApi.md#listServerConfigurations)           | **GET** /server_size                                             | List server configurations |
| [**listServers**](ServerApi.md#listServers)                                     | **GET** /server                                                  | List of servers            |
| [**loadCdrom**](ServerApi.md#loadCdrom)                                         | **POST** /server/{serverId}/storage/cdrom/load                   | Load CD-ROM                |
| [**modifyServer**](ServerApi.md#modifyServer)                                   | **PUT** /server/{serverId}                                       | Modify server              |
| [**restartServer**](ServerApi.md#restartServer)                                 | **POST** /server/{serverId}/restart                              | Restart server             |
| [**serverDetails**](ServerApi.md#serverDetails)                                 | **GET** /server/{serverId}                                       | Get server details         |
| [**serverServerIdFirewallRuleGet**](ServerApi.md#serverServerIdFirewallRuleGet) | **GET** /server/{serverId}/firewall_rule                         | List firewall rules        |
| [**startServer**](ServerApi.md#startServer)                                     | **POST** /server/{serverId}/start                                | Start server               |
| [**stopServer**](ServerApi.md#stopServer)                                       | **POST** /server/{serverId}/stop                                 | Stop server                |
| [**untag**](ServerApi.md#untag)                                                 | **POST** /server/{serverId}/untag/{tagName}                      | Remove tag from server     |

# **assignTag**

> \Upcloud\ApiClient\Model\CreateServerResponse assignTag($server_id, $tag_list)

Assign tag to a server

Servers can be tagged with one or more tags. The tags used must exist

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id
$tag_list = "tag_list_example"; // string | List of tags

try {
    $result = $api_instance->assignTag($server_id, $tag_list);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->assignTag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name          | Type       | Description  | Notes |
| ------------- | ---------- | ------------ | ----- |
| **server_id** | **string** | Server id    |
| **tag_list**  | **string** | List of tags |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **attachStorage**

> \Upcloud\ApiClient\Model\CreateServerResponse attachStorage($server_id, $storage_device)

Attach storage

Attaches a storage as a device to a server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Upcloud\ApiClient\Model\AttachStorageDeviceRequest(); // \Upcloud\ApiClient\Model\AttachStorageDeviceRequest |

try {
    $result = $api_instance->attachStorage($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->attachStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name               | Type                                                                                              | Description | Notes |
| ------------------ | ------------------------------------------------------------------------------------------------- | ----------- | ----- |
| **server_id**      | **string**                                                                                        | Server id   |
| **storage_device** | [**\Upcloud\ApiClient\Model\AttachStorageDeviceRequest**](../Model/AttachStorageDeviceRequest.md) |             |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **createFirewallRule**

> \Upcloud\ApiClient\Model\FirewallRuleCreateResponse createFirewallRule($server_id, $firewall_rule)

Create firewall rule

Creates a new firewall rule

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id
$firewall_rule = new \Upcloud\ApiClient\Model\FirewallRuleRequest(); // \Upcloud\ApiClient\Model\FirewallRuleRequest |

try {
    $result = $api_instance->createFirewallRule($server_id, $firewall_rule);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->createFirewallRule: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name              | Type                                                                                | Description | Notes |
| ----------------- | ----------------------------------------------------------------------------------- | ----------- | ----- |
| **server_id**     | **string**                                                                          | Server id   |
| **firewall_rule** | [**\Upcloud\ApiClient\Model\FirewallRuleRequest**](../Model/FirewallRuleRequest.md) |             |

### Return type

[**\Upcloud\ApiClient\Model\FirewallRuleCreateResponse**](../Model/FirewallRuleCreateResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **createServer**

> \Upcloud\ApiClient\Model\CreateServerResponse createServer($server)

Create server

Creates a new server instance.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server = new \Upcloud\ApiClient\Model\CreateServerRequest(); // \Upcloud\ApiClient\Model\CreateServerRequest |

try {
    $result = $api_instance->createServer($server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->createServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name       | Type                                                                                | Description | Notes      |
| ---------- | ----------------------------------------------------------------------------------- | ----------- | ---------- |
| **server** | [**\Upcloud\ApiClient\Model\CreateServerRequest**](../Model/CreateServerRequest.md) |             | [optional] |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **deleteFirewallRule**

> deleteFirewallRule($server_id, $firewall_rule_number)

Remove firewall rule

Removes a firewall rule from a server. Firewall rules must be removed individually. The positions of remaining firewall rules will be adjusted after a rule is removed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id
$firewall_rule_number = 3.4; // float | Denotes the index of the firewall rule in the server's firewall rule list

try {
    $api_instance->deleteFirewallRule($server_id, $firewall_rule_number);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->deleteFirewallRule: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                     | Type       | Description                                                                   | Notes |
| ------------------------ | ---------- | ----------------------------------------------------------------------------- | ----- |
| **server_id**            | **string** | Server id                                                                     |
| **firewall_rule_number** | **float**  | Denotes the index of the firewall rule in the server&#39;s firewall rule list |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **deleteServer**

> deleteServer($server_id)

Delete server

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Id of server to delete

try {
    $api_instance->deleteServer($server_id);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->deleteServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name          | Type       | Description            | Notes |
| ------------- | ---------- | ---------------------- | ----- |
| **server_id** | **string** | Id of server to delete |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **detachStorage**

> \Upcloud\ApiClient\Model\CreateServerResponse detachStorage($server_id, $storage_device)

Detach storage

Detaches a storage resource from a server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Upcloud\ApiClient\Model\StorageDeviceDetachRequest(); // \Upcloud\ApiClient\Model\StorageDeviceDetachRequest |

try {
    $result = $api_instance->detachStorage($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->detachStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name               | Type                                                                                              | Description | Notes |
| ------------------ | ------------------------------------------------------------------------------------------------- | ----------- | ----- |
| **server_id**      | **string**                                                                                        | Server id   |
| **storage_device** | [**\Upcloud\ApiClient\Model\StorageDeviceDetachRequest**](../Model/StorageDeviceDetachRequest.md) |             |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **ejectCdrom**

> ejectCdrom($server_id)

Eject CD-ROM

Ejects the storage from the CD-ROM device of a server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id

try {
    $api_instance->ejectCdrom($server_id);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->ejectCdrom: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name          | Type       | Description | Notes |
| ------------- | ---------- | ----------- | ----- |
| **server_id** | **string** | Server id   |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **getFirewallRule**

> \Upcloud\ApiClient\Model\FirewallRuleCreateResponse getFirewallRule($server_id, $firewall_rule_number)

Get firewall rule details

Returns detailed information about a specific firewall rule

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id
$firewall_rule_number = 3.4; // float | Denotes the index of the firewall rule in the server's firewall rule list

try {
    $result = $api_instance->getFirewallRule($server_id, $firewall_rule_number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->getFirewallRule: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                     | Type       | Description                                                                   | Notes |
| ------------------------ | ---------- | ----------------------------------------------------------------------------- | ----- |
| **server_id**            | **string** | Server id                                                                     |
| **firewall_rule_number** | **float**  | Denotes the index of the firewall rule in the server&#39;s firewall rule list |

### Return type

[**\Upcloud\ApiClient\Model\FirewallRuleCreateResponse**](../Model/FirewallRuleCreateResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **listServerConfigurations**

> \Upcloud\ApiClient\Model\ConfigurationListResponse listServerConfigurations()

List server configurations

Returns a list of available server configurations. A server configuration consists of a combination of CPU core count and main memory amount. All servers are created using these configurations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();

try {
    $result = $api_instance->listServerConfigurations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->listServerConfigurations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\ConfigurationListResponse**](../Model/ConfigurationListResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **listServers**

> \Upcloud\ApiClient\Model\ServerListResponse listServers()

List of servers

Returns a list of all servers associated with the current account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();

try {
    $result = $api_instance->listServers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->listServers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **loadCdrom**

> \Upcloud\ApiClient\Model\CreateServerResponse loadCdrom($server_id, $storage_device)

Load CD-ROM

Loads a storage as a CD-ROM in the CD-ROM device of a server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Upcloud\ApiClient\Model\StorageDeviceLoadRequest(); // \Upcloud\ApiClient\Model\StorageDeviceLoadRequest |

try {
    $result = $api_instance->loadCdrom($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->loadCdrom: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name               | Type                                                                                          | Description | Notes      |
| ------------------ | --------------------------------------------------------------------------------------------- | ----------- | ---------- |
| **server_id**      | **string**                                                                                    | Server id   |
| **storage_device** | [**\Upcloud\ApiClient\Model\StorageDeviceLoadRequest**](../Model/StorageDeviceLoadRequest.md) |             | [optional] |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **modifyServer**

> \Upcloud\ApiClient\Model\CreateServerResponse modifyServer($server_id, $server)

Modify server

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Id of server to modify
$server = new \Upcloud\ApiClient\Model\ModifyServerRequest(); // \Upcloud\ApiClient\Model\ModifyServerRequest |

try {
    $result = $api_instance->modifyServer($server_id, $server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->modifyServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name          | Type                                                      | Description            | Notes      |
| ------------- | --------------------------------------------------------- | ---------------------- | ---------- |
| **server_id** | **string**                                                | Id of server to modify |
| **server**    | [**\Upcloud\ApiClient\Model\ModifyServerRequest**](../Model/ModifyServerRequest.md) |                        | [optional] |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **restartServer**

> \Upcloud\ApiClient\Model\CreateServerResponse restartServer($server_id, $restart_server)

Restart server

Stops and starts a server. The server state must be `started`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Id of server to restart
$restart_server = new \Upcloud\ApiClient\Model\RestartServer(); // \Upcloud\ApiClient\Model\RestartServer |

try {
    $result = $api_instance->restartServer($server_id, $restart_server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->restartServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name               | Type                                                                    | Description             | Notes |
| ------------------ | ----------------------------------------------------------------------- | ----------------------- | ----- |
| **server_id**      | **string**                                                              | Id of server to restart |
| **restart_server** | [**\Upcloud\ApiClient\Model\RestartServer**](../Model/RestartServer.md) |                         |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **serverDetails**

> \Upcloud\ApiClient\Model\CreateServerResponse serverDetails($server_id)

Get server details

Returns detailed information about a specific server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Id of server to return

try {
    $result = $api_instance->serverDetails($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name          | Type       | Description            | Notes |
| ------------- | ---------- | ---------------------- | ----- |
| **server_id** | **string** | Id of server to return |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **serverServerIdFirewallRuleGet**

> \Upcloud\ApiClient\Model\FirewallRuleListResponse serverServerIdFirewallRuleGet($server_id)

List firewall rules

Returns a list of firewall rules for a specific server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id

try {
    $result = $api_instance->serverServerIdFirewallRuleGet($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdFirewallRuleGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name          | Type       | Description | Notes |
| ------------- | ---------- | ----------- | ----- |
| **server_id** | **string** | Server id   |

### Return type

[**\Upcloud\ApiClient\Model\FirewallRuleListResponse**](../Model/FirewallRuleListResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **startServer**

> \Upcloud\ApiClient\Model\CreateServerResponse startServer($server_id)

Start server

Starts a stopped server. The server state must be `stopped`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Id of server to start

try {
    $result = $api_instance->startServer($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->startServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name          | Type       | Description           | Notes |
| ------------- | ---------- | --------------------- | ----- |
| **server_id** | **string** | Id of server to start |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **stopServer**

> \Upcloud\ApiClient\Model\CreateServerResponse stopServer($server_id, $stop_server_request)

Stop server

Stops a started server. The server state must be `started`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Id of server to stop
$stop_server_request = new \Upcloud\ApiClient\Model\StopServer(); // \Upcloud\ApiClient\Model\StopServer |

try {
    $result = $api_instance->stopServer($server_id, $stop_server_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->stopServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                    | Type                                                              | Description          | Notes |
| ----------------------- | ----------------------------------------------------------------- | -------------------- | ----- |
| **server_id**           | **string**                                                        | Id of server to stop |
| **stop_server_request** | [**\Upcloud\ApiClient\Model\StopServer**](../Model/StopServer.md) |                      |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **untag**

> \Upcloud\ApiClient\Model\CreateServerResponse untag($server_id, $tag_name)

Remove tag from server

Untags tags from given server. The tag(s) must exist

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ServerApi();
$server_id = "server_id_example"; // string | Server id
$tag_name = "tag_name_example"; // string | Tag name

try {
    $result = $api_instance->untag($server_id, $tag_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->untag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name          | Type       | Description | Notes |
| ------------- | ---------- | ----------- | ----- |
| **server_id** | **string** | Server id   |
| **tag_name**  | **string** | Tag name    |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

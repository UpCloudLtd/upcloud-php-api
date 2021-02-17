# Upcloud\ApiClient\NetworkApi

All URIs are relative to _https://api.upcloud.com/1.3_

| Method                                       | HTTP request                | Description            |
| -------------------------------------------- | --------------------------- | ---------------------- |
| [**getListNetworks**](NetworkApi.md#getlistnetworks) | **GET** /network    | List all Networks  |
| [**getNetworkDetails**](NetworkApi.md#getnetworkdetails) | **GET** /network/{uuid} | Get Network details |
| [**createNetwork**](NetworkApi.md#createnetwork)     | **POST** /network | Create a new SDN private network |
| [**modifyNetwork**](NetworkApi.md#modifynetwork)     | **PUT** /network/{id} | Modify a specific SDN private network |
| [**deleteNetwork**](NetworkApi.md#deletenetwork)     | **DELETE** /network/{id} | Delete a SDN private network |
| [**getListServerNetworks**](NetworkApi.md#getlistservernetworks) | **GET** server/{server_id}/networking    | List all Networks  |
| [**createNetworkInterface**](NetworkApi.md#createnetworkinterface) | **POST** server/{server}/networking/interface | Create a new network interface |
| [**modifyNetworkInterface**](NetworkApi.md#modifynetworkinterface)     | **PUT** /network/{id} | Modify network interface |
| [**deleteNetworkInterface**](NetworkApi.md#deletenetworkinterface)     | **DELETE** /network/{id} | Delete network interface |
| [**getListRouters**](NetworkApi.md#getlistrouters) | **GET** /router    | List of all available routers  |
| [**getRouterDetails**](NetworkApi.md#getrouterdetails) | **GET** /router/{uuid} | Get router details |
| [**createRouter**](NetworkApi.md#createrouter) | **POST** /router | Create a new router |
| [**modifyRouter**](NetworkApi.md#modifyrouter)     | **PUT** /router/{id} | Modify an existing router |
| [**deleteRouter**](NetworkApi.md#deleterouter)     | **DELETE** /router/{id} | Delete an existing router |
# **getListNetworks**

> \Upcloud\ApiClient\Model\NetworksListResponse getListNetworks(string $zone = null)

List Networks


### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();

try {
    $result = $api_instance->getListNetworks();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->getListNetworks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\NetworksListResponse**](../Model/NetworksListResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **getNetworkDetails**

> \Upcloud\ApiClient\Model\NetworkResponse getNetworkDetails($uuid)

Get Network details

Returns detailed information about a specific network.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$uuid = "uuid_example"; // string | Network uuid

try {
    $result = $api_instance->getNetworkDetails($uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->getNetworkDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name   | Type       | Description | Notes |
| ------ | ---------- | ----------- | ----- |
| **uuid** | **string** | Network uuid |

### Return type

[**\Upcloud\ApiClient\Model\NetworkResponse**](../Model/NetworkResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **createNetwork**

> \Upcloud\ApiClient\Model\NetworkResponse createNetwork($network)

Create a new Network

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$network = new \Upcloud\ApiClient\Model\CreateNetworkRequest(); // \Upcloud\ApiClient\Model\CreateNetworkRequest |

try {
    $result = $api_instance->createNetwork($network);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->createNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **network** | [**\Upcloud\ApiClient\Model\CreateNetworkRequest**](../Model/CreateNetworkRequest.md) |             |  |

### Return type

[**\Upcloud\ApiClient\Model\NetworkResponse**](../Model/NetworkResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **modifyNetwork**

> \Upcloud\ApiClient\Model\NetworkResponse modifyNetwork($uuid, $network)

Modify Network

Modifies description of a specific Network.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$uuid = "uuid_example"; // string | Network uuid
$network = new \Upcloud\ApiClient\Model\ModifyNetworkRequest(); // \Upcloud\ApiClient\Model\ModifyNetworkRequest |

try {
    $result = $api_instance->modifyNetwork($uuid, $network);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->modifyNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **uuid**         | **string**                                                                | Network uuid  |
| **network** | [**\Upcloud\ApiClient\Model\ModifyNetworkRequest**](../Model/ModifyNetworkRequest.md) |             |  |

### Return type

[**\Upcloud\ApiClient\Model\NetworkResponse**](../Model/NetworkResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **deleteNetwork**

> deleteNetwork($uuid)

Delete Network

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$uuid = "uuid_example"; // string | Network uuid

try {
    $api_instance->deleteNetwork($uuid);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->deleteNetwork: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name         | Type       | Description | Notes |
| ------------ | ---------- | ----------- | ----- |
| **uuid**     | **string** | Network uuid   |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **getListServerNetworks**

> \Upcloud\ApiClient\Model\ServerNetworksListResponse getListServerNetworks()

List all networks the specific cloud server is connected to


### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$server_id = "server_id_example"; // string | Server id

try {
    $result = $api_instance->getListServerNetworks($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->getListServerNetworks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name   | Type       | Description | Notes |
| ------ | ---------- | ----------- | ----- |
| **server_id** | **string** | Server uuid |

### Return type

[**\Upcloud\ApiClient\Model\ServerNetworksListResponse**](../Model/ServerNetworksListResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **createNetworkInterface**

> \Upcloud\ApiClient\Model\NetworkInterfaceResponse createNetworkInterface($server_id, $network)

Create a new network interface

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$network = new \Upcloud\ApiClient\Model\CreateNetworkInterfaceRequest(); // \Upcloud\ApiClient\Model\CreateNetworkInterfaceRequest |
$server_id = "server_id_example"; // string | Server id
try {
    $result = $api_instance->createNetworkInterface($server_id, $network);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->createNetworkInterface: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **server_id** | **string** | Server uuid |
| **network** | [**\Upcloud\ApiClient\Model\CreateNetworkInterfaceRequest**](../Model/CreateNetworkInterfaceRequest.md) |             |  |

### Return type
 
[**\Upcloud\ApiClient\Model\NetworkInterfaceResponse**](../Model/NetworkInterfaceResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **modifyNetworkInterface**

> \Upcloud\ApiClient\Model\NetworkInterfaceResponse modifyNetworkInterface($server_id, $index, $network)

Modify network interface

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$server_id = "server_id_example"; // string | Server id
$index  = "index_example"; // integer | Index of the interface to modify
$network = new \Upcloud\ApiClient\Model\ModifyNetworkInterfaceRequest(); // \Upcloud\ApiClient\Model\ModifyNetworkInterfaceRequest |

try {
    $result = $api_instance->modifyNetworkInterface($server_id, $index, $network);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->modifyNetworkInterface: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **server_id** | **string** | Server uuid |
| **index** | **integer** | Index of the interface to modify |
| **network** | [**\Upcloud\ApiClient\Model\ModifyNetworkInterfaceRequest**](../Model/ModifyNetworkInterfaceRequest.md) |             |  |

### Return type

[**\Upcloud\ApiClient\Model\NetworkInterfaceResponse**](../Model/NetworkInterfaceResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **deleteNetworkInterface**

> deleteNetworkInterface($server_id, $index)

Delete Network Interface

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$server_id = "server_id_example"; // string | Server id
$index  = "index_example"; // integer | Index of the interface to delete

try {
    $api_instance->deleteNetworkInterface($server_id, $index);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->deleteNetworkInterface: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name         | Type       | Description | Notes |
| ------------ | ---------- | ----------- | ----- |
| **server_id** | **string** | Server uuid |
| **index** | **integer** | Index of the interface to delete |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **getListRouters**

> \Upcloud\ApiClient\Model\RoutersListResponse getListRouters()

List of all available routers

Returns a list of all available routers associated with the current account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();

try {
    $result = $api_instance->getListRouters();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->getListRouters: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\RoutersListResponse**](../Model/RoutersListResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **getRouterDetails**

> \Upcloud\ApiClient\Model\RouterResponse getRouterDetails($uuid)

Get router details

Returns detailed information about a specific router.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$uuid = "uuid_example"; // string | Router uuid

try {
    $result = $api_instance->getRouterDetails($uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->getRouterDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name   | Type       | Description | Notes |
| ------ | ---------- | ----------- | ----- |
| **uuid** | **string** | Router uuid |

### Return type

[**\Upcloud\ApiClient\Model\RouterResponse**](../Model/RouterResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **createRouter**

> \Upcloud\ApiClient\Model\RouterResponse createRouter($router)

Creates a new router. 

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$router = new \Upcloud\ApiClient\Model\RouterRequest(); // \Upcloud\ApiClient\Model\RouterRequest |

try {
    $result = $api_instance->createRouter($router);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->createRouter: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **router** | [**\Upcloud\ApiClient\Model\RouterRequest**](../Model/RouterRequest.md) |             |  |

### Return type
 
[**\Upcloud\ApiClient\Model\RouterResponse**](../Model/RouterResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **modifyRouter**

> \Upcloud\ApiClient\Model\RouterResponse modifyRouter($uuid, $router)

Modify an existing router.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$uuid = "router_id_example"; // string | Router uuid
$router = new \Upcloud\ApiClient\Model\RouterRequest(); // \Upcloud\ApiClient\Model\RouterRequest |

try {
    $result = $api_instance->modifyRouter($uuid, $router);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->modifyRouter: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **uuid** | **string** | Router uuid |
| **router** | [**\Upcloud\ApiClient\Model\RouterRequest**](../Model/RouterRequest.md) |             |  |

### Return type

[**\Upcloud\ApiClient\Model\RouterResponse**](../Model/RouterResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **deleteRouter**

> deleteRouter($uuid)

Delete an existing router.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\NetworkApi();
$uuid = "router_id_example"; // string | Router uuid

try {
    $api_instance->deleteRouter($uuid);
} catch (Exception $e) {
    echo 'Exception when calling NetworkApi->deleteRouter: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name         | Type       | Description | Notes |
| ------------ | ---------- | ----------- | ----- |
| **uuid** | **string** | Router uuid |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

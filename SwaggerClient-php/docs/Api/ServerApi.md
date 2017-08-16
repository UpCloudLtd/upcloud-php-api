# Swagger\Client\ServerApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createServer**](ServerApi.md#createServer) | **POST** /server | Create server
[**deleteServer**](ServerApi.md#deleteServer) | **DELETE** /server/{serverId} | Delete server
[**listServers**](ServerApi.md#listServers) | **GET** /server | List of servers
[**serverDetails**](ServerApi.md#serverDetails) | **GET** /server/{serverId} | Server details
[**updateServer**](ServerApi.md#updateServer) | **PUT** /server/{serverId} | Modify server


# **createServer**
> \Swagger\Client\Model\ServerListResponse createServer($server)

Create server

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server = new \Swagger\Client\Model\Server(); // \Swagger\Client\Model\Server | 

try {
    $result = $api_instance->createServer($server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->createServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server** | [**\Swagger\Client\Model\Server**](../Model/Server.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteServer**
> deleteServer($server_id)

Delete server

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to delete

try {
    $api_instance->deleteServer($server_id);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->deleteServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to delete |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listServers**
> \Swagger\Client\Model\InlineResponse200 listServers()

List of servers

List servers

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());

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

[**\Swagger\Client\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverDetails**
> \Swagger\Client\Model\ServerListResponse serverDetails($server_id)

Server details

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
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

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to return |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateServer**
> \Swagger\Client\Model\ServerListResponse updateServer($server_id, $server)

Modify server

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to modify
$server = new \Swagger\Client\Model\Server(); // \Swagger\Client\Model\Server | 

try {
    $result = $api_instance->updateServer($server_id, $server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->updateServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to modify |
 **server** | [**\Swagger\Client\Model\Server**](../Model/Server.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


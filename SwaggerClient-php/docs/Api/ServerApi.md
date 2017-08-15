# Swagger\Client\ServerApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**serverGet**](ServerApi.md#serverGet) | **GET** /server | List of servers
[**serverPost**](ServerApi.md#serverPost) | **POST** /server | Create server
[**serverServerIdDelete**](ServerApi.md#serverServerIdDelete) | **DELETE** /server/{serverId} | Delete server
[**serverServerIdGet**](ServerApi.md#serverServerIdGet) | **GET** /server/{serverId} | Server details
[**serverServerIdPut**](ServerApi.md#serverServerIdPut) | **PUT** /server/{serverId} | Modify server


# **serverGet**
> \Swagger\Client\Model\InlineResponse200 serverGet()

List of servers

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->serverGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverGet: ', $e->getMessage(), PHP_EOL;
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

# **serverPost**
> \Swagger\Client\Model\InlineResponse2001 serverPost($server)

Create server

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server = new \Swagger\Client\Model\Server(); // \Swagger\Client\Model\Server | 

try {
    $result = $api_instance->serverPost($server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server** | [**\Swagger\Client\Model\Server**](../Model/Server.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdDelete**
> serverServerIdDelete($server_id)

Delete server

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to delete

try {
    $api_instance->serverServerIdDelete($server_id);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdDelete: ', $e->getMessage(), PHP_EOL;
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

# **serverServerIdGet**
> \Swagger\Client\Model\InlineResponse2001 serverServerIdGet($server_id)

Server details

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to return

try {
    $result = $api_instance->serverServerIdGet($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to return |

### Return type

[**\Swagger\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdPut**
> \Swagger\Client\Model\InlineResponse2001 serverServerIdPut($server_id, $server)

Modify server

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to modify
$server = new \Swagger\Client\Model\Server(); // \Swagger\Client\Model\Server | 

try {
    $result = $api_instance->serverServerIdPut($server_id, $server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to modify |
 **server** | [**\Swagger\Client\Model\Server**](../Model/Server.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


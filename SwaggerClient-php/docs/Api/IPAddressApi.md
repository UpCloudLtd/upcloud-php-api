# Swagger\Client\IPAddressApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**ipAddressGet**](IPAddressApi.md#ipAddressGet) | **GET** /ip_address | List IP addresses
[**ipAddressIpDelete**](IPAddressApi.md#ipAddressIpDelete) | **DELETE** /ip_address/{ip} | Release IP address
[**ipAddressIpGet**](IPAddressApi.md#ipAddressIpGet) | **GET** /ip_address/{ip} | Get IP address details
[**ipAddressIpPut**](IPAddressApi.md#ipAddressIpPut) | **PUT** /ip_address/{ip} | Modify IP address
[**ipAddressPost**](IPAddressApi.md#ipAddressPost) | **POST** /ip_address | Assign IP address


# **ipAddressGet**
> \Swagger\Client\Model\InlineResponse2006 ipAddressGet()

List IP addresses

Returns a list of all IP addresses assigned to servers on the current user account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\IPAddressApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->ipAddressGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->ipAddressGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\InlineResponse2006**](../Model/InlineResponse2006.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ipAddressIpDelete**
> ipAddressIpDelete($ip)

Release IP address

Removes an IP address from a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\IPAddressApi(new \Http\Adapter\Guzzle6\Client());
$ip = "ip_example"; // string | Ip address

try {
    $api_instance->ipAddressIpDelete($ip);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->ipAddressIpDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ip** | **string**| Ip address |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ipAddressIpGet**
> \Swagger\Client\Model\InlineResponse2011 ipAddressIpGet($ip)

Get IP address details

Returns detailed information about a specific IP address.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\IPAddressApi(new \Http\Adapter\Guzzle6\Client());
$ip = "ip_example"; // string | Ip address

try {
    $result = $api_instance->ipAddressIpGet($ip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->ipAddressIpGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ip** | **string**| Ip address |

### Return type

[**\Swagger\Client\Model\InlineResponse2011**](../Model/InlineResponse2011.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ipAddressIpPut**
> \Swagger\Client\Model\InlineResponse2011 ipAddressIpPut($ip, $ip_address)

Modify IP address

Modifies the reverse DNS PTR record corresponding to an IP address. The PTR record can only be set to public IP address.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\IPAddressApi(new \Http\Adapter\Guzzle6\Client());
$ip = "ip_example"; // string | Ip address
$ip_address = new \Swagger\Client\Model\IpAddress1(); // \Swagger\Client\Model\IpAddress1 | 

try {
    $result = $api_instance->ipAddressIpPut($ip, $ip_address);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->ipAddressIpPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ip** | **string**| Ip address |
 **ip_address** | [**\Swagger\Client\Model\IpAddress1**](../Model/IpAddress1.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse2011**](../Model/InlineResponse2011.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ipAddressPost**
> \Swagger\Client\Model\InlineResponse2011 ipAddressPost($ip_address)

Assign IP address

Assigns a new IP address to a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\IPAddressApi(new \Http\Adapter\Guzzle6\Client());
$ip_address = new \Swagger\Client\Model\IpAddress(); // \Swagger\Client\Model\IpAddress | 

try {
    $result = $api_instance->ipAddressPost($ip_address);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->ipAddressPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ip_address** | [**\Swagger\Client\Model\IpAddress**](../Model/IpAddress.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse2011**](../Model/InlineResponse2011.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


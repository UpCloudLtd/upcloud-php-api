# Upcloud\ApiClient\IPAddressApi

All URIs are relative to _https://api.upcloud.com/1.3_

| Method                                       | HTTP request                | Description            |
| -------------------------------------------- | --------------------------- | ---------------------- |
| [**addIp**](IPAddressApi.md#addIp)           | **POST** /ip_address        | Assign IP address      |
| [**deleteIp**](IPAddressApi.md#deleteIp)     | **DELETE** /ip_address/{ip} | Release IP address     |
| [**getDetails**](IPAddressApi.md#getDetails) | **GET** /ip_address/{ip}    | Get IP address details |
| [**listIps**](IPAddressApi.md#listIps)       | **GET** /ip_address         | List IP addresses      |
| [**modifyIp**](IPAddressApi.md#modifyIp)     | **PUT** /ip_address/{ip}    | Modify IP address      |

# **addIp**

> \Upcloud\ApiClient\Model\AssignIpResponse addIp($ip_address)

Assign IP address

Assigns a new IP address to a server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\IPAddressApi();
$ip_address = new \Upcloud\ApiClient\Model\AddIpRequest(); // \Upcloud\ApiClient\Model\AddIpRequest |

try {
    $result = $api_instance->addIp($ip_address);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->addIp: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                  | Description | Notes      |
| -------------- | --------------------------------------------------------------------- | ----------- | ---------- |
| **ip_address** | [**\Upcloud\ApiClient\Model\AddIpRequest**](../Model/AddIpRequest.md) |             | [optional] |

### Return type

[**\Upcloud\ApiClient\Model\AssignIpResponse**](../Model/AssignIpResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **deleteIp**

> deleteIp($ip)

Release IP address

Removes an IP address from a server.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\IPAddressApi();
$ip = "ip_example"; // string | Ip address

try {
    $api_instance->deleteIp($ip);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->deleteIp: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name   | Type       | Description | Notes |
| ------ | ---------- | ----------- | ----- |
| **ip** | **string** | Ip address  |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **getDetails**

> \Upcloud\ApiClient\Model\AssignIpResponse getDetails($ip)

Get IP address details

Returns detailed information about a specific IP address.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\IPAddressApi();
$ip = "ip_example"; // string | Ip address

try {
    $result = $api_instance->getDetails($ip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->getDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name   | Type       | Description | Notes |
| ------ | ---------- | ----------- | ----- |
| **ip** | **string** | Ip address  |

### Return type

[**\Upcloud\ApiClient\Model\AssignIpResponse**](../Model/AssignIpResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **listIps**

> \Upcloud\ApiClient\Model\IpAddressListResponse listIps()

List IP addresses

Returns a list of all IP addresses assigned to servers on the current user account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\IPAddressApi();

try {
    $result = $api_instance->listIps();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->listIps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\IpAddressListResponse**](../Model/IpAddressListResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **modifyIp**

> \Upcloud\ApiClient\Model\AssignIpResponse modifyIp($ip, $ip_address)

Modify IP address

Modifies the reverse DNS PTR record corresponding to an IP address. The PTR record can only be set to public IP address.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\IPAddressApi();
$ip = "ip_example"; // string | Ip address
$ip_address = new \Upcloud\ApiClient\Model\ModifyIpRequest(); // \Upcloud\ApiClient\Model\ModifyIpRequest |

try {
    $result = $api_instance->modifyIp($ip, $ip_address);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->modifyIp: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **ip**         | **string**                                                                  | Ip address  |
| **ip_address** | [**\Upcloud\ApiClient\Model\ModifyIpRequest**](../Model/ModifyIpRequest.md) |             | [optional] |

### Return type

[**\Upcloud\ApiClient\Model\AssignIpResponse**](../Model/AssignIpResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

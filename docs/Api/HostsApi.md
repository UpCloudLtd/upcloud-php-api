# Upcloud\ApiClient\HostsApi

All URIs are relative to _https://api.upcloud.com/1.3_

| Method                                       | HTTP request                | Description            |
| -------------------------------------------- | --------------------------- | ---------------------- |
| [**getListHosts**](HostsApi.md#getlisthosts) | **GET** /host    | List of available hosts |
| [**getHostDetails**](HostsApi.md#gethostdetails) | **GET** /host/{id} | Get detailed information about a specific host |
| [**modifyHost**](HostsApi.md#modifyhost)     | **PATCH** /host/{id} | Modify specific host |

# **getListHosts**

> \Upcloud\ApiClient\Model\HostListResponse getListHosts()

List of available hosts

Returns a list of available hosts, along with basic statistics of them when available.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\HostsApi();

try {
    $result = $api_instance->getListHosts();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HostsApi->getListHosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\HostListResponse**](../Model/HostListResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **getHostDetails**

> \Upcloud\ApiClient\Model\HostResponse getHostDetails($id)

Get Host details

Returns detailed information about a specific host.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\HostsApi();
$id = "id_example"; // string | Host id

try {
    $result = $api_instance->getHostDetails($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HostsApi->getHostDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name   | Type       | Description | Notes |
| ------ | ---------- | ----------- | ----- |
| **id** | **string** | Host Id |

### Return type

[**\Upcloud\ApiClient\Model\HostResponse**](../Model/HostResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **modifyHost**

> \Upcloud\ApiClient\Model\HostResponse modifyHost($id, $host)

Modify host

Modifies description of a specific host.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\HostsApi();
$id = "id_example"; // string | Host Id
$host = new \Upcloud\ApiClient\Model\ModifyHostRequest(); // \Upcloud\ApiClient\Model\ModifyHostRequest |

try {
    $result = $api_instance->modifyHost($id, $host);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HostsApi->modifyHost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **id**         | **string**                                                                  | Host Id  |
| **host** | [**\Upcloud\ApiClient\Model\ModifyHostRequest**](../Model/ModifyHostRequest.md) |             |  |

### Return type

[**\Upcloud\ApiClient\Model\HostResponse**](../Model/HostResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

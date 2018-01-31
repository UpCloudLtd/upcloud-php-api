# Upcloud\ApiClient\ZoneApi

All URIs are relative to _https://api.upcloud.com/1.2_

| Method                                | HTTP request  | Description          |
| ------------------------------------- | ------------- | -------------------- |
| [**listZones**](ZoneApi.md#listZones) | **GET** /zone | List available zones |

# **listZones**

> \Upcloud\ApiClient\Model\ZoneListResponse listZones()

List available zones

Returns a list of available zones.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\ZoneApi();

try {
    $result = $api_instance->listZones();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ZoneApi->listZones: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\ZoneListResponse**](../Model/ZoneListResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

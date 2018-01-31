# Upcloud\ApiClient\TimezoneApi

All URIs are relative to _https://api.upcloud.com/1.2_

| Method                                            | HTTP request      | Description    |
| ------------------------------------------------- | ----------------- | -------------- |
| [**listTimezones**](TimezoneApi.md#listTimezones) | **GET** /timezone | List timezones |

# **listTimezones**

> \Upcloud\ApiClient\Model\TimezoneListResponse listTimezones()

List timezones

Returns a list of available timezones. Timezones are used to set the hardware clock for servers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\TimezoneApi();

try {
    $result = $api_instance->listTimezones();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimezoneApi->listTimezones: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\TimezoneListResponse**](../Model/TimezoneListResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

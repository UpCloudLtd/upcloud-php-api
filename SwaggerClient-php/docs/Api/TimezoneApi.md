# Swagger\Client\TimezoneApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listTimezones**](TimezoneApi.md#listTimezones) | **GET** /timezone | List timezones


# **listTimezones**
> \Swagger\Client\Model\TimezoneListResponse listTimezones()

List timezones

Returns a list of available timezones. Timezones are used to set the hardware clock for servers.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\TimezoneApi(new \Http\Adapter\Guzzle6\Client());

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

[**\Swagger\Client\Model\TimezoneListResponse**](../Model/TimezoneListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


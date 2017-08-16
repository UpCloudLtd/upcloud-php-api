# Swagger\Client\StorageApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listStorages**](StorageApi.md#listStorages) | **GET** /storage | List of storages


# **listStorages**
> \Swagger\Client\Model\SuccessStoragesResponse listStorages()

List of storages

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->listStorages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->listStorages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\SuccessStoragesResponse**](../Model/SuccessStoragesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


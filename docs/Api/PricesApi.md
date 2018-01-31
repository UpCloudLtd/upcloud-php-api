# Upcloud\ApiClient\PricesApi

All URIs are relative to _https://api.upcloud.com/1.2_

| Method                                    | HTTP request   | Description |
| ----------------------------------------- | -------------- | ----------- |
| [**listPrices**](PricesApi.md#listPrices) | **GET** /price | List prices |

# **listPrices**

> \Upcloud\ApiClient\Model\PriceListResponse listPrices()

List prices

Returns a list resource prices.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\PricesApi();

try {
    $result = $api_instance->listPrices();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PricesApi->listPrices: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\PriceListResponse**](../Model/PriceListResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

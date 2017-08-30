# Swagger\Client\PricesApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**priceGet**](PricesApi.md#priceGet) | **GET** /price | List prices


# **priceGet**
> \Swagger\Client\Model\InlineResponse200 priceGet()

List prices

Returns a list resource prices.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\PricesApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->priceGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PricesApi->priceGet: ', $e->getMessage(), PHP_EOL;
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
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


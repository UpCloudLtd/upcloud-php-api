# Swagger\Client\PlanApi

All URIs are relative to *http://api.upcloud.com/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listPlans**](PlanApi.md#listPlans) | **GET** /plan | List available plans


# **listPlans**
> \Swagger\Client\Model\AvailablePlanListResponse listPlans()

List available plans

Returns a list of available plans.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\PlanApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->listPlans();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlanApi->listPlans: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\AvailablePlanListResponse**](../Model/AvailablePlanListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


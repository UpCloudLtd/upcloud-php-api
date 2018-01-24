# Upcloud\ApiClient\PlanApi

All URIs are relative to *https://api.upcloud.com/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listPlans**](PlanApi.md#listPlans) | **GET** /plan | List available plans


# **listPlans**
> \Upcloud\ApiClient\Model\AvailablePlanListResponse listPlans()

List available plans

Returns a list of available plans.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\PlanApi(new GuzzleHttp\Client());

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

[**\Upcloud\ApiClient\Model\AvailablePlanListResponse**](../Model/AvailablePlanListResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


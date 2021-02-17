# Upcloud\ApiClient\ObjectStorageApi

All URIs are relative to _https://api.upcloud.com/1.3_

| Method                                       | HTTP request                | Description            |
| -------------------------------------------- | --------------------------- | ---------------------- |
| [**getListObjectStorage**](ObjectStorageApi.md#getlistobjectstorage) | **GET** /object-storage    | List all Object Storage  |
| [**getObjectStorageDetails**](ObjectStorageApi.md#getobjectstoragedetails) | **GET** /object-storage/{uuid} | Get Object Storage details |
| [**createObjectStorage**](ObjectStorageApi.md#createobjectstorage)     | **POST** /object-storage | Create a new  Object Storage |
| [**modifyObjectStorage**](ObjectStorageApi.md#modifyobjectstorage)     | **PATCH** /object-storage/{id} | Modify Object Storage |
| [**deleteObjectStorage**](ObjectStorageApi.md#deleteobjectstorage)     | **DELETE** /object-storage/{id} | Release Object Storage |

# **getListObjectStorage**

> \Upcloud\ApiClient\Model\ObjectStorageListResponse getListObjectStorage()

List Object Storage


### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ObjectStorageApi();

try {
    $result = $api_instance->getListObjectStorage();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStorageApi->getListObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\Upcloud\ApiClient\Model\ObjectStorageListResponse**](../Model/ObjectStorageListResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **getObjectStorageDetails**

> \Upcloud\ApiClient\Model\ObjectStorageResponse getObjectStorageDetails($uuid)

Get Object Storage details

Returns detailed information about a specific object storage.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ObjectStorageApi();
$uuid = "uuid_example"; // string | ObjectStorage uuid

try {
    $result = $api_instance->getObjectStorageDetails($uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStorageApi->getObjectStorageDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name   | Type       | Description | Notes |
| ------ | ---------- | ----------- | ----- |
| **uuid** | **string** | ObjectStorage uuid |

### Return type

[**\Upcloud\ApiClient\Model\ObjectStorageResponse**](../Model/ObjectStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **createObjectStorage**

> \Upcloud\ApiClient\Model\ObjectStorageResponse createObjectStorage($storage)

Create a new Object Storage

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ObjectStorageApi();
$storage = new \Upcloud\ApiClient\Model\CreateObjectStorageRequest(); // \Upcloud\ApiClient\Model\CreateObjectStorageRequest |

try {
    $result = $api_instance->createObjectStorage($storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStorageApi->createObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **storage** | [**\Upcloud\ApiClient\Model\CreateObjectStorageRequest**](../Model/CreateObjectStorageRequest.md) |             |  |

### Return type

[**\Upcloud\ApiClient\Model\ObjectStorageResponse**](../Model/ObjectStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **modifyObjectStorage**

> \Upcloud\ApiClient\Model\ObjectStorageResponse modifyObjectStorage($uuid, $storage)

Modify Object Storage

Modifies description of a specific Object Storage.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ObjectStorageApi();
$uuid = "uuid_example"; // string | ObjectStorage uuid
$storage = new \Upcloud\ApiClient\Model\ModifyObjectStorageRequest(); // \Upcloud\ApiClient\Model\ModifyObjectStorageRequest |

try {
    $result = $api_instance->modifyObjectStorage($uuid, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStorageApi->modifyObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name           | Type                                                                        | Description | Notes      |
| -------------- | --------------------------------------------------------------------------- | ----------- | ---------- |
| **uuid**         | **string**                                                                | ObjectStorage uuid  |
| **storage** | [**\Upcloud\ApiClient\Model\ModifyObjectStorageRequest**](../Model/ModifyObjectStorageRequest.md) |             |  |

### Return type

[**\Upcloud\ApiClient\Model\ObjectStorageResponse**](../Model/ObjectStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseauth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

# **deleteObjectStorage**

> deleteObjectStorage($uuid)

Delete Object Storage

Note that deleting the storage will permanently delete any data on the device and which cannot be reverted.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Upcloud\ObjectStorageApi();
$uuid = "uuid_example"; // string | ObjectStorage uuid

try {
    $api_instance->deleteObjectStorage($uuid);
} catch (Exception $e) {
    echo 'Exception when calling ObjectStorageApi->deleteObjectStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name         | Type       | Description | Notes |
| ------------ | ---------- | ----------- | ----- |
| **uuid**     | **string** | ObjectStorage uuid   |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

* **Content-Type**: application/json
* **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation) [[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to README]](../../README.md)

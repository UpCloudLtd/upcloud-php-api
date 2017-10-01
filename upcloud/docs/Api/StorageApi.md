# Upcloud\ApiClient\StorageApi

All URIs are relative to *https://api.upcloud.com/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**attachStorage**](StorageApi.md#attachStorage) | **POST** /server/{serverId}/storage/attach | Attach storage
[**backupStorage**](StorageApi.md#backupStorage) | **POST** /storage/{storageId}/backup | Create backup
[**cancelOperation**](StorageApi.md#cancelOperation) | **POST** /storage/{storageId}/cancel | Cancel storage operation
[**cloneStorage**](StorageApi.md#cloneStorage) | **POST** /storage/{storageId}/clone | Clone storage
[**createStorage**](StorageApi.md#createStorage) | **POST** /storage | Create storage
[**deleteStorage**](StorageApi.md#deleteStorage) | **DELETE** /storage/{storageId} | Delete storage
[**detachStorage**](StorageApi.md#detachStorage) | **POST** /server/{serverId}/storage/detach | Detach storage
[**ejectCdrom**](StorageApi.md#ejectCdrom) | **POST** /server/{serverId}/cdrom/eject | Eject CD-ROM
[**favoriteStorage**](StorageApi.md#favoriteStorage) | **POST** /storage/{storageId}/favorite | Add storage to favorites
[**getStorageDetails**](StorageApi.md#getStorageDetails) | **GET** /storage/{storageId} | Get storage details
[**listStorageTypes**](StorageApi.md#listStorageTypes) | **GET** /storage/{type}/ | List of storages by type
[**listStorages**](StorageApi.md#listStorages) | **GET** /storage | List of storages
[**loadCdrom**](StorageApi.md#loadCdrom) | **POST** /server/{serverId}/storage/cdrom/load | Load CD-ROM
[**modifyStorage**](StorageApi.md#modifyStorage) | **PUT** /storage/{storageId} | Modify storage
[**restoreStorage**](StorageApi.md#restoreStorage) | **POST** /storage/{storageId}/restore | Restore backup
[**templatizeStorage**](StorageApi.md#templatizeStorage) | **POST** /storage/{storageId}/templatize | Templatize storage
[**unfavoriteStorage**](StorageApi.md#unfavoriteStorage) | **DELETE** /storage/{storageId}/favorite | Remove storage from favorites


# **attachStorage**
> \Upcloud\ApiClient\Model\CreateServerResponse attachStorage($server_id, $storage_device)

Attach storage

Attaches a storage as a device to a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Upcloud\ApiClient\Model\AttachStorageDeviceRequest(); // \Upcloud\ApiClient\Model\AttachStorageDeviceRequest | 

try {
    $result = $api_instance->attachStorage($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->attachStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **storage_device** | [**\Upcloud\ApiClient\Model\AttachStorageDeviceRequest**](../Model/AttachStorageDeviceRequest.md)|  |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **backupStorage**
> \Upcloud\ApiClient\Model\CreateStorageResponse backupStorage($storage_id, $storage)

Create backup

Creates a point-in-time backup of a storage resource. For automatic, scheduled backups, see  `backup_rule` in Create storage or Modify storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id
$storage = new \Upcloud\ApiClient\Model\CreateBackupStorageRequest(); // \Upcloud\ApiClient\Model\CreateBackupStorageRequest | 

try {
    $result = $api_instance->backupStorage($storage_id, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->backupStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |
 **storage** | [**\Upcloud\ApiClient\Model\CreateBackupStorageRequest**](../Model/CreateBackupStorageRequest.md)|  | [optional]

### Return type

[**\Upcloud\ApiClient\Model\CreateStorageResponse**](../Model/CreateStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **cancelOperation**
> cancelOperation($storage_id)

Cancel storage operation

Cancels a running cloning operation and deletes the incomplete copy.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Strage id

try {
    $api_instance->cancelOperation($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->cancelOperation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Strage id |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **cloneStorage**
> \Upcloud\ApiClient\Model\CreateStorageResponse cloneStorage($storage_id, $storage)

Clone storage

Creates an exact copy of an existing storage resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id
$storage = new \Upcloud\ApiClient\Model\CloneStorageRequest(); // \Upcloud\ApiClient\Model\CloneStorageRequest | 

try {
    $result = $api_instance->cloneStorage($storage_id, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->cloneStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |
 **storage** | [**\Upcloud\ApiClient\Model\CloneStorageRequest**](../Model/CloneStorageRequest.md)|  | [optional]

### Return type

[**\Upcloud\ApiClient\Model\CreateStorageResponse**](../Model/CreateStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createStorage**
> \Upcloud\ApiClient\Model\CreateStorageResponse createStorage($storage)

Create storage

Creates a new storage resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage = new \Upcloud\ApiClient\Model\CreateStorageRequest(); // \Upcloud\ApiClient\Model\CreateStorageRequest | 

try {
    $result = $api_instance->createStorage($storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->createStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage** | [**\Upcloud\ApiClient\Model\CreateStorageRequest**](../Model/CreateStorageRequest.md)|  |

### Return type

[**\Upcloud\ApiClient\Model\CreateStorageResponse**](../Model/CreateStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteStorage**
> deleteStorage($storage_id)

Delete storage

Deleted an existing storage resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | 

try {
    $api_instance->deleteStorage($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->deleteStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**|  |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **detachStorage**
> \Upcloud\ApiClient\Model\CreateServerResponse detachStorage($server_id, $storage_device)

Detach storage

Detaches a storage resource from a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Upcloud\ApiClient\Model\StorageDeviceDetachRequest(); // \Upcloud\ApiClient\Model\StorageDeviceDetachRequest | 

try {
    $result = $api_instance->detachStorage($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->detachStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **storage_device** | [**\Upcloud\ApiClient\Model\StorageDeviceDetachRequest**](../Model/StorageDeviceDetachRequest.md)|  |

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ejectCdrom**
> ejectCdrom($server_id)

Eject CD-ROM

Ejects the storage from the CD-ROM device of a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id

try {
    $api_instance->ejectCdrom($server_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->ejectCdrom: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **favoriteStorage**
> favoriteStorage($storage_id)

Add storage to favorites

Adds a storage to the list of favorite storages. To list favorite storages, see List storages. This operations succeeds even if the storage is already on the list of favorites.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id

try {
    $api_instance->favoriteStorage($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->favoriteStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getStorageDetails**
> \Upcloud\ApiClient\Model\CreateStorageResponse getStorageDetails($storage_id)

Get storage details

Returns detailed information about a specific storage resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | 

try {
    $result = $api_instance->getStorageDetails($storage_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->getStorageDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**|  |

### Return type

[**\Upcloud\ApiClient\Model\CreateStorageResponse**](../Model/CreateStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listStorageTypes**
> \Upcloud\ApiClient\Model\SuccessStoragesResponse listStorageTypes($type)

List of storages by type

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$type = "type_example"; // string | Storage's access type (`public` or `private`) or storage type (`normal`, `backup`, `cdrom` or `template`) or `favorite` status

try {
    $result = $api_instance->listStorageTypes($type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->listStorageTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | **string**| Storage&#39;s access type (&#x60;public&#x60; or &#x60;private&#x60;) or storage type (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;) or &#x60;favorite&#x60; status |

### Return type

[**\Upcloud\ApiClient\Model\SuccessStoragesResponse**](../Model/SuccessStoragesResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listStorages**
> \Upcloud\ApiClient\Model\SuccessStoragesResponse listStorages()

List of storages

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());

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

[**\Upcloud\ApiClient\Model\SuccessStoragesResponse**](../Model/SuccessStoragesResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **loadCdrom**
> \Upcloud\ApiClient\Model\CreateServerResponse loadCdrom($server_id, $storage_device)

Load CD-ROM

Loads a storage as a CD-ROM in the CD-ROM device of a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Upcloud\ApiClient\Model\StorageDeviceLoadRequest(); // \Upcloud\ApiClient\Model\StorageDeviceLoadRequest | 

try {
    $result = $api_instance->loadCdrom($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->loadCdrom: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **storage_device** | [**\Upcloud\ApiClient\Model\StorageDeviceLoadRequest**](../Model/StorageDeviceLoadRequest.md)|  | [optional]

### Return type

[**\Upcloud\ApiClient\Model\CreateServerResponse**](../Model/CreateServerResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **modifyStorage**
> \Upcloud\ApiClient\Model\CreateStorageResponse modifyStorage($storage_id, $storage)

Modify storage

Modifies an existing storage resource. This operation is used to rename or resize the storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | 
$storage = new \Upcloud\ApiClient\Model\ModifyStorageRequest(); // \Upcloud\ApiClient\Model\ModifyStorageRequest | 

try {
    $result = $api_instance->modifyStorage($storage_id, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->modifyStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**|  |
 **storage** | [**\Upcloud\ApiClient\Model\ModifyStorageRequest**](../Model/ModifyStorageRequest.md)|  |

### Return type

[**\Upcloud\ApiClient\Model\CreateStorageResponse**](../Model/CreateStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **restoreStorage**
> restoreStorage($storage_id)

Restore backup

Restores the origin storage with data from the specified backup storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id

try {
    $api_instance->restoreStorage($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->restoreStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **templatizeStorage**
> \Upcloud\ApiClient\Model\CreateStorageResponse templatizeStorage($storage_id, $storage)

Templatize storage

Creates an exact copy of an existing storage resource which can be used as a template for creating new servers.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id
$storage = new \Upcloud\ApiClient\Model\TemplitizeStorageRequest(); // \Upcloud\ApiClient\Model\TemplitizeStorageRequest | 

try {
    $result = $api_instance->templatizeStorage($storage_id, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->templatizeStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |
 **storage** | [**\Upcloud\ApiClient\Model\TemplitizeStorageRequest**](../Model/TemplitizeStorageRequest.md)|  | [optional]

### Return type

[**\Upcloud\ApiClient\Model\CreateStorageResponse**](../Model/CreateStorageResponse.md)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unfavoriteStorage**
> unfavoriteStorage($storage_id)

Remove storage from favorites

Delete a storage from the list of favorite storages. To list favorite storages, see List storages. This operations succeeds even if the storage is already on the list of favorites.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: baseAuth
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setUsername('YOUR_USERNAME');
Upcloud\ApiClient\Configuration::getDefaultConfiguration()->setPassword('YOUR_PASSWORD');

$api_instance = new Upcloud\ApiClient\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id

try {
    $api_instance->unfavoriteStorage($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->unfavoriteStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |

### Return type

void (empty response body)

### Authorization

[baseAuth](../../README.md#baseAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


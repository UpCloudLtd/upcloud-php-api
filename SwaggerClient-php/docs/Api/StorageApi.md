# Swagger\Client\StorageApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**listStorages**](StorageApi.md#listStorages) | **GET** /storage | List of storages
[**listStorages_0**](StorageApi.md#listStorages_0) | **GET** /storage/{type} | List of storages by type
[**serverServerIdStorageAttachPost**](StorageApi.md#serverServerIdStorageAttachPost) | **POST** /server/{serverId}/storage/attach | Attach storage
[**serverServerIdStorageCdromEjectPost**](StorageApi.md#serverServerIdStorageCdromEjectPost) | **POST** /server/{serverId}/storage/cdrom/eject | Eject CD-ROM
[**serverServerIdStorageCdromLoadPost**](StorageApi.md#serverServerIdStorageCdromLoadPost) | **POST** /server/{serverId}/storage/cdrom/load | Load CD-ROM
[**serverServerIdStorageDetachPost**](StorageApi.md#serverServerIdStorageDetachPost) | **POST** /server/{serverId}/storage/detach | Detach storage
[**storagePost**](StorageApi.md#storagePost) | **POST** /storage | Create storage
[**storageStorageIdBackupPost**](StorageApi.md#storageStorageIdBackupPost) | **POST** /storage/{storageId}/backup | Create backup
[**storageStorageIdCancelPost**](StorageApi.md#storageStorageIdCancelPost) | **POST** /storage/{storageId}/cancel | Cancel storage operation
[**storageStorageIdClonePost**](StorageApi.md#storageStorageIdClonePost) | **POST** /storage/{storageId}/clone | Clone storage
[**storageStorageIdDelete**](StorageApi.md#storageStorageIdDelete) | **DELETE** /storage/{storageId} | Delete storage
[**storageStorageIdFavoriteDelete**](StorageApi.md#storageStorageIdFavoriteDelete) | **DELETE** /storage/{storageId}/favorite | Remove storage from favorites
[**storageStorageIdFavoritePost**](StorageApi.md#storageStorageIdFavoritePost) | **POST** /storage/{storageId}/favorite | Add storage to favorites
[**storageStorageIdGet**](StorageApi.md#storageStorageIdGet) | **GET** /storage/{storageId} | Get storage details
[**storageStorageIdPut**](StorageApi.md#storageStorageIdPut) | **PUT** /storage/{storageId} | Modify storage
[**storageStorageIdRestorePost**](StorageApi.md#storageStorageIdRestorePost) | **POST** /storage/{storageId}/restore | Restore backup
[**storageStorageIdTemplatizePost**](StorageApi.md#storageStorageIdTemplatizePost) | **POST** /storage/{storageId}/templatize | Templatize storage


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

# **listStorages_0**
> \Swagger\Client\Model\SuccessStoragesResponse listStorages_0($type)

List of storages by type

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$type = "type_example"; // string | Storage's access type (`public` or `private`) or storage type (`normal`, `backup`, `cdrom` or `template`) or `favorite` status

try {
    $result = $api_instance->listStorages_0($type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->listStorages_0: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | **string**| Storage&#39;s access type (&#x60;public&#x60; or &#x60;private&#x60;) or storage type (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;) or &#x60;favorite&#x60; status |

### Return type

[**\Swagger\Client\Model\SuccessStoragesResponse**](../Model/SuccessStoragesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdStorageAttachPost**
> \Swagger\Client\Model\ServerListResponse serverServerIdStorageAttachPost($server_id, $storage_device)

Attach storage

Attaches a storage as a device to a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Swagger\Client\Model\StorageDevice(); // \Swagger\Client\Model\StorageDevice | 

try {
    $result = $api_instance->serverServerIdStorageAttachPost($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->serverServerIdStorageAttachPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **storage_device** | [**\Swagger\Client\Model\StorageDevice**](../Model/StorageDevice.md)|  |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdStorageCdromEjectPost**
> \Swagger\Client\Model\ServerListResponse serverServerIdStorageCdromEjectPost($server_id)

Eject CD-ROM

Ejects the storage from the CD-ROM device of a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id

try {
    $result = $api_instance->serverServerIdStorageCdromEjectPost($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->serverServerIdStorageCdromEjectPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdStorageCdromLoadPost**
> \Swagger\Client\Model\ServerListResponse serverServerIdStorageCdromLoadPost($server_id, $storage_device)

Load CD-ROM

Loads a storage as a CD-ROM in the CD-ROM device of a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Swagger\Client\Model\StorageDevice1(); // \Swagger\Client\Model\StorageDevice1 | 

try {
    $result = $api_instance->serverServerIdStorageCdromLoadPost($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->serverServerIdStorageCdromLoadPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **storage_device** | [**\Swagger\Client\Model\StorageDevice1**](../Model/StorageDevice1.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdStorageDetachPost**
> \Swagger\Client\Model\ServerListResponse serverServerIdStorageDetachPost($server_id, $storage_device)

Detach storage

Detaches a storage resource from a server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Swagger\Client\Model\StorageDevice(); // \Swagger\Client\Model\StorageDevice | 

try {
    $result = $api_instance->serverServerIdStorageDetachPost($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->serverServerIdStorageDetachPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **storage_device** | [**\Swagger\Client\Model\StorageDevice**](../Model/StorageDevice.md)|  |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storagePost**
> \Swagger\Client\Model\InlineResponse201 storagePost($storage)

Create storage

Creates a new storage resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage = new \Swagger\Client\Model\Storage(); // \Swagger\Client\Model\Storage | 

try {
    $result = $api_instance->storagePost($storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storagePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage** | [**\Swagger\Client\Model\Storage**](../Model/Storage.md)|  |

### Return type

[**\Swagger\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdBackupPost**
> \Swagger\Client\Model\InlineResponse201 storageStorageIdBackupPost($storage_id, $storage)

Create backup

Creates a point-in-time backup of a storage resource. For automatic, scheduled backups, see  `backup_rule` in Create storage or Modify storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id
$storage = new \Swagger\Client\Model\Storage4(); // \Swagger\Client\Model\Storage4 | 

try {
    $result = $api_instance->storageStorageIdBackupPost($storage_id, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdBackupPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |
 **storage** | [**\Swagger\Client\Model\Storage4**](../Model/Storage4.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdCancelPost**
> storageStorageIdCancelPost($storage_id)

Cancel storage operation

Cancels a running cloning operation and deletes the incomplete copy.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Strage id

try {
    $api_instance->storageStorageIdCancelPost($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdCancelPost: ', $e->getMessage(), PHP_EOL;
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

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdClonePost**
> \Swagger\Client\Model\InlineResponse201 storageStorageIdClonePost($storage_id, $storage)

Clone storage

Creates an exact copy of an existing storage resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id
$storage = new \Swagger\Client\Model\Storage2(); // \Swagger\Client\Model\Storage2 | 

try {
    $result = $api_instance->storageStorageIdClonePost($storage_id, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdClonePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |
 **storage** | [**\Swagger\Client\Model\Storage2**](../Model/Storage2.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdDelete**
> storageStorageIdDelete($storage_id)

Delete storage

Deleted an existing storage resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | 

try {
    $api_instance->storageStorageIdDelete($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdDelete: ', $e->getMessage(), PHP_EOL;
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

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdFavoriteDelete**
> storageStorageIdFavoriteDelete($storage_id)

Remove storage from favorites

Delete a storage from the list of favorite storages. To list favorite storages, see List storages. This operations succeeds even if the storage is already on the list of favorites.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id

try {
    $api_instance->storageStorageIdFavoriteDelete($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdFavoriteDelete: ', $e->getMessage(), PHP_EOL;
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

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdFavoritePost**
> storageStorageIdFavoritePost($storage_id)

Add storage to favorites

Adds a storage to the list of favorite storages. To list favorite storages, see List storages. This operations succeeds even if the storage is already on the list of favorites.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id

try {
    $api_instance->storageStorageIdFavoritePost($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdFavoritePost: ', $e->getMessage(), PHP_EOL;
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

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdGet**
> \Swagger\Client\Model\InlineResponse201 storageStorageIdGet($storage_id)

Get storage details

Returns detailed information about a specific storage resource.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | 

try {
    $result = $api_instance->storageStorageIdGet($storage_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**|  |

### Return type

[**\Swagger\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdPut**
> \Swagger\Client\Model\InlineResponse201 storageStorageIdPut($storage_id, $storage)

Modify storage

Modifies an existing storage resource. This operation is used to rename or resize the storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | 
$storage = new \Swagger\Client\Model\Storage1(); // \Swagger\Client\Model\Storage1 | 

try {
    $result = $api_instance->storageStorageIdPut($storage_id, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**|  |
 **storage** | [**\Swagger\Client\Model\Storage1**](../Model/Storage1.md)|  |

### Return type

[**\Swagger\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdRestorePost**
> storageStorageIdRestorePost($storage_id)

Restore backup

Restores the origin storage with data from the specified backup storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id

try {
    $api_instance->storageStorageIdRestorePost($storage_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdRestorePost: ', $e->getMessage(), PHP_EOL;
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

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **storageStorageIdTemplatizePost**
> \Swagger\Client\Model\InlineResponse201 storageStorageIdTemplatizePost($storage_id, $storage)

Templatize storage

Creates an exact copy of an existing storage resource which can be used as a template for creating new servers.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\StorageApi(new \Http\Adapter\Guzzle6\Client());
$storage_id = "storage_id_example"; // string | Storage id
$storage = new \Swagger\Client\Model\Storage3(); // \Swagger\Client\Model\Storage3 | 

try {
    $result = $api_instance->storageStorageIdTemplatizePost($storage_id, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageStorageIdTemplatizePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **storage_id** | **string**| Storage id |
 **storage** | [**\Swagger\Client\Model\Storage3**](../Model/Storage3.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


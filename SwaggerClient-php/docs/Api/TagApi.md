# Swagger\Client\TagApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**assignTag**](TagApi.md#assignTag) | **POST** /server/{serverId}/tag/{tagList} | Assign tag to a server
[**createTag**](TagApi.md#createTag) | **POST** /tag | Create a new tag
[**deleteTag**](TagApi.md#deleteTag) | **DELETE** /tag/{tagName} | Delete tag
[**listTags**](TagApi.md#listTags) | **GET** /tag | List existing tags
[**modifyTag**](TagApi.md#modifyTag) | **PUT** /tag/{tagName} | Modify existing tag
[**untag**](TagApi.md#untag) | **POST** /server/{serverId}/untag/{tagName} | Remove tag from server


# **assignTag**
> \Swagger\Client\Model\ServerListResponse assignTag($server_id, $tag_list)

Assign tag to a server

Servers can be tagged with one or more tags. The tags used must exist

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\TagApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$tag_list = "tag_list_example"; // string | List of tags

try {
    $result = $api_instance->assignTag($server_id, $tag_list);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->assignTag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **tag_list** | **string**| List of tags |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createTag**
> \Swagger\Client\Model\InlineResponse20010 createTag($tag)

Create a new tag

Creates a new tag. Existing servers can be tagged in same request

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\TagApi(new \Http\Adapter\Guzzle6\Client());
$tag = new \Swagger\Client\Model\Tag(); // \Swagger\Client\Model\Tag | 

try {
    $result = $api_instance->createTag($tag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->createTag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tag** | [**\Swagger\Client\Model\Tag**](../Model/Tag.md)|  |

### Return type

[**\Swagger\Client\Model\InlineResponse20010**](../Model/InlineResponse20010.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteTag**
> deleteTag($tag_name)

Delete tag

Deleting existing tag untags all servers from specified tag and deletes tag definition

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\TagApi(new \Http\Adapter\Guzzle6\Client());
$tag_name = "tag_name_example"; // string | Tag name

try {
    $api_instance->deleteTag($tag_name);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->deleteTag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tag_name** | **string**| Tag name |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listTags**
> \Swagger\Client\Model\InlineResponse2009 listTags()

List existing tags

Returns all existing tags with their properties and servers tagged

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\TagApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->listTags();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->listTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\InlineResponse2009**](../Model/InlineResponse2009.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **modifyTag**
> \Swagger\Client\Model\InlineResponse20010 modifyTag($tag_name, $tag)

Modify existing tag

Changes attributes of an existing tag

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\TagApi(new \Http\Adapter\Guzzle6\Client());
$tag_name = "tag_name_example"; // string | Tag name
$tag = new \Swagger\Client\Model\Tag1(); // \Swagger\Client\Model\Tag1 | 

try {
    $result = $api_instance->modifyTag($tag_name, $tag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->modifyTag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tag_name** | **string**| Tag name |
 **tag** | [**\Swagger\Client\Model\Tag1**](../Model/Tag1.md)|  |

### Return type

[**\Swagger\Client\Model\InlineResponse20010**](../Model/InlineResponse20010.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **untag**
> \Swagger\Client\Model\ServerListResponse untag($server_id, $tag_name)

Remove tag from server

Untags tags from given server. The tag(s) must exist

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\TagApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$tag_name = "tag_name_example"; // string | Tag name

try {
    $result = $api_instance->untag($server_id, $tag_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->untag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **tag_name** | **string**| Tag name |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


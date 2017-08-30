# Swagger\Client\ServerApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createServer**](ServerApi.md#createServer) | **POST** /server | Create server
[**deleteServer**](ServerApi.md#deleteServer) | **DELETE** /server/{serverId} | Delete server
[**listServers**](ServerApi.md#listServers) | **GET** /server | List of servers
[**serverDetails**](ServerApi.md#serverDetails) | **GET** /server/{serverId} | Get server details
[**serverServerIdFirewallRuleFirewallRuleNumberDelete**](ServerApi.md#serverServerIdFirewallRuleFirewallRuleNumberDelete) | **DELETE** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Remove firewall rule
[**serverServerIdFirewallRuleFirewallRuleNumberGet**](ServerApi.md#serverServerIdFirewallRuleFirewallRuleNumberGet) | **GET** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Get firewall rule details
[**serverServerIdFirewallRuleGet**](ServerApi.md#serverServerIdFirewallRuleGet) | **GET** /server/{serverId}/firewall_rule | List firewall rules
[**serverServerIdFirewallRulePost**](ServerApi.md#serverServerIdFirewallRulePost) | **POST** /server/{serverId}/firewall_rule | Create firewall rule
[**serverServerIdRestartPost**](ServerApi.md#serverServerIdRestartPost) | **POST** /server/{serverId}/restart | Restart server
[**serverServerIdStartPost**](ServerApi.md#serverServerIdStartPost) | **POST** /server/{serverId}/start | Start server
[**serverServerIdStopPost**](ServerApi.md#serverServerIdStopPost) | **POST** /server/{serverId}/stop | Stop server
[**serverServerIdStorageAttachPost**](ServerApi.md#serverServerIdStorageAttachPost) | **POST** /server/{serverId}/storage/attach | Attach storage
[**serverServerIdStorageCdromEjectPost**](ServerApi.md#serverServerIdStorageCdromEjectPost) | **POST** /server/{serverId}/storage/cdrom/eject | Eject CD-ROM
[**serverServerIdStorageCdromLoadPost**](ServerApi.md#serverServerIdStorageCdromLoadPost) | **POST** /server/{serverId}/storage/cdrom/load | Load CD-ROM
[**serverServerIdStorageDetachPost**](ServerApi.md#serverServerIdStorageDetachPost) | **POST** /server/{serverId}/storage/detach | Detach storage
[**serverServerIdTagTagListPost**](ServerApi.md#serverServerIdTagTagListPost) | **POST** /server/{serverId}/tag/{tagList} | Assign tag to a server
[**serverServerIdUntagTagNamePost**](ServerApi.md#serverServerIdUntagTagNamePost) | **POST** /server/{serverId}/untag/{tagName} | Remove tag from server
[**serverSizeGet**](ServerApi.md#serverSizeGet) | **GET** /server_size | List server configurations
[**updateServer**](ServerApi.md#updateServer) | **PUT** /server/{serverId} | Modify server


# **createServer**
> \Swagger\Client\Model\ServerListResponse createServer($server)

Create server

Creates a new server instance.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server = new \Swagger\Client\Model\Server(); // \Swagger\Client\Model\Server | 

try {
    $result = $api_instance->createServer($server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->createServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server** | [**\Swagger\Client\Model\Server**](../Model/Server.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteServer**
> deleteServer($server_id)

Delete server

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to delete

try {
    $api_instance->deleteServer($server_id);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->deleteServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to delete |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listServers**
> \Swagger\Client\Model\InlineResponse2005 listServers()

List of servers

Returns a list of all servers associated with the current account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->listServers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->listServers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\InlineResponse2005**](../Model/InlineResponse2005.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverDetails**
> \Swagger\Client\Model\ServerListResponse serverDetails($server_id)

Get server details

Returns detailed information about a specific server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to return

try {
    $result = $api_instance->serverDetails($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to return |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdFirewallRuleFirewallRuleNumberDelete**
> serverServerIdFirewallRuleFirewallRuleNumberDelete($server_id, $firewall_rule_number)

Remove firewall rule

Removes a firewall rule from a server. Firewall rules must be removed individually. The positions of remaining firewall rules will be adjusted after a rule is removed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule_number = "firewall_rule_number_example"; // string | Denotes the index of the firewall rule in the server's firewall rule list

try {
    $api_instance->serverServerIdFirewallRuleFirewallRuleNumberDelete($server_id, $firewall_rule_number);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdFirewallRuleFirewallRuleNumberDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **firewall_rule_number** | **string**| Denotes the index of the firewall rule in the server&#39;s firewall rule list |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdFirewallRuleFirewallRuleNumberGet**
> \Swagger\Client\Model\InlineResponse2008 serverServerIdFirewallRuleFirewallRuleNumberGet($server_id, $firewall_rule_number)

Get firewall rule details

Returns detailed information about a specific firewall rule

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule_number = "firewall_rule_number_example"; // string | Denotes the index of the firewall rule in the server's firewall rule list

try {
    $result = $api_instance->serverServerIdFirewallRuleFirewallRuleNumberGet($server_id, $firewall_rule_number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdFirewallRuleFirewallRuleNumberGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **firewall_rule_number** | **string**| Denotes the index of the firewall rule in the server&#39;s firewall rule list |

### Return type

[**\Swagger\Client\Model\InlineResponse2008**](../Model/InlineResponse2008.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdFirewallRuleGet**
> \Swagger\Client\Model\InlineResponse2007 serverServerIdFirewallRuleGet($server_id)

List firewall rules

Returns a list of firewall rules for a specific server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id

try {
    $result = $api_instance->serverServerIdFirewallRuleGet($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdFirewallRuleGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |

### Return type

[**\Swagger\Client\Model\InlineResponse2007**](../Model/InlineResponse2007.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdFirewallRulePost**
> serverServerIdFirewallRulePost($server_id, $firewall_rule)

Create firewall rule

Creates a new firewall rule

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule = new \Swagger\Client\Model\FirewallRule(); // \Swagger\Client\Model\FirewallRule | 

try {
    $api_instance->serverServerIdFirewallRulePost($server_id, $firewall_rule);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdFirewallRulePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **firewall_rule** | [**\Swagger\Client\Model\FirewallRule**](../Model/FirewallRule.md)|  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdRestartPost**
> \Swagger\Client\Model\ServerListResponse serverServerIdRestartPost($server_id, $restart_server)

Restart server

Stops and starts a server. The server state must be `started`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to restart
$restart_server = new \Swagger\Client\Model\RestartServer(); // \Swagger\Client\Model\RestartServer | 

try {
    $result = $api_instance->serverServerIdRestartPost($server_id, $restart_server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdRestartPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to restart |
 **restart_server** | [**\Swagger\Client\Model\RestartServer**](../Model/RestartServer.md)|  |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdStartPost**
> \Swagger\Client\Model\ServerListResponse serverServerIdStartPost($server_id)

Start server

Starts a stopped server. The server state must be `stopped`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to start

try {
    $result = $api_instance->serverServerIdStartPost($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdStartPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to start |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdStopPost**
> \Swagger\Client\Model\ServerListResponse serverServerIdStopPost($server_id, $stop_server)

Stop server

Stops a started server. The server state must be `started`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to stop
$stop_server = new \Swagger\Client\Model\StopServer(); // \Swagger\Client\Model\StopServer | 

try {
    $result = $api_instance->serverServerIdStopPost($server_id, $stop_server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdStopPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to stop |
 **stop_server** | [**\Swagger\Client\Model\StopServer**](../Model/StopServer.md)|  |

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
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

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Swagger\Client\Model\StorageDevice(); // \Swagger\Client\Model\StorageDevice | 

try {
    $result = $api_instance->serverServerIdStorageAttachPost($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdStorageAttachPost: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id

try {
    $result = $api_instance->serverServerIdStorageCdromEjectPost($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdStorageCdromEjectPost: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Swagger\Client\Model\StorageDevice1(); // \Swagger\Client\Model\StorageDevice1 | 

try {
    $result = $api_instance->serverServerIdStorageCdromLoadPost($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdStorageCdromLoadPost: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$storage_device = new \Swagger\Client\Model\StorageDevice(); // \Swagger\Client\Model\StorageDevice | 

try {
    $result = $api_instance->serverServerIdStorageDetachPost($server_id, $storage_device);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdStorageDetachPost: ', $e->getMessage(), PHP_EOL;
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

# **serverServerIdTagTagListPost**
> \Swagger\Client\Model\ServerListResponse serverServerIdTagTagListPost($server_id, $tag_list)

Assign tag to a server

Servers can be tagged with one or more tags. The tags used must exist

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$tag_list = "tag_list_example"; // string | List of tags

try {
    $result = $api_instance->serverServerIdTagTagListPost($server_id, $tag_list);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdTagTagListPost: ', $e->getMessage(), PHP_EOL;
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

# **serverServerIdUntagTagNamePost**
> \Swagger\Client\Model\ServerListResponse serverServerIdUntagTagNamePost($server_id, $tag_name)

Remove tag from server

Untags tags from given server. The tag(s) must exist

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$tag_name = "tag_name_example"; // string | Tag name

try {
    $result = $api_instance->serverServerIdUntagTagNamePost($server_id, $tag_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIdUntagTagNamePost: ', $e->getMessage(), PHP_EOL;
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

# **serverSizeGet**
> \Swagger\Client\Model\InlineResponse2004 serverSizeGet()

List server configurations

Returns a list of available server configurations. A server configuration consists of a combination of CPU core count and main memory amount. All servers are created using these configurations.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->serverSizeGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverSizeGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\InlineResponse2004**](../Model/InlineResponse2004.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateServer**
> \Swagger\Client\Model\ServerListResponse updateServer($server_id, $server)

Modify server

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ServerApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Id of server to modify
$server = new \Swagger\Client\Model\Server(); // \Swagger\Client\Model\Server | 

try {
    $result = $api_instance->updateServer($server_id, $server);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->updateServer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Id of server to modify |
 **server** | [**\Swagger\Client\Model\Server**](../Model/Server.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\ServerListResponse**](../Model/ServerListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


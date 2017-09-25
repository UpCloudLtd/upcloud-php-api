# Upcloud\ApiClient\FirewallApi

All URIs are relative to *http://api.upcloud.com/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createFirewallRule**](FirewallApi.md#createFirewallRule) | **POST** /server/{serverId}/firewall_rule | Create firewall rule
[**deleteFirewallRule**](FirewallApi.md#deleteFirewallRule) | **DELETE** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Remove firewall rule
[**getFirewallRule**](FirewallApi.md#getFirewallRule) | **GET** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Get firewall rule details
[**serverServerIdFirewallRuleGet**](FirewallApi.md#serverServerIdFirewallRuleGet) | **GET** /server/{serverId}/firewall_rule | List firewall rules


# **createFirewallRule**
> \Upcloud\ApiClient\Model\FirewallRuleCreateResponse createFirewallRule($server_id, $firewall_rule)

Create firewall rule

Creates a new firewall rule

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Upcloud\ApiClient\Api\FirewallApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule = new \Upcloud\ApiClient\Model\FirewallRuleRequest(); // \Upcloud\ApiClient\Model\FirewallRuleRequest | 

try {
    $result = $api_instance->createFirewallRule($server_id, $firewall_rule);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->createFirewallRule: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **firewall_rule** | [**\Upcloud\ApiClient\Model\FirewallRuleRequest**](../Model/FirewallRuleRequest.md)|  |

### Return type

[**\Upcloud\ApiClient\Model\FirewallRuleCreateResponse**](../Model/FirewallRuleCreateResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteFirewallRule**
> deleteFirewallRule($server_id, $firewall_rule_number)

Remove firewall rule

Removes a firewall rule from a server. Firewall rules must be removed individually. The positions of remaining firewall rules will be adjusted after a rule is removed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Upcloud\ApiClient\Api\FirewallApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule_number = "firewall_rule_number_example"; // string | Denotes the index of the firewall rule in the server's firewall rule list

try {
    $api_instance->deleteFirewallRule($server_id, $firewall_rule_number);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->deleteFirewallRule: ', $e->getMessage(), PHP_EOL;
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

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFirewallRule**
> \Upcloud\ApiClient\Model\FirewallRuleCreateResponse getFirewallRule($server_id, $firewall_rule_number)

Get firewall rule details

Returns detailed information about a specific firewall rule

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Upcloud\ApiClient\Api\FirewallApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule_number = "firewall_rule_number_example"; // string | Denotes the index of the firewall rule in the server's firewall rule list

try {
    $result = $api_instance->getFirewallRule($server_id, $firewall_rule_number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->getFirewallRule: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |
 **firewall_rule_number** | **string**| Denotes the index of the firewall rule in the server&#39;s firewall rule list |

### Return type

[**\Upcloud\ApiClient\Model\FirewallRuleCreateResponse**](../Model/FirewallRuleCreateResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **serverServerIdFirewallRuleGet**
> \Upcloud\ApiClient\Model\FirewallRuleListResponse serverServerIdFirewallRuleGet($server_id)

List firewall rules

Returns a list of firewall rules for a specific server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Upcloud\ApiClient\Api\FirewallApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id

try {
    $result = $api_instance->serverServerIdFirewallRuleGet($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->serverServerIdFirewallRuleGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **server_id** | **string**| Server id |

### Return type

[**\Upcloud\ApiClient\Model\FirewallRuleListResponse**](../Model/FirewallRuleListResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


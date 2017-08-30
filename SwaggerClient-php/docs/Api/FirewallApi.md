# Swagger\Client\FirewallApi

All URIs are relative to *http://localhost/1.2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**serverServerIdFirewallRuleFirewallRuleNumberDelete**](FirewallApi.md#serverServerIdFirewallRuleFirewallRuleNumberDelete) | **DELETE** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Remove firewall rule
[**serverServerIdFirewallRuleFirewallRuleNumberGet**](FirewallApi.md#serverServerIdFirewallRuleFirewallRuleNumberGet) | **GET** /server/{serverId}/firewall_rule/{firewallRuleNumber} | Get firewall rule details
[**serverServerIdFirewallRuleGet**](FirewallApi.md#serverServerIdFirewallRuleGet) | **GET** /server/{serverId}/firewall_rule | List firewall rules
[**serverServerIdFirewallRulePost**](FirewallApi.md#serverServerIdFirewallRulePost) | **POST** /server/{serverId}/firewall_rule | Create firewall rule


# **serverServerIdFirewallRuleFirewallRuleNumberDelete**
> serverServerIdFirewallRuleFirewallRuleNumberDelete($server_id, $firewall_rule_number)

Remove firewall rule

Removes a firewall rule from a server. Firewall rules must be removed individually. The positions of remaining firewall rules will be adjusted after a rule is removed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\FirewallApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule_number = "firewall_rule_number_example"; // string | Denotes the index of the firewall rule in the server's firewall rule list

try {
    $api_instance->serverServerIdFirewallRuleFirewallRuleNumberDelete($server_id, $firewall_rule_number);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->serverServerIdFirewallRuleFirewallRuleNumberDelete: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\FirewallApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule_number = "firewall_rule_number_example"; // string | Denotes the index of the firewall rule in the server's firewall rule list

try {
    $result = $api_instance->serverServerIdFirewallRuleFirewallRuleNumberGet($server_id, $firewall_rule_number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->serverServerIdFirewallRuleFirewallRuleNumberGet: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\FirewallApi(new \Http\Adapter\Guzzle6\Client());
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

$api_instance = new Swagger\Client\Api\FirewallApi(new \Http\Adapter\Guzzle6\Client());
$server_id = "server_id_example"; // string | Server id
$firewall_rule = new \Swagger\Client\Model\FirewallRule(); // \Swagger\Client\Model\FirewallRule | 

try {
    $api_instance->serverServerIdFirewallRulePost($server_id, $firewall_rule);
} catch (Exception $e) {
    echo 'Exception when calling FirewallApi->serverServerIdFirewallRulePost: ', $e->getMessage(), PHP_EOL;
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


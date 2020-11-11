# FirewallRule

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**direction** | **string** | The direction of network traffic this rule will be applied to. | 
**action** | **string** | Action to take if the rule conditions are met. | 
**position** | **float** | Add the firewall rule to this position in the server&#39;s firewall list. | [optional] 
**family** | **string** | if protocol is set The address family of new firewall rule | 
**protocol** | **string** | The protocol this rule will be applied to. | [optional] 
**icmp_type** | **string** | The ICMP type. | [optional] 
**destination_address_start** | **string** | The destination address range starts from this address. | [optional] 
**destination_address_end** | **string** | The destination address range ends to this address. | [optional] 
**destination_port_start** | **float** | The destination port range starts from this port number. | [optional] 
**destination_port_end** | **float** | The destination port range ends to this port number. | [optional] 
**source_address_start** | **string** | The source address range starts from this address. | [optional] 
**source_address_end** | **string** | The source address range ends to this address. | [optional] 
**source_port_start** | **float** | The source port range starts from this port number. | [optional] 
**source_port_end** | **float** | The source port range ends to this port number. | [optional] 
**comment** | **string** | Freeform comment string for the rule. | [optional] 

[[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to API list]](../../README.md#documentation) [[Back to README]](../../README.md)



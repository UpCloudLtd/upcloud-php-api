# NetworkInterface

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**network** | **string** | Virtual network ID to join | [required]
**type** | **string** | Set the type of the network | [required] 
**index** | **integer** | Interface index | [optional] [default to Next available]
**ip_addresses** | [**\Upcloud\ApiClient\Model\IpAddresses**](IpAddresses.md) | Array of IP addresses under ip_address	 | [required]
**source_ip_filtering** | **string** | Whether source IP filtering is enabled on the interface. Disabling it is allowed only for SDN private interfaces. | [optional] [default to 'yes']
**bootable** | **string** |Whether to try booting through the interface. | [optional] [default to 'no']

[[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to API list]](../../README.md#documentation) [[Back to README]](../../README.md)



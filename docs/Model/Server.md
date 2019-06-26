# Server

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**boot_order** | **string** | The storage device boot order. | [optional]
**core_number** | **float** | The number of CPU cores dedicated to the server. See List server configurations. | [optional]
**firewall** | **string** | The state of the server firewall rules. | [optional] [default to 'on']
**host** | **float** |  | [optional]
**hostname** | **string** | A valid hostname, e.g. host.example.com. The maximum length is 128 characters. | [optional]
**ip_addresses** | [**\Upcloud\ApiClient\Model\IpAddresses**](IpAddresses.md) |  | [optional]
**license** | **float** |  | [optional]
**memory_amount** | **float** | The amount of main memory in megabytes. See List server configurations. | [optional]
**nic_model** | **string** | The model of the server&#39;s network interfaces. | [optional] [default to 'e1000']
**plan** | **string** | The pricing plan used. If a plan is selected, the core_number and  memory_amount must match the plan if they are present. | [optional] [default to 'custom']
**plan_ipv4_bytes** | **float** |  | [optional]
**plan_ipv6_bytes** | **float** |  | [optional]
**state** | [**\Upcloud\ApiClient\Model\ServerState**](ServerState.md) |  | [optional]
**storage_devices** | [**\Upcloud\ApiClient\Model\ServerStorageDevices**](ServerStorageDevices.md) |  | [optional]
**tags** | [**\Upcloud\ApiClient\Model\ServerTags**](ServerTags.md) |  | [optional]
**timezone** | **string** | A timezone identifier, e.g. Europe/Helsinki. See Timezones. | [optional]
**title** | **string** | A short description. | [optional]
**uuid** | **string** |  | [optional]
**video_model** | **string** | The model of the server&#39;s video interface. | [optional] [default to 'vga']
**vnc** | **string** | The state of the VNC remote access service. | [optional] [default to 'off']
**vnc_host** | **string** |  | [optional]
**vnc_password** | **string** | The VNC remote access password. | [optional]
**vnc_port** | **string** |  | [optional]
**zone** | **string** |  | [optional]
**user_data** | **string** | A bash script (body or URL) to run on first boot. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

# Server

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**avoid_host** | **float** | Use this to make sure VMs do not reside on specific host. Refers to value from host -attribute. Useful when building HA-environments. | [optional] 
**boot_order** | **string** | The storage device boot order. | [optional] 
**core_number** | **float** | The number of CPU cores dedicated to the server. See List server configurations. | [optional] 
**firewall** | **string** | The state of the server firewall rules. | [optional] [default to 'on']
**host** | **float** |  | [optional] 
**hostname** | **string** | A valid hostname, e.g. host.example.com. The maximum length is 128 characters. | [optional] 
**networking** | [**\Upcloud\ApiClient\Model\NetworkInterfaceList**](NetworkInterfaceList.md) |  | [optional] 
**login_user** | [**\Upcloud\ApiClient\Model\ServerLoginUser**](ServerLoginUser.md) | Define login account and SSH keys | [optional] 
**ip_addresses** | [**\Upcloud\ApiClient\Model\IpAddresses**](IpAddresses.md) |  | [optional] 
**license** | **float** |  | [optional] 
**memory_amount** | **float** | The amount of main memory in megabytes. See List server configurations. | [optional] 
**metadata** | **string** | HTTP-accessible metadata service for the server. See our tutorial for more information. | [optional] [default to 'no']
**nic_model** | **string** | The model of the server&#39;s network interfaces. | [optional] [default to 'virtio']
**password_delivery** | **string** | The delivery method for the server’s root password. | [optional] [default to 'email']
**plan** | **string** | The pricing plan used. If a plan is selected, the core_number and  memory_amount must match the plan if they are present. | [optional] [default to 'custom']
**plan_ipv4_bytes** | **float** |  | [optional] 
**plan_ipv6_bytes** | **float** |  | [optional] 
**state** | [**\Upcloud\ApiClient\Model\ServerState**](ServerState.md) |  | [optional] 
**storage_devices** | [**\Upcloud\ApiClient\Model\ServerStorageDevices**](ServerStorageDevices.md) |  | [optional] 
**tags** | [**\Upcloud\ApiClient\Model\ServerTags**](ServerTags.md) |  | [optional] 
**timezone** | **string** | A timezone identifier, e.g. Europe/Helsinki. See Timezones. | [optional] 
**title** | **string** | A short description. | [optional] 
**uuid** | **string** |  | [optional] 
**user_data** | **string** | Defines URL for a server setup script, or the script body itself | [optional] 
**video_model** | **string** | The model of the server&#39;s video interface. | [optional] [default to 'vga']
**remote_access_type** | **string** | The remote access type. | [optional] [default to 'vnc']
**remote_access_enabled** | **string** | Is the remote access enabled. | [optional] [default to 'no']
**remote_access_password** | **string** | Remote access password. | [optional] 
**simple_backup** | **string** | Simple backup time in UTC, followed by dailies, weeklies, or monthlies option separated by comma, or no when disabled. | [optional] 
**zone** | **string** | The zone in which the server will be hosted, e.g. fi-hel1. See Zones. | [optional] 

[[Back to Model list]](../../README.md#documentation-of-the-models) [[Back to API list]](../../README.md#documentation) [[Back to README]](../../README.md)



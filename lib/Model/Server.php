<?php
/**
 * Server
 *
 * PHP version 5
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */

/**
 * Upcloud api
 *
 * The UpCloud API consists of operations used to control resources on UpCloud. The API is a web service interface. HTTPS is used to connect to the API. The API follows the principles of a RESTful web service wherever possible. The base URL for all API operations is  https://api.upcloud.com/. All API operations require authentication.
 *
 * OpenAPI spec version: 1.2.0
 *
 */


namespace Upcloud\ApiClient\Model;

use \ArrayAccess;

/**
 * Server Class Doc Comment
 *
 * @category    Class
 * @description The server configuration defines which storage devices the server is attached to, which IP addresses can be used and how the server can be reached for remote management. A server must have at least one storage device attached in order to be started. Servers may have from zero to five public IPv4 and IPv6 addresses. All servers have a private IP address that cannot be removed.
 * @package     Upcloud\ApiClient
 */
class Server implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Server';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'boot_order' => 'string',
        'core_number' => 'float',
        'firewall' => 'string',
        'host' => 'float',
        'hostname' => 'string',
        'ip_addresses' => '\Upcloud\ApiClient\Model\IpAddresses',
        'license' => 'float',
        'memory_amount' => 'float',
        'nic_model' => 'string',
        'plan' => 'string',
        'plan_ipv4_bytes' => 'float',
        'plan_ipv6_bytes' => 'float',
        'state' => '\Upcloud\ApiClient\Model\ServerState',
        'storage_devices' => '\Upcloud\ApiClient\Model\ServerStorageDevices',
        'tags' => '\Upcloud\ApiClient\Model\ServerTags',
        'timezone' => 'string',
        'title' => 'string',
        'uuid' => 'string',
        'video_model' => 'string',
        'remote_access_type' => 'string',
        'remote_access_enabled' => 'string',
        'remote_access_password' => 'string',
        'simple_backup' => 'string',
        'zone' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'boot_order' => null,
        'core_number' => null,
        'firewall' => null,
        'host' => null,
        'hostname' => null,
        'ip_addresses' => null,
        'license' => null,
        'memory_amount' => null,
        'nic_model' => null,
        'plan' => null,
        'plan_ipv4_bytes' => null,
        'plan_ipv6_bytes' => null,
        'state' => null,
        'storage_devices' => null,
        'tags' => null,
        'timezone' => null,
        'title' => null,
        'uuid' => 'uuid',
        'video_model' => null,
        'remote_access_type' => null,
        'remote_access_enabled' => null,
        'remote_access_password' => null,
        'simple_backup' => null,
        'zone' => null
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'boot_order' => 'boot_order',
        'core_number' => 'core_number',
        'firewall' => 'firewall',
        'host' => 'host',
        'hostname' => 'hostname',
        'ip_addresses' => 'ip_addresses',
        'license' => 'license',
        'memory_amount' => 'memory_amount',
        'nic_model' => 'nic_model',
        'plan' => 'plan',
        'plan_ipv4_bytes' => 'plan_ipv4_bytes',
        'plan_ipv6_bytes' => 'plan_ipv6_bytes',
        'state' => 'state',
        'storage_devices' => 'storage_devices',
        'tags' => 'tags',
        'timezone' => 'timezone',
        'title' => 'title',
        'uuid' => 'uuid',
        'video_model' => 'video_model',
        'remote_access_type' => 'remote_access_type',
        'remote_access_enabled' => 'remote_access_enabled',
        'remote_access_password' => 'remote_access_password',
        'simple_backup' => 'simple_backup',
        'zone' => 'zone'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'boot_order' => 'setBootOrder',
        'core_number' => 'setCoreNumber',
        'firewall' => 'setFirewall',
        'host' => 'setHost',
        'hostname' => 'setHostname',
        'ip_addresses' => 'setIpAddresses',
        'license' => 'setLicense',
        'memory_amount' => 'setMemoryAmount',
        'nic_model' => 'setNicModel',
        'plan' => 'setPlan',
        'plan_ipv4_bytes' => 'setPlanIpv4Bytes',
        'plan_ipv6_bytes' => 'setPlanIpv6Bytes',
        'state' => 'setState',
        'storage_devices' => 'setStorageDevices',
        'tags' => 'setTags',
        'timezone' => 'setTimezone',
        'title' => 'setTitle',
        'uuid' => 'setUuid',
        'video_model' => 'setVideoModel',
        'remote_access_type' => 'setRemoteAccessType',
        'remote_access_enabled' => 'setRemoteAccessEnabled',
        'remote_access_password' => 'setRemoteAccessPassword',
        'simple_backup' => 'setSimpleBackup',
        'zone' => 'setZone'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'boot_order' => 'getBootOrder',
        'core_number' => 'getCoreNumber',
        'firewall' => 'getFirewall',
        'host' => 'getHost',
        'hostname' => 'getHostname',
        'ip_addresses' => 'getIpAddresses',
        'license' => 'getLicense',
        'memory_amount' => 'getMemoryAmount',
        'nic_model' => 'getNicModel',
        'plan' => 'getPlan',
        'plan_ipv4_bytes' => 'getPlanIpv4Bytes',
        'plan_ipv6_bytes' => 'getPlanIpv6Bytes',
        'state' => 'getState',
        'storage_devices' => 'getStorageDevices',
        'tags' => 'getTags',
        'timezone' => 'getTimezone',
        'title' => 'getTitle',
        'uuid' => 'getUuid',
        'video_model' => 'getVideoModel',
        'remote_access_type' => 'getRemoteAccessType',
        'remote_access_enabled' => 'getRemoteAccessEnabled',
        'remote_access_password' => 'getRemoteAccessPassword',
        'simple_backup' => 'getSimpleBackup',
        'zone' => 'getZone'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    const BOOT_ORDER_DISK = 'disk';
    const BOOT_ORDER_CDROM = 'cdrom';
    const BOOT_ORDER_DISKCDROM = 'disk,cdrom';
    const BOOT_ORDER_CDROMDISK = 'cdrom,disk';
    const FIREWALL_ON = 'on';
    const FIREWALL_OFF = 'off';
    const VIDEO_MODEL_VGA = 'vga';
    const VIDEO_MODEL_CIRRUS = 'cirrus';

    const REMOTE_ACCESS_TYPE_VNC = 'vnc';
    const REMOTE_ACCESS_TYPE_SPICE = 'spice';
    const REMOTE_ACCESS_ENABLED_YES = 'yes';
    const REMOTE_ACCESS_ENABLED_NO = 'no';


    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getBootOrderAllowableValues()
    {
        return [
            self::BOOT_ORDER_DISK,
            self::BOOT_ORDER_CDROM,
            self::BOOT_ORDER_DISKCDROM,
            self::BOOT_ORDER_CDROMDISK,
        ];
    }

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getFirewallAllowableValues()
    {
        return [
            self::FIREWALL_ON,
            self::FIREWALL_OFF,
        ];
    }

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getVideoModelAllowableValues()
    {
        return [
            self::VIDEO_MODEL_VGA,
            self::VIDEO_MODEL_CIRRUS,
        ];
    }

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getRemoteAccessTypeAllowableValues()
    {
        return [
            self::REMOTE_ACCESS_TYPE_VNC,
            self::REMOTE_ACCESS_TYPE_SPICE,
        ];
    }

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getRemoteAccessEnabledValues()
    {
        return [
            self::REMOTE_ACCESS_ENABLED_NO,
            self::REMOTE_ACCESS_ENABLED_YES,
        ];
    }

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['boot_order'] = isset($data['boot_order']) ? $data['boot_order'] : null;
        $this->container['core_number'] = isset($data['core_number']) ? $data['core_number'] : null;
        $this->container['firewall'] = isset($data['firewall']) ? $data['firewall'] : 'on';
        $this->container['host'] = isset($data['host']) ? $data['host'] : null;
        $this->container['hostname'] = isset($data['hostname']) ? $data['hostname'] : null;
        $this->container['ip_addresses'] = isset($data['ip_addresses']) ? $data['ip_addresses'] : null;
        $this->container['license'] = isset($data['license']) ? $data['license'] : null;
        $this->container['memory_amount'] = isset($data['memory_amount']) ? $data['memory_amount'] : null;
        $this->container['nic_model'] = isset($data['nic_model']) ? $data['nic_model'] : 'virtio';
        $this->container['plan'] = isset($data['plan']) ? $data['plan'] : 'custom';
        $this->container['plan_ipv4_bytes'] = isset($data['plan_ipv4_bytes']) ? $data['plan_ipv4_bytes'] : null;
        $this->container['plan_ipv6_bytes'] = isset($data['plan_ipv6_bytes']) ? $data['plan_ipv6_bytes'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['storage_devices'] = isset($data['storage_devices']) ? $data['storage_devices'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['timezone'] = isset($data['timezone']) ? $data['timezone'] : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
        $this->container['uuid'] = isset($data['uuid']) ? $data['uuid'] : null;
        $this->container['video_model'] = isset($data['video_model']) ? $data['video_model'] : 'vga';
        $this->container['remote_access_type'] = $data['remote_access_type'] ??  'vnc';
        $this->container['remote_access_enabled'] = $data['remote_access_enabled'] ?? 'no';
        $this->container['remote_access_password'] = $data['remote_access_password'] ?? null;
        $this->container['simple_backup'] = $data['simple_backup'] ?? null;
        $this->container['zone'] = isset($data['zone']) ? $data['zone'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        $allowed_values = $this->getBootOrderAllowableValues();
        if (!in_array($this->container['boot_order'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'boot_order', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        $allowed_values = $this->getFirewallAllowableValues();
        if (!in_array($this->container['firewall'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'firewall', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        $allowed_values = $this->getVideoModelAllowableValues();
        if (!in_array($this->container['video_model'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'video_model', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        $allowed_values = $this->getRemoteAccessEnabledValues();
        if (!in_array($this->container['remote_access_enabled'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'remote_access_enabled', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        $allowed_values = $this->getRemoteAccessTypeAllowableValues();
        if (!in_array($this->container['remote_access_type'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'remote_access_type', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }


        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        $allowed_values = $this->getBootOrderAllowableValues();
        if (!in_array($this->container['boot_order'], $allowed_values)) {
            return false;
        }
        $allowed_values = $this->getFirewallAllowableValues();
        if (!in_array($this->container['firewall'], $allowed_values)) {
            return false;
        }
        $allowed_values = $this->getVideoModelAllowableValues();
        if (!in_array($this->container['video_model'], $allowed_values)) {
            return false;
        }
        $allowed_values = $this->getRemoteAccessEnabledValues();
        if (!in_array($this->container['remote_access_enabled'], $allowed_values)) {
            return false;
        }

        $allowed_values = $this->getRemoteAccessTypeAllowableValues();
        if (!in_array($this->container['remote_access_type'], $allowed_values)) {
            return false;
        }
        return true;
    }


    /**
     * Gets boot_order
     * @return string
     */
    public function getBootOrder()
    {
        return $this->container['boot_order'];
    }

    /**
     * Sets boot_order
     * @param string $boot_order The storage device boot order.
     * @return $this
     */
    public function setBootOrder($boot_order)
    {
        $allowed_values = $this->getBootOrderAllowableValues();
        if (!is_null($boot_order) && !in_array($boot_order, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'boot_order', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['boot_order'] = $boot_order;

        return $this;
    }

    /**
     * Gets core_number
     * @return float
     */
    public function getCoreNumber()
    {
        return $this->container['core_number'];
    }

    /**
     * Sets core_number
     * @param float $core_number The number of CPU cores dedicated to the server. See List server configurations.
     * @return $this
     */
    public function setCoreNumber($core_number)
    {
        $this->container['core_number'] = $core_number;

        return $this;
    }

    /**
     * Gets firewall
     * @return string
     */
    public function getFirewall()
    {
        return $this->container['firewall'];
    }

    /**
     * Sets firewall
     * @param string $firewall The state of the server firewall rules.
     * @return $this
     */
    public function setFirewall($firewall)
    {
        $allowed_values = $this->getFirewallAllowableValues();
        if (!is_null($firewall) && !in_array($firewall, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'firewall', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['firewall'] = $firewall;

        return $this;
    }

    /**
     * Gets host
     * @return float
     */
    public function getHost()
    {
        return $this->container['host'];
    }

    /**
     * Sets host
     * @param float $host
     * @return $this
     */
    public function setHost($host)
    {
        $this->container['host'] = $host;

        return $this;
    }

    /**
     * Gets hostname
     * @return string
     */
    public function getHostname()
    {
        return $this->container['hostname'];
    }

    /**
     * Sets hostname
     * @param string $hostname A valid hostname, e.g. host.example.com. The maximum length is 128 characters.
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->container['hostname'] = $hostname;

        return $this;
    }

    /**
     * Gets ip_addresses
     * @return \Upcloud\ApiClient\Model\IpAddresses
     */
    public function getIpAddresses()
    {
        return $this->container['ip_addresses'];
    }

    /**
     * Sets ip_addresses
     * @param \Upcloud\ApiClient\Model\IpAddresses $ip_addresses
     * @return $this
     */
    public function setIpAddresses($ip_addresses)
    {
        $this->container['ip_addresses'] = $ip_addresses;

        return $this;
    }

    /**
     * Gets license
     * @return float
     */
    public function getLicense()
    {
        return $this->container['license'];
    }

    /**
     * Sets license
     * @param float $license
     * @return $this
     */
    public function setLicense($license)
    {
        $this->container['license'] = $license;

        return $this;
    }

    /**
     * Gets memory_amount
     * @return float
     */
    public function getMemoryAmount()
    {
        return $this->container['memory_amount'];
    }

    /**
     * Sets memory_amount
     * @param float $memory_amount The amount of main memory in megabytes. See List server configurations.
     * @return $this
     */
    public function setMemoryAmount($memory_amount)
    {
        $this->container['memory_amount'] = $memory_amount;

        return $this;
    }

    /**
     * Gets nic_model
     * @return string
     */
    public function getNicModel()
    {
        return $this->container['nic_model'];
    }

    /**
     * Sets nic_model
     * @param string $nic_model The model of the server's network interfaces.
     * @return $this
     */
    public function setNicModel($nic_model)
    {
        $this->container['nic_model'] = $nic_model;

        return $this;
    }

    /**
     * Gets plan
     * @return string
     */
    public function getPlan()
    {
        return $this->container['plan'];
    }

    /**
     * Sets plan
     * @param string $plan The pricing plan used. If a plan is selected, the core_number and  memory_amount must match the plan if they are present.
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->container['plan'] = $plan;

        return $this;
    }

    /**
     * Gets plan_ipv4_bytes
     * @return float
     */
    public function getPlanIpv4Bytes()
    {
        return $this->container['plan_ipv4_bytes'];
    }

    /**
     * Sets plan_ipv4_bytes
     * @param float $plan_ipv4_bytes
     * @return $this
     */
    public function setPlanIpv4Bytes($plan_ipv4_bytes)
    {
        $this->container['plan_ipv4_bytes'] = $plan_ipv4_bytes;

        return $this;
    }

    /**
     * Gets plan_ipv6_bytes
     * @return float
     */
    public function getPlanIpv6Bytes()
    {
        return $this->container['plan_ipv6_bytes'];
    }

    /**
     * Sets plan_ipv6_bytes
     * @param float $plan_ipv6_bytes
     * @return $this
     */
    public function setPlanIpv6Bytes($plan_ipv6_bytes)
    {
        $this->container['plan_ipv6_bytes'] = $plan_ipv6_bytes;

        return $this;
    }

    /**
     * Gets state
     * @return \Upcloud\ApiClient\Model\ServerState
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     * @param \Upcloud\ApiClient\Model\ServerState $state
     * @return $this
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets storage_devices
     * @return \Upcloud\ApiClient\Model\ServerStorageDevices
     */
    public function getStorageDevices()
    {
        return $this->container['storage_devices'];
    }

    /**
     * Sets storage_devices
     * @param \Upcloud\ApiClient\Model\ServerStorageDevices $storage_devices
     * @return $this
     */
    public function setStorageDevices($storage_devices)
    {
        $this->container['storage_devices'] = $storage_devices;

        return $this;
    }

    /**
     * Gets tags
     * @return \Upcloud\ApiClient\Model\ServerTags
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     * @param \Upcloud\ApiClient\Model\ServerTags $tags
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets timezone
     * @return string
     */
    public function getTimezone()
    {
        return $this->container['timezone'];
    }

    /**
     * Sets timezone
     * @param string $timezone A timezone identifier, e.g. Europe/Helsinki. See Timezones.
     * @return $this
     */
    public function setTimezone($timezone)
    {
        $this->container['timezone'] = $timezone;

        return $this;
    }

    /**
     * Gets title
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     * @param string $title A short description.
     * @return $this
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets uuid
     * @return string
     */
    public function getUuid()
    {
        return $this->container['uuid'];
    }

    /**
     * Sets uuid
     * @param string $uuid
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->container['uuid'] = $uuid;

        return $this;
    }

    /**
     * Gets video_model
     * @return string
     */
    public function getVideoModel()
    {
        return $this->container['video_model'];
    }

    /**
     * Sets video_model
     * @param string $video_model The model of the server's video interface.
     * @return $this
     */
    public function setVideoModel($video_model)
    {
        $allowed_values = $this->getVideoModelAllowableValues();
        if (!is_null($video_model) && !in_array($video_model, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'video_model', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['video_model'] = $video_model;

        return $this;
    }

    /**
     * Gets remote_access_type
     * @return string
     */
    public function getRemoteAccessType()
    {
        return $this->container['remote_access_type'];
    }

    /**
     * Sets remote_access_type
     * @param string $remote_access_type
     * @return $this
     */
    public function setRemoteAccessType($remote_access_type)
    {
        $allowed_values = $this->getRemoteAccessTypeAllowableValues();
        if (!is_null($remote_access_type) && !in_array($remote_access_type, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'remote_access_type', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['remote_access_type'] = $remote_access_type;

        return $this;
    }

    /**
     * Gets remote_access_enabled
     * @return string
     */
    public function getRemoteAccessEnabled()
    {
        return $this->container['remote_access_enabled'];
    }

    /**
     * Sets remote_access_enabled
     * @param string $remote_access_enabled
     * @return $this
     */
    public function setRemoteAccessEnabled($remote_access_enabled)
    {
        $allowed_values = $this->getRemoteAccessEnabledValues();
        if (!is_null($remote_access_enabled) && !in_array($remote_access_enabled, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'remote_access_enabled', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['remote_access_enabled'] = $remote_access_enabled;

        return $this;
    }

    /**
     * Gets remote_access_password
     * @return string
     */
    public function getRemoteAccessPassword()
    {
        return $this->container['remote_access_password'];
    }

    /**
     * Sets remote_access_password
     * @param string $remote_access_password
     * @return $this
     */
    public function setRemoteAccessPassword($remote_access_password)
    {
        $this->container['remote_access_password'] = $remote_access_password;

        return $this;
    }

    /**
     * Gets simple_backup
     * @return string
     */
    public function getSimpleBackup()
    {
        return $this->container['simple_backup'];
    }

    /**
     * Sets simple_backup
     * @param string $simple_backup
     * @return $this
     */
    public function setSimpleBackup($simple_backup)
    {
        $this->container['simple_backup'] = $simple_backup;

        return $this;
    }

    /**
     * Gets zone
     * @return string
     */
    public function getZone()
    {
        return $this->container['zone'];
    }

    /**
     * Sets zone
     * @param string $zone
     * @return $this
     */
    public function setZone($zone)
    {
        $this->container['zone'] = $zone;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Upcloud\ApiClient\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Upcloud\ApiClient\ObjectSerializer::sanitizeForSerialization($this));
    }
}



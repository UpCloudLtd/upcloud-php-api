<?php
/**
 * PriceZone
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
 * PriceZone Class Doc Comment
 *
 * @category    Class
 * @package     Upcloud\ApiClient
 */
class PriceZone implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'PriceZone';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'firewall' => '\Upcloud\ApiClient\Model\Price',
        'io_request_backup' => '\Upcloud\ApiClient\Model\Price',
        'io_request_hdd' => '\Upcloud\ApiClient\Model\Price',
        'io_request_maxiops' => '\Upcloud\ApiClient\Model\Price',
        'ipv4_address' => '\Upcloud\ApiClient\Model\Price',
        'ipv6_address' => '\Upcloud\ApiClient\Model\Price',
        'public_ipv4_bandwidth_in' => '\Upcloud\ApiClient\Model\Price',
        'public_ipv4_bandwidth_out' => '\Upcloud\ApiClient\Model\Price',
        'public_ipv6_bandwidth_in' => '\Upcloud\ApiClient\Model\Price',
        'public_ipv6_bandwidth_out' => '\Upcloud\ApiClient\Model\Price',
        'server_core' => '\Upcloud\ApiClient\Model\Price',
        'server_memory' => '\Upcloud\ApiClient\Model\Price',
        'storage_backup' => '\Upcloud\ApiClient\Model\Price',
        'storage_hdd' => '\Upcloud\ApiClient\Model\Price',
        'storage_maxiops' => '\Upcloud\ApiClient\Model\Price',
        'server_plan_1x_cpu_1_gb' => '\Upcloud\ApiClient\Model\Price',
        'server_plan_2x_cpu_2_gb' => '\Upcloud\ApiClient\Model\Price'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'firewall' => null,
        'io_request_backup' => null,
        'io_request_hdd' => null,
        'io_request_maxiops' => null,
        'ipv4_address' => null,
        'ipv6_address' => null,
        'public_ipv4_bandwidth_in' => null,
        'public_ipv4_bandwidth_out' => null,
        'public_ipv6_bandwidth_in' => null,
        'public_ipv6_bandwidth_out' => null,
        'server_core' => null,
        'server_memory' => null,
        'storage_backup' => null,
        'storage_hdd' => null,
        'storage_maxiops' => null,
        'server_plan_1x_cpu_1_gb' => null,
        'server_plan_2x_cpu_2_gb' => null
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
        'name' => 'name',
        'firewall' => 'firewall',
        'io_request_backup' => 'io_request_backup',
        'io_request_hdd' => 'io_request_hdd',
        'io_request_maxiops' => 'io_request_maxiops',
        'ipv4_address' => 'ipv4_address',
        'ipv6_address' => 'ipv6_address',
        'public_ipv4_bandwidth_in' => 'public_ipv4_bandwidth_in',
        'public_ipv4_bandwidth_out' => 'public_ipv4_bandwidth_out',
        'public_ipv6_bandwidth_in' => 'public_ipv6_bandwidth_in',
        'public_ipv6_bandwidth_out' => 'public_ipv6_bandwidth_out',
        'server_core' => 'server_core',
        'server_memory' => 'server_memory',
        'storage_backup' => 'storage_backup',
        'storage_hdd' => 'storage_hdd',
        'storage_maxiops' => 'storage_maxiops',
        'server_plan_1x_cpu_1_gb' => 'server_plan_1xCPU-1GB',
        'server_plan_2x_cpu_2_gb' => 'server_plan_2xCPU-2GB'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'firewall' => 'setFirewall',
        'io_request_backup' => 'setIoRequestBackup',
        'io_request_hdd' => 'setIoRequestHdd',
        'io_request_maxiops' => 'setIoRequestMaxiops',
        'ipv4_address' => 'setIpv4Address',
        'ipv6_address' => 'setIpv6Address',
        'public_ipv4_bandwidth_in' => 'setPublicIpv4BandwidthIn',
        'public_ipv4_bandwidth_out' => 'setPublicIpv4BandwidthOut',
        'public_ipv6_bandwidth_in' => 'setPublicIpv6BandwidthIn',
        'public_ipv6_bandwidth_out' => 'setPublicIpv6BandwidthOut',
        'server_core' => 'setServerCore',
        'server_memory' => 'setServerMemory',
        'storage_backup' => 'setStorageBackup',
        'storage_hdd' => 'setStorageHdd',
        'storage_maxiops' => 'setStorageMaxiops',
        'server_plan_1x_cpu_1_gb' => 'setServerPlan1xCpu1Gb',
        'server_plan_2x_cpu_2_gb' => 'setServerPlan2xCpu2Gb'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'firewall' => 'getFirewall',
        'io_request_backup' => 'getIoRequestBackup',
        'io_request_hdd' => 'getIoRequestHdd',
        'io_request_maxiops' => 'getIoRequestMaxiops',
        'ipv4_address' => 'getIpv4Address',
        'ipv6_address' => 'getIpv6Address',
        'public_ipv4_bandwidth_in' => 'getPublicIpv4BandwidthIn',
        'public_ipv4_bandwidth_out' => 'getPublicIpv4BandwidthOut',
        'public_ipv6_bandwidth_in' => 'getPublicIpv6BandwidthIn',
        'public_ipv6_bandwidth_out' => 'getPublicIpv6BandwidthOut',
        'server_core' => 'getServerCore',
        'server_memory' => 'getServerMemory',
        'storage_backup' => 'getStorageBackup',
        'storage_hdd' => 'getStorageHdd',
        'storage_maxiops' => 'getStorageMaxiops',
        'server_plan_1x_cpu_1_gb' => 'getServerPlan1xCpu1Gb',
        'server_plan_2x_cpu_2_gb' => 'getServerPlan2xCpu2Gb'
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['firewall'] = isset($data['firewall']) ? $data['firewall'] : null;
        $this->container['io_request_backup'] = isset($data['io_request_backup']) ? $data['io_request_backup'] : null;
        $this->container['io_request_hdd'] = isset($data['io_request_hdd']) ? $data['io_request_hdd'] : null;
        $this->container['io_request_maxiops'] = isset($data['io_request_maxiops']) ? $data['io_request_maxiops'] : null;
        $this->container['ipv4_address'] = isset($data['ipv4_address']) ? $data['ipv4_address'] : null;
        $this->container['ipv6_address'] = isset($data['ipv6_address']) ? $data['ipv6_address'] : null;
        $this->container['public_ipv4_bandwidth_in'] = isset($data['public_ipv4_bandwidth_in']) ? $data['public_ipv4_bandwidth_in'] : null;
        $this->container['public_ipv4_bandwidth_out'] = isset($data['public_ipv4_bandwidth_out']) ? $data['public_ipv4_bandwidth_out'] : null;
        $this->container['public_ipv6_bandwidth_in'] = isset($data['public_ipv6_bandwidth_in']) ? $data['public_ipv6_bandwidth_in'] : null;
        $this->container['public_ipv6_bandwidth_out'] = isset($data['public_ipv6_bandwidth_out']) ? $data['public_ipv6_bandwidth_out'] : null;
        $this->container['server_core'] = isset($data['server_core']) ? $data['server_core'] : null;
        $this->container['server_memory'] = isset($data['server_memory']) ? $data['server_memory'] : null;
        $this->container['storage_backup'] = isset($data['storage_backup']) ? $data['storage_backup'] : null;
        $this->container['storage_hdd'] = isset($data['storage_hdd']) ? $data['storage_hdd'] : null;
        $this->container['storage_maxiops'] = isset($data['storage_maxiops']) ? $data['storage_maxiops'] : null;
        $this->container['server_plan_1x_cpu_1_gb'] = isset($data['server_plan_1x_cpu_1_gb']) ? $data['server_plan_1x_cpu_1_gb'] : null;
        $this->container['server_plan_2x_cpu_2_gb'] = isset($data['server_plan_2x_cpu_2_gb']) ? $data['server_plan_2x_cpu_2_gb'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

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

        return true;
    }


    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets firewall
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getFirewall()
    {
        return $this->container['firewall'];
    }

    /**
     * Sets firewall
     * @param \Upcloud\ApiClient\Model\Price $firewall
     * @return $this
     */
    public function setFirewall($firewall)
    {
        $this->container['firewall'] = $firewall;

        return $this;
    }

    /**
     * Gets io_request_backup
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getIoRequestBackup()
    {
        return $this->container['io_request_backup'];
    }

    /**
     * Sets io_request_backup
     * @param \Upcloud\ApiClient\Model\Price $io_request_backup
     * @return $this
     */
    public function setIoRequestBackup($io_request_backup)
    {
        $this->container['io_request_backup'] = $io_request_backup;

        return $this;
    }

    /**
     * Gets io_request_hdd
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getIoRequestHdd()
    {
        return $this->container['io_request_hdd'];
    }

    /**
     * Sets io_request_hdd
     * @param \Upcloud\ApiClient\Model\Price $io_request_hdd
     * @return $this
     */
    public function setIoRequestHdd($io_request_hdd)
    {
        $this->container['io_request_hdd'] = $io_request_hdd;

        return $this;
    }

    /**
     * Gets io_request_maxiops
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getIoRequestMaxiops()
    {
        return $this->container['io_request_maxiops'];
    }

    /**
     * Sets io_request_maxiops
     * @param \Upcloud\ApiClient\Model\Price $io_request_maxiops
     * @return $this
     */
    public function setIoRequestMaxiops($io_request_maxiops)
    {
        $this->container['io_request_maxiops'] = $io_request_maxiops;

        return $this;
    }

    /**
     * Gets ipv4_address
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getIpv4Address()
    {
        return $this->container['ipv4_address'];
    }

    /**
     * Sets ipv4_address
     * @param \Upcloud\ApiClient\Model\Price $ipv4_address
     * @return $this
     */
    public function setIpv4Address($ipv4_address)
    {
        $this->container['ipv4_address'] = $ipv4_address;

        return $this;
    }

    /**
     * Gets ipv6_address
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getIpv6Address()
    {
        return $this->container['ipv6_address'];
    }

    /**
     * Sets ipv6_address
     * @param \Upcloud\ApiClient\Model\Price $ipv6_address
     * @return $this
     */
    public function setIpv6Address($ipv6_address)
    {
        $this->container['ipv6_address'] = $ipv6_address;

        return $this;
    }

    /**
     * Gets public_ipv4_bandwidth_in
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getPublicIpv4BandwidthIn()
    {
        return $this->container['public_ipv4_bandwidth_in'];
    }

    /**
     * Sets public_ipv4_bandwidth_in
     * @param \Upcloud\ApiClient\Model\Price $public_ipv4_bandwidth_in
     * @return $this
     */
    public function setPublicIpv4BandwidthIn($public_ipv4_bandwidth_in)
    {
        $this->container['public_ipv4_bandwidth_in'] = $public_ipv4_bandwidth_in;

        return $this;
    }

    /**
     * Gets public_ipv4_bandwidth_out
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getPublicIpv4BandwidthOut()
    {
        return $this->container['public_ipv4_bandwidth_out'];
    }

    /**
     * Sets public_ipv4_bandwidth_out
     * @param \Upcloud\ApiClient\Model\Price $public_ipv4_bandwidth_out
     * @return $this
     */
    public function setPublicIpv4BandwidthOut($public_ipv4_bandwidth_out)
    {
        $this->container['public_ipv4_bandwidth_out'] = $public_ipv4_bandwidth_out;

        return $this;
    }

    /**
     * Gets public_ipv6_bandwidth_in
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getPublicIpv6BandwidthIn()
    {
        return $this->container['public_ipv6_bandwidth_in'];
    }

    /**
     * Sets public_ipv6_bandwidth_in
     * @param \Upcloud\ApiClient\Model\Price $public_ipv6_bandwidth_in
     * @return $this
     */
    public function setPublicIpv6BandwidthIn($public_ipv6_bandwidth_in)
    {
        $this->container['public_ipv6_bandwidth_in'] = $public_ipv6_bandwidth_in;

        return $this;
    }

    /**
     * Gets public_ipv6_bandwidth_out
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getPublicIpv6BandwidthOut()
    {
        return $this->container['public_ipv6_bandwidth_out'];
    }

    /**
     * Sets public_ipv6_bandwidth_out
     * @param \Upcloud\ApiClient\Model\Price $public_ipv6_bandwidth_out
     * @return $this
     */
    public function setPublicIpv6BandwidthOut($public_ipv6_bandwidth_out)
    {
        $this->container['public_ipv6_bandwidth_out'] = $public_ipv6_bandwidth_out;

        return $this;
    }

    /**
     * Gets server_core
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getServerCore()
    {
        return $this->container['server_core'];
    }

    /**
     * Sets server_core
     * @param \Upcloud\ApiClient\Model\Price $server_core
     * @return $this
     */
    public function setServerCore($server_core)
    {
        $this->container['server_core'] = $server_core;

        return $this;
    }

    /**
     * Gets server_memory
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getServerMemory()
    {
        return $this->container['server_memory'];
    }

    /**
     * Sets server_memory
     * @param \Upcloud\ApiClient\Model\Price $server_memory
     * @return $this
     */
    public function setServerMemory($server_memory)
    {
        $this->container['server_memory'] = $server_memory;

        return $this;
    }

    /**
     * Gets storage_backup
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getStorageBackup()
    {
        return $this->container['storage_backup'];
    }

    /**
     * Sets storage_backup
     * @param \Upcloud\ApiClient\Model\Price $storage_backup
     * @return $this
     */
    public function setStorageBackup($storage_backup)
    {
        $this->container['storage_backup'] = $storage_backup;

        return $this;
    }

    /**
     * Gets storage_hdd
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getStorageHdd()
    {
        return $this->container['storage_hdd'];
    }

    /**
     * Sets storage_hdd
     * @param \Upcloud\ApiClient\Model\Price $storage_hdd
     * @return $this
     */
    public function setStorageHdd($storage_hdd)
    {
        $this->container['storage_hdd'] = $storage_hdd;

        return $this;
    }

    /**
     * Gets storage_maxiops
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getStorageMaxiops()
    {
        return $this->container['storage_maxiops'];
    }

    /**
     * Sets storage_maxiops
     * @param \Upcloud\ApiClient\Model\Price $storage_maxiops
     * @return $this
     */
    public function setStorageMaxiops($storage_maxiops)
    {
        $this->container['storage_maxiops'] = $storage_maxiops;

        return $this;
    }

    /**
     * Gets server_plan_1x_cpu_1_gb
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getServerPlan1xCpu1Gb()
    {
        return $this->container['server_plan_1x_cpu_1_gb'];
    }

    /**
     * Sets server_plan_1x_cpu_1_gb
     * @param \Upcloud\ApiClient\Model\Price $server_plan_1x_cpu_1_gb
     * @return $this
     */
    public function setServerPlan1xCpu1Gb($server_plan_1x_cpu_1_gb)
    {
        $this->container['server_plan_1x_cpu_1_gb'] = $server_plan_1x_cpu_1_gb;

        return $this;
    }

    /**
     * Gets server_plan_2x_cpu_2_gb
     * @return \Upcloud\ApiClient\Model\Price
     */
    public function getServerPlan2xCpu2Gb()
    {
        return $this->container['server_plan_2x_cpu_2_gb'];
    }

    /**
     * Sets server_plan_2x_cpu_2_gb
     * @param \Upcloud\ApiClient\Model\Price $server_plan_2x_cpu_2_gb
     * @return $this
     */
    public function setServerPlan2xCpu2Gb($server_plan_2x_cpu_2_gb)
    {
        $this->container['server_plan_2x_cpu_2_gb'] = $server_plan_2x_cpu_2_gb;

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



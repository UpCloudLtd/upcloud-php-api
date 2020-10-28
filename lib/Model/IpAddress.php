<?php
/**
 * IpAddress
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
 * IpAddress Class Doc Comment
 *
 * @category    Class
 * @description The UpCloud network has public and private IP addresses.
 * @package     Upcloud\ApiClient
 */
class IpAddress implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Ip address';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'access' => 'string',
        'address' => 'string',
        'family' => 'string',
        'ptr_record' => 'string',
        'server' => 'string',
        'part_of_plan' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'access' => null,
        'address' => null,
        'family' => null,
        'ptr_record' => null,
        'server' => 'uuid',
        'part_of_plan' => null
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
        'access' => 'access',
        'address' => 'address',
        'family' => 'family',
        'ptr_record' => 'ptr_record',
        'server' => 'server',
        'part_of_plan' => 'part_of_plan'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'access' => 'setAccess',
        'address' => 'setAddress',
        'family' => 'setFamily',
        'ptr_record' => 'setPtrRecord',
        'server' => 'setServer',
        'part_of_plan' => 'setPartOfPlan'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'access' => 'getAccess',
        'address' => 'getAddress',
        'family' => 'getFamily',
        'ptr_record' => 'getPtrRecord',
        'server' => 'getServer',
        'part_of_plan' => 'getPartOfPlan'
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

    const ACCESS__PUBLIC = 'public';
    const ACCESS__PRIVATE = 'private';
    const ACCESS__UTILITY = 'utility';
    const FAMILY_I_PV4 = 'IPv4';
    const FAMILY_I_PV6 = 'IPv6';
    const PART_OF_PLAN_YES = 'yes';
    const PART_OF_PLAN_NO = 'no';



    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getAccessAllowableValues()
    {
        return [
            self::ACCESS__PUBLIC,
            self::ACCESS__PRIVATE,
            self::ACCESS__UTILITY,
        ];
    }

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getFamilyAllowableValues()
    {
        return [
            self::FAMILY_I_PV4,
            self::FAMILY_I_PV6,
        ];
    }

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getPartOfPlanAllowableValues()
    {
        return [
            self::PART_OF_PLAN_YES,
            self::PART_OF_PLAN_NO,
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
        $this->container['access'] = isset($data['access']) ? $data['access'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['family'] = isset($data['family']) ? $data['family'] : null;
        $this->container['ptr_record'] = isset($data['ptr_record']) ? $data['ptr_record'] : null;
        $this->container['server'] = isset($data['server']) ? $data['server'] : null;
        $this->container['part_of_plan'] = isset($data['part_of_plan']) ? $data['part_of_plan'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        $allowed_values = $this->getAccessAllowableValues();
        if (!in_array($this->container['access'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'access', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        $allowed_values = $this->getFamilyAllowableValues();
        if (!in_array($this->container['family'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'family', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        $allowed_values = $this->getPartOfPlanAllowableValues();
        if (!in_array($this->container['part_of_plan'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'part_of_plan', must be one of '%s'",
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

        $allowed_values = $this->getAccessAllowableValues();
        if (!in_array($this->container['access'], $allowed_values)) {
            return false;
        }
        $allowed_values = $this->getFamilyAllowableValues();
        if (!in_array($this->container['family'], $allowed_values)) {
            return false;
        }
        $allowed_values = $this->getPartOfPlanAllowableValues();
        if (!in_array($this->container['part_of_plan'], $allowed_values)) {
            return false;
        }
        return true;
    }


    /**
     * Gets access
     * @return string
     */
    public function getAccess()
    {
        return $this->container['access'];
    }

    /**
     * Sets access
     * @param string $access Is address for private or public network.
     * @return $this
     */
    public function setAccess($access)
    {
        $allowed_values = $this->getAccessAllowableValues();
        if (!is_null($access) && !in_array($access, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'access', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['access'] = $access;

        return $this;
    }

    /**
     * Gets address
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets family
     * @return string
     */
    public function getFamily()
    {
        return $this->container['family'];
    }

    /**
     * Sets family
     * @param string $family The address family of new IP address.
     * @return $this
     */
    public function setFamily($family)
    {
        $allowed_values = $this->getFamilyAllowableValues();
        if (!is_null($family) && !in_array($family, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'family', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['family'] = $family;

        return $this;
    }

    /**
     * Gets ptr_record
     * @return string
     */
    public function getPtrRecord()
    {
        return $this->container['ptr_record'];
    }

    /**
     * Sets ptr_record
     * @param string $ptr_record
     * @return $this
     */
    public function setPtrRecord($ptr_record)
    {
        $this->container['ptr_record'] = $ptr_record;

        return $this;
    }

    /**
     * Gets server
     * @return string
     */
    public function getServer()
    {
        return $this->container['server'];
    }

    /**
     * Sets server
     * @param string $server
     * @return $this
     */
    public function setServer($server)
    {
        $this->container['server'] = $server;

        return $this;
    }

    /**
     * Gets part_of_plan
     * @return string
     */
    public function getPartOfPlan()
    {
        return $this->container['part_of_plan'];
    }

    /**
     * Sets part_of_plan
     * @param string $part_of_plan
     * @return $this
     */
    public function setPartOfPlan($part_of_plan)
    {
        $allowed_values = $this->getPartOfPlanAllowableValues();
        if (!is_null($part_of_plan) && !in_array($part_of_plan, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'part_of_plan', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['part_of_plan'] = $part_of_plan;

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



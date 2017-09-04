<?php
/**
 * BackupRule
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 */

/**
 * Upcloud api
 *
 * The UpCloud API consists of operations used to control resources on UpCloud. The API is a web service interface. HTTPS is used to connect to the API. The API follows the principles of a RESTful web service wherever possible. The base URL for all API operations is  https://api.upcloud.com/. All API operations require authentication.
 *
 * OpenAPI spec version: 1.2.0
 * 
 */


namespace Swagger\Client\Model;

use \ArrayAccess;

/**
 * BackupRule Class Doc Comment
 *
 * @category    Class
 * @description The backup_rule block defines when the storage device is backed up automatically.
 * @package     Swagger\Client
 */
class BackupRule implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'BackupRule';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'interval' => 'string',
        'retention' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'interval' => null,
        'retention' => null
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
        'interval' => 'interval',
        'retention' => 'retention'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'interval' => 'setInterval',
        'retention' => 'setRetention'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'interval' => 'getInterval',
        'retention' => 'getRetention'
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

    const INTERVAL_DAILY = 'daily';
    const INTERVAL_MON = 'mon';
    const INTERVAL_TUE = 'tue';
    const INTERVAL_WED = 'wed';
    const INTERVAL_THU = 'thu';
    const INTERVAL_FRI = 'fri';
    const INTERVAL_SAT = 'sat';
    const INTERVAL_SUN = 'sun';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getIntervalAllowableValues()
    {
        return [
            self::INTERVAL_DAILY,
            self::INTERVAL_MON,
            self::INTERVAL_TUE,
            self::INTERVAL_WED,
            self::INTERVAL_THU,
            self::INTERVAL_FRI,
            self::INTERVAL_SAT,
            self::INTERVAL_SUN,
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
        $this->container['interval'] = isset($data['interval']) ? $data['interval'] : null;
        $this->container['retention'] = isset($data['retention']) ? $data['retention'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        $allowed_values = $this->getIntervalAllowableValues();
        if (!in_array($this->container['interval'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'interval', must be one of '%s'",
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

        $allowed_values = $this->getIntervalAllowableValues();
        if (!in_array($this->container['interval'], $allowed_values)) {
            return false;
        }
        return true;
    }


    /**
     * Gets interval
     * @return string
     */
    public function getInterval()
    {
        return $this->container['interval'];
    }

    /**
     * Sets interval
     * @param string $interval
     * @return $this
     */
    public function setInterval($interval)
    {
        $allowed_values = $this->getIntervalAllowableValues();
        if (!is_null($interval) && !in_array($interval, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'interval', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['interval'] = $interval;

        return $this;
    }

    /**
     * Gets retention
     * @return float
     */
    public function getRetention()
    {
        return $this->container['retention'];
    }

    /**
     * Sets retention
     * @param float $retention
     * @return $this
     */
    public function setRetention($retention)
    {
        $this->container['retention'] = $retention;

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
            return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}



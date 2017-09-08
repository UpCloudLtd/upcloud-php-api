<?php
/**
 * Storage
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
 * Storage Class Doc Comment
 *
 * @category    Class
 * @package     Upcloud\ApiClient
 */
class Storage implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'storage';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'size' => 'float',
        'tier' => '\Upcloud\ApiClient\Model\StorageTier',
        'title' => 'string',
        'zone' => 'string',
        'backup_rule' => '\Upcloud\ApiClient\Model\BackupRule'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'size' => null,
        'tier' => null,
        'title' => null,
        'zone' => null,
        'backup_rule' => null
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
        'size' => 'size',
        'tier' => 'tier',
        'title' => 'title',
        'zone' => 'zone',
        'backup_rule' => 'backup_rule'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'size' => 'setSize',
        'tier' => 'setTier',
        'title' => 'setTitle',
        'zone' => 'setZone',
        'backup_rule' => 'setBackupRule'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'size' => 'getSize',
        'tier' => 'getTier',
        'title' => 'getTitle',
        'zone' => 'getZone',
        'backup_rule' => 'getBackupRule'
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
        $this->container['size'] = isset($data['size']) ? $data['size'] : null;
        $this->container['tier'] = isset($data['tier']) ? $data['tier'] : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
        $this->container['zone'] = isset($data['zone']) ? $data['zone'] : 'The zone in which the storage will be created, e.g. fi-hel1. See Zones.';
        $this->container['backup_rule'] = isset($data['backup_rule']) ? $data['backup_rule'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if (!is_null($this->container['size']) && ($this->container['size'] > 1024)) {
            $invalid_properties[] = "invalid value for 'size', must be smaller than or equal to 1024.";
        }

        if (!is_null($this->container['size']) && ($this->container['size'] < 10)) {
            $invalid_properties[] = "invalid value for 'size', must be bigger than or equal to 10.";
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

        if ($this->container['size'] > 1024) {
            return false;
        }
        if ($this->container['size'] < 10) {
            return false;
        }
        return true;
    }


    /**
     * Gets size
     * @return float
     */
    public function getSize()
    {
        return $this->container['size'];
    }

    /**
     * Sets size
     * @param float $size The size of the storage in gigabytes.
     * @return $this
     */
    public function setSize($size)
    {

        if (!is_null($size) && ($size > 1024)) {
            throw new \InvalidArgumentException('invalid value for $size when calling Storage., must be smaller than or equal to 1024.');
        }
        if (!is_null($size) && ($size < 10)) {
            throw new \InvalidArgumentException('invalid value for $size when calling Storage., must be bigger than or equal to 10.');
        }

        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets tier
     * @return \Upcloud\ApiClient\Model\StorageTier
     */
    public function getTier()
    {
        return $this->container['tier'];
    }

    /**
     * Sets tier
     * @param \Upcloud\ApiClient\Model\StorageTier $tier
     * @return $this
     */
    public function setTier($tier)
    {
        $this->container['tier'] = $tier;

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
     * Gets backup_rule
     * @return \Upcloud\ApiClient\Model\BackupRule
     */
    public function getBackupRule()
    {
        return $this->container['backup_rule'];
    }

    /**
     * Sets backup_rule
     * @param \Upcloud\ApiClient\Model\BackupRule $backup_rule
     * @return $this
     */
    public function setBackupRule($backup_rule)
    {
        $this->container['backup_rule'] = $backup_rule;

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



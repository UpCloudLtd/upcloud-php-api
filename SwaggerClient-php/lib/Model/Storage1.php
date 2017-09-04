<?php
/**
 * Storage1
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
 * Storage1 Class Doc Comment
 *
 * @category    Class
 * @package     Swagger\Client
 */
class Storage1 implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'storage_1';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'backup_rule' => '\Swagger\Client\Model\BackupRule',
        'size' => 'float',
        'title' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'backup_rule' => null,
        'size' => null,
        'title' => null
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
        'backup_rule' => 'backup_rule',
        'size' => 'size',
        'title' => 'title'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'backup_rule' => 'setBackupRule',
        'size' => 'setSize',
        'title' => 'setTitle'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'backup_rule' => 'getBackupRule',
        'size' => 'getSize',
        'title' => 'getTitle'
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
        $this->container['backup_rule'] = isset($data['backup_rule']) ? $data['backup_rule'] : null;
        $this->container['size'] = isset($data['size']) ? $data['size'] : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
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

        if (!is_null($this->container['title']) && (strlen($this->container['title']) > 64)) {
            $invalid_properties[] = "invalid value for 'title', the character length must be smaller than or equal to 64.";
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
        if (strlen($this->container['title']) > 64) {
            return false;
        }
        return true;
    }


    /**
     * Gets backup_rule
     * @return \Swagger\Client\Model\BackupRule
     */
    public function getBackupRule()
    {
        return $this->container['backup_rule'];
    }

    /**
     * Sets backup_rule
     * @param \Swagger\Client\Model\BackupRule $backup_rule
     * @return $this
     */
    public function setBackupRule($backup_rule)
    {
        $this->container['backup_rule'] = $backup_rule;

        return $this;
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
     * @param float $size
     * @return $this
     */
    public function setSize($size)
    {

        if (!is_null($size) && ($size > 1024)) {
            throw new \InvalidArgumentException('invalid value for $size when calling Storage1., must be smaller than or equal to 1024.');
        }
        if (!is_null($size) && ($size < 10)) {
            throw new \InvalidArgumentException('invalid value for $size when calling Storage1., must be bigger than or equal to 10.');
        }

        $this->container['size'] = $size;

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
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        if (!is_null($title) && (strlen($title) > 64)) {
            throw new \InvalidArgumentException('invalid length for $title when calling Storage1., must be smaller than or equal to 64.');
        }

        $this->container['title'] = $title;

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



<?php
/**
 * ServerLoginUser
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
 * ServerLoginUser Class Doc Comment
 *
 * @category    Class
 * @package     Upcloud\ApiClient
 */
class ServerLoginUser implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Login_user';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'create_password' => 'string',
        'username' => 'string',
        'ssh_keys' => '\Upcloud\ApiClient\Model\SshKeys'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'create_password' => null,
        'username' => null,
        'ssh_keys' => null
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
        'create_password' => 'create_password',
        'username' => 'username',
        'ssh_keys' => 'ssh_keys'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'create_password' => 'setCreatePassword',
        'username' => 'setUsername',
        'ssh_keys' => 'setSshKeys'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'create_password' => 'getCreatePassword',
        'username' => 'getUsername',
        'ssh_keys' => 'getSshKeys'
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

    const CREATE_PASSWORD_YES = 'yes';
    const CREATE_PASSWORD_NO = 'no';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getCreatePasswordAllowableValues()
    {
        return [
            self::CREATE_PASSWORD_YES,
            self::CREATE_PASSWORD_NO,
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
        $this->container['create_password'] = isset($data['create_password']) ? $data['create_password'] : null;
        $this->container['username'] = isset($data['username']) ? $data['username'] : null;
        $this->container['ssh_keys'] = isset($data['ssh_keys']) ? $data['ssh_keys'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        $allowed_values = $this->getCreatePasswordAllowableValues();
        if (!in_array($this->container['create_password'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'create_password', must be one of '%s'",
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
        $allowed_values = $this->getCreatePasswordAllowableValues();
        if (!in_array($this->container['create_password'], $allowed_values)) {
            return false;
        }

        return true;
    }


    /**
     * Gets create password
     * @return string
     */
    public function getCreatePassword()
    {
        return $this->container['create_password'];
    }

    /**
     * Sets create password
     * @param string $create_password
     * @return $this
     */
    public function setCreatePassword($create_password)
    {
        $this->container['create_password'] = $create_password;

        return $this;
    }

    /**
     * Gets username
     * @return string
     */
    public function getUsername()
    {
        return $this->container['username'];
    }

    /**
     * Sets username
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->container['username'] = $username;

        return $this;
    }

    /**
     * Gets ssh keys
     * @return \Upcloud\ApiClient\Model\SshKeys
     */
    public function getSshKeys()
    {
        return $this->container['ssh_keys'];
    }

    /**
     * Sets ssh keys
     * @param \Upcloud\ApiClient\Model\SshKeys $ssh_keys
     * @return $this
     */
    public function setSshKeys($ssh_keys)
    {
        $this->container['ssh_keys'] = $ssh_keys;

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



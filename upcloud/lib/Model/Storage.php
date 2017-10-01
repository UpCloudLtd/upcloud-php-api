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
    protected static $swaggerModelName = 'Storage';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'access' => '\Upcloud\ApiClient\Model\StorageAccessType',
        'backup_rule' => '\Upcloud\ApiClient\Model\BackupRule',
        'backups' => '\Upcloud\ApiClient\Model\StorageBackups',
        'license' => 'float',
        'servers' => '\Upcloud\ApiClient\Model\StorageServers',
        'size' => 'float',
        'state' => '\Upcloud\ApiClient\Model\StorageState',
        'tier' => '\Upcloud\ApiClient\Model\StorageTier',
        'title' => 'string',
        'type' => '\Upcloud\ApiClient\Model\StorageType',
        'uuid' => 'string',
        'zone' => 'string',
        'origin' => 'string',
        'created' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'access' => null,
        'backup_rule' => null,
        'backups' => null,
        'license' => null,
        'servers' => null,
        'size' => null,
        'state' => null,
        'tier' => null,
        'title' => null,
        'type' => null,
        'uuid' => 'uuid',
        'zone' => null,
        'origin' => 'uuid',
        'created' => 'datetime'
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
        'backup_rule' => 'backup_rule',
        'backups' => 'backups',
        'license' => 'license',
        'servers' => 'servers',
        'size' => 'size',
        'state' => 'state',
        'tier' => 'tier',
        'title' => 'title',
        'type' => 'type',
        'uuid' => 'uuid',
        'zone' => 'zone',
        'origin' => 'origin',
        'created' => 'created'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'access' => 'setAccess',
        'backup_rule' => 'setBackupRule',
        'backups' => 'setBackups',
        'license' => 'setLicense',
        'servers' => 'setServers',
        'size' => 'setSize',
        'state' => 'setState',
        'tier' => 'setTier',
        'title' => 'setTitle',
        'type' => 'setType',
        'uuid' => 'setUuid',
        'zone' => 'setZone',
        'origin' => 'setOrigin',
        'created' => 'setCreated'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'access' => 'getAccess',
        'backup_rule' => 'getBackupRule',
        'backups' => 'getBackups',
        'license' => 'getLicense',
        'servers' => 'getServers',
        'size' => 'getSize',
        'state' => 'getState',
        'tier' => 'getTier',
        'title' => 'getTitle',
        'type' => 'getType',
        'uuid' => 'getUuid',
        'zone' => 'getZone',
        'origin' => 'getOrigin',
        'created' => 'getCreated'
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
        $this->container['access'] = isset($data['access']) ? $data['access'] : null;
        $this->container['backup_rule'] = isset($data['backup_rule']) ? $data['backup_rule'] : null;
        $this->container['backups'] = isset($data['backups']) ? $data['backups'] : null;
        $this->container['license'] = isset($data['license']) ? $data['license'] : null;
        $this->container['servers'] = isset($data['servers']) ? $data['servers'] : null;
        $this->container['size'] = isset($data['size']) ? $data['size'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['tier'] = isset($data['tier']) ? $data['tier'] : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['uuid'] = isset($data['uuid']) ? $data['uuid'] : null;
        $this->container['zone'] = isset($data['zone']) ? $data['zone'] : null;
        $this->container['origin'] = isset($data['origin']) ? $data['origin'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
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
     * Gets access
     * @return \Upcloud\ApiClient\Model\StorageAccessType
     */
    public function getAccess()
    {
        return $this->container['access'];
    }

    /**
     * Sets access
     * @param \Upcloud\ApiClient\Model\StorageAccessType $access
     * @return $this
     */
    public function setAccess($access)
    {
        $this->container['access'] = $access;

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
     * Gets backups
     * @return \Upcloud\ApiClient\Model\StorageBackups
     */
    public function getBackups()
    {
        return $this->container['backups'];
    }

    /**
     * Sets backups
     * @param \Upcloud\ApiClient\Model\StorageBackups $backups
     * @return $this
     */
    public function setBackups($backups)
    {
        $this->container['backups'] = $backups;

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
     * Gets servers
     * @return \Upcloud\ApiClient\Model\StorageServers
     */
    public function getServers()
    {
        return $this->container['servers'];
    }

    /**
     * Sets servers
     * @param \Upcloud\ApiClient\Model\StorageServers $servers
     * @return $this
     */
    public function setServers($servers)
    {
        $this->container['servers'] = $servers;

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
        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets state
     * @return \Upcloud\ApiClient\Model\StorageState
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     * @param \Upcloud\ApiClient\Model\StorageState $state
     * @return $this
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

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
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets type
     * @return \Upcloud\ApiClient\Model\StorageType
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     * @param \Upcloud\ApiClient\Model\StorageType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

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
     * Gets origin
     * @return string
     */
    public function getOrigin()
    {
        return $this->container['origin'];
    }

    /**
     * Sets origin
     * @param string $origin
     * @return $this
     */
    public function setOrigin($origin)
    {
        $this->container['origin'] = $origin;

        return $this;
    }

    /**
     * Gets created
     * @return string
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

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



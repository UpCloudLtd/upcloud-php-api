<?php
/**
 * FirewallRule
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
 * FirewallRule Class Doc Comment
 *
 * @category    Class
 * @package     Upcloud\ApiClient
 */
class FirewallRule implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'FirewallRule';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'direction' => 'string',
        'action' => 'string',
        'position' => 'float',
        'family' => '\Upcloud\ApiClient\Model\AddressFamily',
        'protocol' => 'string',
        'icmp_type' => 'float',
        'destination_address_start' => 'string',
        'destination_address_end' => 'string',
        'destination_port_start' => 'float',
        'destination_port_end' => 'float',
        'source_address_start' => 'string',
        'source_address_end' => 'string',
        'source_port_start' => 'float',
        'source_port_end' => 'float',
        'comment' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'direction' => null,
        'action' => null,
        'position' => null,
        'family' => null,
        'protocol' => null,
        'icmp_type' => null,
        'destination_address_start' => 'IP',
        'destination_address_end' => 'IP',
        'destination_port_start' => null,
        'destination_port_end' => null,
        'source_address_start' => 'IP',
        'source_address_end' => 'IP',
        'source_port_start' => null,
        'source_port_end' => null,
        'comment' => null
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
        'direction' => 'direction',
        'action' => 'action',
        'position' => 'position',
        'family' => 'family',
        'protocol' => 'protocol',
        'icmp_type' => 'icmp_type',
        'destination_address_start' => 'destination_address_start',
        'destination_address_end' => 'destination_address_end',
        'destination_port_start' => 'destination_port_start',
        'destination_port_end' => 'destination_port_end',
        'source_address_start' => 'source_address_start',
        'source_address_end' => 'source_address_end',
        'source_port_start' => 'source_port_start',
        'source_port_end' => 'source_port_end',
        'comment' => 'comment'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'direction' => 'setDirection',
        'action' => 'setAction',
        'position' => 'setPosition',
        'family' => 'setFamily',
        'protocol' => 'setProtocol',
        'icmp_type' => 'setIcmpType',
        'destination_address_start' => 'setDestinationAddressStart',
        'destination_address_end' => 'setDestinationAddressEnd',
        'destination_port_start' => 'setDestinationPortStart',
        'destination_port_end' => 'setDestinationPortEnd',
        'source_address_start' => 'setSourceAddressStart',
        'source_address_end' => 'setSourceAddressEnd',
        'source_port_start' => 'setSourcePortStart',
        'source_port_end' => 'setSourcePortEnd',
        'comment' => 'setComment'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'direction' => 'getDirection',
        'action' => 'getAction',
        'position' => 'getPosition',
        'family' => 'getFamily',
        'protocol' => 'getProtocol',
        'icmp_type' => 'getIcmpType',
        'destination_address_start' => 'getDestinationAddressStart',
        'destination_address_end' => 'getDestinationAddressEnd',
        'destination_port_start' => 'getDestinationPortStart',
        'destination_port_end' => 'getDestinationPortEnd',
        'source_address_start' => 'getSourceAddressStart',
        'source_address_end' => 'getSourceAddressEnd',
        'source_port_start' => 'getSourcePortStart',
        'source_port_end' => 'getSourcePortEnd',
        'comment' => 'getComment'
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

    const DIRECTION_IN = 'in';
    const DIRECTION_OUT = 'out';
    const ACTION_ACCEPT = 'accept';
    const ACTION_REJECT = 'reject';
    const ACTION_DROP = 'drop';
    const PROTOCOL_TCP = 'tcp';
    const PROTOCOL_UDP = 'udp';
    const PROTOCOL_ICMP = 'icmp';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getDirectionAllowableValues()
    {
        return [
            self::DIRECTION_IN,
            self::DIRECTION_OUT,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getActionAllowableValues()
    {
        return [
            self::ACTION_ACCEPT,
            self::ACTION_REJECT,
            self::ACTION_DROP,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getProtocolAllowableValues()
    {
        return [
            self::PROTOCOL_TCP,
            self::PROTOCOL_UDP,
            self::PROTOCOL_ICMP,
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
        $this->container['direction'] = isset($data['direction']) ? $data['direction'] : null;
        $this->container['action'] = isset($data['action']) ? $data['action'] : null;
        $this->container['position'] = isset($data['position']) ? $data['position'] : null;
        $this->container['family'] = isset($data['family']) ? $data['family'] : null;
        $this->container['protocol'] = isset($data['protocol']) ? $data['protocol'] : null;
        $this->container['icmp_type'] = isset($data['icmp_type']) ? $data['icmp_type'] : null;
        $this->container['destination_address_start'] = isset($data['destination_address_start']) ? $data['destination_address_start'] : null;
        $this->container['destination_address_end'] = isset($data['destination_address_end']) ? $data['destination_address_end'] : null;
        $this->container['destination_port_start'] = isset($data['destination_port_start']) ? $data['destination_port_start'] : null;
        $this->container['destination_port_end'] = isset($data['destination_port_end']) ? $data['destination_port_end'] : null;
        $this->container['source_address_start'] = isset($data['source_address_start']) ? $data['source_address_start'] : null;
        $this->container['source_address_end'] = isset($data['source_address_end']) ? $data['source_address_end'] : null;
        $this->container['source_port_start'] = isset($data['source_port_start']) ? $data['source_port_start'] : null;
        $this->container['source_port_end'] = isset($data['source_port_end']) ? $data['source_port_end'] : null;
        $this->container['comment'] = isset($data['comment']) ? $data['comment'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if ($this->container['direction'] === null) {
            $invalid_properties[] = "'direction' can't be null";
        }
        $allowed_values = $this->getDirectionAllowableValues();
        if (!in_array($this->container['direction'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'direction', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        if ($this->container['action'] === null) {
            $invalid_properties[] = "'action' can't be null";
        }
        $allowed_values = $this->getActionAllowableValues();
        if (!in_array($this->container['action'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'action', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        if (!is_null($this->container['position']) && ($this->container['position'] > 1000)) {
            $invalid_properties[] = "invalid value for 'position', must be smaller than or equal to 1000.";
        }

        if (!is_null($this->container['position']) && ($this->container['position'] < 1)) {
            $invalid_properties[] = "invalid value for 'position', must be bigger than or equal to 1.";
        }

        if ($this->container['family'] === null) {
            $invalid_properties[] = "'family' can't be null";
        }
        $allowed_values = $this->getProtocolAllowableValues();
        if (!in_array($this->container['protocol'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'protocol', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        if (!is_null($this->container['icmp_type']) && ($this->container['icmp_type'] > 255)) {
            $invalid_properties[] = "invalid value for 'icmp_type', must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['icmp_type']) && ($this->container['icmp_type'] < 0)) {
            $invalid_properties[] = "invalid value for 'icmp_type', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['destination_port_start']) && ($this->container['destination_port_start'] > 65535)) {
            $invalid_properties[] = "invalid value for 'destination_port_start', must be smaller than or equal to 65535.";
        }

        if (!is_null($this->container['destination_port_start']) && ($this->container['destination_port_start'] < 1)) {
            $invalid_properties[] = "invalid value for 'destination_port_start', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['destination_port_end']) && ($this->container['destination_port_end'] > 65535)) {
            $invalid_properties[] = "invalid value for 'destination_port_end', must be smaller than or equal to 65535.";
        }

        if (!is_null($this->container['destination_port_end']) && ($this->container['destination_port_end'] < 1)) {
            $invalid_properties[] = "invalid value for 'destination_port_end', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['source_port_start']) && ($this->container['source_port_start'] > 65535)) {
            $invalid_properties[] = "invalid value for 'source_port_start', must be smaller than or equal to 65535.";
        }

        if (!is_null($this->container['source_port_start']) && ($this->container['source_port_start'] < 1)) {
            $invalid_properties[] = "invalid value for 'source_port_start', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['source_port_end']) && ($this->container['source_port_end'] > 65535)) {
            $invalid_properties[] = "invalid value for 'source_port_end', must be smaller than or equal to 65535.";
        }

        if (!is_null($this->container['source_port_end']) && ($this->container['source_port_end'] < 1)) {
            $invalid_properties[] = "invalid value for 'source_port_end', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['comment']) && (strlen($this->container['comment']) > 255)) {
            $invalid_properties[] = "invalid value for 'comment', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['comment']) && (strlen($this->container['comment']) < 0)) {
            $invalid_properties[] = "invalid value for 'comment', the character length must be bigger than or equal to 0.";
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

        if ($this->container['direction'] === null) {
            return false;
        }
        $allowed_values = $this->getDirectionAllowableValues();
        if (!in_array($this->container['direction'], $allowed_values)) {
            return false;
        }
        if ($this->container['action'] === null) {
            return false;
        }
        $allowed_values = $this->getActionAllowableValues();
        if (!in_array($this->container['action'], $allowed_values)) {
            return false;
        }
        if ($this->container['position'] > 1000) {
            return false;
        }
        if ($this->container['position'] < 1) {
            return false;
        }
        if ($this->container['family'] === null) {
            return false;
        }
        $allowed_values = $this->getProtocolAllowableValues();
        if (!in_array($this->container['protocol'], $allowed_values)) {
            return false;
        }
        if ($this->container['icmp_type'] > 255) {
            return false;
        }
        if ($this->container['icmp_type'] < 0) {
            return false;
        }
        if ($this->container['destination_port_start'] > 65535) {
            return false;
        }
        if ($this->container['destination_port_start'] < 1) {
            return false;
        }
        if ($this->container['destination_port_end'] > 65535) {
            return false;
        }
        if ($this->container['destination_port_end'] < 1) {
            return false;
        }
        if ($this->container['source_port_start'] > 65535) {
            return false;
        }
        if ($this->container['source_port_start'] < 1) {
            return false;
        }
        if ($this->container['source_port_end'] > 65535) {
            return false;
        }
        if ($this->container['source_port_end'] < 1) {
            return false;
        }
        if (strlen($this->container['comment']) > 255) {
            return false;
        }
        if (strlen($this->container['comment']) < 0) {
            return false;
        }
        return true;
    }


    /**
     * Gets direction
     * @return string
     */
    public function getDirection()
    {
        return $this->container['direction'];
    }

    /**
     * Sets direction
     * @param string $direction The direction of network traffic this rule will be applied to.
     * @return $this
     */
    public function setDirection($direction)
    {
        $allowed_values = $this->getDirectionAllowableValues();
        if (!in_array($direction, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'direction', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['direction'] = $direction;

        return $this;
    }

    /**
     * Gets action
     * @return string
     */
    public function getAction()
    {
        return $this->container['action'];
    }

    /**
     * Sets action
     * @param string $action Action to take if the rule conditions are met.
     * @return $this
     */
    public function setAction($action)
    {
        $allowed_values = $this->getActionAllowableValues();
        if (!in_array($action, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'action', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['action'] = $action;

        return $this;
    }

    /**
     * Gets position
     * @return float
     */
    public function getPosition()
    {
        return $this->container['position'];
    }

    /**
     * Sets position
     * @param float $position Add the firewall rule to this position in the server's firewall list.
     * @return $this
     */
    public function setPosition($position)
    {

        if (!is_null($position) && ($position > 1000)) {
            throw new \InvalidArgumentException('invalid value for $position when calling FirewallRule., must be smaller than or equal to 1000.');
        }
        if (!is_null($position) && ($position < 1)) {
            throw new \InvalidArgumentException('invalid value for $position when calling FirewallRule., must be bigger than or equal to 1.');
        }

        $this->container['position'] = $position;

        return $this;
    }

    /**
     * Gets family
     * @return \Upcloud\ApiClient\Model\AddressFamily
     */
    public function getFamily()
    {
        return $this->container['family'];
    }

    /**
     * Sets family
     * @param \Upcloud\ApiClient\Model\AddressFamily $family if protocol is set The address family of new firewall rule
     * @return $this
     */
    public function setFamily($family)
    {
        $this->container['family'] = $family;

        return $this;
    }

    /**
     * Gets protocol
     * @return string
     */
    public function getProtocol()
    {
        return $this->container['protocol'];
    }

    /**
     * Sets protocol
     * @param string $protocol The protocol this rule will be applied to.
     * @return $this
     */
    public function setProtocol($protocol)
    {
        $allowed_values = $this->getProtocolAllowableValues();
        if (!is_null($protocol) && !in_array($protocol, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'protocol', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['protocol'] = $protocol;

        return $this;
    }

    /**
     * Gets icmp_type
     * @return float
     */
    public function getIcmpType()
    {
        return $this->container['icmp_type'];
    }

    /**
     * Sets icmp_type
     * @param float $icmp_type The ICMP type.
     * @return $this
     */
    public function setIcmpType($icmp_type)
    {

        if (!is_null($icmp_type) && ($icmp_type > 255)) {
            throw new \InvalidArgumentException('invalid value for $icmp_type when calling FirewallRule., must be smaller than or equal to 255.');
        }
        if (!is_null($icmp_type) && ($icmp_type < 0)) {
            throw new \InvalidArgumentException('invalid value for $icmp_type when calling FirewallRule., must be bigger than or equal to 0.');
        }

        $this->container['icmp_type'] = $icmp_type;

        return $this;
    }

    /**
     * Gets destination_address_start
     * @return string
     */
    public function getDestinationAddressStart()
    {
        return $this->container['destination_address_start'];
    }

    /**
     * Sets destination_address_start
     * @param string $destination_address_start The destination address range starts from this address.
     * @return $this
     */
    public function setDestinationAddressStart($destination_address_start)
    {
        $this->container['destination_address_start'] = $destination_address_start;

        return $this;
    }

    /**
     * Gets destination_address_end
     * @return string
     */
    public function getDestinationAddressEnd()
    {
        return $this->container['destination_address_end'];
    }

    /**
     * Sets destination_address_end
     * @param string $destination_address_end The destination address range ends to this address.
     * @return $this
     */
    public function setDestinationAddressEnd($destination_address_end)
    {
        $this->container['destination_address_end'] = $destination_address_end;

        return $this;
    }

    /**
     * Gets destination_port_start
     * @return float
     */
    public function getDestinationPortStart()
    {
        return $this->container['destination_port_start'];
    }

    /**
     * Sets destination_port_start
     * @param float $destination_port_start The destination port range starts from this port number.
     * @return $this
     */
    public function setDestinationPortStart($destination_port_start)
    {

        if (!is_null($destination_port_start) && ($destination_port_start > 65535)) {
            throw new \InvalidArgumentException('invalid value for $destination_port_start when calling FirewallRule., must be smaller than or equal to 65535.');
        }
        if (!is_null($destination_port_start) && ($destination_port_start < 1)) {
            throw new \InvalidArgumentException('invalid value for $destination_port_start when calling FirewallRule., must be bigger than or equal to 1.');
        }

        $this->container['destination_port_start'] = $destination_port_start;

        return $this;
    }

    /**
     * Gets destination_port_end
     * @return float
     */
    public function getDestinationPortEnd()
    {
        return $this->container['destination_port_end'];
    }

    /**
     * Sets destination_port_end
     * @param float $destination_port_end The destination port range ends to this port number.
     * @return $this
     */
    public function setDestinationPortEnd($destination_port_end)
    {

        if (!is_null($destination_port_end) && ($destination_port_end > 65535)) {
            throw new \InvalidArgumentException('invalid value for $destination_port_end when calling FirewallRule., must be smaller than or equal to 65535.');
        }
        if (!is_null($destination_port_end) && ($destination_port_end < 1)) {
            throw new \InvalidArgumentException('invalid value for $destination_port_end when calling FirewallRule., must be bigger than or equal to 1.');
        }

        $this->container['destination_port_end'] = $destination_port_end;

        return $this;
    }

    /**
     * Gets source_address_start
     * @return string
     */
    public function getSourceAddressStart()
    {
        return $this->container['source_address_start'];
    }

    /**
     * Sets source_address_start
     * @param string $source_address_start The source address range starts from this address.
     * @return $this
     */
    public function setSourceAddressStart($source_address_start)
    {
        $this->container['source_address_start'] = $source_address_start;

        return $this;
    }

    /**
     * Gets source_address_end
     * @return string
     */
    public function getSourceAddressEnd()
    {
        return $this->container['source_address_end'];
    }

    /**
     * Sets source_address_end
     * @param string $source_address_end The source address range ends to this address.
     * @return $this
     */
    public function setSourceAddressEnd($source_address_end)
    {
        $this->container['source_address_end'] = $source_address_end;

        return $this;
    }

    /**
     * Gets source_port_start
     * @return float
     */
    public function getSourcePortStart()
    {
        return $this->container['source_port_start'];
    }

    /**
     * Sets source_port_start
     * @param float $source_port_start The source port range starts from this port number.
     * @return $this
     */
    public function setSourcePortStart($source_port_start)
    {

        if (!is_null($source_port_start) && ($source_port_start > 65535)) {
            throw new \InvalidArgumentException('invalid value for $source_port_start when calling FirewallRule., must be smaller than or equal to 65535.');
        }
        if (!is_null($source_port_start) && ($source_port_start < 1)) {
            throw new \InvalidArgumentException('invalid value for $source_port_start when calling FirewallRule., must be bigger than or equal to 1.');
        }

        $this->container['source_port_start'] = $source_port_start;

        return $this;
    }

    /**
     * Gets source_port_end
     * @return float
     */
    public function getSourcePortEnd()
    {
        return $this->container['source_port_end'];
    }

    /**
     * Sets source_port_end
     * @param float $source_port_end The source port range ends to this port number.
     * @return $this
     */
    public function setSourcePortEnd($source_port_end)
    {

        if (!is_null($source_port_end) && ($source_port_end > 65535)) {
            throw new \InvalidArgumentException('invalid value for $source_port_end when calling FirewallRule., must be smaller than or equal to 65535.');
        }
        if (!is_null($source_port_end) && ($source_port_end < 1)) {
            throw new \InvalidArgumentException('invalid value for $source_port_end when calling FirewallRule., must be bigger than or equal to 1.');
        }

        $this->container['source_port_end'] = $source_port_end;

        return $this;
    }

    /**
     * Gets comment
     * @return string
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     * @param string $comment Freeform comment string for the rule.
     * @return $this
     */
    public function setComment($comment)
    {
        if (!is_null($comment) && (strlen($comment) > 255)) {
            throw new \InvalidArgumentException('invalid length for $comment when calling FirewallRule., must be smaller than or equal to 255.');
        }
        if (!is_null($comment) && (strlen($comment) < 0)) {
            throw new \InvalidArgumentException('invalid length for $comment when calling FirewallRule., must be bigger than or equal to 0.');
        }

        $this->container['comment'] = $comment;

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



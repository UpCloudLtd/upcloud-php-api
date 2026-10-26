<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents an IP address associated with a network interface of the load balancer service, including addressing details and provisioning information.
 */
class LoadBalancerIpAddress extends JsonSerializableType
{
    /**
     * @var string $address IP address assigned to the load balancer service on this network.
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var string $networkName Name of the network to which this IP address belongs.
     */
    #[JsonProperty('network_name')]
    public string $networkName;

    /**
     * @var DateTime $createdAt Timestamp when the IP address was created (RFC 3339 format).
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the IP address was last updated (RFC 3339 format).
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   address: string,
     *   networkName: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'];
        $this->networkName = $values['networkName'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

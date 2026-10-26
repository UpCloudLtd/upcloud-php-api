<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represent a network from where traffic is consumed and routed.
 */
class LoadBalancerNetwork extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name assigned to the network.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $uuid UUID represented as a string
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $type Network type indicating the visibility scope (public or private).
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $family IP address family used by this network (IPv4 or IPv6).
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var ?string $dnsName Fully qualified domain name (FQDN) for accessing the load balancer through this network.
     */
    #[JsonProperty('dns_name')]
    public ?string $dnsName;

    /**
     * @var DateTime $createdAt Timestamp when the network was created (RFC 3339 format).
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the network was last updated (RFC 3339 format).
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   name: string,
     *   uuid: string,
     *   type: string,
     *   family: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   dnsName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->uuid = $values['uuid'];
        $this->type = $values['type'];
        $this->family = $values['family'];
        $this->dnsName = $values['dnsName'] ?? null;
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

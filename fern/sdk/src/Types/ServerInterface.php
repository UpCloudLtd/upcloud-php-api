<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network interface attached to a Cloud Server
 */
class ServerInterface extends JsonSerializableType
{
    /**
     * @var ?value-of<ServerBooleanYesno> $bootable
     */
    #[JsonProperty('bootable')]
    public ?string $bootable;

    /**
     * @var ?int $index Index that identifies and orders the interface
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @var ?ServerInterfaceIpAddresses $ipAddresses IP addresses attached to the interface
     */
    #[JsonProperty('ip_addresses')]
    public ?ServerInterfaceIpAddresses $ipAddresses;

    /**
     * @var ?string $mac
     */
    #[JsonProperty('mac')]
    public ?string $mac;

    /**
     * @var string $network
     */
    #[JsonProperty('network')]
    public string $network;

    /**
     * @var ?value-of<ServerBooleanYesno> $sourceIpFiltering
     */
    #[JsonProperty('source_ip_filtering')]
    public ?string $sourceIpFiltering;

    /**
     * @var ?value-of<ServerNetworkType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   network: string,
     *   bootable?: ?value-of<ServerBooleanYesno>,
     *   index?: ?int,
     *   ipAddresses?: ?ServerInterfaceIpAddresses,
     *   mac?: ?string,
     *   sourceIpFiltering?: ?value-of<ServerBooleanYesno>,
     *   type?: ?value-of<ServerNetworkType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bootable = $values['bootable'] ?? null;
        $this->index = $values['index'] ?? null;
        $this->ipAddresses = $values['ipAddresses'] ?? null;
        $this->mac = $values['mac'] ?? null;
        $this->network = $values['network'];
        $this->sourceIpFiltering = $values['sourceIpFiltering'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

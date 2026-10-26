<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ServerBooleanYesno;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ServerNetworkType;

class ServerAddInterfaceInterface extends JsonSerializableType
{
    /**
     * @var ?value-of<ServerBooleanYesno> $bootable
     */
    #[JsonProperty('bootable')]
    public ?string $bootable;

    /**
     * @var ?int $index Interface index; the next available index is used when omitted
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @var ServerAddInterfaceInterfaceIpAddresses $ipAddresses IP addresses to attach to the interface
     */
    #[JsonProperty('ip_addresses')]
    public ServerAddInterfaceInterfaceIpAddresses $ipAddresses;

    /**
     * @var ?string $network
     */
    #[JsonProperty('network')]
    public ?string $network;

    /**
     * @var ?value-of<ServerBooleanYesno> $sourceIpFiltering
     */
    #[JsonProperty('source_ip_filtering')]
    public ?string $sourceIpFiltering;

    /**
     * @var value-of<ServerNetworkType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   ipAddresses: ServerAddInterfaceInterfaceIpAddresses,
     *   type: value-of<ServerNetworkType>,
     *   bootable?: ?value-of<ServerBooleanYesno>,
     *   index?: ?int,
     *   network?: ?string,
     *   sourceIpFiltering?: ?value-of<ServerBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bootable = $values['bootable'] ?? null;
        $this->index = $values['index'] ?? null;
        $this->ipAddresses = $values['ipAddresses'];
        $this->network = $values['network'] ?? null;
        $this->sourceIpFiltering = $values['sourceIpFiltering'] ?? null;
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

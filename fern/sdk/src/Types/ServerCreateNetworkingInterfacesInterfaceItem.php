<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerCreateNetworkingInterfacesInterfaceItem extends JsonSerializableType
{
    /**
     * @var ?value-of<ServerBooleanYesno> $bootable
     */
    #[JsonProperty('bootable')]
    public ?string $bootable;

    /**
     * @var ?int $index Index used to identify and order the network interface
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @var ServerCreateNetworkingInterfacesInterfaceItemIpAddresses $ipAddresses
     */
    #[JsonProperty('ip_addresses')]
    public ServerCreateNetworkingInterfacesInterfaceItemIpAddresses $ipAddresses;

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
     *   ipAddresses: ServerCreateNetworkingInterfacesInterfaceItemIpAddresses,
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

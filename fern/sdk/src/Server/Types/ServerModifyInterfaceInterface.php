<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ServerBooleanYesno;
use Upcloud\Core\Json\JsonProperty;

class ServerModifyInterfaceInterface extends JsonSerializableType
{
    /**
     * @var ?value-of<ServerBooleanYesno> $bootable
     */
    #[JsonProperty('bootable')]
    public ?string $bootable;

    /**
     * @var ?int $index New index for the interface; defaults to the index in the request path
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @var ?ServerModifyInterfaceInterfaceIpAddresses $ipAddresses Complete replacement list of IP addresses for the interface
     */
    #[JsonProperty('ip_addresses')]
    public ?ServerModifyInterfaceInterfaceIpAddresses $ipAddresses;

    /**
     * @var ?value-of<ServerBooleanYesno> $sourceIpFiltering
     */
    #[JsonProperty('source_ip_filtering')]
    public ?string $sourceIpFiltering;

    /**
     * @param array{
     *   bootable?: ?value-of<ServerBooleanYesno>,
     *   index?: ?int,
     *   ipAddresses?: ?ServerModifyInterfaceInterfaceIpAddresses,
     *   sourceIpFiltering?: ?value-of<ServerBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bootable = $values['bootable'] ?? null;
        $this->index = $values['index'] ?? null;
        $this->ipAddresses = $values['ipAddresses'] ?? null;
        $this->sourceIpFiltering = $values['sourceIpFiltering'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

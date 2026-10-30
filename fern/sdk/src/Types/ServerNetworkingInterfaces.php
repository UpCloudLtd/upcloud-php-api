<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Network interfaces attached to the Cloud Server
 */
class ServerNetworkingInterfaces extends JsonSerializableType
{
    /**
     * @var array<ServerInterface> $interface Network interfaces ordered by interface index
     */
    #[JsonProperty('interface'), ArrayType([ServerInterface::class])]
    public array $interface;

    /**
     * @param array{
     *   interface: array<ServerInterface>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interface = $values['interface'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

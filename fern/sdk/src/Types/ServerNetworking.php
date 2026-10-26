<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network interfaces configured for the Cloud Server
 */
class ServerNetworking extends JsonSerializableType
{
    /**
     * @var ?ServerNetworkingInterfaces $interfaces Network interfaces attached to the Cloud Server
     */
    #[JsonProperty('interfaces')]
    public ?ServerNetworkingInterfaces $interfaces;

    /**
     * @param array{
     *   interfaces?: ?ServerNetworkingInterfaces,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->interfaces = $values['interfaces'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

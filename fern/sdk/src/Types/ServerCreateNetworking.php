<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network interfaces for a new Cloud Server
 */
class ServerCreateNetworking extends JsonSerializableType
{
    /**
     * @var ServerCreateNetworkingInterfaces $interfaces
     */
    #[JsonProperty('interfaces')]
    public ServerCreateNetworkingInterfaces $interfaces;

    /**
     * @param array{
     *   interfaces: ServerCreateNetworkingInterfaces,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interfaces = $values['interfaces'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

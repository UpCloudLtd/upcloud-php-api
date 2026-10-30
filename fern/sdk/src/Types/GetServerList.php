<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for the Cloud Server list response.
 */
class GetServerList extends JsonSerializableType
{
    /**
     * @var GetServerListServers $servers
     */
    #[JsonProperty('servers')]
    public GetServerListServers $servers;

    /**
     * @param array{
     *   servers: GetServerListServers,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->servers = $values['servers'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class GetServerListServers extends JsonSerializableType
{
    /**
     * @var ?array<ServerInGetServerList> $server
     */
    #[JsonProperty('server'), ArrayType([ServerInGetServerList::class])]
    public ?array $server;

    /**
     * @param array{
     *   server?: ?array<ServerInGetServerList>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->server = $values['server'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

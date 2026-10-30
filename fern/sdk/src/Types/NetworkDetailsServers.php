<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class NetworkDetailsServers extends JsonSerializableType
{
    /**
     * @var array<NetworkDetailsServersServerItem> $server
     */
    #[JsonProperty('server'), ArrayType([NetworkDetailsServersServerItem::class])]
    public array $server;

    /**
     * @param array{
     *   server: array<NetworkDetailsServersServerItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->server = $values['server'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

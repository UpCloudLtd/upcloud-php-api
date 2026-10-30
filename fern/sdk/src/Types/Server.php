<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Cloud Server object returned in responses
 */
class Server extends JsonSerializableType
{
    /**
     * @var ServerDetails $server
     */
    #[JsonProperty('server')]
    public ServerDetails $server;

    /**
     * @param array{
     *   server: ServerDetails,
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

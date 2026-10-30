<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Newly created Cloud Server and optional one-time login credentials
 */
class CreateServerResponse extends JsonSerializableType
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

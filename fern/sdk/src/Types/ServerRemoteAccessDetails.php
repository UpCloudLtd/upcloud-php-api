<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Remote access settings and VNC connection details for a Cloud Server
 */
class ServerRemoteAccessDetails extends JsonSerializableType
{
    /**
     * @var ServerRemoteAccessDetailsServer $server
     */
    #[JsonProperty('server')]
    public ServerRemoteAccessDetailsServer $server;

    /**
     * @param array{
     *   server: ServerRemoteAccessDetailsServer,
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

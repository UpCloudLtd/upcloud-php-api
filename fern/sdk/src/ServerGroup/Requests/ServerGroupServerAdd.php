<?php

namespace Upcloud\ServerGroup\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\ServerGroup\Types\ServerGroupServerAddServer;
use Upcloud\Core\Json\JsonProperty;

class ServerGroupServerAdd extends JsonSerializableType
{
    /**
     * @var ServerGroupServerAddServer $server
     */
    #[JsonProperty('server')]
    public ServerGroupServerAddServer $server;

    /**
     * @param array{
     *   server: ServerGroupServerAddServer,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->server = $values['server'];
    }
}

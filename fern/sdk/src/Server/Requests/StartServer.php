<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\StartServerServer;
use Upcloud\Core\Json\JsonProperty;

class StartServer extends JsonSerializableType
{
    /**
     * @var StartServerServer $server
     */
    #[JsonProperty('server')]
    public StartServerServer $server;

    /**
     * @param array{
     *   server: StartServerServer,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->server = $values['server'];
    }
}

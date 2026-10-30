<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ModifyServerServer;
use Upcloud\Core\Json\JsonProperty;

class ModifyServer extends JsonSerializableType
{
    /**
     * @var ModifyServerServer $server
     */
    #[JsonProperty('server')]
    public ModifyServerServer $server;

    /**
     * @param array{
     *   server: ModifyServerServer,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->server = $values['server'];
    }
}

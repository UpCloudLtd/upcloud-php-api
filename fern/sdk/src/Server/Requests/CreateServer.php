<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\CreateServerServer;
use Upcloud\Core\Json\JsonProperty;

class CreateServer extends JsonSerializableType
{
    /**
     * @var CreateServerServer $server
     */
    #[JsonProperty('server')]
    public CreateServerServer $server;

    /**
     * @param array{
     *   server: CreateServerServer,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->server = $values['server'];
    }
}

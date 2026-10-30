<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\RestartServerRestartServerStopType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class RestartServer extends JsonSerializableType
{
    /**
     * @var (
     *    RestartServerRestartServerStopType
     *   |mixed
     * ) $restartServer
     */
    #[JsonProperty('restart_server'), Union(RestartServerRestartServerStopType::class, 'mixed')]
    public mixed $restartServer;

    /**
     * @param array{
     *   restartServer: (
     *    RestartServerRestartServerStopType
     *   |mixed
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->restartServer = $values['restartServer'];
    }
}

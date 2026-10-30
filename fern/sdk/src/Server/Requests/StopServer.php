<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\StopServerStopServer;
use Upcloud\Core\Json\JsonProperty;

class StopServer extends JsonSerializableType
{
    /**
     * @var StopServerStopServer $stopServer
     */
    #[JsonProperty('stop_server')]
    public StopServerStopServer $stopServer;

    /**
     * @param array{
     *   stopServer: StopServerStopServer,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->stopServer = $values['stopServer'];
    }
}

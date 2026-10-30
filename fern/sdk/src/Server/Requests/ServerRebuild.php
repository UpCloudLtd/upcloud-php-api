<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerRebuildServerRebuild;
use Upcloud\Core\Json\JsonProperty;

class ServerRebuild extends JsonSerializableType
{
    /**
     * @var ServerRebuildServerRebuild $serverRebuild
     */
    #[JsonProperty('server_rebuild')]
    public ServerRebuildServerRebuild $serverRebuild;

    /**
     * @param array{
     *   serverRebuild: ServerRebuildServerRebuild,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serverRebuild = $values['serverRebuild'];
    }
}

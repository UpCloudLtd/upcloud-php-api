<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A single server group
 */
class ServerGroup extends JsonSerializableType
{
    /**
     * @var ServerGroupDetails $serverGroup
     */
    #[JsonProperty('server_group')]
    public ServerGroupDetails $serverGroup;

    /**
     * @param array{
     *   serverGroup: ServerGroupDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serverGroup = $values['serverGroup'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

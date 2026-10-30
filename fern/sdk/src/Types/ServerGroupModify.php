<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A schema for creating/modifying a server group
 */
class ServerGroupModify extends JsonSerializableType
{
    /**
     * @var ServerGroupModifyServerGroup $serverGroup
     */
    #[JsonProperty('server_group')]
    public ServerGroupModifyServerGroup $serverGroup;

    /**
     * @param array{
     *   serverGroup: ServerGroupModifyServerGroup,
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

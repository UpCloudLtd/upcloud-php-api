<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * List of server groups
 */
class ServerGroups extends JsonSerializableType
{
    /**
     * @var ServerGroupsServerGroups $serverGroups
     */
    #[JsonProperty('server_groups')]
    public ServerGroupsServerGroups $serverGroups;

    /**
     * @param array{
     *   serverGroups: ServerGroupsServerGroups,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serverGroups = $values['serverGroups'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

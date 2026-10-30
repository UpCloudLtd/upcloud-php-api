<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerGroupsServerGroups extends JsonSerializableType
{
    /**
     * @var array<ServerGroupDetails> $serverGroup
     */
    #[JsonProperty('server_group'), ArrayType([ServerGroupDetails::class])]
    public array $serverGroup;

    /**
     * @param array{
     *   serverGroup: array<ServerGroupDetails>,
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

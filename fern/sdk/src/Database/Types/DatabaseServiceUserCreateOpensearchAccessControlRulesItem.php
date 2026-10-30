<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceUserCreateOpensearchAccessControlRulesItem extends JsonSerializableType
{
    /**
     * @var string $index The index pattern for the rule
     */
    #[JsonProperty('index')]
    public string $index;

    /**
     * @var string $permission The permission level for the index
     */
    #[JsonProperty('permission')]
    public string $permission;

    /**
     * @param array{
     *   index: string,
     *   permission: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->index = $values['index'];
        $this->permission = $values['permission'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

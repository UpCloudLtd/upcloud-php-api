<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceUserAclModifyOpensearchAccessControlRulesItem extends JsonSerializableType
{
    /**
     * @var string $index
     */
    #[JsonProperty('index')]
    public string $index;

    /**
     * @var string $permission
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

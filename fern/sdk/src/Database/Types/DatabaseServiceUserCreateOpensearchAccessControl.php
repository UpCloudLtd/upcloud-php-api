<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * OpenSearch access control settings
 */
class DatabaseServiceUserCreateOpensearchAccessControl extends JsonSerializableType
{
    /**
     * @var array<DatabaseServiceUserCreateOpensearchAccessControlRulesItem> $rules List of index permission rules
     */
    #[JsonProperty('rules'), ArrayType([DatabaseServiceUserCreateOpensearchAccessControlRulesItem::class])]
    public array $rules;

    /**
     * @param array{
     *   rules: array<DatabaseServiceUserCreateOpensearchAccessControlRulesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rules = $values['rules'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

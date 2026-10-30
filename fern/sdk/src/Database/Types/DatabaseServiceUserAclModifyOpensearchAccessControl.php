<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * OpenSearch index permission modification schema
 */
class DatabaseServiceUserAclModifyOpensearchAccessControl extends JsonSerializableType
{
    /**
     * @var array<DatabaseServiceUserAclModifyOpensearchAccessControlRulesItem> $rules List of index permission rules
     */
    #[JsonProperty('rules'), ArrayType([DatabaseServiceUserAclModifyOpensearchAccessControlRulesItem::class])]
    public array $rules;

    /**
     * @param array{
     *   rules: array<DatabaseServiceUserAclModifyOpensearchAccessControlRulesItem>,
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

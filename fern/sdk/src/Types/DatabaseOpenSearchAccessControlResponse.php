<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for OpenSearch access control response.
 */
class DatabaseOpenSearchAccessControlResponse extends JsonSerializableType
{
    /**
     * @var ?array<DatabaseOpenSearchAccessControlRuleResponse> $rules
     */
    #[JsonProperty('rules'), ArrayType([DatabaseOpenSearchAccessControlRuleResponse::class])]
    public ?array $rules;

    /**
     * @param array{
     *   rules?: ?array<DatabaseOpenSearchAccessControlRuleResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->rules = $values['rules'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

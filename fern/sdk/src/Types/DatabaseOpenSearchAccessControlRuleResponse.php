<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for OpenSearch access control rule response.
 */
class DatabaseOpenSearchAccessControlRuleResponse extends JsonSerializableType
{
    /**
     * @var ?string $index Index name or pattern (e.g., 'log-*' for all indices starting with 'log-')
     */
    #[JsonProperty('index')]
    public ?string $index;

    /**
     * @var ?string $permission Permission level for the specified index
     */
    #[JsonProperty('permission')]
    public ?string $permission;

    /**
     * @param array{
     *   index?: ?string,
     *   permission?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->index = $values['index'] ?? null;
        $this->permission = $values['permission'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

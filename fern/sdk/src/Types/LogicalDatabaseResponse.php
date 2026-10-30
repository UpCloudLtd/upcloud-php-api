<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for a logical database response.
 */
class LogicalDatabaseResponse extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the logical database.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $lcCollate The LC_COLLATE setting of the logical database.
     */
    #[JsonProperty('lc_collate')]
    public ?string $lcCollate;

    /**
     * @var ?string $lcCtype The LC_CTYPE setting of the logical database.
     */
    #[JsonProperty('lc_ctype')]
    public ?string $lcCtype;

    /**
     * @param array{
     *   name?: ?string,
     *   lcCollate?: ?string,
     *   lcCtype?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->lcCollate = $values['lcCollate'] ?? null;
        $this->lcCtype = $values['lcCtype'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

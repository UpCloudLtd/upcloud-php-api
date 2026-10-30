<?php

namespace Upcloud\Account\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class CreateSubaccountRequestSubAccountIpFilters extends JsonSerializableType
{
    /**
     * @var array<string> $ipFilter
     */
    #[JsonProperty('ip_filter'), ArrayType(['string'])]
    public array $ipFilter;

    /**
     * @param array{
     *   ipFilter: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ipFilter = $values['ipFilter'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

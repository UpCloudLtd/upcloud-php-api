<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Lists available componentised database plans.
 */
class DatabasePlansResponse extends JsonSerializableType
{
    /**
     * @var array<DatabasePlansResponseServiceTypesItem> $serviceTypes Available service types that offer componentised plans.
     */
    #[JsonProperty('service_types'), ArrayType([DatabasePlansResponseServiceTypesItem::class])]
    public array $serviceTypes;

    /**
     * @param array{
     *   serviceTypes: array<DatabasePlansResponseServiceTypesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serviceTypes = $values['serviceTypes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

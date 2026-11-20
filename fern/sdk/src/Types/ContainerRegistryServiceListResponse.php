<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryServiceListResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryServiceListResponseServicesItem> $services List of service summaries
     */
    #[JsonProperty('services'), ArrayType([ContainerRegistryServiceListResponseServicesItem::class])]
    public array $services;

    /**
     * @param array{
     *   services: array<ContainerRegistryServiceListResponseServicesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->services = $values['services'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

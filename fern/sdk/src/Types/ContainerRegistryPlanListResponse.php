<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Plans a container registry can be created on, in display order. `name` is the value to send as `tier` when creating a service.
 */
class ContainerRegistryPlanListResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryPlanListResponsePlansItem> $plans
     */
    #[JsonProperty('plans'), ArrayType([ContainerRegistryPlanListResponsePlansItem::class])]
    public array $plans;

    /**
     * @param array{
     *   plans: array<ContainerRegistryPlanListResponsePlansItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->plans = $values['plans'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

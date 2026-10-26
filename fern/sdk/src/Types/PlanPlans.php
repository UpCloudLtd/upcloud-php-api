<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class PlanPlans extends JsonSerializableType
{
    /**
     * @var array<PlanPlansPlanItem> $plan
     */
    #[JsonProperty('plan'), ArrayType([PlanPlansPlanItem::class])]
    public array $plan;

    /**
     * @param array{
     *   plan: array<PlanPlansPlanItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->plan = $values['plan'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

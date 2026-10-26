<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * List response containing available server plans.
 */
class Plan extends JsonSerializableType
{
    /**
     * @var PlanPlans $plans
     */
    #[JsonProperty('plans')]
    public PlanPlans $plans;

    /**
     * @param array{
     *   plans: PlanPlans,
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

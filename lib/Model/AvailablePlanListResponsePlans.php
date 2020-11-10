<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class AvailablePlanListResponsePlans
{
    /**
     * @var Plan[]|null
     */
    private $plan;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setPlan($data['plan'] ?? null);
    }

    /**
     * @return Plan[]|null
     */
    public function getPlan(): ?array
    {
        return $this->plan;
    }

    /**
     * @param Plan[]|null $plan
     * @return AvailablePlanListResponsePlans
     */
    public function setPlan(?array $plan): AvailablePlanListResponsePlans
    {
        if (is_array($plan)) {
            foreach ($plan as $item) {
                $this->plan[] = new Plan($item);
            }
        } else {
            $this->plan = $plan;
        }

        return $this;
    }

}



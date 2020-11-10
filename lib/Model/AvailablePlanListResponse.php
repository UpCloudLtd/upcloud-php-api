<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class AvailablePlanListResponse
{
    /**
     * @var AvailablePlanListResponsePlans|null
     */
    private $plans;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setPlans($data['plans'] ?? null);
    }

    /**
     * @return AvailablePlanListResponsePlans|null
     */
    public function getPlans(): ?AvailablePlanListResponsePlans
    {
        return $this->plans;
    }

    /**
     * @param AvailablePlanListResponsePlans|array|null $plans
     * @return AvailablePlanListResponse
     */
    public function setPlans($plans): AvailablePlanListResponse
    {
        if (is_array($plans)) {
            $this->plans = new AvailablePlanListResponsePlans($plans);
        } else {
            $this->plans = $plans;
        }

        return $this;
    }

}



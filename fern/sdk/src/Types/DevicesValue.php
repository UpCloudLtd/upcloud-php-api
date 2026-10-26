<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Availability grouped by zone.
 */
class DevicesValue extends JsonSerializableType
{
    /**
     * @var ?array<string, DevicesValueGpuPlansValue> $gpuPlans Available GPU plans in the zone.
     */
    #[JsonProperty('gpu_plans'), ArrayType(['string' => DevicesValueGpuPlansValue::class])]
    public ?array $gpuPlans;

    /**
     * @param array{
     *   gpuPlans?: ?array<string, DevicesValueGpuPlansValue>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->gpuPlans = $values['gpuPlans'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

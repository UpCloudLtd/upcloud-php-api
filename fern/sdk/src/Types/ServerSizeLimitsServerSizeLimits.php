<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerSizeLimitsServerSizeLimits extends JsonSerializableType
{
    /**
     * @var int $coreNumberMin Minimum number of CPU cores
     */
    #[JsonProperty('core_number_min')]
    public int $coreNumberMin;

    /**
     * @var int $coreNumberMax Maximum number of CPU cores
     */
    #[JsonProperty('core_number_max')]
    public int $coreNumberMax;

    /**
     * @var int $memoryAmountMin Minimum amount of memory in MB
     */
    #[JsonProperty('memory_amount_min')]
    public int $memoryAmountMin;

    /**
     * @var int $memoryAmountMax Maximum amount of memory in MB
     */
    #[JsonProperty('memory_amount_max')]
    public int $memoryAmountMax;

    /**
     * @var int $memoryAmountStep Step size for memory allocation in MB
     */
    #[JsonProperty('memory_amount_step')]
    public int $memoryAmountStep;

    /**
     * @param array{
     *   coreNumberMin: int,
     *   coreNumberMax: int,
     *   memoryAmountMin: int,
     *   memoryAmountMax: int,
     *   memoryAmountStep: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->coreNumberMin = $values['coreNumberMin'];
        $this->coreNumberMax = $values['coreNumberMax'];
        $this->memoryAmountMin = $values['memoryAmountMin'];
        $this->memoryAmountMax = $values['memoryAmountMax'];
        $this->memoryAmountStep = $values['memoryAmountStep'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

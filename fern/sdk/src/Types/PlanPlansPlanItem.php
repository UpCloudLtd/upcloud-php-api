<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class PlanPlansPlanItem extends JsonSerializableType
{
    /**
     * @var int $coreNumber
     */
    #[JsonProperty('core_number')]
    public int $coreNumber;

    /**
     * @var int $memoryAmount
     */
    #[JsonProperty('memory_amount')]
    public int $memoryAmount;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?int $publicTrafficOut
     */
    #[JsonProperty('public_traffic_out')]
    public ?int $publicTrafficOut;

    /**
     * @var ?int $storageSize
     */
    #[JsonProperty('storage_size')]
    public ?int $storageSize;

    /**
     * @var ?string $storageTier
     */
    #[JsonProperty('storage_tier')]
    public ?string $storageTier;

    /**
     * @var ?int $gpuAmount
     */
    #[JsonProperty('gpu_amount')]
    public ?int $gpuAmount;

    /**
     * @var ?string $gpuModel
     */
    #[JsonProperty('gpu_model')]
    public ?string $gpuModel;

    /**
     * @var value-of<PlanFamily> $family
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var value-of<PlanBooleanYesno> $currentOffering
     */
    #[JsonProperty('current_offering')]
    public string $currentOffering;

    /**
     * @param array{
     *   coreNumber: int,
     *   memoryAmount: int,
     *   name: string,
     *   family: value-of<PlanFamily>,
     *   currentOffering: value-of<PlanBooleanYesno>,
     *   publicTrafficOut?: ?int,
     *   storageSize?: ?int,
     *   storageTier?: ?string,
     *   gpuAmount?: ?int,
     *   gpuModel?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->coreNumber = $values['coreNumber'];
        $this->memoryAmount = $values['memoryAmount'];
        $this->name = $values['name'];
        $this->publicTrafficOut = $values['publicTrafficOut'] ?? null;
        $this->storageSize = $values['storageSize'] ?? null;
        $this->storageTier = $values['storageTier'] ?? null;
        $this->gpuAmount = $values['gpuAmount'] ?? null;
        $this->gpuModel = $values['gpuModel'] ?? null;
        $this->family = $values['family'];
        $this->currentOffering = $values['currentOffering'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

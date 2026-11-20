<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchShardIndexingPressure extends JsonSerializableType
{
    /**
     * @var ?bool $enabled Enable or disable shard indexing backpressure. Default is false
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * Run shard indexing backpressure in shadow mode or enforced mode.
     *             In shadow mode (value set as false), shard indexing backpressure tracks all granular-level metrics,
     *             but it doesn’t actually reject any indexing requests.
     *             In enforced mode (value set as true),
     *             shard indexing backpressure rejects any requests to the cluster that might cause a dip in its performance.
     *             Default is false
     *
     * @var ?bool $enforced
     */
    #[JsonProperty('enforced')]
    public ?bool $enforced;

    /**
     * @var ?DatabaseServicePropertiesOpensearchShardIndexingPressureOperatingFactor $operatingFactor
     */
    #[JsonProperty('operating_factor')]
    public ?DatabaseServicePropertiesOpensearchShardIndexingPressureOperatingFactor $operatingFactor;

    /**
     * @var ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameter $primaryParameter
     */
    #[JsonProperty('primary_parameter')]
    public ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameter $primaryParameter;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   enforced?: ?bool,
     *   operatingFactor?: ?DatabaseServicePropertiesOpensearchShardIndexingPressureOperatingFactor,
     *   primaryParameter?: ?DatabaseServicePropertiesOpensearchShardIndexingPressurePrimaryParameter,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->enforced = $values['enforced'] ?? null;
        $this->operatingFactor = $values['operatingFactor'] ?? null;
        $this->primaryParameter = $values['primaryParameter'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

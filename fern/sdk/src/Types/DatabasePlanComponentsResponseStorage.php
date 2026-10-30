<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Storage included in the plan. Omitted for service types without persistent storage.
 */
class DatabasePlanComponentsResponseStorage extends JsonSerializableType
{
    /**
     * @var ?int $includedGib Storage included in the plan per node, in GB. Omitted for tiered (rdb.*) plans, which present storage as a single total_gib.
     */
    #[JsonProperty('included_gib')]
    public ?int $includedGib;

    /**
     * @var ?bool $dynamicStorageSupported Whether the storage total can be adjusted on top of the plan's included storage.
     */
    #[JsonProperty('dynamic_storage_supported')]
    public ?bool $dynamicStorageSupported;

    /**
     * @var ?int $additionalGib Extra dynamic storage configured on the service, in GB. Only present on legacy (non-tiered) service responses; tiered plans present total_gib instead.
     */
    #[JsonProperty('additional_gib')]
    public ?int $additionalGib;

    /**
     * @var ?int $totalGib Total storage, in GB. For tiered (rdb.*) plans this is the single storage number: the plan's base storage in the catalog, or the chosen total (included plus dynamic) on a service response. Omitted for legacy catalog plans.
     */
    #[JsonProperty('total_gib')]
    public ?int $totalGib;

    /**
     * @param array{
     *   includedGib?: ?int,
     *   dynamicStorageSupported?: ?bool,
     *   additionalGib?: ?int,
     *   totalGib?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includedGib = $values['includedGib'] ?? null;
        $this->dynamicStorageSupported = $values['dynamicStorageSupported'] ?? null;
        $this->additionalGib = $values['additionalGib'] ?? null;
        $this->totalGib = $values['totalGib'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

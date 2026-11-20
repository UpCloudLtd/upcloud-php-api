<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ContainerRegistryOperationalState;
use Upcloud\Types\ContainerRegistryConfiguredStatus;
use Upcloud\Types\ContainerRegistryTier;

class ListContainerRegistriesRequest extends JsonSerializableType
{
    /**
     * @var ?string $regionName Filter by region name. Same value as region_name on the service, and as region on create.
     */
    public ?string $regionName;

    /**
     * @var ?value-of<ContainerRegistryOperationalState> $operationalState Filter by operational state.
     */
    public ?string $operationalState;

    /**
     * @var ?value-of<ContainerRegistryConfiguredStatus> $configuredStatus Filter by configured status.
     */
    public ?string $configuredStatus;

    /**
     * @var ?value-of<ContainerRegistryTier> $tier Filter by service tier.
     */
    public ?string $tier;

    /**
     * @param array{
     *   regionName?: ?string,
     *   operationalState?: ?value-of<ContainerRegistryOperationalState>,
     *   configuredStatus?: ?value-of<ContainerRegistryConfiguredStatus>,
     *   tier?: ?value-of<ContainerRegistryTier>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->regionName = $values['regionName'] ?? null;
        $this->operationalState = $values['operationalState'] ?? null;
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->tier = $values['tier'] ?? null;
    }
}

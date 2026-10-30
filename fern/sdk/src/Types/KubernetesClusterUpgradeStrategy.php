<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * upgrade strategy for node group upgrades
 */
class KubernetesClusterUpgradeStrategy extends JsonSerializableType
{
    /**
     * @var value-of<KubernetesClusterUpgradeStrategyType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<KubernetesClusterUpgradeStrategyType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

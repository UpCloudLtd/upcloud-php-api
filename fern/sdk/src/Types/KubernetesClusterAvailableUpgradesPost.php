<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class KubernetesClusterAvailableUpgradesPost extends JsonSerializableType
{
    /**
     * @var string $version
     */
    #[JsonProperty('version')]
    public string $version;

    /**
     * @var ?KubernetesClusterUpgradeStrategy $strategy
     */
    #[JsonProperty('strategy')]
    public ?KubernetesClusterUpgradeStrategy $strategy;

    /**
     * @param array{
     *   version: string,
     *   strategy?: ?KubernetesClusterUpgradeStrategy,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->version = $values['version'];
        $this->strategy = $values['strategy'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

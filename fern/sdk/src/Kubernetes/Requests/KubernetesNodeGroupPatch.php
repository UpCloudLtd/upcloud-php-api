<?php

namespace Upcloud\Kubernetes\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\KubernetesNodeGroupHealthCheck;

class KubernetesNodeGroupPatch extends JsonSerializableType
{
    /**
     * @var ?int $count
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?KubernetesNodeGroupHealthCheck $healthCheck
     */
    #[JsonProperty('health_check')]
    public ?KubernetesNodeGroupHealthCheck $healthCheck;

    /**
     * @param array{
     *   count?: ?int,
     *   healthCheck?: ?KubernetesNodeGroupHealthCheck,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->healthCheck = $values['healthCheck'] ?? null;
    }
}

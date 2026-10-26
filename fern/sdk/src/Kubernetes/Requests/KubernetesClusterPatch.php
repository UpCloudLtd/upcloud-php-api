<?php

namespace Upcloud\Kubernetes\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\KubernetesClusterPlan;

class KubernetesClusterPatch extends JsonSerializableType
{
    /**
     * @var ?array<string> $controlPlaneIpFilter
     */
    #[JsonProperty('control_plane_ip_filter'), ArrayType(['string'])]
    public ?array $controlPlaneIpFilter;

    /**
     * @var mixed $labels
     */
    #[JsonProperty('labels')]
    public mixed $labels;

    /**
     * @var ?value-of<KubernetesClusterPlan> $plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @param array{
     *   labels: mixed,
     *   controlPlaneIpFilter?: ?array<string>,
     *   plan?: ?value-of<KubernetesClusterPlan>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->controlPlaneIpFilter = $values['controlPlaneIpFilter'] ?? null;
        $this->labels = $values['labels'];
        $this->plan = $values['plan'] ?? null;
    }
}

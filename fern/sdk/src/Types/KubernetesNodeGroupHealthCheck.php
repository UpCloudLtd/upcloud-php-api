<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Automatic replacement of unhealthy nodes.
 * **Replacement Criteria:**
 * * A node is replaced if it remains in the `NotReady` state (such as a stopped server or unreachable kubelet) for longer than unhealthy_timeout. * The node startup grace period is 10 minutes when health checks are enabled.
 * **Safety Thresholds:**
 * * Remediation triggers only when at least 40% of the node group is healthy, preventing cascading node turnover during broader issues. * **Exception:** Small node groups (2 or fewer replicas) bypass this threshold and are always remediated.
 */
class KubernetesNodeGroupHealthCheck extends JsonSerializableType
{
    /**
     * @var bool $enabled Enable automatic replacement of unhealthy nodes
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var ?int $unhealthyTimeout Seconds a node may be NotReady before it is replaced. Note that this doesn't affect node startup timeout
     */
    #[JsonProperty('unhealthy_timeout')]
    public ?int $unhealthyTimeout;

    /**
     * @param array{
     *   enabled: bool,
     *   unhealthyTimeout?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'];
        $this->unhealthyTimeout = $values['unhealthyTimeout'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

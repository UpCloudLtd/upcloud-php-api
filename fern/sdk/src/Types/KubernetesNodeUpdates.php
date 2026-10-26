<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Enable periodic package updates on node
 */
class KubernetesNodeUpdates extends JsonSerializableType
{
    /**
     * @var bool $kubernetesPatches Include Kubernetes package patch updates (kubeadm, kubectl, kubelet)
     */
    #[JsonProperty('kubernetes_patches')]
    public bool $kubernetesPatches;

    /**
     * @var value-of<KubernetesNodeUpdatesScheduleDow> $scheduleDow The day of the week on which updates will be performed
     */
    #[JsonProperty('schedule_dow')]
    public string $scheduleDow;

    /**
     * @var string $scheduleTime The time at which the updates will be applied in UTC (HH:MM).
     */
    #[JsonProperty('schedule_time')]
    public string $scheduleTime;

    /**
     * @param array{
     *   kubernetesPatches: bool,
     *   scheduleDow: value-of<KubernetesNodeUpdatesScheduleDow>,
     *   scheduleTime: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->kubernetesPatches = $values['kubernetesPatches'];
        $this->scheduleDow = $values['scheduleDow'];
        $this->scheduleTime = $values['scheduleTime'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

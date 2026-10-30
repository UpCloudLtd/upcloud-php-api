<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Kubernetes cluster node
 */
class KubernetesNode extends JsonSerializableType
{
    /**
     * @var string $uuid Node UUID
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $kubeletVersion
     */
    #[JsonProperty('kubelet_version')]
    public string $kubeletVersion;

    /**
     * @var value-of<KubernetesNodeState> $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   kubeletVersion: string,
     *   state: value-of<KubernetesNodeState>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->name = $values['name'];
        $this->kubeletVersion = $values['kubeletVersion'];
        $this->state = $values['state'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

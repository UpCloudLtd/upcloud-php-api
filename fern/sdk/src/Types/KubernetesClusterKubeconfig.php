<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Kubernetes cluster kubeconfig
 */
class KubernetesClusterKubeconfig extends JsonSerializableType
{
    /**
     * @var string $kubeconfig
     */
    #[JsonProperty('kubeconfig')]
    public string $kubeconfig;

    /**
     * @param array{
     *   kubeconfig: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->kubeconfig = $values['kubeconfig'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

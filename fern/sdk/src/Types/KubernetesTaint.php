<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Kubernetes taint to assign to nodes in a group
 */
class KubernetesTaint extends JsonSerializableType
{
    /**
     * @var value-of<KubernetesEffect> $effect
     */
    #[JsonProperty('effect')]
    public string $effect;

    /**
     * @var string $key
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   effect: value-of<KubernetesEffect>,
     *   key: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->effect = $values['effect'];
        $this->key = $values['key'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

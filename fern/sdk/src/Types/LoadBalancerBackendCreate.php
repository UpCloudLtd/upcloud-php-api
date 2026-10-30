<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Core\Types\Union;

/**
 * Load Balancer Backend
 */
class LoadBalancerBackendCreate extends JsonSerializableType
{
    /**
     * @var string $name Name of the backend
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<(
     *    LoadBalancerMemberCreateZero
     *   |LoadBalancerMemberCreateOne
     * )> $members Backend members
     */
    #[JsonProperty('members'), ArrayType([new Union(LoadBalancerMemberCreateZero::class, LoadBalancerMemberCreateOne::class)])]
    public ?array $members;

    /**
     * @var ?array<LoadBalancerTlsConfigCreate> $tlsConfigs TLS Configs
     */
    #[JsonProperty('tls_configs'), ArrayType([LoadBalancerTlsConfigCreate::class])]
    public ?array $tlsConfigs;

    /**
     * @var ?string $resolver Resolver reference
     */
    #[JsonProperty('resolver')]
    public ?string $resolver;

    /**
     * @var ?LoadBalancerBackendPropertiesCreate $properties
     */
    #[JsonProperty('properties')]
    public ?LoadBalancerBackendPropertiesCreate $properties;

    /**
     * @param array{
     *   name: string,
     *   members?: ?array<(
     *    LoadBalancerMemberCreateZero
     *   |LoadBalancerMemberCreateOne
     * )>,
     *   tlsConfigs?: ?array<LoadBalancerTlsConfigCreate>,
     *   resolver?: ?string,
     *   properties?: ?LoadBalancerBackendPropertiesCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->members = $values['members'] ?? null;
        $this->tlsConfigs = $values['tlsConfigs'] ?? null;
        $this->resolver = $values['resolver'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

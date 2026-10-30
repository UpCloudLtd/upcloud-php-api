<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\LoadBalancerMemberModifyZero;
use Upcloud\Types\LoadBalancerMemberModifyOne;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Core\Types\Union;
use Upcloud\Types\LoadBalancerTlsConfigCreate;
use Upcloud\Types\LoadBalancerBackendPropertiesCreate;

class LoadBalancerBackendModify extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the backend
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<(
     *    LoadBalancerMemberModifyZero
     *   |LoadBalancerMemberModifyOne
     * )> $members Backend members
     */
    #[JsonProperty('members'), ArrayType([new Union(LoadBalancerMemberModifyZero::class, LoadBalancerMemberModifyOne::class)])]
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
     *   name?: ?string,
     *   members?: ?array<(
     *    LoadBalancerMemberModifyZero
     *   |LoadBalancerMemberModifyOne
     * )>,
     *   tlsConfigs?: ?array<LoadBalancerTlsConfigCreate>,
     *   resolver?: ?string,
     *   properties?: ?LoadBalancerBackendPropertiesCreate,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->members = $values['members'] ?? null;
        $this->tlsConfigs = $values['tlsConfigs'] ?? null;
        $this->resolver = $values['resolver'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }
}

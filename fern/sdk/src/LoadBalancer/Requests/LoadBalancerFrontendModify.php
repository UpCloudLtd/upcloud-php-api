<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\LoadBalancerFrontendMode;
use Upcloud\Types\LoadBalancerFrontendPropertiesCreate;
use Upcloud\Types\LoadBalancerFrontendNetworkCreate;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\LoadBalancerTlsConfigCreate;
use Upcloud\Types\LoadBalancerRuleCreate;

class LoadBalancerFrontendModify extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the frontend
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $port Port to listen
     */
    #[JsonProperty('port')]
    public ?int $port;

    /**
     * @var ?value-of<LoadBalancerFrontendMode> $mode
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?string $defaultBackend Default backend
     */
    #[JsonProperty('default_backend')]
    public ?string $defaultBackend;

    /**
     * @var ?LoadBalancerFrontendPropertiesCreate $properties
     */
    #[JsonProperty('properties')]
    public ?LoadBalancerFrontendPropertiesCreate $properties;

    /**
     * @var ?array<LoadBalancerFrontendNetworkCreate> $networks Network names
     */
    #[JsonProperty('networks'), ArrayType([LoadBalancerFrontendNetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<LoadBalancerTlsConfigCreate> $tlsConfigs TLS Configs
     */
    #[JsonProperty('tls_configs'), ArrayType([LoadBalancerTlsConfigCreate::class])]
    public ?array $tlsConfigs;

    /**
     * @var ?array<LoadBalancerRuleCreate> $rules Rules
     */
    #[JsonProperty('rules'), ArrayType([LoadBalancerRuleCreate::class])]
    public ?array $rules;

    /**
     * @param array{
     *   name?: ?string,
     *   port?: ?int,
     *   mode?: ?value-of<LoadBalancerFrontendMode>,
     *   defaultBackend?: ?string,
     *   properties?: ?LoadBalancerFrontendPropertiesCreate,
     *   networks?: ?array<LoadBalancerFrontendNetworkCreate>,
     *   tlsConfigs?: ?array<LoadBalancerTlsConfigCreate>,
     *   rules?: ?array<LoadBalancerRuleCreate>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->port = $values['port'] ?? null;
        $this->mode = $values['mode'] ?? null;
        $this->defaultBackend = $values['defaultBackend'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->tlsConfigs = $values['tlsConfigs'] ?? null;
        $this->rules = $values['rules'] ?? null;
    }
}

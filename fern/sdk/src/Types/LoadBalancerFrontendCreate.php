<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Load Balancer Frontend
 */
class LoadBalancerFrontendCreate extends JsonSerializableType
{
    /**
     * @var string $name Name of the frontend
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $port Port to listen
     */
    #[JsonProperty('port')]
    public int $port;

    /**
     * @var value-of<LoadBalancerFrontendMode> $mode
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @var string $defaultBackend Default backend
     */
    #[JsonProperty('default_backend')]
    public string $defaultBackend;

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
     * @var ?LoadBalancerFrontendPropertiesCreate $properties
     */
    #[JsonProperty('properties')]
    public ?LoadBalancerFrontendPropertiesCreate $properties;

    /**
     * @param array{
     *   name: string,
     *   port: int,
     *   mode: value-of<LoadBalancerFrontendMode>,
     *   defaultBackend: string,
     *   networks?: ?array<LoadBalancerFrontendNetworkCreate>,
     *   tlsConfigs?: ?array<LoadBalancerTlsConfigCreate>,
     *   rules?: ?array<LoadBalancerRuleCreate>,
     *   properties?: ?LoadBalancerFrontendPropertiesCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->port = $values['port'];
        $this->mode = $values['mode'];
        $this->defaultBackend = $values['defaultBackend'];
        $this->networks = $values['networks'] ?? null;
        $this->tlsConfigs = $values['tlsConfigs'] ?? null;
        $this->rules = $values['rules'] ?? null;
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

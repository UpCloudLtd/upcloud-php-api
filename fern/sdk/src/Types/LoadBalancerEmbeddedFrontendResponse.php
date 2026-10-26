<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Represents a minimal embedded reference to a frontend within a load balancer service, including its name and any associated TLS configurations.
 */
class LoadBalancerEmbeddedFrontendResponse extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name of the embedded frontend within the load balancer service.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<LoadBalancerTlsConfig> $tlsConfigs List of TLS configuration objects associated with this frontend. Each entry references a certificate bundle used for secure connections.
     */
    #[JsonProperty('tls_configs'), ArrayType([LoadBalancerTlsConfig::class])]
    public ?array $tlsConfigs;

    /**
     * @param array{
     *   name: string,
     *   tlsConfigs?: ?array<LoadBalancerTlsConfig>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->tlsConfigs = $values['tlsConfigs'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Represents a minimal embedded reference to a backend within the load balancer service, including its name and associated TLS configurations.
 */
class LoadBalancerEmbeddedBackendResponse extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name of the embedded backend within the load balancer service.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<LoadBalancerTlsConfig> $tlsConfigs List of TLS configuration objects associated with this backend. Each entry defines a certificate bundle used for secure connections to backend servers.
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

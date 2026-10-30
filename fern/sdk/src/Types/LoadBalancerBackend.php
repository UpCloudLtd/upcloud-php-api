<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents a backend configuration in the load balancer service, containing backend members, resolver settings, TLS configurations, and backend-specific properties such as timeouts and health checks.
 */
class LoadBalancerBackend extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name of the backend
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<LoadBalancerMember> $members List of backend member servers (nodes) participating in this backend configuration.
     */
    #[JsonProperty('members'), ArrayType([LoadBalancerMember::class])]
    public array $members;

    /**
     * @var array<LoadBalancerTlsConfig> $tlsConfigs TLS configurations associated with this backend, specifying certificate bundles and identifiers.
     */
    #[JsonProperty('tls_configs'), ArrayType([LoadBalancerTlsConfig::class])]
    public array $tlsConfigs;

    /**
     * @var ?string $resolver Optional outbound DNS resolver reference used by this backend. Null when not set.
     */
    #[JsonProperty('resolver')]
    public ?string $resolver;

    /**
     * @var LoadBalancerBackendPropertiesResponse $properties
     */
    #[JsonProperty('properties')]
    public LoadBalancerBackendPropertiesResponse $properties;

    /**
     * @var DateTime $createdAt Timestamp when the backend was created (RFC 3339 format).
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the backend was last updated (RFC 3339 format).
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   name: string,
     *   members: array<LoadBalancerMember>,
     *   tlsConfigs: array<LoadBalancerTlsConfig>,
     *   properties: LoadBalancerBackendPropertiesResponse,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   resolver?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->members = $values['members'];
        $this->tlsConfigs = $values['tlsConfigs'];
        $this->resolver = $values['resolver'] ?? null;
        $this->properties = $values['properties'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

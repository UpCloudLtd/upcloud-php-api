<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents a frontend configuration in the load balancer service, defining how client connections are received, the listening port and protocol, TLS settings, routing rules, and default backend association.
 */
class LoadBalancerFrontend extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name assigned to the frontend.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $port Port number on which the frontend listens for incoming connections.
     */
    #[JsonProperty('port')]
    public int $port;

    /**
     * @var value-of<LoadBalancerFrontendMode> $mode Operating mode defining the protocol layer at which the frontend operates.
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @var string $defaultBackend Name of the backend used when no routing rules match the incoming request.
     */
    #[JsonProperty('default_backend')]
    public string $defaultBackend;

    /**
     * @var array<LoadBalancerTlsConfig> $tlsConfigs
     */
    #[JsonProperty('tls_configs'), ArrayType([LoadBalancerTlsConfig::class])]
    public array $tlsConfigs;

    /**
     * @var array<LoadBalancerRule> $rules
     */
    #[JsonProperty('rules'), ArrayType([LoadBalancerRule::class])]
    public array $rules;

    /**
     * @var LoadBalancerFrontendPropertiesResponse $properties
     */
    #[JsonProperty('properties')]
    public LoadBalancerFrontendPropertiesResponse $properties;

    /**
     * @var array<LoadBalancerFrontendNetworksItem> $networks
     */
    #[JsonProperty('networks'), ArrayType([LoadBalancerFrontendNetworksItem::class])]
    public array $networks;

    /**
     * @var DateTime $createdAt Timestamp when the frontend was created (RFC 3339 format).
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the frontend was last updated (RFC 3339 format).
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   name: string,
     *   port: int,
     *   mode: value-of<LoadBalancerFrontendMode>,
     *   defaultBackend: string,
     *   tlsConfigs: array<LoadBalancerTlsConfig>,
     *   rules: array<LoadBalancerRule>,
     *   properties: LoadBalancerFrontendPropertiesResponse,
     *   networks: array<LoadBalancerFrontendNetworksItem>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->port = $values['port'];
        $this->mode = $values['mode'];
        $this->defaultBackend = $values['defaultBackend'];
        $this->tlsConfigs = $values['tlsConfigs'];
        $this->rules = $values['rules'];
        $this->properties = $values['properties'];
        $this->networks = $values['networks'];
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

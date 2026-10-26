<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Represents a minimal embedded reference to a load balancer service, including its UUID, name, and lists of associated frontends and backends.
 */
class LoadBalancerEmbeddedServiceResponse extends JsonSerializableType
{
    /**
     * @var string $uuid Unique identifier for the load balancer service.
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $name Human-readable name of the embedded service.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<LoadBalancerEmbeddedFrontendResponse> $frontends List of frontends associated with the service. Each frontend defines how client connections are received.
     */
    #[JsonProperty('frontends'), ArrayType([LoadBalancerEmbeddedFrontendResponse::class])]
    public ?array $frontends;

    /**
     * @var ?array<LoadBalancerEmbeddedBackendResponse> $backends List of backends associated with the service. Each backend defines how traffic is distributed to target servers.
     */
    #[JsonProperty('backends'), ArrayType([LoadBalancerEmbeddedBackendResponse::class])]
    public ?array $backends;

    /**
     * @var ?bool $deleted Indicates whether the service has been marked as deleted.
     */
    #[JsonProperty('deleted')]
    public ?bool $deleted;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   frontends?: ?array<LoadBalancerEmbeddedFrontendResponse>,
     *   backends?: ?array<LoadBalancerEmbeddedBackendResponse>,
     *   deleted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->name = $values['name'];
        $this->frontends = $values['frontends'] ?? null;
        $this->backends = $values['backends'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryConnectionResponse extends JsonSerializableType
{
    /**
     * @var string $serviceUuid
     */
    #[JsonProperty('service_uuid')]
    public string $serviceUuid;

    /**
     * @var string $serviceName
     */
    #[JsonProperty('service_name')]
    public string $serviceName;

    /**
     * @var string $registryUrl URL of the container registry
     */
    #[JsonProperty('registry_url')]
    public string $registryUrl;

    /**
     * @var ?string $loadBalancerAddress IP address or hostname of the load balancer
     */
    #[JsonProperty('load_balancer_address')]
    public ?string $loadBalancerAddress;

    /**
     * @var bool $tlsEnabled Whether TLS is configured and active
     */
    #[JsonProperty('tls_enabled')]
    public bool $tlsEnabled;

    /**
     * @var bool $dnsConfigured Whether DNS is configured for the registry
     */
    #[JsonProperty('dns_configured')]
    public bool $dnsConfigured;

    /**
     * @var bool $ready Whether the service is ready to accept connections
     */
    #[JsonProperty('ready')]
    public bool $ready;

    /**
     * @var ?string $connectionString Pre-formatted connection string
     */
    #[JsonProperty('connection_string')]
    public ?string $connectionString;

    /**
     * @var ?string $instructions Human-readable instructions for connecting to the registry
     */
    #[JsonProperty('instructions')]
    public ?string $instructions;

    /**
     * @param array{
     *   serviceUuid: string,
     *   serviceName: string,
     *   registryUrl: string,
     *   tlsEnabled: bool,
     *   dnsConfigured: bool,
     *   ready: bool,
     *   loadBalancerAddress?: ?string,
     *   connectionString?: ?string,
     *   instructions?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serviceUuid = $values['serviceUuid'];
        $this->serviceName = $values['serviceName'];
        $this->registryUrl = $values['registryUrl'];
        $this->loadBalancerAddress = $values['loadBalancerAddress'] ?? null;
        $this->tlsEnabled = $values['tlsEnabled'];
        $this->dnsConfigured = $values['dnsConfigured'];
        $this->ready = $values['ready'];
        $this->connectionString = $values['connectionString'] ?? null;
        $this->instructions = $values['instructions'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Detailed network resource attributes.
 */
class NetworkDetails extends JsonSerializableType
{
    /**
     * @var ?value-of<NetworkBooleanYesno> $grtExport
     */
    #[JsonProperty('grt_export')]
    public ?string $grtExport;

    /**
     * @var ?NetworkDetailsIpNetworks $ipNetworks
     */
    #[JsonProperty('ip_networks')]
    public ?NetworkDetailsIpNetworks $ipNetworks;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<string> $networkFeatures
     */
    #[JsonProperty('network_features'), ArrayType(['string'])]
    public ?array $networkFeatures;

    /**
     * @var ?string $parentNetwork
     */
    #[JsonProperty('parent_network')]
    public ?string $parentNetwork;

    /**
     * @var ?NetworkDetailsPeerings $peerings List of network peerings the network is part of
     */
    #[JsonProperty('peerings')]
    public ?NetworkDetailsPeerings $peerings;

    /**
     * @var ?string $router
     */
    #[JsonProperty('router')]
    public ?string $router;

    /**
     * @var ?NetworkDetailsServers $servers
     */
    #[JsonProperty('servers')]
    public ?NetworkDetailsServers $servers;

    /**
     * @var ?NetworkDetailsServices $services List of services this network is joined to
     */
    #[JsonProperty('services')]
    public ?NetworkDetailsServices $services;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var ?value-of<NetworkType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @param array{
     *   name: string,
     *   zone: string,
     *   grtExport?: ?value-of<NetworkBooleanYesno>,
     *   ipNetworks?: ?NetworkDetailsIpNetworks,
     *   networkFeatures?: ?array<string>,
     *   parentNetwork?: ?string,
     *   peerings?: ?NetworkDetailsPeerings,
     *   router?: ?string,
     *   servers?: ?NetworkDetailsServers,
     *   services?: ?NetworkDetailsServices,
     *   tags?: ?array<string>,
     *   type?: ?value-of<NetworkType>,
     *   uuid?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->grtExport = $values['grtExport'] ?? null;
        $this->ipNetworks = $values['ipNetworks'] ?? null;
        $this->name = $values['name'];
        $this->networkFeatures = $values['networkFeatures'] ?? null;
        $this->parentNetwork = $values['parentNetwork'] ?? null;
        $this->peerings = $values['peerings'] ?? null;
        $this->router = $values['router'] ?? null;
        $this->servers = $values['servers'] ?? null;
        $this->services = $values['services'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->uuid = $values['uuid'] ?? null;
        $this->zone = $values['zone'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

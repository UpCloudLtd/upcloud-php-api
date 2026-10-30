<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\NetworkType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\NetworkTags;
use Upcloud\Types\NetworkLabels;
use Upcloud\Types\NetworkFeatures;

class ModifyNetworkRequestNetwork extends JsonSerializableType
{
    /**
     * @var value-of<NetworkType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var NetworkTags $tags
     */
    #[JsonProperty('tags')]
    public NetworkTags $tags;

    /**
     * @var NetworkLabels $labels
     */
    #[JsonProperty('labels')]
    public NetworkLabels $labels;

    /**
     * @var string $router
     */
    #[JsonProperty('router')]
    public string $router;

    /**
     * @var int $grtExport
     */
    #[JsonProperty('grt_export')]
    public int $grtExport;

    /**
     * @var string $parentNetwork
     */
    #[JsonProperty('parent_network')]
    public string $parentNetwork;

    /**
     * @var ModifyNetworkRequestNetworkIpNetworks $ipNetworks
     */
    #[JsonProperty('ip_networks')]
    public ModifyNetworkRequestNetworkIpNetworks $ipNetworks;

    /**
     * @var value-of<NetworkFeatures> $networkFeatures
     */
    #[JsonProperty('network_features')]
    public string $networkFeatures;

    /**
     * @var int $mainAccountId
     */
    #[JsonProperty('main_account_id')]
    public int $mainAccountId;

    /**
     * @param array{
     *   type: value-of<NetworkType>,
     *   name: string,
     *   zone: string,
     *   tags: NetworkTags,
     *   labels: NetworkLabels,
     *   router: string,
     *   grtExport: int,
     *   parentNetwork: string,
     *   ipNetworks: ModifyNetworkRequestNetworkIpNetworks,
     *   networkFeatures: value-of<NetworkFeatures>,
     *   mainAccountId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->name = $values['name'];
        $this->zone = $values['zone'];
        $this->tags = $values['tags'];
        $this->labels = $values['labels'];
        $this->router = $values['router'];
        $this->grtExport = $values['grtExport'];
        $this->parentNetwork = $values['parentNetwork'];
        $this->ipNetworks = $values['ipNetworks'];
        $this->networkFeatures = $values['networkFeatures'];
        $this->mainAccountId = $values['mainAccountId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

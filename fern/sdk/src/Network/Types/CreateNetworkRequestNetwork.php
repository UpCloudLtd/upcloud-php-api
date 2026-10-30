<?php

namespace Upcloud\Network\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\NetworkType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\NetworkLabels;

class CreateNetworkRequestNetwork extends JsonSerializableType
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
     * @var ?string $router
     */
    #[JsonProperty('router')]
    public ?string $router;

    /**
     * @var CreateNetworkRequestNetworkIpNetworks $ipNetworks
     */
    #[JsonProperty('ip_networks')]
    public CreateNetworkRequestNetworkIpNetworks $ipNetworks;

    /**
     * @var ?NetworkLabels $labels
     */
    #[JsonProperty('labels')]
    public ?NetworkLabels $labels;

    /**
     * @param array{
     *   type: value-of<NetworkType>,
     *   name: string,
     *   zone: string,
     *   ipNetworks: CreateNetworkRequestNetworkIpNetworks,
     *   router?: ?string,
     *   labels?: ?NetworkLabels,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->name = $values['name'];
        $this->zone = $values['zone'];
        $this->router = $values['router'] ?? null;
        $this->ipNetworks = $values['ipNetworks'];
        $this->labels = $values['labels'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

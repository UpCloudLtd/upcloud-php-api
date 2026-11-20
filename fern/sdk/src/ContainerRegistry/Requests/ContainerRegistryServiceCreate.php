<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ContainerRegistryTier;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceCreateLabelsItem;
use Upcloud\Core\Types\ArrayType;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceCreateProperties;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceCreateNetworksItem;

class ContainerRegistryServiceCreate extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<ContainerRegistryTier> $tier
     */
    #[JsonProperty('tier')]
    public string $tier;

    /**
     * @var string $region
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var ?array<ContainerRegistryServiceCreateLabelsItem> $labels Key/value labels for organising and filtering services.
     */
    #[JsonProperty('labels'), ArrayType([ContainerRegistryServiceCreateLabelsItem::class])]
    public ?array $labels;

    /**
     * @var ?ContainerRegistryServiceCreateProperties $properties Customer-facing typed config block. Feature toggles land here as they ship; mirrors the same object returned by GET.
     */
    #[JsonProperty('properties')]
    public ?ContainerRegistryServiceCreateProperties $properties;

    /**
     * @var ?array<ContainerRegistryServiceCreateNetworksItem> $networks Customer SDN networks to peer to this service's private gateway. Non-empty list implies private access (dual mode).
     */
    #[JsonProperty('networks'), ArrayType([ContainerRegistryServiceCreateNetworksItem::class])]
    public ?array $networks;

    /**
     * @param array{
     *   name: string,
     *   tier: value-of<ContainerRegistryTier>,
     *   region: string,
     *   labels?: ?array<ContainerRegistryServiceCreateLabelsItem>,
     *   properties?: ?ContainerRegistryServiceCreateProperties,
     *   networks?: ?array<ContainerRegistryServiceCreateNetworksItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->tier = $values['tier'];
        $this->region = $values['region'];
        $this->labels = $values['labels'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->networks = $values['networks'] ?? null;
    }
}

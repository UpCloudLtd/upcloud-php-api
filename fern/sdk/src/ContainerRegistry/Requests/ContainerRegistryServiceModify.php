<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ContainerRegistryTier;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceModifyLabelsItem;
use Upcloud\Core\Types\ArrayType;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceModifyProperties;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceModifyNetworksItem;

class ContainerRegistryServiceModify extends JsonSerializableType
{
    /**
     * @var ?value-of<ContainerRegistryTier> $tier
     */
    #[JsonProperty('tier')]
    public ?string $tier;

    /**
     * @var ?array<ContainerRegistryServiceModifyLabelsItem> $labels Replace the labels list. Send an empty array to clear all labels.
     */
    #[JsonProperty('labels'), ArrayType([ContainerRegistryServiceModifyLabelsItem::class])]
    public ?array $labels;

    /**
     * @var ?ContainerRegistryServiceModifyProperties $properties Patch the typed config block. Omit inner fields to keep their current value.
     */
    #[JsonProperty('properties')]
    public ?ContainerRegistryServiceModifyProperties $properties;

    /**
     * @var ?array<ContainerRegistryServiceModifyNetworksItem> $networks Reconcile customer SDN peerings. Adding triggers peering creation; removal goes through DELETE /networks/{peering_uuid}.
     */
    #[JsonProperty('networks'), ArrayType([ContainerRegistryServiceModifyNetworksItem::class])]
    public ?array $networks;

    /**
     * @param array{
     *   tier?: ?value-of<ContainerRegistryTier>,
     *   labels?: ?array<ContainerRegistryServiceModifyLabelsItem>,
     *   properties?: ?ContainerRegistryServiceModifyProperties,
     *   networks?: ?array<ContainerRegistryServiceModifyNetworksItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->tier = $values['tier'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->networks = $values['networks'] ?? null;
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryAccessModeResponse extends JsonSerializableType
{
    /**
     * @var value-of<ContainerRegistryAccessMode> $accessMode
     */
    #[JsonProperty('access_mode')]
    public string $accessMode;

    /**
     * @var ?string $publicEndpoint Public endpoint URL when access mode includes public
     */
    #[JsonProperty('public_endpoint')]
    public ?string $publicEndpoint;

    /**
     * @var ?array<ContainerRegistryAccessModeResponsePrivateNetworksItem> $privateNetworks List of private networks with access
     */
    #[JsonProperty('private_networks'), ArrayType([ContainerRegistryAccessModeResponsePrivateNetworksItem::class])]
    public ?array $privateNetworks;

    /**
     * @param array{
     *   accessMode: value-of<ContainerRegistryAccessMode>,
     *   publicEndpoint?: ?string,
     *   privateNetworks?: ?array<ContainerRegistryAccessModeResponsePrivateNetworksItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessMode = $values['accessMode'];
        $this->publicEndpoint = $values['publicEndpoint'] ?? null;
        $this->privateNetworks = $values['privateNetworks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

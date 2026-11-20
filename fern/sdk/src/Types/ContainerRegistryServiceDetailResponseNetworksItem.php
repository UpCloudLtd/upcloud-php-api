<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryServiceDetailResponseNetworksItem extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $family
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $dnsName
     */
    #[JsonProperty('dns_name')]
    public ?string $dnsName;

    /**
     * @param array{
     *   name?: ?string,
     *   type?: ?string,
     *   family?: ?string,
     *   uuid?: ?string,
     *   dnsName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->family = $values['family'] ?? null;
        $this->uuid = $values['uuid'] ?? null;
        $this->dnsName = $values['dnsName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

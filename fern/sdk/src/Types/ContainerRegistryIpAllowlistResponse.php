<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryIpAllowlistResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryIpAllowlistEntryResponse> $entries List of IP allowlist entries
     */
    #[JsonProperty('entries'), ArrayType([ContainerRegistryIpAllowlistEntryResponse::class])]
    public array $entries;

    /**
     * @param array{
     *   entries: array<ContainerRegistryIpAllowlistEntryResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->entries = $values['entries'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

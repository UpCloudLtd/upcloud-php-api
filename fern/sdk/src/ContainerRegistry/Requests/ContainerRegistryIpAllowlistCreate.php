<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryIpAllowlistCreate extends JsonSerializableType
{
    /**
     * @var string $cidr CIDR block to allow
     */
    #[JsonProperty('cidr')]
    public string $cidr;

    /**
     * @var ?string $description Human-readable description of the allowlist entry
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   cidr: string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cidr = $values['cidr'];
        $this->description = $values['description'] ?? null;
    }
}

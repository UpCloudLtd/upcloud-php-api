<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryRepositoryListResponseRepositoriesItemPlatformsItem extends JsonSerializableType
{
    /**
     * @var string $os
     */
    #[JsonProperty('os')]
    public string $os;

    /**
     * @var string $architecture
     */
    #[JsonProperty('architecture')]
    public string $architecture;

    /**
     * @var ?string $variant
     */
    #[JsonProperty('variant')]
    public ?string $variant;

    /**
     * @var ?string $digest
     */
    #[JsonProperty('digest')]
    public ?string $digest;

    /**
     * @var ?int $sizeBytes
     */
    #[JsonProperty('size_bytes')]
    public ?int $sizeBytes;

    /**
     * @param array{
     *   os: string,
     *   architecture: string,
     *   variant?: ?string,
     *   digest?: ?string,
     *   sizeBytes?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->os = $values['os'];
        $this->architecture = $values['architecture'];
        $this->variant = $values['variant'] ?? null;
        $this->digest = $values['digest'] ?? null;
        $this->sizeBytes = $values['sizeBytes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

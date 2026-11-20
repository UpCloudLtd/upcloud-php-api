<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryTagListResponseTagsItemPlatformsItem extends JsonSerializableType
{
    /**
     * @var string $os Operating system (linux, windows).
     */
    #[JsonProperty('os')]
    public string $os;

    /**
     * @var string $architecture OCI CPU architecture (amd64, arm64, arm, 386).
     */
    #[JsonProperty('architecture')]
    public string $architecture;

    /**
     * @var ?string $variant OCI CPU variant when present (v7, v8). zot returns Arch as architecture/variant; this API splits that.
     */
    #[JsonProperty('variant')]
    public ?string $variant;

    /**
     * @var ?string $digest Digest of this platform's image manifest (sha256:...). Differs from the tag digest when the tag is a multi-arch index.
     */
    #[JsonProperty('digest')]
    public ?string $digest;

    /**
     * @var ?int $sizeBytes This platform's manifest + layer size in bytes, as reported by the registry. Differs from the tag size_bytes, which is the whole index.
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

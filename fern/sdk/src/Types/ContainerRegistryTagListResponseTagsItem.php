<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryTagListResponseTagsItem extends JsonSerializableType
{
    /**
     * @var string $tag Tag name.
     */
    #[JsonProperty('tag')]
    public string $tag;

    /**
     * @var ?string $digest OCI manifest digest (sha256:...). Use this in PUT /repositories/{repo}/tags/{tag} to promote it.
     */
    #[JsonProperty('digest')]
    public ?string $digest;

    /**
     * @var ?int $sizeBytes Total manifest + layer size in bytes.
     */
    #[JsonProperty('size_bytes')]
    public ?int $sizeBytes;

    /**
     * @var ?DateTime $lastUpdated OCI created-time of the manifest, when exposed by the registry.
     */
    #[JsonProperty('last_updated'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUpdated;

    /**
     * @var string $artifactType OCI artifactType of this tag's manifest. When the manifest omits artifactType, this is the config media type. An image index contributes only its own artifactType. When the index omits it, this is an empty string.
     */
    #[JsonProperty('artifact_type')]
    public string $artifactType;

    /**
     * @var ?string $mediaType Media type of this tag's manifest. application/vnd.oci.image.index.v1+json and application/vnd.docker.distribution.manifest.list.v2+json mean the tag is an index. Multi-arch is decided from platforms, not from this field alone. Omitted when registry search does not return it.
     */
    #[JsonProperty('media_type')]
    public ?string $mediaType;

    /**
     * @var ?value-of<ContainerRegistryTagListResponseTagsItemKind> $kind Kind of this tag. multi-arch is an index with two or more distinct os/architecture/variant values, after unknown/unknown attestations are left out. image is a container image, including an index with one real platform. chart is a Helm chart (artifact type application/vnd.cncf.helm.*). artifact is any other OCI artifact. Omitted when registry search does not return enough to classify the tag.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?array<ContainerRegistryTagListResponseTagsItemPlatformsItem> $platforms Pullable index children this tag covers, sorted by os, architecture, variant, digest. The same os/arch can appear more than once when children differ only by OS version (two windows/amd64 images). Attestation blobs stored as unknown/unknown are omitted. Duplicate listings of the same child digest are collapsed. Omitted entirely when the registry does not report platforms.
     */
    #[JsonProperty('platforms'), ArrayType([ContainerRegistryTagListResponseTagsItemPlatformsItem::class])]
    public ?array $platforms;

    /**
     * @param array{
     *   tag: string,
     *   artifactType: string,
     *   digest?: ?string,
     *   sizeBytes?: ?int,
     *   lastUpdated?: ?DateTime,
     *   mediaType?: ?string,
     *   kind?: ?value-of<ContainerRegistryTagListResponseTagsItemKind>,
     *   platforms?: ?array<ContainerRegistryTagListResponseTagsItemPlatformsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->tag = $values['tag'];
        $this->digest = $values['digest'] ?? null;
        $this->sizeBytes = $values['sizeBytes'] ?? null;
        $this->lastUpdated = $values['lastUpdated'] ?? null;
        $this->artifactType = $values['artifactType'];
        $this->mediaType = $values['mediaType'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->platforms = $values['platforms'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

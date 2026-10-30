<?php

namespace Upcloud\Storage\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Storage import parameters.
 */
class CreateStorageImportRequestStorageImport extends JsonSerializableType
{
    /**
     * @var value-of<CreateStorageImportRequestStorageImportSource> $source Import mode. Use `http_import` to download an image or `direct_upload` to receive a temporary upload URL.
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var ?string $sourceLocation Publicly reachable HTTP or HTTPS URL of the image. Required for `http_import`.
     */
    #[JsonProperty('source_location')]
    public ?string $sourceLocation;

    /**
     * @param array{
     *   source: value-of<CreateStorageImportRequestStorageImportSource>,
     *   sourceLocation?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->source = $values['source'];
        $this->sourceLocation = $values['sourceLocation'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

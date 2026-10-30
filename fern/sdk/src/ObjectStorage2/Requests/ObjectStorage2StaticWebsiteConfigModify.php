<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ObjectStorage2StaticWebsiteConfigModify extends JsonSerializableType
{
    /**
     * @var ?string $bucketName Name of the S3/ECS bucket containing the website content. Only alphanumerics, dots, hyphens, and underscores are allowed.
     */
    #[JsonProperty('bucket_name')]
    public ?string $bucketName;

    /**
     * @var ?string $bucketPrefix Optional prefix/subfolder within the bucket. Only alphanumerics, slashes, dots, hyphens, and underscores are allowed.
     */
    #[JsonProperty('bucket_prefix')]
    public ?string $bucketPrefix;

    /**
     * @var ?string $indexDocument Default document for directories. Only alphanumerics, slashes, dots, hyphens, and underscores are allowed.
     */
    #[JsonProperty('index_document')]
    public ?string $indexDocument;

    /**
     * @var ?bool $spaMode Enable Single Page Application (SPA) mode. When enabled, all non-file routes serve the index document, allowing client-side routing to handle the URL. Essential for React, Vue, Next.js, and similar frameworks.
     */
    #[JsonProperty('spa_mode')]
    public ?bool $spaMode;

    /**
     * @var ?bool $enabled Whether the static website configuration should be active
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?array<mixed> $errorPages Custom error page configurations for specific HTTP status codes or ranges. Replaces the entire set when provided.
     */
    #[JsonProperty('error_pages'), ArrayType(['mixed'])]
    public ?array $errorPages;

    /**
     * @param array{
     *   bucketName?: ?string,
     *   bucketPrefix?: ?string,
     *   indexDocument?: ?string,
     *   spaMode?: ?bool,
     *   enabled?: ?bool,
     *   errorPages?: ?array<mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bucketName = $values['bucketName'] ?? null;
        $this->bucketPrefix = $values['bucketPrefix'] ?? null;
        $this->indexDocument = $values['indexDocument'] ?? null;
        $this->spaMode = $values['spaMode'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->errorPages = $values['errorPages'] ?? null;
    }
}

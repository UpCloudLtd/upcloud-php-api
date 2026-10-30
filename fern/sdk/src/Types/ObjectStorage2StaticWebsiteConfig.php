<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Static website hosting configuration for a specific domain.
 */
class ObjectStorage2StaticWebsiteConfig extends JsonSerializableType
{
    /**
     * @var string $domainName The domain this configuration applies to
     */
    #[JsonProperty('domain_name')]
    public string $domainName;

    /**
     * @var string $bucketName Name of the S3/ECS bucket containing the website content. Only alphanumerics, dots, hyphens, and underscores are allowed.
     */
    #[JsonProperty('bucket_name')]
    public string $bucketName;

    /**
     * @var string $bucketPrefix Optional prefix/subfolder within the bucket. Only alphanumerics, slashes, dots, hyphens, and underscores are allowed.
     */
    #[JsonProperty('bucket_prefix')]
    public string $bucketPrefix;

    /**
     * @var string $indexDocument Default document for directories. Only alphanumerics, slashes, dots, hyphens, and underscores are allowed.
     */
    #[JsonProperty('index_document')]
    public string $indexDocument;

    /**
     * @var ?bool $spaMode Enable Single Page Application (SPA) mode. When enabled, all non-file routes serve the index document, allowing client-side routing to handle the URL. Essential for React, Vue, Next.js, and similar frameworks.
     */
    #[JsonProperty('spa_mode')]
    public ?bool $spaMode;

    /**
     * @var array<mixed> $errorPages Custom error page configurations for specific HTTP status codes or ranges
     */
    #[JsonProperty('error_pages'), ArrayType(['mixed'])]
    public array $errorPages;

    /**
     * @var bool $enabled Whether the static website configuration is currently active
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var DateTime $createdAt Timestamp when this configuration was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when this configuration was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   domainName: string,
     *   bucketName: string,
     *   bucketPrefix: string,
     *   indexDocument: string,
     *   errorPages: array<mixed>,
     *   enabled: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   spaMode?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domainName = $values['domainName'];
        $this->bucketName = $values['bucketName'];
        $this->bucketPrefix = $values['bucketPrefix'];
        $this->indexDocument = $values['indexDocument'];
        $this->spaMode = $values['spaMode'] ?? null;
        $this->errorPages = $values['errorPages'];
        $this->enabled = $values['enabled'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

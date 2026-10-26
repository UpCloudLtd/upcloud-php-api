<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Schema for policy details including ARN, attachment count, creation date, default version ID, description, document, name, system status, and last updated date.
 */
class ObjectStorage2PolicyDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $arn
     */
    #[JsonProperty('arn')]
    public ?string $arn;

    /**
     * @var ?int $attachmentCount
     */
    #[JsonProperty('attachment_count')]
    public ?int $attachmentCount;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $defaultVersionId
     */
    #[JsonProperty('default_version_id')]
    public ?string $defaultVersionId;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $document
     */
    #[JsonProperty('document')]
    public ?string $document;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $system
     */
    #[JsonProperty('system')]
    public ?bool $system;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   arn?: ?string,
     *   attachmentCount?: ?int,
     *   createdAt?: ?DateTime,
     *   defaultVersionId?: ?string,
     *   description?: ?string,
     *   document?: ?string,
     *   name?: ?string,
     *   system?: ?bool,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->arn = $values['arn'] ?? null;
        $this->attachmentCount = $values['attachmentCount'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->defaultVersionId = $values['defaultVersionId'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->document = $values['document'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->system = $values['system'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

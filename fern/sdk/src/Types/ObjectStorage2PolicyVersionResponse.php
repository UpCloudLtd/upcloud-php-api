<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

/**
 * Schema for a policy version response, including creation date, document content, default status, and version ID.
 */
class ObjectStorage2PolicyVersionResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $createDate
     */
    #[JsonProperty('create_date'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createDate;

    /**
     * @var ?string $document
     */
    #[JsonProperty('document')]
    public ?string $document;

    /**
     * @var ?bool $isDefault
     */
    #[JsonProperty('is_default')]
    public ?bool $isDefault;

    /**
     * @var ?string $versionId
     */
    #[JsonProperty('version_id')]
    public ?string $versionId;

    /**
     * @param array{
     *   createDate?: ?DateTime,
     *   document?: ?string,
     *   isDefault?: ?bool,
     *   versionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createDate = $values['createDate'] ?? null;
        $this->document = $values['document'] ?? null;
        $this->isDefault = $values['isDefault'] ?? null;
        $this->versionId = $values['versionId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

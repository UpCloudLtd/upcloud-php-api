<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Storage resource summary returned by public list operations.
 */
class StorageListItem extends JsonSerializableType
{
    /**
     * @var value-of<StorageAccess> $access
     */
    #[JsonProperty('access')]
    public string $access;

    /**
     * @var value-of<StorageEncrypted> $encrypted
     */
    #[JsonProperty('encrypted')]
    public string $encrypted;

    /**
     * @var array<StorageLabel> $labels Labels describing and classifying the storage resource.
     */
    #[JsonProperty('labels'), ArrayType([StorageLabel::class])]
    public array $labels;

    /**
     * @var float $license Hourly license fee in credits. The value is `0` when the storage resource has no license fee.
     */
    #[JsonProperty('license')]
    public float $license;

    /**
     * @var ?value-of<StorageListItemPartOfPlan> $partOfPlan Present with value `yes` when the storage resource is included in the Cloud Server plan.
     */
    #[JsonProperty('part_of_plan')]
    public ?string $partOfPlan;

    /**
     * @var ?string $progress Progress of an active storage operation.
     */
    #[JsonProperty('progress')]
    public ?string $progress;

    /**
     * @var ?DateTime $created Time when the private storage resource or backup was created.
     */
    #[JsonProperty('created'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $created;

    /**
     * @var ?string $origin
     */
    #[JsonProperty('origin')]
    public ?string $origin;

    /**
     * @var int $size Size of the storage resource in gigabytes.
     */
    #[JsonProperty('size')]
    public int $size;

    /**
     * @var value-of<StorageState> $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var ?value-of<StorageTier> $tier
     */
    #[JsonProperty('tier')]
    public ?string $tier;

    /**
     * @var string $title A short, informational description of the storage resource.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var value-of<StorageType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?value-of<StorageTemplateType> $templateType
     */
    #[JsonProperty('template_type')]
    public ?string $templateType;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var ?string $zone
     */
    #[JsonProperty('zone')]
    public ?string $zone;

    /**
     * @param array{
     *   access: value-of<StorageAccess>,
     *   encrypted: value-of<StorageEncrypted>,
     *   labels: array<StorageLabel>,
     *   license: float,
     *   size: int,
     *   state: value-of<StorageState>,
     *   title: string,
     *   type: value-of<StorageType>,
     *   uuid: string,
     *   partOfPlan?: ?value-of<StorageListItemPartOfPlan>,
     *   progress?: ?string,
     *   created?: ?DateTime,
     *   origin?: ?string,
     *   tier?: ?value-of<StorageTier>,
     *   templateType?: ?value-of<StorageTemplateType>,
     *   zone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->access = $values['access'];
        $this->encrypted = $values['encrypted'];
        $this->labels = $values['labels'];
        $this->license = $values['license'];
        $this->partOfPlan = $values['partOfPlan'] ?? null;
        $this->progress = $values['progress'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->origin = $values['origin'] ?? null;
        $this->size = $values['size'];
        $this->state = $values['state'];
        $this->tier = $values['tier'] ?? null;
        $this->title = $values['title'];
        $this->type = $values['type'];
        $this->templateType = $values['templateType'] ?? null;
        $this->uuid = $values['uuid'];
        $this->zone = $values['zone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

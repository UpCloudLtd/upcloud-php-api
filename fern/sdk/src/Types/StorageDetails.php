<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Core\Types\Union;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Detailed information about a storage resource.
 */
class StorageDetails extends JsonSerializableType
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
     * @var float $license Hourly license cost in credits when the storage resource contains a licensed operating system.
     */
    #[JsonProperty('license')]
    public float $license;

    /**
     * @var (
     *    StorageBackupRule
     *   |array<string, mixed>
     * )|null $backupRule Schedule for automatic backups of the storage resource. An empty object indicates that no automatic backup schedule is configured.
     */
    #[JsonProperty('backup_rule'), Union(StorageBackupRule::class, ['string' => 'mixed'], 'null')]
    public StorageBackupRule|array|null $backupRule;

    /**
     * @var ?StorageDetailsBackups $backups Backups associated with this storage resource.
     */
    #[JsonProperty('backups')]
    public ?StorageDetailsBackups $backups;

    /**
     * @var ?DateTime $created Time when the private storage resource was created.
     */
    #[JsonProperty('created'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $created;

    /**
     * @var ?string $origin
     */
    #[JsonProperty('origin')]
    public ?string $origin;

    /**
     * @var ?value-of<StorageDetailsPartOfPlan> $partOfPlan Present with the value `yes` when the storage resource is included in a Cloud Server plan.
     */
    #[JsonProperty('part_of_plan')]
    public ?string $partOfPlan;

    /**
     * @var ?string $progress Progress of an ongoing storage operation when available.
     */
    #[JsonProperty('progress')]
    public ?string $progress;

    /**
     * @var StorageDetailsServers $servers Cloud Servers to which the storage resource is attached.
     */
    #[JsonProperty('servers')]
    public StorageDetailsServers $servers;

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
     *   servers: StorageDetailsServers,
     *   size: int,
     *   state: value-of<StorageState>,
     *   title: string,
     *   type: value-of<StorageType>,
     *   uuid: string,
     *   backupRule?: (
     *    StorageBackupRule
     *   |array<string, mixed>
     * )|null,
     *   backups?: ?StorageDetailsBackups,
     *   created?: ?DateTime,
     *   origin?: ?string,
     *   partOfPlan?: ?value-of<StorageDetailsPartOfPlan>,
     *   progress?: ?string,
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
        $this->backupRule = $values['backupRule'] ?? null;
        $this->backups = $values['backups'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->origin = $values['origin'] ?? null;
        $this->partOfPlan = $values['partOfPlan'] ?? null;
        $this->progress = $values['progress'] ?? null;
        $this->servers = $values['servers'];
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

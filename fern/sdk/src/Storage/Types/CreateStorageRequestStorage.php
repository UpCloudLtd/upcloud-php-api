<?php

namespace Upcloud\Storage\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\StorageBackupRule;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;
use Upcloud\Types\StorageEncrypted;
use Upcloud\Types\StorageLabel;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\StorageTier;

/**
 * Block storage creation parameters.
 */
class CreateStorageRequestStorage extends JsonSerializableType
{
    /**
     * @var (
     *    StorageBackupRule
     *   |array<string, mixed>
     * )|null $backupRule Schedule for automatic backups. An empty object disables automatic         backups.
     */
    #[JsonProperty('backup_rule'), Union(StorageBackupRule::class, ['string' => 'mixed'], 'null')]
    public StorageBackupRule|array|null $backupRule;

    /**
     * @var ?value-of<StorageEncrypted> $encrypted
     */
    #[JsonProperty('encrypted')]
    public ?string $encrypted;

    /**
     * @var ?array<StorageLabel> $labels Labels describing and classifying the block storage. Each label contains a key and a value.
     */
    #[JsonProperty('labels'), ArrayType([StorageLabel::class])]
    public ?array $labels;

    /**
     * @var (
     *    int
     *   |string
     * ) $size Size of the block storage in gigabytes, from 1 through 4096 subject to the account's block storage limits.
     */
    #[JsonProperty('size'), Union('integer', 'string')]
    public int|string $size;

    /**
     * @var ?value-of<StorageTier> $tier
     */
    #[JsonProperty('tier')]
    public ?string $tier;

    /**
     * @var string $title A short, informational description of the block storage.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @param array{
     *   size: (
     *    int
     *   |string
     * ),
     *   title: string,
     *   zone: string,
     *   backupRule?: (
     *    StorageBackupRule
     *   |array<string, mixed>
     * )|null,
     *   encrypted?: ?value-of<StorageEncrypted>,
     *   labels?: ?array<StorageLabel>,
     *   tier?: ?value-of<StorageTier>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->backupRule = $values['backupRule'] ?? null;
        $this->encrypted = $values['encrypted'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->size = $values['size'];
        $this->tier = $values['tier'] ?? null;
        $this->title = $values['title'];
        $this->zone = $values['zone'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

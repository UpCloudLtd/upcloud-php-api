<?php

namespace Upcloud\Storage\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\StorageBackupRule;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;
use Upcloud\Types\StorageLabel;
use Upcloud\Core\Types\ArrayType;

/**
 * Block storage properties to modify.
 */
class ModifyStorageBodyStorage extends JsonSerializableType
{
    /**
     * @var (
     *    StorageBackupRule
     *   |array<string, mixed>
     * )|null $backupRule Schedule for automatic backups of the block storage. An empty object removes the configured schedule.
     */
    #[JsonProperty('backup_rule'), Union(StorageBackupRule::class, ['string' => 'mixed'], 'null')]
    public StorageBackupRule|array|null $backupRule;

    /**
     * @var ?value-of<ModifyStorageBodyStorageFilesystemResize> $filesystemResize Set to `yes` when increasing `size` to also resize the last partition and its supported filesystem. The attached Cloud Server, if any, must be stopped.
     */
    #[JsonProperty('filesystem_resize')]
    public ?string $filesystemResize;

    /**
     * @var ?array<StorageLabel> $labels Labels describing and classifying the block storage. Each label contains a key and a value.
     */
    #[JsonProperty('labels'), ArrayType([StorageLabel::class])]
    public ?array $labels;

    /**
     * @var (
     *    int
     *   |string
     * )|null $size New block storage size in gigabytes, from 1 through 4096 subject to the account's block storage limits. The new size must be greater than the current size.
     */
    #[JsonProperty('size'), Union('integer', 'string', 'null')]
    public int|string|null $size;

    /**
     * @var ?string $title A short, informational description of the block storage.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   backupRule?: (
     *    StorageBackupRule
     *   |array<string, mixed>
     * )|null,
     *   filesystemResize?: ?value-of<ModifyStorageBodyStorageFilesystemResize>,
     *   labels?: ?array<StorageLabel>,
     *   size?: (
     *    int
     *   |string
     * )|null,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backupRule = $values['backupRule'] ?? null;
        $this->filesystemResize = $values['filesystemResize'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

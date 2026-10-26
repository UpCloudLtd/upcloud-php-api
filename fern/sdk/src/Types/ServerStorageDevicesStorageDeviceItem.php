<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Core\Types\Union;

class ServerStorageDevicesStorageDeviceItem extends JsonSerializableType
{
    /**
     * @var value-of<ServerStorageDevicesStorageDeviceItemAction> $action Method used to create, clone, or attach storage for the device
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?string $address Device address on the Cloud Server
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?ServerStorageDevicesStorageDeviceItemBackupRule $backupRule
     */
    #[JsonProperty('backup_rule')]
    public ?ServerStorageDevicesStorageDeviceItemBackupRule $backupRule;

    /**
     * @var ?value-of<ServerBooleanYesno> $encrypted
     */
    #[JsonProperty('encrypted')]
    public ?string $encrypted;

    /**
     * @var ?array<ServerLabel> $labels
     */
    #[JsonProperty('labels'), ArrayType([ServerLabel::class])]
    public ?array $labels;

    /**
     * @var (
     *    int
     *   |string
     * )|null $size Requested block storage size in gigabytes
     */
    #[JsonProperty('size'), Union('integer', 'string', 'null')]
    public int|string|null $size;

    /**
     * @var ?string $storage UUID of the storage resource to attach or clone
     */
    #[JsonProperty('storage')]
    public ?string $storage;

    /**
     * @var ?string $tier Performance and pricing tier of the block storage
     */
    #[JsonProperty('tier')]
    public ?string $tier;

    /**
     * @var ?string $title Short informational description of the block storage
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $type Storage device type: disk or cdrom
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   action: value-of<ServerStorageDevicesStorageDeviceItemAction>,
     *   address?: ?string,
     *   backupRule?: ?ServerStorageDevicesStorageDeviceItemBackupRule,
     *   encrypted?: ?value-of<ServerBooleanYesno>,
     *   labels?: ?array<ServerLabel>,
     *   size?: (
     *    int
     *   |string
     * )|null,
     *   storage?: ?string,
     *   tier?: ?string,
     *   title?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->address = $values['address'] ?? null;
        $this->backupRule = $values['backupRule'] ?? null;
        $this->encrypted = $values['encrypted'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->storage = $values['storage'] ?? null;
        $this->tier = $values['tier'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

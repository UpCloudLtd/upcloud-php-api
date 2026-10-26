<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerStorageDevicesResponseStorageDeviceItem extends JsonSerializableType
{
    /**
     * @var string $address Device address on the Cloud Server.
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var value-of<ServerStorageDevicesResponseStorageDeviceItemBootDisk> $bootDisk Whether this device is the Cloud Server's boot disk, encoded as 0 or 1.
     */
    #[JsonProperty('boot_disk')]
    public string $bootDisk;

    /**
     * @var array<ServerLabel> $labels Labels assigned to the storage resource.
     */
    #[JsonProperty('labels'), ArrayType([ServerLabel::class])]
    public array $labels;

    /**
     * @var ?value-of<ServerBooleanYesno> $partOfPlan
     */
    #[JsonProperty('part_of_plan')]
    public ?string $partOfPlan;

    /**
     * @var string $storage Storage resource UUID. Empty for an unloaded CD-ROM device.
     */
    #[JsonProperty('storage')]
    public string $storage;

    /**
     * @var value-of<ServerBooleanYesno> $storageEncrypted
     */
    #[JsonProperty('storage_encrypted')]
    public string $storageEncrypted;

    /**
     * @var int $storageSize Storage resource size in gibibytes.
     */
    #[JsonProperty('storage_size')]
    public int $storageSize;

    /**
     * @var ?string $storageTier Storage resource performance tier.
     */
    #[JsonProperty('storage_tier')]
    public ?string $storageTier;

    /**
     * @var string $storageTitle Storage resource title.
     */
    #[JsonProperty('storage_title')]
    public string $storageTitle;

    /**
     * @var value-of<ServerStorageDevicesResponseStorageDeviceItemType> $type Attached device type.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   address: string,
     *   bootDisk: value-of<ServerStorageDevicesResponseStorageDeviceItemBootDisk>,
     *   labels: array<ServerLabel>,
     *   storage: string,
     *   storageEncrypted: value-of<ServerBooleanYesno>,
     *   storageSize: int,
     *   storageTitle: string,
     *   type: value-of<ServerStorageDevicesResponseStorageDeviceItemType>,
     *   partOfPlan?: ?value-of<ServerBooleanYesno>,
     *   storageTier?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'];
        $this->bootDisk = $values['bootDisk'];
        $this->labels = $values['labels'];
        $this->partOfPlan = $values['partOfPlan'] ?? null;
        $this->storage = $values['storage'];
        $this->storageEncrypted = $values['storageEncrypted'];
        $this->storageSize = $values['storageSize'];
        $this->storageTier = $values['storageTier'] ?? null;
        $this->storageTitle = $values['storageTitle'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

declare(strict_types=1);


namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class StorageDevice
{

    const PART_OF_PLAN_YES = 'yes';
    const PART_OF_PLAN_NO = 'no';

    const BOOT_DISK_NO = '0';
    const BOOT_DISK_YES = '1';

    const TYPE_DISK = 'disk';
    const TYPE_CDROM = 'cdrom';

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var float|null
     */
    private $size;

    /**
     * @var string|null
     */
    private $tier;

    /**
     * @var string|null
     */
    private $action;
    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $partOfPlan;

    /**
     * @var string|null
     */
    private $storage;

    /**
     * @var float|null
     */
    private $storageSize;

    /**
     * @var string|null
     */
    private $storageTitle;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $bootDisk;


    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setTitle($data['title'] ?? null);
        $this->setSize($data['size'] ?? null);
        $this->setTier($data['tier'] ?? null);
        $this->setAction($data['action'] ?? null);
        $this->setAddress($data['address'] ?? null);
        $this->setPartOfPlan($data['part_of_plan'] ?? null);
        $this->setStorage($data['storage'] ?? null);
        $this->setStorageSize($data['storage_size'] ?? null);
        $this->setStorageTitle($data['storage_title'] ?? null);
        $this->setType($data['type'] ?? null);
        $this->setBootDisk($data['boot_disk'] ?? null);
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return StorageDevice
     */
    public function setTitle(?string $title): StorageDevice
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSize(): ?float
    {
        return $this->size;
    }

    /**
     * @param float|null $size
     * @return StorageDevice
     */
    public function setSize(?float $size): StorageDevice
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTier(): ?string
    {
        return $this->tier;
    }

    /**
     * @param string|null $tier
     * @return StorageDevice
     */
    public function setTier(?string $tier): StorageDevice
    {
        $this->tier = $tier;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param string|null $action
     * @return StorageDevice
     */
    public function setAction(?string $action): StorageDevice
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return StorageDevice
     */
    public function setAddress(?string $address): StorageDevice
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPartOfPlan(): ?string
    {
        return $this->partOfPlan;
    }

    /**
     * @param string|null $partOfPlan
     * @return StorageDevice
     */
    public function setPartOfPlan(?string $partOfPlan): StorageDevice
    {
        if (!is_null($partOfPlan)) {
            Assert::oneOf($partOfPlan, [
                self::PART_OF_PLAN_YES,
                self::PART_OF_PLAN_NO,
            ]);
        }
        $this->partOfPlan = $partOfPlan;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStorage(): ?string
    {
        return $this->storage;
    }

    /**
     * @param string|null $storage
     * @return StorageDevice
     */
    public function setStorage(?string $storage): StorageDevice
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getStorageSize(): ?float
    {
        return $this->storageSize;
    }

    /**
     * @param float|null $storageSize
     * @return StorageDevice
     */
    public function setStorageSize(?float $storageSize): StorageDevice
    {
        $this->storageSize = $storageSize;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStorageTitle(): ?string
    {
        return $this->storageTitle;
    }

    /**
     * @param string|null $storageTitle
     * @return StorageDevice
     */
    public function setStorageTitle(?string $storageTitle): StorageDevice
    {
        $this->storageTitle = $storageTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return StorageDevice
     */
    public function setType(?string $type): StorageDevice
    {
        if (!is_null($type)) {
            Assert::oneOf($type, [
                self::TYPE_CDROM,
                self::TYPE_DISK,
            ]);
        }
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBootDisk(): ?string
    {
        return $this->bootDisk;
    }

    /**
     * @param string|null $bootDisk
     * @return StorageDevice
     */
    public function setBootDisk(?string $bootDisk): StorageDevice
    {
        if (!is_null($bootDisk)) {
            Assert::oneOf($bootDisk, [
                self::BOOT_DISK_NO,
                self::BOOT_DISK_YES,
            ]);
        }

        $this->bootDisk = $bootDisk;

        return $this;
    }
}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class Storage
{

    /**
     * @var string|null
     */
    private $access;

    /**
     * @var BackupRule|null
     */
    private $backupRule;

    /**
     * @var StorageBackups|null
     */
    private $backups;

    /**
     * @var float|string|null
     */
    private $license;

    /**
     * @var Servers|null
     */
    private $servers;

    /**
     * @var string|float|null
     */
    private $size;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var string|null
     */
    private $tier;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $uuid;

    /**
     * @var string|null
     */
    private $zone;

    /**
     * @var string|null
     */
    private $origin;

    /**
     * @var string|null
     */
    private $created;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setAccess($data['access'] ?? null);
        $this->setBackupRule($data['backup_rule'] ?? null);
        $this->setBackups($data['backups'] ?? null);
        $this->setLicense($data['license'] ?? null);
        $this->setServers($data['servers'] ?? null);
        $this->setSize($data['size'] ?? null);
        $this->setState($data['state'] ?? null);
        $this->setTier($data['tier'] ?? null);
        $this->setTitle($data['title'] ?? null);
        $this->setType($data['type'] ?? null);
        $this->setUuid($data['uuid'] ?? null);
        $this->setZone($data['zone'] ?? null);
        $this->setOrigin($data['origin'] ?? null);
        $this->setCreated($data['created'] ?? null);
    }

    /**
     * @return string|null
     */
    public function getAccess(): ?string
    {
        return $this->access;
    }

    /**
     * @param string|null $access
     * @return Storage
     */
    public function setAccess(?string $access): Storage
    {
        if (!is_null($access)) {
            Assert::oneOf($access, StorageAccessType::getAllowableEnumValues());
        }

        $this->access = $access;

        return $this;
    }

    /**
     * @return BackupRule|null
     */
    public function getBackupRule(): ?BackupRule
    {
        return $this->backupRule;
    }

    /**
     * @param BackupRule|array|null $backupRule
     * @return Storage
     */
    public function setBackupRule($backupRule): Storage
    {
        if (is_array($backupRule)) {
            $this->backupRule = new BackupRule($backupRule);
        } else {
            $this->backupRule = $backupRule;
        }

        return $this;
    }

    /**
     * @return StorageBackups|null
     */
    public function getBackups(): ?StorageBackups
    {
        return $this->backups;
    }

    /**
     * @param StorageBackups|array|null $backups
     * @return Storage
     */
    public function setBackups($backups): Storage
    {
        if (is_array($backups)) {
            $this->backups = new StorageBackups($backups);
        } else {
            $this->backups = $backups;
        }

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param float|string|null $license
     * @return Storage
     */
    public function setLicense($license): Storage
    {
        $this->license = $license;

        return $this;
    }

    /**
     * @return Servers|null
     */
    public function getServers(): ?Servers
    {
        return $this->servers;
    }

    /**
     * @param Servers|array|null $servers
     * @return Storage
     */
    public function setServers($servers): Storage
    {
        if (is_array($servers)) {
            $this->servers = new Servers($servers);
        } else {
            $this->servers = $servers;
        }

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param float|string|null $size
     * @return Storage
     */
    public function setSize($size): Storage
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return Storage
     */
    public function setState(?string $state): Storage
    {
        if (!is_null($state)) {
            Assert::oneOf($state, StorageState::getAllowableEnumValues());
        }

        $this->state = $state;

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
     * @return Storage
     */
    public function setTier(?string $tier): Storage
    {
        if (!is_null($tier)) {
            Assert::oneOf($tier, StorageTier::getAllowableEnumValues());
        }

        $this->tier = $tier;

        return $this;
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
     * @return Storage
     */
    public function setTitle(?string $title): Storage
    {
        if (!is_null($title)) {
            Assert::maxLength($title, 64);
        }

        $this->title = $title;

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
     * @return Storage
     */
    public function setType(?string $type): Storage
    {
        if (!is_null($type)) {
            Assert::oneOf($type, StorageType::getAllowableEnumValues());
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     * @return Storage
     */
    public function setUuid(?string $uuid): Storage
    {
        if (!is_null($uuid)) {
            Assert::uuid($uuid);
        }

        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZone(): ?string
    {
        return $this->zone;
    }

    /**
     * @param string|null $zone
     * @return Storage
     */
    public function setZone(?string $zone): Storage
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * @param string|null $origin
     * @return Storage
     */
    public function setOrigin(?string $origin): Storage
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param string|null $created
     * @return Storage
     */
    public function setCreated(?string $created): Storage
    {
        $this->created = $created;

        return $this;
    }
}

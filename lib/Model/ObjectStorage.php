<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class ObjectStorage
{
    /**
     * @var string|null
     */
    private $uuid;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $zone;

    /**
     * @var int|null
     */
    private $size;

    /**
     * @var int|null
     */
    private $usedSpace;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var string|null
     */
    private $url;

    /**
     * @var string|null
     */
    private $created;

    /**
     * @var string|null
     */
    private $accessKey;

    /**
     * @var string|null
     */
    private $secretKey;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setUuid($data['uuid'] ?? null);
        $this->setName($data['name'] ?? null);
        $this->setDescription($data['description'] ?? null);
        $this->setZone($data['zone'] ?? null);
        $this->setSize($data['size'] ?? null);
        $this->setState($data['state'] ?? null);
        $this->setUrl($data['url'] ?? null);
        $this->setCreated($data['created'] ?? null);
        $this->setAccessKey($data['access_key'] ?? null);
        $this->setSecretKey($data['secret_key'] ?? null);
        $this->setUsedSpace($data['used_space'] ?? null);
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
     * @return ObjectStorage
     */
    public function setUuid(?string $uuid): ObjectStorage
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ObjectStorage
     */
    public function setName(?string $name): ObjectStorage
    {
        if (!is_null($name)) {
            Assert::range(strlen($name), 3, 32);
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return ObjectStorage
     */
    public function setDescription(?string $description): ObjectStorage
    {
        if (!is_null($description)) {
            Assert::range(strlen($description), 1, 255);
        }

        $this->description = $description;

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
     * @return ObjectStorage
     */
    public function setZone(?string $zone): ObjectStorage
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param int|null $size
     * @return ObjectStorage
     */
    public function setSize(?int $size): ObjectStorage
    {
        if (!is_null($size)) {
            Assert::oneOf($size, [250, 500, 1000]);
        }

        $this->size = $size;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUsedSpace(): ?int
    {
        return $this->usedSpace;
    }

    /**
     * @param int|null $usedSpace
     * @return ObjectStorage
     */
    public function setUsedSpace(?int $usedSpace): ObjectStorage
    {
        $this->usedSpace = $usedSpace;

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
     * @return ObjectStorage
     */
    public function setState(?string $state): ObjectStorage
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return ObjectStorage
     */
    public function setUrl(?string $url): ObjectStorage
    {
        $this->url = $url;

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
     * @return ObjectStorage
     */
    public function setCreated(?string $created): ObjectStorage
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccessKey(): ?string
    {
        return $this->accessKey;
    }

    /**
     * @param string|null $accessKey
     * @return ObjectStorage
     */
    public function setAccessKey(?string $accessKey): ObjectStorage
    {
        if (!is_null($accessKey)) {
            Assert::range(strlen($accessKey), 4, 255);
        }

        $this->accessKey = $accessKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSecretKey(): ?string
    {
        return $this->secretKey;
    }

    /**
     * @param string|null $secretKey
     * @return ObjectStorage
     */
    public function setSecretKey(?string $secretKey): ObjectStorage
    {
        if (!is_null($secretKey)) {
            Assert::range(strlen($secretKey), 8, 255);
        }

        $this->secretKey = $secretKey;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Plan
{
    /**
     * @var float|null
     */
    private $coreNumber;

    /**
     * @var float|null
     */
    private $memoryAmount;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var float|null
     */
    private $publicTrafficOut;

    /**
     * @var float|null
     */
    private $storageSize;

    /**
     * @var string|null
     */
    private $storageTier;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setCoreNumber($data['core_number'] ?? null);
        $this->setMemoryAmount($data['memory_amount'] ?? null);
        $this->setName($data['name'] ?? null);
        $this->setPublicTrafficOut($data['public_traffic_out'] ?? null);
        $this->setStorageSize($data['storage_size'] ?? null);
        $this->setStorageTier($data['storage_tier'] ?? null);
    }

    /**
     * @return float|null
     */
    public function getCoreNumber(): ?float
    {
        return $this->coreNumber;
    }

    /**
     * @param float|null $coreNumber
     * @return Plan
     */
    public function setCoreNumber(?float $coreNumber): Plan
    {
        $this->coreNumber = $coreNumber;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMemoryAmount(): ?float
    {
        return $this->memoryAmount;
    }

    /**
     * @param float|null $memoryAmount
     * @return Plan
     */
    public function setMemoryAmount(?float $memoryAmount): Plan
    {
        $this->memoryAmount = $memoryAmount;

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
     * @return Plan
     */
    public function setName(?string $name): Plan
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPublicTrafficOut(): ?float
    {
        return $this->publicTrafficOut;
    }

    /**
     * @param float|null $publicTrafficOut
     * @return Plan
     */
    public function setPublicTrafficOut(?float $publicTrafficOut): Plan
    {
        $this->publicTrafficOut = $publicTrafficOut;

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
     * @return Plan
     */
    public function setStorageSize(?float $storageSize): Plan
    {
        $this->storageSize = $storageSize;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStorageTier(): ?string
    {
        return $this->storageTier;
    }

    /**
     * @param string|null $storageTier
     * @return Plan
     */
    public function setStorageTier(?string $storageTier): Plan
    {
        $this->storageTier = $storageTier;

        return $this;
    }
}



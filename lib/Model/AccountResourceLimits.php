<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class AccountResourceLimits
{

    /**
     * @var int|null
     */
    private $cores;

    /**
     * @var int|null
     */
    private $detachedFloatingIps;

    /**
     * @var int|null
     */
    private $memory;

    /**
     * @var int|null
     */
    private $networks;

    /**
     * @var int|null
     */
    private $publicIpv4;

    /**
     * @var int|null
     */
    private $publicIpv6;

    /**
     * @var int|null
     */
    private $storageHdd;

    /**
     * @var int|null
     */
    private $storageSsd;

    public function __construct(array $data = null)
    {
        $this->cores               = $data['cores'] ?? null;
        $this->detachedFloatingIps = $data['detached_floating_ips'] ?? null;
        $this->memory              = $data['memory'] ?? null;
        $this->networks            = $data['networks'] ?? null;
        $this->publicIpv4          = $data['public_ipv4'] ?? null;
        $this->publicIpv6          = $data['public_ipv6'] ?? null;
        $this->storageHdd          = $data['storage_hdd'] ?? null;
        $this->storageSsd          = $data['storage_ssd'] ?? null;
    }

    /**
     * @return int|null
     */
    public function getCores(): ?int
    {
        return $this->cores;
    }

    /**
     * @param int|null $cores
     * @return AccountResourceLimits
     */
    public function setCores(?int $cores): AccountResourceLimits
    {
        $this->cores = $cores;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDetachedFloatingIps(): ?int
    {
        return $this->detachedFloatingIps;
    }

    /**
     * @param int|null $detachedFloatingIps
     * @return AccountResourceLimits
     */
    public function setDetachedFloatingIps(?int $detachedFloatingIps): AccountResourceLimits
    {
        $this->detachedFloatingIps = $detachedFloatingIps;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMemory(): ?int
    {
        return $this->memory;
    }

    /**
     * @param int|null $memory
     * @return AccountResourceLimits
     */
    public function setMemory(?int $memory): AccountResourceLimits
    {
        $this->memory = $memory;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNetworks(): ?int
    {
        return $this->networks;
    }

    /**
     * @param int|null $networks
     * @return AccountResourceLimits
     */
    public function setNetworks(?int $networks): AccountResourceLimits
    {
        $this->networks = $networks;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublicIpv4(): ?int
    {
        return $this->publicIpv4;
    }

    /**
     * @param int|null $publicIpv4
     * @return AccountResourceLimits
     */
    public function setPublicIpv4(?int $publicIpv4): AccountResourceLimits
    {
        $this->publicIpv4 = $publicIpv4;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublicIpv6(): ?int
    {
        return $this->publicIpv6;
    }

    /**
     * @param int|null $publicIpv6
     * @return AccountResourceLimits
     */
    public function setPublicIpv6(?int $publicIpv6): AccountResourceLimits
    {
        $this->publicIpv6 = $publicIpv6;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStorageHdd(): ?int
    {
        return $this->storageHdd;
    }

    /**
     * @param int|null $storageHdd
     * @return AccountResourceLimits
     */
    public function setStorageHdd(?int $storageHdd): AccountResourceLimits
    {
        $this->storageHdd = $storageHdd;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStorageSsd(): ?int
    {
        return $this->storageSsd;
    }

    /**
     * @param int|null $storageSsd
     * @return AccountResourceLimits
     */
    public function setStorageSsd(?int $storageSsd): AccountResourceLimits
    {
        $this->storageSsd = $storageSsd;

        return $this;
    }
}

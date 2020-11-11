<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class PriceZone
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var Price|null
     */
    private $firewall;

    /**
     * @var Price|null
     */
    private $ioRequestBackup;

    /**
     * @var Price|null
     */
    private $ioRequestHdd;

    /**
     * @var Price|null
     */
    private $ioRequestMaxiops;

    /**
     * @var Price|null
     */
    private $ipv4Address;

    /**
     * @var Price|null
     */
    private $ipv6Address;

    /**
     * @var Price|null
     */
    private $publicIpv4BandwidthIn;

    /**
     * @var Price|null
     */
    private $publicIpv4BandwidthOut;

    /**
     * @var Price|null
     */
    private $publicIpv6BandwidthIn;

    /**
     * @var Price|null
     */
    private $publicIpv6BandwidthOut;

    /**
     * @var Price|null
     */
    private $serverCore;

    /**
     * @var Price|null
     */
    private $serverMemory;

    /**
     * @var Price|null
     */
    private $storageBackup;

    /**
     * @var Price|null
     */
    private $storageHdd;

    /**
     * @var Price|null
     */
    private $storageMaxiops;

    /**
     * @var Price|null
     */
    private $serverPlan1xCpu1Gb;

    /**
     * @var Price|null
     */
    private $serverPlan1xCpu2Gb;

    /**
     * @var Price|null
     */
    private $serverPlan20xCpu128Gb;

    /**
     * @var Price|null
     */
    private $serverPlan20xCpu96Gb;

    /**
     * @var Price|null
     */
    private $serverPlan2xCpu4Gb;

    /**
     * @var Price|null
     */
    private $serverPlan4xCpu8Gb;

    /**
     * @var Price|null
     */
    private $serverPlan6xCpu16Gb;

    /**
     * @var Price|null
     */
    private $serverPlan8xCpu32Gb;

    /**
     * @var Price|null
     */
    private $serverPlan12xCpu48Gb;

    /**
     * @var Price|null
     */
    private $serverPlan16xCpu64Gb;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setName($data['name'] ?? null);
        $this->setFirewall($data['firewall'] ?? null);
        $this->setIoRequestBackup($data['io_request_backup'] ?? null);
        $this->setIoRequestHdd($data['io_request_hdd'] ?? null);
        $this->setIoRequestMaxiops($data['io_request_maxiops'] ?? null);
        $this->setIpv4Address($data['ipv4_address'] ?? null);
        $this->setIpv6Address($data['ipv6_address'] ?? null);
        $this->setPublicIpv4BandwidthIn($data['public_ipv4_bandwidth_in'] ?? null);
        $this->setPublicIpv4BandwidthOut($data['public_ipv4_bandwidth_out'] ?? null);
        $this->setPublicIpv6BandwidthIn($data['public_ipv6_bandwidth_in'] ?? null);
        $this->setPublicIpv6BandwidthOut($data['public_ipv6_bandwidth_out'] ?? null);
        $this->setServerCore($data['server_core'] ?? null);
        $this->setServerMemory($data['server_memory'] ?? null);
        $this->setStorageBackup($data['storage_backup'] ?? null);
        $this->setStorageHdd($data['storage_hdd'] ?? null);
        $this->setStorageMaxiops($data['storage_maxiops'] ?? null);
        $this->setServerPlan1xCpu1Gb($data['server_plan_1xCPU-1GB'] ?? null);
        $this->setServerPlan1xCpu2Gb($data['server_plan_1xCPU-2GB'] ?? null);
        $this->setServerPlan20xCpu128Gb($data['server_plan_20xCPU-128GB'] ?? null);
        $this->setServerPlan20xCpu96Gb($data['server_plan_20xCPU-96GB'] ?? null);
        $this->setServerPlan2xCpu4Gb($data['server_plan_2xCPU-4GB'] ?? null);
        $this->setServerPlan4xCpu8Gb($data['server_plan_4xCPU-8GB'] ?? null);
        $this->setServerPlan6xCpu16Gb($data['server_plan_6xCPU-16GB'] ?? null);
        $this->setServerPlan8xCpu32Gb($data['server_plan_8xCPU-32GB'] ?? null);
        $this->setServerPlan12xCpu48Gb($data['server_plan_12xCPU-48GB'] ?? null);
        $this->setServerPlan16xCpu64Gb($data['server_plan_16xCPU-64GB'] ?? null);
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
     * @return PriceZone
     */
    public function setName(?string $name): PriceZone
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getFirewall(): ?Price
    {
        return $this->firewall;
    }

    /**
     * @param Price|array|null $firewall
     * @return PriceZone
     */
    public function setFirewall($firewall): PriceZone
    {
        if (is_array($firewall)) {
            $this->firewall = new Price($firewall);
        } else {
            $this->firewall = $firewall;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getIoRequestBackup(): ?Price
    {
        return $this->ioRequestBackup;
    }

    /**
     * @param Price|array|null $ioRequestBackup
     * @return PriceZone
     */
    public function setIoRequestBackup($ioRequestBackup): PriceZone
    {
        if (is_array($ioRequestBackup)) {
            $this->ioRequestBackup = new Price($ioRequestBackup);
        } else {
            $this->ioRequestBackup = $ioRequestBackup;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getIoRequestHdd(): ?Price
    {
        return $this->ioRequestHdd;
    }

    /**
     * @param Price|array|null $ioRequestHdd
     * @return PriceZone
     */
    public function setIoRequestHdd($ioRequestHdd): PriceZone
    {
        if (is_array($ioRequestHdd)) {
            $this->ioRequestHdd = new Price($ioRequestHdd);
        } else {
            $this->ioRequestHdd = $ioRequestHdd;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getIoRequestMaxiops(): ?Price
    {
        return $this->ioRequestMaxiops;
    }

    /**
     * @param Price|array|null $ioRequestMaxiops
     * @return PriceZone
     */
    public function setIoRequestMaxiops($ioRequestMaxiops): PriceZone
    {
        if (is_array($ioRequestMaxiops)) {
            $this->ioRequestMaxiops = new Price($ioRequestMaxiops);
        } else {
            $this->ioRequestMaxiops = $ioRequestMaxiops;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getIpv4Address(): ?Price
    {
        return $this->ipv4Address;
    }

    /**
     * @param Price|array|null $ipv4Address
     * @return PriceZone
     */
    public function setIpv4Address($ipv4Address): PriceZone
    {
        if (is_array($ipv4Address)) {
            $this->ipv4Address = new Price($ipv4Address);
        } else {
            $this->ipv4Address = $ipv4Address;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getIpv6Address(): ?Price
    {
        return $this->ipv6Address;
    }

    /**
     * @param Price|array|null $ipv6Address
     * @return PriceZone
     */
    public function setIpv6Address($ipv6Address): PriceZone
    {
        if (is_array($ipv6Address)) {
            $this->ipv6Address = new Price($ipv6Address);
        } else {
            $this->ipv6Address = $ipv6Address;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getPublicIpv4BandwidthIn(): ?Price
    {
        return $this->publicIpv4BandwidthIn;
    }

    /**
     * @param Price|array|null $publicIpv4BandwidthIn
     * @return PriceZone
     */
    public function setPublicIpv4BandwidthIn($publicIpv4BandwidthIn): PriceZone
    {

        if (is_array($publicIpv4BandwidthIn)) {
            $this->publicIpv4BandwidthIn = new Price($publicIpv4BandwidthIn);
        } else {
            $this->publicIpv4BandwidthIn = $publicIpv4BandwidthIn;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getPublicIpv4BandwidthOut(): ?Price
    {
        return $this->publicIpv4BandwidthOut;
    }

    /**
     * @param Price|array|null $publicIpv4BandwidthOut
     * @return PriceZone
     */
    public function setPublicIpv4BandwidthOut($publicIpv4BandwidthOut): PriceZone
    {
        if (is_array($publicIpv4BandwidthOut)) {
            $this->publicIpv4BandwidthOut = new Price($publicIpv4BandwidthOut);
        } else {
            $this->publicIpv4BandwidthOut = $publicIpv4BandwidthOut;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getPublicIpv6BandwidthIn(): ?Price
    {
        return $this->publicIpv6BandwidthIn;
    }

    /**
     * @param Price|array|null $publicIpv6BandwidthIn
     * @return PriceZone
     */
    public function setPublicIpv6BandwidthIn($publicIpv6BandwidthIn): PriceZone
    {
        if (is_array($publicIpv6BandwidthIn)) {
            $this->publicIpv6BandwidthIn = new Price($publicIpv6BandwidthIn);
        } else {
            $this->publicIpv6BandwidthIn = $publicIpv6BandwidthIn;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getPublicIpv6BandwidthOut(): ?Price
    {
        return $this->publicIpv6BandwidthOut;
    }

    /**
     * @param Price|array|null $publicIpv6BandwidthOut
     * @return PriceZone
     */
    public function setPublicIpv6BandwidthOut($publicIpv6BandwidthOut): PriceZone
    {
        if (is_array($publicIpv6BandwidthOut)) {
            $this->publicIpv6BandwidthOut = new Price($publicIpv6BandwidthOut);
        } else {
            $this->publicIpv6BandwidthOut = $publicIpv6BandwidthOut;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerCore(): ?Price
    {
        return $this->serverCore;
    }

    /**
     * @param Price|array|null $serverCore
     * @return PriceZone
     */
    public function setServerCore($serverCore): PriceZone
    {
        if (is_array($serverCore)) {
            $this->serverCore = new Price($serverCore);
        } else {
            $this->serverCore = $serverCore;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerMemory(): ?Price
    {
        return $this->serverMemory;
    }

    /**
     * @param Price|array|null $serverMemory
     * @return PriceZone
     */
    public function setServerMemory($serverMemory): PriceZone
    {
        if (is_array($serverMemory)) {
            $this->serverMemory = new Price($serverMemory);
        } else {
            $this->serverMemory = $serverMemory;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getStorageBackup(): ?Price
    {
        return $this->storageBackup;
    }

    /**
     * @param Price|array|null $storageBackup
     * @return PriceZone
     */
    public function setStorageBackup($storageBackup): PriceZone
    {
        if (is_array($storageBackup)) {
            $this->storageBackup = new Price($storageBackup);
        } else {
            $this->storageBackup = $storageBackup;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getStorageHdd(): ?Price
    {
        return $this->storageHdd;
    }

    /**
     * @param Price|array|null $storageHdd
     * @return PriceZone
     */
    public function setStorageHdd($storageHdd): PriceZone
    {
        if (is_array($storageHdd)) {
            $this->storageHdd = new Price($storageHdd);
        } else {
            $this->storageHdd = $storageHdd;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getStorageMaxiops(): ?Price
    {
        return $this->storageMaxiops;
    }

    /**
     * @param Price|array|null $storageMaxiops
     * @return PriceZone
     */
    public function setStorageMaxiops($storageMaxiops): PriceZone
    {
        if (is_array($storageMaxiops)) {
            $this->storageMaxiops = new Price($storageMaxiops);
        } else {
            $this->storageMaxiops = $storageMaxiops;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan1xCpu1Gb(): ?Price
    {
        return $this->serverPlan1xCpu1Gb;
    }

    /**
     * @param Price|array|null $serverPlan1xCpu1Gb
     * @return PriceZone
     */
    public function setServerPlan1xCpu1Gb($serverPlan1xCpu1Gb): PriceZone
    {
        if (is_array($serverPlan1xCpu1Gb)) {
            $this->serverPlan1xCpu1Gb = new Price($serverPlan1xCpu1Gb);
        } else {
            $this->serverPlan1xCpu1Gb = $serverPlan1xCpu1Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan1xCpu2Gb(): ?Price
    {
        return $this->serverPlan1xCpu2Gb;
    }

    /**
     * @param Price|array|null $serverPlan1xCpu2Gb
     * @return PriceZone
     */
    public function setServerPlan1xCpu2Gb($serverPlan1xCpu2Gb): PriceZone
    {
        if (is_array($serverPlan1xCpu2Gb)) {
            $this->serverPlan1xCpu2Gb = new Price($serverPlan1xCpu2Gb);
        } else {
            $this->serverPlan1xCpu2Gb = $serverPlan1xCpu2Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan20xCpu128Gb(): ?Price
    {
        return $this->serverPlan20xCpu128Gb;
    }

    /**
     * @param Price|array|null $serverPlan20xCpu128Gb
     * @return PriceZone
     */
    public function setServerPlan20xCpu128Gb($serverPlan20xCpu128Gb): PriceZone
    {
        if (is_array($serverPlan20xCpu128Gb)) {
            $this->serverPlan20xCpu128Gb = new Price($serverPlan20xCpu128Gb);
        } else {
            $this->serverPlan20xCpu128Gb = $serverPlan20xCpu128Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan20xCpu96Gb(): ?Price
    {
        return $this->serverPlan20xCpu96Gb;
    }

    /**
     * @param Price|array|null $serverPlan20xCpu96Gb
     * @return PriceZone
     */
    public function setServerPlan20xCpu96Gb($serverPlan20xCpu96Gb): PriceZone
    {
        if (is_array($serverPlan20xCpu96Gb)) {
            $this->serverPlan20xCpu96Gb = new Price($serverPlan20xCpu96Gb);
        } else {
            $this->serverPlan20xCpu96Gb = $serverPlan20xCpu96Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan2xCpu4Gb(): ?Price
    {
        return $this->serverPlan2xCpu4Gb;
    }

    /**
     * @param Price|array|null $serverPlan2xCpu4Gb
     * @return PriceZone
     */
    public function setServerPlan2xCpu4Gb($serverPlan2xCpu4Gb): PriceZone
    {
        if (is_array($serverPlan2xCpu4Gb)) {
            $this->serverPlan2xCpu4Gb = new Price($serverPlan2xCpu4Gb);
        } else {
            $this->serverPlan2xCpu4Gb = $serverPlan2xCpu4Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan4xCpu8Gb(): ?Price
    {
        return $this->serverPlan4xCpu8Gb;
    }

    /**
     * @param Price|array|null $serverPlan4xCpu8Gb
     * @return PriceZone
     */
    public function setServerPlan4xCpu8Gb($serverPlan4xCpu8Gb): PriceZone
    {
        if (is_array($serverPlan4xCpu8Gb)) {
            $this->serverPlan4xCpu8Gb = new Price($serverPlan4xCpu8Gb);
        } else {
            $this->serverPlan4xCpu8Gb = $serverPlan4xCpu8Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan6xCpu16Gb(): ?Price
    {
        return $this->serverPlan6xCpu16Gb;
    }

    /**
     * @param Price|array|null $serverPlan6xCpu16Gb
     * @return PriceZone
     */
    public function setServerPlan6xCpu16Gb($serverPlan6xCpu16Gb): PriceZone
    {
        if (is_array($serverPlan6xCpu16Gb)) {
            $this->serverPlan6xCpu16Gb = new Price($serverPlan6xCpu16Gb);
        } else {
            $this->serverPlan6xCpu16Gb = $serverPlan6xCpu16Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan8xCpu32Gb(): ?Price
    {
        return $this->serverPlan8xCpu32Gb;
    }

    /**
     * @param Price|array|null $serverPlan8xCpu32Gb
     * @return PriceZone
     */
    public function setServerPlan8xCpu32Gb($serverPlan8xCpu32Gb): PriceZone
    {
        if (is_array($serverPlan8xCpu32Gb)) {
            $this->serverPlan8xCpu32Gb = new Price($serverPlan8xCpu32Gb);
        } else {
            $this->serverPlan8xCpu32Gb = $serverPlan8xCpu32Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan12xCpu48Gb(): ?Price
    {
        return $this->serverPlan12xCpu48Gb;
    }

    /**
     * @param Price|array|null $serverPlan12xCpu48Gb
     * @return PriceZone
     */
    public function setServerPlan12xCpu48Gb($serverPlan12xCpu48Gb): PriceZone
    {
        if (is_array($serverPlan12xCpu48Gb)) {
            $this->serverPlan12xCpu48Gb = new Price($serverPlan12xCpu48Gb);
        } else {
            $this->serverPlan12xCpu48Gb = $serverPlan12xCpu48Gb;
        }

        return $this;
    }

    /**
     * @return Price|null
     */
    public function getServerPlan16xCpu64Gb(): ?Price
    {
        return $this->serverPlan16xCpu64Gb;
    }

    /**
     * @param Price|array|null $serverPlan16xCpu64Gb
     * @return PriceZone
     */
    public function setServerPlan16xCpu64Gb($serverPlan16xCpu64Gb): PriceZone
    {
        if (is_array($serverPlan16xCpu64Gb)) {
            $this->serverPlan16xCpu64Gb = new Price($serverPlan16xCpu64Gb);
        } else {
            $this->serverPlan16xCpu64Gb = $serverPlan16xCpu64Gb;
        }

        return $this;
    }
}



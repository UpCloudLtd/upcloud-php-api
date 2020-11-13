<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class NetworkInterface
{
    const TYPE__PUBLIC = 'public';
    const TYPE__PRIVATE = 'private';
    const TYPE__UTILITY = 'utility';

    const SOURCE_IP_FILTERING_YES = 'yes';
    const SOURCE_IP_FILTERING_NO = 'no';

    const BOOTABLE_YES = 'yes';
    const BOOTABLE_NO = 'no';

    /**
     * @var string|null
     */
    private $network;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var float|string|null
     */
    private $index;

    /**
     * @var IpAddresses|null
     */
    private $ipAddresses;

    /**
     * @var string|null
     */
    private $sourceIpFiltering;

    /**
     * @var string|null
     */
    private $bootable;

    /**
     * @var string|null
     */
    private $mac;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setNetwork($data['network'] ?? null);
        $this->setType($data['type'] ?? null);
        $this->setIndex($data['index'] ?? null);
        $this->setIpAddresses($data['ip_addresses'] ?? null);
        $this->setSourceIpFiltering($data['source_ip_filtering'] ?? null);
        $this->setBootable($data['bootable'] ?? null);
        $this->setMac($data['mac'] ?? null);
    }

    /**
     * @return string|null
     */
    public function getNetwork(): ?string
    {
        return $this->network;
    }

    /**
     * @param string|null $network
     * @return NetworkInterface
     */
    public function setNetwork(?string $network): NetworkInterface
    {
        if (!is_null($network)) {
            Assert::uuid($network);
        }

        $this->network = $network;

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
     * @return NetworkInterface
     */
    public function setType(?string $type): NetworkInterface
    {
        if (!is_null($type)) {
            Assert::oneOf($type, [
                self::TYPE__PUBLIC,
                self::TYPE__PRIVATE,
                self::TYPE__UTILITY
            ]);
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param float|string|null $index
     * @return NetworkInterface
     */
    public function setIndex($index): NetworkInterface
    {
        $this->index = $index;

        return $this;
    }

    /**
     * @return IpAddresses|null
     */
    public function getIpAddresses(): ?IpAddresses
    {
        return $this->ipAddresses;
    }

    /**
     * @param IpAddresses|array|null $ipAddresses
     *
     * @return NetworkInterface
     */
    public function setIpAddresses($ipAddresses): NetworkInterface
    {
        if (is_array($ipAddresses)) {
            $this->ipAddresses = new IpAddresses($ipAddresses);
        } else {
            $this->ipAddresses = $ipAddresses;
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSourceIpFiltering(): ?string
    {
        return $this->sourceIpFiltering;
    }

    /**
     * @param string|null $sourceIpFiltering
     * @return NetworkInterface
     */
    public function setSourceIpFiltering(?string $sourceIpFiltering): NetworkInterface
    {
        if (!is_null($sourceIpFiltering)) {
            Assert::oneOf($sourceIpFiltering, [
                self::SOURCE_IP_FILTERING_YES,
                self::SOURCE_IP_FILTERING_NO
            ]);
        }

        $this->sourceIpFiltering = $sourceIpFiltering;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBootable(): ?string
    {
        return $this->bootable;
    }

    /**
     * @param string|null $bootable
     * @return NetworkInterface
     */
    public function setBootable(?string $bootable): NetworkInterface
    {
        if (!is_null($bootable)) {
            Assert::oneOf($bootable, [
                self::BOOTABLE_NO,
                self::BOOTABLE_YES
            ]);
        }

        $this->bootable = $bootable;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMac(): ?string
    {
        return $this->mac;
    }

    /**
     * @param string|null $mac
     * @return NetworkInterface
     */
    public function setMac(?string $mac): NetworkInterface
    {
        $this->mac = $mac;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use InvalidArgumentException;
use Webmozart\Assert\Assert;

class IpAddress
{
    const ACCESS__PUBLIC = 'public';
    const ACCESS__PRIVATE = 'private';
    const ACCESS__UTILITY = 'utility';

    const FAMILY_IP_V4 = 'IPv4';
    const FAMILY_IP_V6 = 'IPv6';


    const PART_OF_PLAN_YES = 'yes';
    const PART_OF_PLAN_NO = 'no';

    const FLOATING_YES = 'yes';
    const FLOATING_NO = 'no';

    /**
     * @var string|null
     */
    private $access;

    /**
     * @var string|null
     */
    private $family;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $ptrRecord;

    /**
     * @var string|null
     */
    private $server;

    /**
     * @var string|null
     */
    private $partOfPlan;

    /**
     * @var string|null
     */
    private $mac;

    /**
     * @var string|null
     */
    private $floating;

    /**
     * @var string|null
     */
    private $zone;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setAccess($data['access'] ?? null);
        $this->setFamily($data['family'] ?? null);
        $this->setAddress($data['address'] ?? null);
        $this->setPtrRecord($data['ptr_record'] ?? null);
        $this->setServer($data['server'] ?? null);
        $this->setPartOfPlan($data['part_of_plan'] ?? null);
        $this->setMac($data['mac'] ?? null);
        $this->setFloating($data['floating'] ?? null);
        $this->setZone($data['zone'] ?? null);
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
     *
     * @return IpAddress
     * @throws InvalidArgumentException
     */
    public function setAccess(?string $access): IpAddress
    {
        if (!is_null($access)) {
            Assert::oneOf($access, [
                self::ACCESS__UTILITY,
                self::ACCESS__PRIVATE,
                self::ACCESS__PUBLIC
            ]);
        }

        $this->access = $access;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFamily(): ?string
    {
        return $this->family;
    }

    /**
     * @param string|null $family
     * @return IpAddress
     */
    public function setFamily(?string $family): IpAddress
    {
        if (!is_null($family)) {
            Assert::oneOf($family, [
                self::FAMILY_IP_V4,
                self::FAMILY_IP_V6,
            ]);
        }

        $this->family = $family;

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
     *
     * @return IpAddress
     */
    public function setAddress(?string $address): IpAddress
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPtrRecord(): ?string
    {
        return $this->ptrRecord;
    }

    /**
     * @param string|null $ptrRecord
     *
     * @return IpAddress
     */
    public function setPtrRecord(?string $ptrRecord): IpAddress
    {
        $this->ptrRecord = $ptrRecord;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getServer(): ?string
    {
        return $this->server;
    }

    /**
     * @param string|null $server
     *
     * @return IpAddress
     */
    public function setServer(?string $server): IpAddress
    {
        $this->server = $server;

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
     *
     * @return IpAddress
     */
    public function setPartOfPlan(?string $partOfPlan): IpAddress
    {
        if (!is_null($partOfPlan)) {
            Assert::oneOf($partOfPlan, [
                self::PART_OF_PLAN_NO,
                self::PART_OF_PLAN_YES,
            ]);
        }

        $this->partOfPlan = $partOfPlan;

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
     *
     * @return IpAddress
     */
    public function setMac(?string $mac): IpAddress
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFloating(): ?string
    {
        return $this->floating;
    }

    /**
     * @param string|null $floating
     *
     * @return IpAddress
     */
    public function setFloating(?string $floating): IpAddress
    {
        if (!is_null($floating)) {
            Assert::oneOf($floating, [
                self::FLOATING_NO,
                self::FLOATING_YES,
            ]);
        }

        $this->floating = $floating;

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
     *
     * @return IpAddress
     */
    public function setZone(?string $zone): IpAddress
    {
        $this->zone = $zone;

        return $this;
    }
}

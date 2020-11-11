<?php

declare(strict_types=1);


namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class FirewallRule
{

    const DIRECTION_IN = 'in';
    const DIRECTION_OUT = 'out';

    const ACTION_ACCEPT = 'accept';
    const ACTION_REJECT = 'reject';
    const ACTION_DROP = 'drop';

    const PROTOCOL_TCP = 'tcp';
    const PROTOCOL_UDP = 'udp';
    const PROTOCOL_ICMP = 'icmp';

    const FAMILY_IP_V4 = 'IPv4';
    const FAMILY_IP_V6 = 'IPv6';

    /**
     * @var string
     */
    private $direction;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string|float|null
     */
    private $position;

    /**
     * @var string
     */
    private $family;

    /**
     * @var string|null
     */
    private $protocol;

    /**
     * @var string|null
     */
    private $icmpType;

    /**
     * @var string|null
     */
    private $destinationAddressStart;

    /**
     * @var string|null
     */
    private $destinationAddressEnd;

    /**
     * @var string|float|null
     */
    private $destinationPortStart;

    /**
     * @var string|float|null
     */
    private $destinationPortEnd;

    /**
     * @var string|null
     */
    private $sourceAddressStart;

    /**
     * @var string|null
     */
    private $sourceAddressEnd;

    /**
     * @var string|float|null
     */
    private $sourcePortStart;

    /**
     * @var string|float|null
     */
    private $sourcePortEnd;

    /**
     * @var string|null
     */
    private $comment;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setDirection($data['direction'] ?? null);
        $this->setAction($data['action'] ?? null);
        $this->setPosition($data['position'] ?? null);
        $this->setFamily($data['family'] ?? null);
        $this->setProtocol($data['protocol'] ?? null);
        $this->setIcmpType($data['icmp_type'] ?? null);
        $this->setDestinationAddressStart($data['destination_address_start'] ?? null);
        $this->setDestinationAddressEnd($data['destination_address_end'] ?? null);
        $this->setDestinationPortStart($data['destination_port_start'] ?? null);
        $this->setDestinationPortEnd($data['destination_port_end'] ?? null);
        $this->setSourceAddressStart($data['source_address_start'] ?? null);
        $this->setSourceAddressEnd($data['source_address_end'] ?? null);
        $this->setSourcePortStart($data['source_port_start'] ?? null);
        $this->setSourcePortEnd($data['source_port_end'] ?? null);
        $this->setComment($data['comment'] ?? null);
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string|null $direction
     * @return FirewallRule
     */
    public function setDirection(?string $direction): FirewallRule
    {

        Assert::oneOf($direction, [
            self::DIRECTION_IN,
            self::DIRECTION_OUT,
        ]);

        $this->direction = $direction;

        return $this;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string|null $action
     * @return FirewallRule
     */
    public function setAction(?string $action): FirewallRule
    {
        Assert::oneOf($action, [
            self::ACTION_ACCEPT,
            self::ACTION_DROP,
            self::ACTION_REJECT
        ]);

        $this->action = $action;

        return $this;
    }

    /**
     * @return string|float|null
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string|float|null $position
     * @return FirewallRule
     */
    public function setPosition($position): FirewallRule
    {
        if (!is_null($position) && $position !== '') {
            Assert::range($position, '1', '10000');
        }

        $this->position = $position;

        return $this;
    }

    /**
     * @return string
     */
    public function getFamily(): string
    {
        return $this->family;
    }

    /**
     * @param string|null $family
     * @return FirewallRule
     */
    public function setFamily(?string $family): FirewallRule
    {
        Assert::oneOf($family, [
            self::FAMILY_IP_V4,
            self::FAMILY_IP_V6,
        ]);

        $this->family = $family;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    /**
     * @param string|null $protocol
     * @return FirewallRule
     */
    public function setProtocol(?string $protocol): FirewallRule
    {
        Assert::oneOf($protocol, [
            self::PROTOCOL_TCP,
            self::PROTOCOL_UDP,
            self::PROTOCOL_ICMP
        ]);

        $this->protocol = $protocol;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIcmpType(): ?string
    {
        return $this->icmpType;
    }

    /**
     * @param string|null $icmpType
     * @return FirewallRule
     */
    public function setIcmpType(?string $icmpType): FirewallRule
    {
        if (!is_null($icmpType) && $icmpType !== '') {
            Assert::range($icmpType, '0', '255');
        }

        $this->icmpType = $icmpType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDestinationAddressStart(): ?string
    {
        return $this->destinationAddressStart;
    }

    /**
     * @param string|null $destinationAddressStart
     * @return FirewallRule
     */
    public function setDestinationAddressStart(?string $destinationAddressStart): FirewallRule
    {
        if (!is_null($destinationAddressStart) && $destinationAddressStart !== '') {
            if ($this->family === self::FAMILY_IP_V6) {
                Assert::ipv6($destinationAddressStart);
            } else {
                Assert::ipv4($destinationAddressStart);
            }
        }

        $this->destinationAddressStart = $destinationAddressStart;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDestinationAddressEnd(): ?string
    {
        return $this->destinationAddressEnd;
    }

    /**
     * @param string|null $destinationAddressEnd
     * @return FirewallRule
     */
    public function setDestinationAddressEnd(?string $destinationAddressEnd): FirewallRule
    {
        if (!is_null($destinationAddressEnd) && $destinationAddressEnd !== '') {
            if ($this->family === self::FAMILY_IP_V6) {
                Assert::ipv6($destinationAddressEnd);
            } else {
                Assert::ipv4($destinationAddressEnd);
            }
        }

        $this->destinationAddressEnd = $destinationAddressEnd;

        return $this;
    }

    /**
     * @return string|float|null
     */
    public function getDestinationPortStart()
    {
        return $this->destinationPortStart;
    }

    /**
     * @param string|float|null $destinationPortStart
     * @return FirewallRule
     */
    public function setDestinationPortStart($destinationPortStart): FirewallRule
    {

        if (!is_null($destinationPortStart) && $destinationPortStart !== "") {
            Assert::range($destinationPortStart, '1', '65535');
        }

        $this->destinationPortStart = $destinationPortStart;

        return $this;
    }

    /**
     * @return string|float|null
     */
    public function getDestinationPortEnd()
    {
        return $this->destinationPortEnd;
    }

    /**
     * @param string|float|null $destinationPortEnd
     * @return FirewallRule
     */
    public function setDestinationPortEnd($destinationPortEnd): FirewallRule
    {
        if (!is_null($destinationPortEnd) && $destinationPortEnd !== "") {
            Assert::range($destinationPortEnd, '1', '65535');
        }

        $this->destinationPortEnd = $destinationPortEnd;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSourceAddressStart(): ?string
    {
        return $this->sourceAddressStart;
    }

    /**
     * @param string|null $sourceAddressStart
     * @return FirewallRule
     */
    public function setSourceAddressStart(?string $sourceAddressStart): FirewallRule
    {
        if (!is_null($sourceAddressStart) && $sourceAddressStart !== '') {
            if ($this->family === self::FAMILY_IP_V6) {
                Assert::ipv6($sourceAddressStart);
            } else {
                Assert::ipv4($sourceAddressStart);
            }
        }

        $this->sourceAddressStart = $sourceAddressStart;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSourceAddressEnd(): ?string
    {
        return $this->sourceAddressEnd;
    }

    /**
     * @param string|null $sourceAddressEnd
     * @return FirewallRule
     */
    public function setSourceAddressEnd(?string $sourceAddressEnd): FirewallRule
    {
        if (!is_null($sourceAddressEnd) && $sourceAddressEnd !== '') {
            if ($this->family === self::FAMILY_IP_V6) {
                Assert::ipv6($sourceAddressEnd);
            } else {
                Assert::ipv4($sourceAddressEnd);
            }
        }

        $this->sourceAddressEnd = $sourceAddressEnd;

        return $this;
    }

    /**
     * @return string|float|null
     */
    public function getSourcePortStart()
    {
        return $this->sourcePortStart;
    }

    /**
     * @param string|float|null $sourcePortStart
     * @return FirewallRule
     */
    public function setSourcePortStart($sourcePortStart): FirewallRule
    {
        if (!is_null($sourcePortStart) && $sourcePortStart !== "") {
            Assert::range($sourcePortStart, '1', '65535');
        }

        $this->sourcePortStart = $sourcePortStart;

        return $this;
    }

    /**
     * @return string|float|null
     */
    public function getSourcePortEnd()
    {
        return $this->sourcePortEnd;
    }

    /**
     * @param string|float|null $sourcePortEnd
     * @return FirewallRule
     */
    public function setSourcePortEnd($sourcePortEnd): FirewallRule
    {
        if (!is_null($sourcePortEnd) && $sourcePortEnd !== "") {
            Assert::range($sourcePortEnd, '1', '65535');
        }

        $this->sourcePortEnd = $sourcePortEnd;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     * @return FirewallRule
     */
    public function setComment(?string $comment): FirewallRule
    {
        if (!is_null($comment) && $comment !== "") {
            Assert::maxLength($comment, '250');
        }

        $this->comment = $comment;

        return $this;
    }
}

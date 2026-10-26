<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for firewall ruleset rule details.
 */
class FirewallRulesetRuleDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?bool $enabled Enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var mixed $action
     */
    #[JsonProperty('action')]
    public mixed $action;

    /**
     * @var ?string $comment Comments
     */
    #[JsonProperty('comment')]
    public ?string $comment;

    /**
     * @var ?string $destinationAddressStart
     */
    #[JsonProperty('destination_address_start')]
    public ?string $destinationAddressStart;

    /**
     * @var ?string $destinationAddressEnd
     */
    #[JsonProperty('destination_address_end')]
    public ?string $destinationAddressEnd;

    /**
     * @var ?int $destinationPortStart
     */
    #[JsonProperty('destination_port_start')]
    public ?int $destinationPortStart;

    /**
     * @var ?int $destinationPortEnd
     */
    #[JsonProperty('destination_port_end')]
    public ?int $destinationPortEnd;

    /**
     * @var ?string $destinationAddressCidr
     */
    #[JsonProperty('destination_address_cidr')]
    public ?string $destinationAddressCidr;

    /**
     * @var mixed $direction
     */
    #[JsonProperty('direction')]
    public mixed $direction;

    /**
     * @var mixed $family
     */
    #[JsonProperty('family')]
    public mixed $family;

    /**
     * @var ?int $icmpType
     */
    #[JsonProperty('icmp_type')]
    public ?int $icmpType;

    /**
     * @var ?int $position
     */
    #[JsonProperty('position')]
    public ?int $position;

    /**
     * @var mixed $protocol
     */
    #[JsonProperty('protocol')]
    public mixed $protocol;

    /**
     * @var ?string $sourceAddressStart
     */
    #[JsonProperty('source_address_start')]
    public ?string $sourceAddressStart;

    /**
     * @var ?string $sourceAddressEnd
     */
    #[JsonProperty('source_address_end')]
    public ?string $sourceAddressEnd;

    /**
     * @var ?int $sourcePortStart
     */
    #[JsonProperty('source_port_start')]
    public ?int $sourcePortStart;

    /**
     * @var ?int $sourcePortEnd
     */
    #[JsonProperty('source_port_end')]
    public ?int $sourcePortEnd;

    /**
     * @var ?string $sourceAddressCidr
     */
    #[JsonProperty('source_address_cidr')]
    public ?string $sourceAddressCidr;

    /**
     * @param array{
     *   action: mixed,
     *   direction: mixed,
     *   family: mixed,
     *   uuid?: ?string,
     *   enabled?: ?bool,
     *   comment?: ?string,
     *   destinationAddressStart?: ?string,
     *   destinationAddressEnd?: ?string,
     *   destinationPortStart?: ?int,
     *   destinationPortEnd?: ?int,
     *   destinationAddressCidr?: ?string,
     *   icmpType?: ?int,
     *   position?: ?int,
     *   protocol?: mixed,
     *   sourceAddressStart?: ?string,
     *   sourceAddressEnd?: ?string,
     *   sourcePortStart?: ?int,
     *   sourcePortEnd?: ?int,
     *   sourceAddressCidr?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->action = $values['action'];
        $this->comment = $values['comment'] ?? null;
        $this->destinationAddressStart = $values['destinationAddressStart'] ?? null;
        $this->destinationAddressEnd = $values['destinationAddressEnd'] ?? null;
        $this->destinationPortStart = $values['destinationPortStart'] ?? null;
        $this->destinationPortEnd = $values['destinationPortEnd'] ?? null;
        $this->destinationAddressCidr = $values['destinationAddressCidr'] ?? null;
        $this->direction = $values['direction'];
        $this->family = $values['family'];
        $this->icmpType = $values['icmpType'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->protocol = $values['protocol'] ?? null;
        $this->sourceAddressStart = $values['sourceAddressStart'] ?? null;
        $this->sourceAddressEnd = $values['sourceAddressEnd'] ?? null;
        $this->sourcePortStart = $values['sourcePortStart'] ?? null;
        $this->sourcePortEnd = $values['sourcePortEnd'] ?? null;
        $this->sourceAddressCidr = $values['sourceAddressCidr'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

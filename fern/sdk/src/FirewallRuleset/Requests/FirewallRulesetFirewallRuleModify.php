<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FirewallRulesetRuleAction;
use Upcloud\Types\FirewallRulesetRuleDirection;
use Upcloud\Types\FirewallRulesetRuleFamily;
use Upcloud\Types\FirewallRulesetRuleProtocol;

class FirewallRulesetFirewallRuleModify extends JsonSerializableType
{
    /**
     * @var ?bool $enabled Enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?value-of<FirewallRulesetRuleAction> $action
     */
    #[JsonProperty('action')]
    public ?string $action;

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
     * @var ?value-of<FirewallRulesetRuleDirection> $direction
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?value-of<FirewallRulesetRuleFamily> $family
     */
    #[JsonProperty('family')]
    public ?string $family;

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
     * @var ?value-of<FirewallRulesetRuleProtocol> $protocol
     */
    #[JsonProperty('protocol')]
    public ?string $protocol;

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
     *   enabled?: ?bool,
     *   action?: ?value-of<FirewallRulesetRuleAction>,
     *   comment?: ?string,
     *   destinationAddressStart?: ?string,
     *   destinationAddressEnd?: ?string,
     *   destinationPortStart?: ?int,
     *   destinationPortEnd?: ?int,
     *   destinationAddressCidr?: ?string,
     *   direction?: ?value-of<FirewallRulesetRuleDirection>,
     *   family?: ?value-of<FirewallRulesetRuleFamily>,
     *   icmpType?: ?int,
     *   position?: ?int,
     *   protocol?: ?value-of<FirewallRulesetRuleProtocol>,
     *   sourceAddressStart?: ?string,
     *   sourceAddressEnd?: ?string,
     *   sourcePortStart?: ?int,
     *   sourcePortEnd?: ?int,
     *   sourceAddressCidr?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->action = $values['action'] ?? null;
        $this->comment = $values['comment'] ?? null;
        $this->destinationAddressStart = $values['destinationAddressStart'] ?? null;
        $this->destinationAddressEnd = $values['destinationAddressEnd'] ?? null;
        $this->destinationPortStart = $values['destinationPortStart'] ?? null;
        $this->destinationPortEnd = $values['destinationPortEnd'] ?? null;
        $this->destinationAddressCidr = $values['destinationAddressCidr'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->family = $values['family'] ?? null;
        $this->icmpType = $values['icmpType'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->protocol = $values['protocol'] ?? null;
        $this->sourceAddressStart = $values['sourceAddressStart'] ?? null;
        $this->sourceAddressEnd = $values['sourceAddressEnd'] ?? null;
        $this->sourcePortStart = $values['sourcePortStart'] ?? null;
        $this->sourcePortEnd = $values['sourcePortEnd'] ?? null;
        $this->sourceAddressCidr = $values['sourceAddressCidr'] ?? null;
    }
}

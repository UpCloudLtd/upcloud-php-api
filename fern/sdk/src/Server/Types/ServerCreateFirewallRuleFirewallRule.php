<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Traits\ServerFirewallRuleRequirements;
use Upcloud\Core\Json\JsonProperty;

class ServerCreateFirewallRuleFirewallRule extends JsonSerializableType
{
    use ServerFirewallRuleRequirements;

    /**
     * @var value-of<ServerCreateFirewallRuleFirewallRuleAction> $action Action taken when the rule matches.
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?string $comment Free-form rule description.
     */
    #[JsonProperty('comment')]
    public ?string $comment;

    /**
     * @var ?string $destinationAddressEnd Last destination IP address in the range. Must be specified with destination_address_start.
     */
    #[JsonProperty('destination_address_end')]
    public ?string $destinationAddressEnd;

    /**
     * @var ?string $destinationAddressStart First destination IP address in the range. Must be specified with destination_address_end.
     */
    #[JsonProperty('destination_address_start')]
    public ?string $destinationAddressStart;

    /**
     * @var ?string $destinationPortEnd
     */
    #[JsonProperty('destination_port_end')]
    public ?string $destinationPortEnd;

    /**
     * @var ?string $destinationPortStart
     */
    #[JsonProperty('destination_port_start')]
    public ?string $destinationPortStart;

    /**
     * @var value-of<ServerCreateFirewallRuleFirewallRuleDirection> $direction Traffic direction to which the rule applies.
     */
    #[JsonProperty('direction')]
    public string $direction;

    /**
     * @var ?value-of<ServerCreateFirewallRuleFirewallRuleFamily> $family IP address family. Required when protocol, addresses, ports, or ICMP type are specified.
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @var ?string $icmpType
     */
    #[JsonProperty('icmp_type')]
    public ?string $icmpType;

    /**
     * @var ?string $position Position at which to insert the rule. Rules at and after this position are shifted down. If omitted or greater than the current rule count, the rule is appended.
     */
    #[JsonProperty('position')]
    public ?string $position;

    /**
     * @var ?value-of<ServerCreateFirewallRuleFirewallRuleProtocol> $protocol Network protocol to match.
     */
    #[JsonProperty('protocol')]
    public ?string $protocol;

    /**
     * @var ?string $sourceAddressEnd Last source IP address in the range. Must be specified with source_address_start.
     */
    #[JsonProperty('source_address_end')]
    public ?string $sourceAddressEnd;

    /**
     * @var ?string $sourceAddressStart First source IP address in the range. Must be specified with source_address_end.
     */
    #[JsonProperty('source_address_start')]
    public ?string $sourceAddressStart;

    /**
     * @var ?string $sourcePortEnd
     */
    #[JsonProperty('source_port_end')]
    public ?string $sourcePortEnd;

    /**
     * @var ?string $sourcePortStart
     */
    #[JsonProperty('source_port_start')]
    public ?string $sourcePortStart;

    /**
     * @param array{
     *   action: value-of<ServerCreateFirewallRuleFirewallRuleAction>,
     *   direction: value-of<ServerCreateFirewallRuleFirewallRuleDirection>,
     *   comment?: ?string,
     *   destinationAddressEnd?: ?string,
     *   destinationAddressStart?: ?string,
     *   destinationPortEnd?: ?string,
     *   destinationPortStart?: ?string,
     *   family?: ?value-of<ServerCreateFirewallRuleFirewallRuleFamily>,
     *   icmpType?: ?string,
     *   position?: ?string,
     *   protocol?: ?value-of<ServerCreateFirewallRuleFirewallRuleProtocol>,
     *   sourceAddressEnd?: ?string,
     *   sourceAddressStart?: ?string,
     *   sourcePortEnd?: ?string,
     *   sourcePortStart?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->comment = $values['comment'] ?? null;
        $this->destinationAddressEnd = $values['destinationAddressEnd'] ?? null;
        $this->destinationAddressStart = $values['destinationAddressStart'] ?? null;
        $this->destinationPortEnd = $values['destinationPortEnd'] ?? null;
        $this->destinationPortStart = $values['destinationPortStart'] ?? null;
        $this->direction = $values['direction'];
        $this->family = $values['family'] ?? null;
        $this->icmpType = $values['icmpType'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->protocol = $values['protocol'] ?? null;
        $this->sourceAddressEnd = $values['sourceAddressEnd'] ?? null;
        $this->sourceAddressStart = $values['sourceAddressStart'] ?? null;
        $this->sourcePortEnd = $values['sourcePortEnd'] ?? null;
        $this->sourcePortStart = $values['sourcePortStart'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

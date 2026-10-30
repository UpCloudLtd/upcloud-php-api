<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A firewall rule with its position in the Cloud Server's rule chain.
 */
class ServerFirewallRuleResponseItem extends JsonSerializableType
{
    /**
     * @var value-of<ServerFirewallRuleResponseItemAction> $action Action taken when the rule matches.
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var string $comment Free-form rule description.
     */
    #[JsonProperty('comment')]
    public string $comment;

    /**
     * @var string $destinationAddressEnd Last destination IP address in the matched range, or an empty string when unrestricted.
     */
    #[JsonProperty('destination_address_end')]
    public string $destinationAddressEnd;

    /**
     * @var string $destinationAddressStart First destination IP address in the matched range, or an empty string when unrestricted.
     */
    #[JsonProperty('destination_address_start')]
    public string $destinationAddressStart;

    /**
     * @var string $destinationPortEnd Last destination port in the matched range, or an empty string when unrestricted.
     */
    #[JsonProperty('destination_port_end')]
    public string $destinationPortEnd;

    /**
     * @var string $destinationPortStart First destination port in the matched range, or an empty string when unrestricted.
     */
    #[JsonProperty('destination_port_start')]
    public string $destinationPortStart;

    /**
     * @var value-of<ServerFirewallRuleResponseItemDirection> $direction Traffic direction to which the rule applies.
     */
    #[JsonProperty('direction')]
    public string $direction;

    /**
     * @var value-of<ServerFirewallRuleResponseItemFamily> $family IP address family, or an empty string when unrestricted.
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var string $icmpType ICMP packet type, or an empty string when unrestricted.
     */
    #[JsonProperty('icmp_type')]
    public string $icmpType;

    /**
     * @var string $position One-based position in the Cloud Server's firewall rule chain.
     */
    #[JsonProperty('position')]
    public string $position;

    /**
     * @var value-of<ServerFirewallRuleResponseItemProtocol> $protocol Matched network protocol, or an empty string when unrestricted.
     */
    #[JsonProperty('protocol')]
    public string $protocol;

    /**
     * @var string $sourceAddressEnd Last source IP address in the matched range, or an empty string when unrestricted.
     */
    #[JsonProperty('source_address_end')]
    public string $sourceAddressEnd;

    /**
     * @var string $sourceAddressStart First source IP address in the matched range, or an empty string when unrestricted.
     */
    #[JsonProperty('source_address_start')]
    public string $sourceAddressStart;

    /**
     * @var string $sourcePortEnd Last source port in the matched range, or an empty string when unrestricted.
     */
    #[JsonProperty('source_port_end')]
    public string $sourcePortEnd;

    /**
     * @var string $sourcePortStart First source port in the matched range, or an empty string when unrestricted.
     */
    #[JsonProperty('source_port_start')]
    public string $sourcePortStart;

    /**
     * @param array{
     *   action: value-of<ServerFirewallRuleResponseItemAction>,
     *   comment: string,
     *   destinationAddressEnd: string,
     *   destinationAddressStart: string,
     *   destinationPortEnd: string,
     *   destinationPortStart: string,
     *   direction: value-of<ServerFirewallRuleResponseItemDirection>,
     *   family: value-of<ServerFirewallRuleResponseItemFamily>,
     *   icmpType: string,
     *   position: string,
     *   protocol: value-of<ServerFirewallRuleResponseItemProtocol>,
     *   sourceAddressEnd: string,
     *   sourceAddressStart: string,
     *   sourcePortEnd: string,
     *   sourcePortStart: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->comment = $values['comment'];
        $this->destinationAddressEnd = $values['destinationAddressEnd'];
        $this->destinationAddressStart = $values['destinationAddressStart'];
        $this->destinationPortEnd = $values['destinationPortEnd'];
        $this->destinationPortStart = $values['destinationPortStart'];
        $this->direction = $values['direction'];
        $this->family = $values['family'];
        $this->icmpType = $values['icmpType'];
        $this->position = $values['position'];
        $this->protocol = $values['protocol'];
        $this->sourceAddressEnd = $values['sourceAddressEnd'];
        $this->sourceAddressStart = $values['sourceAddressStart'];
        $this->sourcePortEnd = $values['sourcePortEnd'];
        $this->sourcePortStart = $values['sourcePortStart'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

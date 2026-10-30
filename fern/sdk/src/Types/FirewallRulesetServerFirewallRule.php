<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

/**
 * Server firewall rule
 */
class FirewallRulesetServerFirewallRule extends JsonSerializableType
{
    /**
     * @var value-of<FirewallRulesetRuleDirection> $direction
     */
    #[JsonProperty('direction')]
    public string $direction;

    /**
     * @var value-of<FirewallRulesetRuleAction> $action
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var (
     *    int
     *   |string
     * )|null $position Rule position
     */
    #[JsonProperty('position'), Union('integer', 'string', 'null')]
    public int|string|null $position;

    /**
     * @var ?string $family
     */
    #[JsonProperty('family')]
    public ?string $family;

    /**
     * @var ?string $protocol Rule protocol
     */
    #[JsonProperty('protocol')]
    public ?string $protocol;

    /**
     * @var ?string $enabled Rule enabled
     */
    #[JsonProperty('enabled')]
    public ?string $enabled;

    /**
     * @var (
     *    int
     *   |string
     * )|null $icmpType ICMP type
     */
    #[JsonProperty('icmp_type'), Union('integer', 'string', 'null')]
    public int|string|null $icmpType;

    /**
     * @var (
     *    int
     *   |string
     * )|null $destinationPortStart Destination port range starts from this port number
     */
    #[JsonProperty('destination_port_start'), Union('integer', 'string', 'null')]
    public int|string|null $destinationPortStart;

    /**
     * @var (
     *    int
     *   |string
     * )|null $destinationPortEnd Destination port range ends at this port number
     */
    #[JsonProperty('destination_port_end'), Union('integer', 'string', 'null')]
    public int|string|null $destinationPortEnd;

    /**
     * @var (
     *    int
     *   |string
     * )|null $sourcePortStart Source port range starts from this port number
     */
    #[JsonProperty('source_port_start'), Union('integer', 'string', 'null')]
    public int|string|null $sourcePortStart;

    /**
     * @var (
     *    int
     *   |string
     * )|null $sourcePortEnd Source port range ends at this port number
     */
    #[JsonProperty('source_port_end'), Union('integer', 'string', 'null')]
    public int|string|null $sourcePortEnd;

    /**
     * @var ?string $destinationAddressStart Destination address range starts from this address
     */
    #[JsonProperty('destination_address_start')]
    public ?string $destinationAddressStart;

    /**
     * @var ?string $destinationAddressEnd Destination address range ends from to this address
     */
    #[JsonProperty('destination_address_end')]
    public ?string $destinationAddressEnd;

    /**
     * @var ?string $sourceAddressStart Source address range starts from this address
     */
    #[JsonProperty('source_address_start')]
    public ?string $sourceAddressStart;

    /**
     * @var ?string $sourceAddressEnd Source address range ends at this address
     */
    #[JsonProperty('source_address_end')]
    public ?string $sourceAddressEnd;

    /**
     * @var ?string $comment Comment
     */
    #[JsonProperty('comment')]
    public ?string $comment;

    /**
     * @param array{
     *   direction: value-of<FirewallRulesetRuleDirection>,
     *   action: value-of<FirewallRulesetRuleAction>,
     *   position?: (
     *    int
     *   |string
     * )|null,
     *   family?: ?string,
     *   protocol?: ?string,
     *   enabled?: ?string,
     *   icmpType?: (
     *    int
     *   |string
     * )|null,
     *   destinationPortStart?: (
     *    int
     *   |string
     * )|null,
     *   destinationPortEnd?: (
     *    int
     *   |string
     * )|null,
     *   sourcePortStart?: (
     *    int
     *   |string
     * )|null,
     *   sourcePortEnd?: (
     *    int
     *   |string
     * )|null,
     *   destinationAddressStart?: ?string,
     *   destinationAddressEnd?: ?string,
     *   sourceAddressStart?: ?string,
     *   sourceAddressEnd?: ?string,
     *   comment?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->direction = $values['direction'];
        $this->action = $values['action'];
        $this->position = $values['position'] ?? null;
        $this->family = $values['family'] ?? null;
        $this->protocol = $values['protocol'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->icmpType = $values['icmpType'] ?? null;
        $this->destinationPortStart = $values['destinationPortStart'] ?? null;
        $this->destinationPortEnd = $values['destinationPortEnd'] ?? null;
        $this->sourcePortStart = $values['sourcePortStart'] ?? null;
        $this->sourcePortEnd = $values['sourcePortEnd'] ?? null;
        $this->destinationAddressStart = $values['destinationAddressStart'] ?? null;
        $this->destinationAddressEnd = $values['destinationAddressEnd'] ?? null;
        $this->sourceAddressStart = $values['sourceAddressStart'] ?? null;
        $this->sourceAddressEnd = $values['sourceAddressEnd'] ?? null;
        $this->comment = $values['comment'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

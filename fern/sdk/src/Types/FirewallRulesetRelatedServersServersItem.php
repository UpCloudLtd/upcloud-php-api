<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class FirewallRulesetRelatedServersServersItem extends JsonSerializableType
{
    /**
     * @var array<ServerFirewallRulesetRelationshipInternal> $attachedRulesets Private firewall rulesets attached to the Cloud Server.
     */
    #[JsonProperty('attached_rulesets'), ArrayType([ServerFirewallRulesetRelationshipInternal::class])]
    public array $attachedRulesets;

    /**
     * @var value-of<ServerBooleanOnoff> $firewall
     */
    #[JsonProperty('firewall')]
    public string $firewall;

    /**
     * @var value-of<ServerBooleanOnoff> $firewallPrivate
     */
    #[JsonProperty('firewall_private')]
    public string $firewallPrivate;

    /**
     * @var value-of<FirewallRulesetRelatedServersServersItemFirewallPrivateDefaultIncomingAction> $firewallPrivateDefaultIncomingAction Default action for unmatched incoming traffic on private interfaces.
     */
    #[JsonProperty('firewall_private_default_incoming_action')]
    public string $firewallPrivateDefaultIncomingAction;

    /**
     * @var value-of<FirewallRulesetRelatedServersServersItemFirewallPrivateDefaultOutgoingAction> $firewallPrivateDefaultOutgoingAction Default action for unmatched outgoing traffic on private interfaces.
     */
    #[JsonProperty('firewall_private_default_outgoing_action')]
    public string $firewallPrivateDefaultOutgoingAction;

    /**
     * @var string $title Cloud Server title.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @param array{
     *   attachedRulesets: array<ServerFirewallRulesetRelationshipInternal>,
     *   firewall: value-of<ServerBooleanOnoff>,
     *   firewallPrivate: value-of<ServerBooleanOnoff>,
     *   firewallPrivateDefaultIncomingAction: value-of<FirewallRulesetRelatedServersServersItemFirewallPrivateDefaultIncomingAction>,
     *   firewallPrivateDefaultOutgoingAction: value-of<FirewallRulesetRelatedServersServersItemFirewallPrivateDefaultOutgoingAction>,
     *   title: string,
     *   uuid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attachedRulesets = $values['attachedRulesets'];
        $this->firewall = $values['firewall'];
        $this->firewallPrivate = $values['firewallPrivate'];
        $this->firewallPrivateDefaultIncomingAction = $values['firewallPrivateDefaultIncomingAction'];
        $this->firewallPrivateDefaultOutgoingAction = $values['firewallPrivateDefaultOutgoingAction'];
        $this->title = $values['title'];
        $this->uuid = $values['uuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

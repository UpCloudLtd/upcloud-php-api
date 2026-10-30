<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Private firewall ruleset relationships for a Cloud Server.
 */
class ServerFirewallRulesetRelationships extends JsonSerializableType
{
    /**
     * @var ServerFirewallRulesetRelationshipsFirewallRulesetRelationships $firewallRulesetRelationships
     */
    #[JsonProperty('firewall_ruleset_relationships')]
    public ServerFirewallRulesetRelationshipsFirewallRulesetRelationships $firewallRulesetRelationships;

    /**
     * @param array{
     *   firewallRulesetRelationships: ServerFirewallRulesetRelationshipsFirewallRulesetRelationships,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRulesetRelationships = $values['firewallRulesetRelationships'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

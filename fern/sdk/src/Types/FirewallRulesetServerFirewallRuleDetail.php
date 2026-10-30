<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Server firewall rule detail
 */
class FirewallRulesetServerFirewallRuleDetail extends JsonSerializableType
{
    /**
     * @var FirewallRulesetServerFirewallRule $firewallRule
     */
    #[JsonProperty('firewall_rule')]
    public FirewallRulesetServerFirewallRule $firewallRule;

    /**
     * @param array{
     *   firewallRule: FirewallRulesetServerFirewallRule,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRule = $values['firewallRule'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

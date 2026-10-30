<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FirewallRulesetServerFirewallRule;
use Upcloud\Core\Json\JsonProperty;

class FirewallRulesetServerFirewallRuleCreate extends JsonSerializableType
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
}

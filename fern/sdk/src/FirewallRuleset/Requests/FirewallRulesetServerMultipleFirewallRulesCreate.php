<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\FirewallRuleset\Types\FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules;
use Upcloud\Core\Json\JsonProperty;

class FirewallRulesetServerMultipleFirewallRulesCreate extends JsonSerializableType
{
    /**
     * @var ?FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules $firewallRules
     */
    #[JsonProperty('firewall_rules')]
    public ?FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules $firewallRules;

    /**
     * @param array{
     *   firewallRules?: ?FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->firewallRules = $values['firewallRules'] ?? null;
    }
}

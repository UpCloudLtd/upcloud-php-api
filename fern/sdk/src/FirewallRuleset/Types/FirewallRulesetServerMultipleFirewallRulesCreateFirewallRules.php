<?php

namespace Upcloud\FirewallRuleset\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FirewallRulesetServerFirewallRule;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules extends JsonSerializableType
{
    /**
     * @var ?array<FirewallRulesetServerFirewallRule> $firewallRule
     */
    #[JsonProperty('firewall_rule'), ArrayType([FirewallRulesetServerFirewallRule::class])]
    public ?array $firewallRule;

    /**
     * @param array{
     *   firewallRule?: ?array<FirewallRulesetServerFirewallRule>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->firewallRule = $values['firewallRule'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerFirewallRulesFirewallRules extends JsonSerializableType
{
    /**
     * @var array<ServerFirewallRuleResponseItem> $firewallRule
     */
    #[JsonProperty('firewall_rule'), ArrayType([ServerFirewallRuleResponseItem::class])]
    public array $firewallRule;

    /**
     * @param array{
     *   firewallRule: array<ServerFirewallRuleResponseItem>,
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

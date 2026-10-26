<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ServerFirewallRuleItem;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerUpdateFirewallRulesFirewallRules extends JsonSerializableType
{
    /**
     * @var array<ServerFirewallRuleItem> $firewallRule Ordered firewall rules. Supplying an empty array removes all rules.
     */
    #[JsonProperty('firewall_rule'), ArrayType([ServerFirewallRuleItem::class])]
    public array $firewallRule;

    /**
     * @param array{
     *   firewallRule: array<ServerFirewallRuleItem>,
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

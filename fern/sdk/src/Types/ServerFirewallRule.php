<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A firewall rule with its position in the Cloud Server's rule chain.
 */
class ServerFirewallRule extends JsonSerializableType
{
    /**
     * @var ServerFirewallRuleResponseItem $firewallRule
     */
    #[JsonProperty('firewall_rule')]
    public ServerFirewallRuleResponseItem $firewallRule;

    /**
     * @param array{
     *   firewallRule: ServerFirewallRuleResponseItem,
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

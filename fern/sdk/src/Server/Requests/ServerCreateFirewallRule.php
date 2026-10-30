<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerCreateFirewallRuleFirewallRule;
use Upcloud\Core\Json\JsonProperty;

class ServerCreateFirewallRule extends JsonSerializableType
{
    /**
     * @var ServerCreateFirewallRuleFirewallRule $firewallRule
     */
    #[JsonProperty('firewall_rule')]
    public ServerCreateFirewallRuleFirewallRule $firewallRule;

    /**
     * @param array{
     *   firewallRule: ServerCreateFirewallRuleFirewallRule,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRule = $values['firewallRule'];
    }
}

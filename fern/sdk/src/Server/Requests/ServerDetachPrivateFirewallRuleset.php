<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerDetachPrivateFirewallRulesetFirewallRuleset;
use Upcloud\Core\Json\JsonProperty;

class ServerDetachPrivateFirewallRuleset extends JsonSerializableType
{
    /**
     * @var ServerDetachPrivateFirewallRulesetFirewallRuleset $firewallRuleset Private firewall ruleset to detach.
     */
    #[JsonProperty('firewall_ruleset')]
    public ServerDetachPrivateFirewallRulesetFirewallRuleset $firewallRuleset;

    /**
     * @param array{
     *   firewallRuleset: ServerDetachPrivateFirewallRulesetFirewallRuleset,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRuleset = $values['firewallRuleset'];
    }
}

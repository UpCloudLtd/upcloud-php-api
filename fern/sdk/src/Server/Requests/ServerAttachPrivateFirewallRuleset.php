<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerAttachPrivateFirewallRulesetFirewallRuleset;
use Upcloud\Core\Json\JsonProperty;

class ServerAttachPrivateFirewallRuleset extends JsonSerializableType
{
    /**
     * @var ServerAttachPrivateFirewallRulesetFirewallRuleset $firewallRuleset Private firewall ruleset to attach.
     */
    #[JsonProperty('firewall_ruleset')]
    public ServerAttachPrivateFirewallRulesetFirewallRuleset $firewallRuleset;

    /**
     * @param array{
     *   firewallRuleset: ServerAttachPrivateFirewallRulesetFirewallRuleset,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRuleset = $values['firewallRuleset'];
    }
}

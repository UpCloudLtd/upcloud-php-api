<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerUpdateFirewallRulesFirewallRules;
use Upcloud\Core\Json\JsonProperty;

class ServerUpdateFirewallRules extends JsonSerializableType
{
    /**
     * @var ServerUpdateFirewallRulesFirewallRules $firewallRules
     */
    #[JsonProperty('firewall_rules')]
    public ServerUpdateFirewallRulesFirewallRules $firewallRules;

    /**
     * @param array{
     *   firewallRules: ServerUpdateFirewallRulesFirewallRules,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRules = $values['firewallRules'];
    }
}

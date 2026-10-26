<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Ordered firewall rules configured for a Cloud Server.
 */
class ServerFirewallRules extends JsonSerializableType
{
    /**
     * @var ServerFirewallRulesFirewallRules $firewallRules
     */
    #[JsonProperty('firewall_rules')]
    public ServerFirewallRulesFirewallRules $firewallRules;

    /**
     * @param array{
     *   firewallRules: ServerFirewallRulesFirewallRules,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRules = $values['firewallRules'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

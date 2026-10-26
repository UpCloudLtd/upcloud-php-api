<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Server firewall detail response.
 */
class FirewallRulesetServerFirewallDetailResponse extends JsonSerializableType
{
    /**
     * @var FirewallRulesetServerFirewallRules $firewallRules
     */
    #[JsonProperty('firewall_rules')]
    public FirewallRulesetServerFirewallRules $firewallRules;

    /**
     * @param array{
     *   firewallRules: FirewallRulesetServerFirewallRules,
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

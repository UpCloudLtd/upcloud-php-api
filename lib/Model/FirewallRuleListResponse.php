<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class FirewallRuleListResponse
{
    /**
     * @var FirewallRuleListResponseFirewallRules|null
     */
    private $firewallRules;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->firewallRules =  $data['firewall_rules'] ?? null;
    }

    /**
     * @return FirewallRuleListResponseFirewallRules|null
     */
    public function getFirewallRules(): ?FirewallRuleListResponseFirewallRules
    {
        return $this->firewallRules;
    }

    /**
     * @param FirewallRuleListResponseFirewallRules|array|null $firewallRules
     * @return FirewallRuleListResponse
     */
    public function setFirewallRules($firewallRules): FirewallRuleListResponse
    {
        if (is_array($firewallRules)) {
            $this->firewallRules = new FirewallRuleListResponseFirewallRules($firewallRules);
        } else {
            $this->firewallRules = $firewallRules;
        }

        return $this;
    }
}



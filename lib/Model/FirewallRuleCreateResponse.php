<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class FirewallRuleCreateResponse
{
    /**
     * @var FirewallRule|null
     */
    private $firewallRule;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setFirewallRule($data['firewall_rule'] ?? null);
    }

    /**
     * @return FirewallRule|null
     */
    public function getFirewallRule(): ?FirewallRule
    {
        return $this->firewallRule;
    }

    /**
     * @param FirewallRule|array|null $firewallRule
     * @return FirewallRuleCreateResponse
     */
    public function setFirewallRule($firewallRule): FirewallRuleCreateResponse
    {
        if (is_array($firewallRule)) {
            $this->firewallRule = new FirewallRule($firewallRule);
        } else {
            $this->firewallRule = $firewallRule;
        }

        return $this;
    }
}

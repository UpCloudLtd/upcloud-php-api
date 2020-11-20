<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class FirewallRuleListResponseFirewallRules
{
    /**
     * @var FirewallRule[]|null
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
     * @return FirewallRule[]|null
     */
    public function getFirewallRule(): ?array
    {
        return $this->firewallRule;
    }

    /**
     * @param FirewallRule[]|array|null $firewallRule
     * @return FirewallRuleListResponseFirewallRules
     */
    public function setFirewallRule(?array $firewallRule): FirewallRuleListResponseFirewallRules
    {
        if (is_array($firewallRule)) {
            foreach ($firewallRule as $item) {
                $this->firewallRule[] = $item instanceof FirewallRule
                ? $item
                : new FirewallRule($item);
            }
        } else {
            $this->firewallRule = $firewallRule;
        }

        return $this;
    }
}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class FirewallRuleRequest extends UpcloudApiRequest
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
        parent::__construct();
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
     * @return FirewallRuleRequest
     */
    public function setFirewallRule($firewallRule): FirewallRuleRequest
    {
        if (is_array($firewallRule)) {
            $this->firewallRule = new FirewallRule($firewallRule);
        } else {
            $this->firewallRule = $firewallRule;
        }

        return $this;
    }

}



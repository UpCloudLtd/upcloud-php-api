<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class FirewallRulesRequest extends UpcloudApiRequest
{
    /**
     * @var FirewallRule[]
     */
    private $firewallRules = [
        'firewall_rule' => []
    ];

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->setFirewallRules($data['firewall_rules'] ?? []);
    }

    /**
     * @return FirewallRule[]
     */
    public function getFirewallRules(): array
    {
        return $this->firewallRules;
    }

    /**
     * @param FirewallRule[] $firewallRules
     * @return FirewallRulesRequest
     */
    public function setFirewallRules(array $firewallRules): FirewallRulesRequest
    {
        $this->firewallRules['firewall_rule'] = $firewallRules;

        return $this;
    }
}
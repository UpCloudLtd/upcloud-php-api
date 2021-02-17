<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\FirewallRule;
use Upcloud\ApiClient\Model\FirewallRuleCreateResponse;
use Upcloud\ApiClient\Model\FirewallRuleListResponse;
use Upcloud\ApiClient\Model\FirewallRuleRequest;

class FirewallApiFixture extends BaseFixture
{

    /**
     * @param int $fromListIndex
     * @return string
     */
    public function getRulesResponseBodyByIndex(int $fromListIndex = 0): string
    {
        return json_encode(
            [
            'firewall_rule' => $this->getRoleByIndex($fromListIndex)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @return string
     */
    public function getRulesResponseBody(): string
    {
        return json_encode($this->getRulesList(), JSON_PRETTY_PRINT);
    }

    /**
     * @param int $fromListIndex
     * @return mixed
     */
    public function getRulesResponseByIndex(int $fromListIndex = 0)
    {
        return $this->serializer->deserialize(
            $this->getRulesResponseBodyByIndex($fromListIndex),
            FirewallRuleCreateResponse::class
        );
    }

    /**
     * @return mixed
     */
    public function getRulesResponse()
    {
        return $this->serializer->deserialize(
            $this->getRulesResponseBody(),
            FirewallRuleListResponse::class
        );
    }

    /**
     * @param int $fromListIndex
     * @return FirewallRuleRequest
     */
    public function getRuleRequestFailed(int $fromListIndex = 0): FirewallRuleRequest
    {

        $rule = $this->getRoleByIndex($fromListIndex);

        $rule['icmp_type'] = '255';

        return  new FirewallRuleRequest([
            'firewall_rule' => new FirewallRule($rule),
        ]);
    }

    /**
     * @param int $fromListIndex
     * @return FirewallRuleRequest
     */
    public function getRuleRequestSuccess($fromListIndex = 0): FirewallRuleRequest
    {
        return  new FirewallRuleRequest([
            'firewall_rule' => new FirewallRule($this->getRoleByIndex($fromListIndex)),
        ]);
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getRoleByIndex(int $index)
    {
        return $this->getRulesList()['firewall_rules']['firewall_rule'][$index] ?? null;
    }

    /**
     * @return string[]
     */
    public function getRulesList(): array
    {
        return  [
           "firewall_rules" => [
               "firewall_rule" => [
                   [
                       "action" => "accept",
                       "comment" => "Allow HTTP from anywhere",
                       "destination_address_end" => "",
                       "destination_address_start" => "",
                       "destination_port_end" => "80",
                       "destination_port_start" => "80",
                       "direction" => "in",
                       "family" => "IPv4",
                       "icmp_type" => "",
                       "position" => "1",
                       "protocol" => "tcp",
                       "source_port_end" => "80",
                       "source_port_start" => "80",
                   ],
                   [
                       "action" => "accept",
                       "comment" => "Allow SSH from a specific network only",
                       "destination_address_end" => "",
                       "destination_address_start" => "",
                       "destination_port_end" => "22",
                       "destination_port_start" => "22",
                       "direction" => "in",
                       "family" => "IPv4",
                       "icmp_type" => "",
                       "position" => "2",
                       "protocol" => "tcp",
                       "source_address_end" => "192.168.1.255",
                       "source_address_start" => "192.168.1.1",
                       "source_port_end" => "22",
                       "source_port_start" => "22",
                   ],
                   [
                       "action" => "accept",
                       "comment" => "Allow SSH over IPv6 from this range",
                       "destination_address_end" => "",
                       "destination_address_start" => "",
                       "destination_port_end" => "22",
                       "destination_port_start" => "22",
                       "direction" => "in",
                       "family" => "IPv6",
                       "icmp_type" => "",
                       "position" => "3",
                       "protocol" => "tcp",
                       "source_address_end" => "2001:0db8:11a3:09d7:1f34:8a2e:07a0:765d",
                       "source_address_start" => "2001:0db8:11a3:09d7:1f34:8a2e:07a0:765d",
                       "source_port_end" => "22",
                       "source_port_start" => "22",
                   ],
                   [
                       "action" => "accept",
                       "comment" => "Allow ICMP echo request (ping)",
                       "destination_address_end" => "",
                       "destination_address_start" => "",
                       "direction" => "in",
                       "family" => "IPv4",
                       "icmp_type" => "8",
                       "position" => "4",
                       "protocol" => null,
                   ]
               ]
           ]
        ];
    }
}

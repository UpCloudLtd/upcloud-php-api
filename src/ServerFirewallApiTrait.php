<?php

namespace UpCloud;

/**
 * Trait for all the server firewall related API methods.
 */
trait ServerFirewallApiTrait
{
    /**
     * The HTTP client for making the requests
     * @var \UpCloud\HttpClient
     */
    protected $httpClient;

    /**
     * Return the server's current firewall rules. Note that these are not active unless "firewall" is set to "1" in server details.
     *
     * @param string $serverUuid Server's UUID
     * @return array Array of firewall rules
     */
    public function getFirewallRules(string $serverUuid)
    {
        $response = $this->httpClient->get("server/$serverUuid/firewall_rule");
        return $response->firewall_rules->firewall_rule;
    }

    /**
     * Get details of a single firewall rule.
     *
     * @param string $serverUuid UUID of the server
     * @param int $position Position of the rule (rules are evaluated in order, starting from 1)
     * @return object Details of the specified firewall rule
     */
    public function getFirewallRule(string $serverUuid, int $position)
    {
        $response = $this->httpClient->get("server/$serverUuid/firewall_rule/$position");
        return $response->firewall_rule;
    }

    /**
     * Create a firewall rule for a server.
     *
     * @param string $serverUuid Server's UUID
     * @param $payload Firewall rule payload
     * @return object The created firewall rule
     */
    public function createFirewallRule(string $serverUuid, $firewallRule)
    {
        $response = $this->httpClient->post(
            "server/$serverUuid/firewall_rule",
            ['firewall_rule' => $firewallRule]
        );
        return $response->firewall_rule;
    }

    /**
     * Create multiple firewall rules for a server.
     *
     * @param string $serverUuid Server's UUID
     * @param $payload Firewall rule payload
     * @return object Empty HTTP response with 204 status
     */
    public function createFirewallRules(string $serverUuid, $firewallRules)
    {
        $response = $this->httpClient->put(
            "server/$serverUuid/firewall_rule",
            ['firewall_rules' => ['firewall_rule' => $firewallRules]]
        );
        return $response->firewall_rule;
    }

    /**
     * Delete a firewall rule.
     *
     * @param string $serverUuid Server's UUID
     * @param int $position Position of the rule to delete e.g. 1 or 1000
     * @return object Empty HTTP response with 204 status
     */
    public function deleteFirewallRule(string $serverUuid, int $position)
    {
        $response = $this->httpClient->delete("server/$serverUuid/firewall_rule/$position");
        return $response;
    }
}

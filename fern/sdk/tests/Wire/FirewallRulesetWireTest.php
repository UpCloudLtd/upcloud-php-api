<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\FirewallRuleset\Requests\ListFirewallRulesetsRequest;
use Upcloud\FirewallRuleset\Requests\CreateFirewallRuleset;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetModify;
use Upcloud\Types\FirewallRulesetCreateLabel;
use Upcloud\FirewallRuleset\Requests\ListFirewallRulesetRulesRequest;
use Upcloud\FirewallRuleset\Requests\CreateFirewallRulesetRuleRequest;
use Upcloud\Types\FirewallRulesetFirewallRuleCreate;
use Upcloud\Types\FirewallRulesetRuleAction;
use Upcloud\Types\FirewallRulesetRuleDirection;
use Upcloud\Types\FirewallRulesetRuleFamily;
use Upcloud\Types\FirewallRulesetRuleProtocol;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetFirewallMultipleRuleCreate;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetFirewallRuleModify;
use Upcloud\FirewallRuleset\Requests\CreateFirewallRulesetLabelRequest;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetLabelModify;
use Upcloud\FirewallRuleset\Requests\ListServerFirewallRuleRequest;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetServerFirewallRuleCreate;
use Upcloud\Types\FirewallRulesetServerFirewallRule;
use Upcloud\FirewallRuleset\Requests\FirewallRulesetServerMultipleFirewallRulesCreate;
use Upcloud\FirewallRuleset\Types\FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules;

class FirewallRulesetWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListFirewallRulesets(): void {
        $testId = 'firewall_ruleset.list_firewall_rulesets.0';
        $this->client->firewallRuleset->listFirewallRulesets(
            new ListFirewallRulesetsRequest([
                'limit' => 10,
                'offset' => 0,
                'sort' => 'name',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.list_firewall_rulesets.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset",
            ['limit' => '10', 'offset' => '0', 'sort' => 'name'],
            1
        );
    }

    /**
     */
    public function testCreateFirewallRuleset(): void {
        $testId = 'firewall_ruleset.create_firewall_ruleset.0';
        $this->client->firewallRuleset->createFirewallRuleset(
            new CreateFirewallRuleset([
                'name' => 'example_firewall_ruleset',
                'stateful' => true,
                'enabled' => false,
                'defaultDnsRulesEnabled' => false,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.create_firewall_ruleset.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/firewall-ruleset",
            null,
            1
        );
    }

    /**
     */
    public function testGetFirewallRuleset(): void {
        $testId = 'firewall_ruleset.get_firewall_ruleset.0';
        $this->client->firewallRuleset->getFirewallRuleset(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.get_firewall_ruleset.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFirewallRuleset(): void {
        $testId = 'firewall_ruleset.delete_firewall_ruleset.0';
        $this->client->firewallRuleset->deleteFirewallRuleset(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.delete_firewall_ruleset.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFirewallRuleset(): void {
        $testId = 'firewall_ruleset.modify_firewall_ruleset.0';
        $this->client->firewallRuleset->modifyFirewallRuleset(
            '01234567-89ab-cdef-0123-456789abcdef',
            new FirewallRulesetModify([
                'name' => 'modified_example_firewall_ruleset',
                'description' => 'Modified example stateless firewall ruleset',
                'labels' => [
                    new FirewallRulesetCreateLabel([
                        'key' => 'dev',
                        'value' => 'dev-1',
                    ]),
                ],
                'enabled' => false,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.modify_firewall_ruleset.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testRestoreFirewallRuleset(): void {
        $testId = 'firewall_ruleset.restore_firewall_ruleset.0';
        $this->client->firewallRuleset->restoreFirewallRuleset(
            '01234567-89ab-cdef-0123-456789abcdef',
            1,
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.restore_firewall_ruleset.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/restore/1",
            null,
            1
        );
    }

    /**
     */
    public function testListFirewallRulesetRules(): void {
        $testId = 'firewall_ruleset.list_firewall_ruleset_rules.0';
        $this->client->firewallRuleset->listFirewallRulesetRules(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ListFirewallRulesetRulesRequest([
                'limit' => 10,
                'offset' => 0,
                'sort' => 'name',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.list_firewall_ruleset_rules.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/rule",
            ['limit' => '10', 'offset' => '0', 'sort' => 'name'],
            1
        );
    }

    /**
     */
    public function testCreateFirewallRulesetRule(): void {
        $testId = 'firewall_ruleset.create_firewall_ruleset_rule.0';
        $this->client->firewallRuleset->createFirewallRulesetRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateFirewallRulesetRuleRequest([
                'body' => new FirewallRulesetFirewallRuleCreate([
                    'enabled' => false,
                    'action' => FirewallRulesetRuleAction::Accept->value,
                    'direction' => FirewallRulesetRuleDirection::In->value,
                    'family' => FirewallRulesetRuleFamily::IPv4->value,
                    'protocol' => FirewallRulesetRuleProtocol::Tcp->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.create_firewall_ruleset_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/rule",
            null,
            1
        );
    }

    /**
     */
    public function testCreateMultipleFirewallRulesetRule(): void {
        $testId = 'firewall_ruleset.create_multiple_firewall_ruleset_rule.0';
        $this->client->firewallRuleset->createMultipleFirewallRulesetRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            new FirewallRulesetFirewallMultipleRuleCreate([
                'rules' => [
                    new FirewallRulesetFirewallRuleCreate([
                        'enabled' => false,
                        'action' => FirewallRulesetRuleAction::Accept->value,
                        'direction' => FirewallRulesetRuleDirection::In->value,
                        'family' => FirewallRulesetRuleFamily::IPv4->value,
                        'protocol' => FirewallRulesetRuleProtocol::Tcp->value,
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.create_multiple_firewall_ruleset_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/rule",
            null,
            1
        );
    }

    /**
     */
    public function testGetFirewallRulesetRule(): void {
        $testId = 'firewall_ruleset.get_firewall_ruleset_rule.0';
        $this->client->firewallRuleset->getFirewallRulesetRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.get_firewall_ruleset_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/rule/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFirewallRulesetRule(): void {
        $testId = 'firewall_ruleset.delete_firewall_ruleset_rule.0';
        $this->client->firewallRuleset->deleteFirewallRulesetRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.delete_firewall_ruleset_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/rule/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFirewallRulesetRule(): void {
        $testId = 'firewall_ruleset.modify_firewall_ruleset_rule.0';
        $this->client->firewallRuleset->modifyFirewallRulesetRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            new FirewallRulesetFirewallRuleModify([
                'enabled' => false,
                'action' => FirewallRulesetRuleAction::Accept->value,
                'direction' => FirewallRulesetRuleDirection::In->value,
                'family' => FirewallRulesetRuleFamily::IPv4->value,
                'protocol' => FirewallRulesetRuleProtocol::Tcp->value,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.modify_firewall_ruleset_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/rule/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testListFirewallRulesetLabels(): void {
        $testId = 'firewall_ruleset.list_firewall_ruleset_labels.0';
        $this->client->firewallRuleset->listFirewallRulesetLabels(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.list_firewall_ruleset_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFirewallRulesetLabel(): void {
        $testId = 'firewall_ruleset.create_firewall_ruleset_label.0';
        $this->client->firewallRuleset->createFirewallRulesetLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateFirewallRulesetLabelRequest([
                'body' => new FirewallRulesetCreateLabel([
                    'key' => 'dev',
                    'value' => 'dev-1',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.create_firewall_ruleset_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testListFirewallRulesetAttachedServers(): void {
        $testId = 'firewall_ruleset.list_firewall_ruleset_attached_servers.0';
        $this->client->firewallRuleset->listFirewallRulesetAttachedServers(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.list_firewall_ruleset_attached_servers.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/servers",
            null,
            1
        );
    }

    /**
     */
    public function testGetFirewallRulesetLabel(): void {
        $testId = 'firewall_ruleset.get_firewall_ruleset_label.0';
        $this->client->firewallRuleset->getFirewallRulesetLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.get_firewall_ruleset_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFirewallRulesetLabel(): void {
        $testId = 'firewall_ruleset.delete_firewall_ruleset_label.0';
        $this->client->firewallRuleset->deleteFirewallRulesetLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.delete_firewall_ruleset_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFirewallRulesetLabel(): void {
        $testId = 'firewall_ruleset.modify_firewall_ruleset_label.0';
        $this->client->firewallRuleset->modifyFirewallRulesetLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            new FirewallRulesetLabelModify([
                'key' => 'foo',
                'value' => 'bar',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.modify_firewall_ruleset_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/firewall-ruleset/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testListServerFirewallRule(): void {
        $testId = 'firewall_ruleset.list_server_firewall_rule.0';
        $this->client->firewallRuleset->listServerFirewallRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ListServerFirewallRuleRequest([
                'limit' => 10,
                'offset' => 0,
                'sort' => 'name',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.list_server_firewall_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset/server/01234567-89ab-cdef-0123-456789abcdef/firewall-rule",
            ['limit' => '10', 'offset' => '0', 'sort' => 'name'],
            1
        );
    }

    /**
     */
    public function testCreateServerFirewallRule(): void {
        $testId = 'firewall_ruleset.create_server_firewall_rule.0';
        $this->client->firewallRuleset->createServerFirewallRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            new FirewallRulesetServerFirewallRuleCreate([
                'firewallRule' => new FirewallRulesetServerFirewallRule([
                    'direction' => FirewallRulesetRuleDirection::In->value,
                    'action' => FirewallRulesetRuleAction::Accept->value,
                    'family' => 'IPv4',
                    'protocol' => 'tcp',
                    'destinationAddressStart' => '',
                    'destinationAddressEnd' => '',
                    'sourceAddressStart' => '192.168.1.1',
                    'sourceAddressEnd' => '192.168.1.255',
                    'comment' => 'Allow SSH from this network',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.create_server_firewall_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/firewall-ruleset/server/01234567-89ab-cdef-0123-456789abcdef/firewall-rule",
            null,
            1
        );
    }

    /**
     */
    public function testCreateMultipleServerFirewallRules(): void {
        $testId = 'firewall_ruleset.create_multiple_server_firewall_rules.0';
        $this->client->firewallRuleset->createMultipleServerFirewallRules(
            '01234567-89ab-cdef-0123-456789abcdef',
            new FirewallRulesetServerMultipleFirewallRulesCreate([
                'firewallRules' => new FirewallRulesetServerMultipleFirewallRulesCreateFirewallRules([
                    'firewallRule' => [
                        new FirewallRulesetServerFirewallRule([
                            'direction' => FirewallRulesetRuleDirection::In->value,
                            'action' => FirewallRulesetRuleAction::Accept->value,
                            'family' => 'IPv4',
                            'protocol' => 'tcp',
                            'sourceAddressStart' => '192.168.1.1',
                            'sourceAddressEnd' => '192.168.1.255',
                            'comment' => 'Allow SSH from this network',
                        ]),
                        new FirewallRulesetServerFirewallRule([
                            'direction' => FirewallRulesetRuleDirection::In->value,
                            'action' => FirewallRulesetRuleAction::Accept->value,
                            'family' => 'IPv4',
                            'protocol' => 'tcp',
                            'sourceAddressStart' => '1.1.1.1',
                            'sourceAddressEnd' => '1.1.1.1',
                            'comment' => 'Allow DNS from this network',
                        ]),
                        new FirewallRulesetServerFirewallRule([
                            'direction' => FirewallRulesetRuleDirection::Out->value,
                            'action' => FirewallRulesetRuleAction::Drop->value,
                            'family' => 'IPv4',
                            'protocol' => 'tcp',
                            'destinationAddressStart' => '100.100.128.2',
                            'destinationAddressEnd' => '100.100.128.2',
                            'comment' => 'dfg',
                        ]),
                        new FirewallRulesetServerFirewallRule([
                            'direction' => FirewallRulesetRuleDirection::Out->value,
                            'action' => FirewallRulesetRuleAction::Accept->value,
                            'family' => 'IPv6',
                            'protocol' => 'icmp',
                            'destinationAddressStart' => '2a04:3540:1001:1000:1411:4dff:fea5:1bab',
                            'destinationAddressEnd' => '2a04:3540:1001:1000:1411:4dff:fea5:1bab',
                            'comment' => "'w???''?p'2'?12??12?3?'231",
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.create_multiple_server_firewall_rules.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/firewall-ruleset/server/01234567-89ab-cdef-0123-456789abcdef/firewall-rule",
            null,
            1
        );
    }

    /**
     */
    public function testGetServerFirewallRule(): void {
        $testId = 'firewall_ruleset.get_server_firewall_rule.0';
        $this->client->firewallRuleset->getServerFirewallRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            1,
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.get_server_firewall_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/firewall-ruleset/server/01234567-89ab-cdef-0123-456789abcdef/firewall-rule/1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteServerFirewallRule(): void {
        $testId = 'firewall_ruleset.delete_server_firewall_rule.0';
        $this->client->firewallRuleset->deleteServerFirewallRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            1,
            [
                'headers' => [
                    'X-Test-Id' => 'firewall_ruleset.delete_server_firewall_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/firewall-ruleset/server/01234567-89ab-cdef-0123-456789abcdef/firewall-rule/1",
            null,
            1
        );
    }

    /**
     */
    protected function setUp(): void {
        parent::setUp();
        $this->client = new UpcloudClient(
            token: 'test-token',
        options: [
            'baseUrl' => 'http://localhost:8080',
        ],
        );
    }
}

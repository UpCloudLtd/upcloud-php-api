<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Server\Requests\ListServersRequest;
use Upcloud\Server\Requests\CreateServer;
use Upcloud\Server\Types\CreateServerServer;
use Upcloud\Types\ServerLoginUser;
use Upcloud\Types\ServerLoginUserSshKeys;
use Upcloud\Types\ServerCreateNetworking;
use Upcloud\Types\ServerCreateNetworkingInterfaces;
use Upcloud\Types\ServerCreateNetworkingInterfacesInterfaceItem;
use Upcloud\Types\ServerCreateNetworkingInterfacesInterfaceItemIpAddresses;
use Upcloud\Types\ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem;
use Upcloud\Types\ServerIpFamily;
use Upcloud\Types\ServerNetworkType;
use Upcloud\Types\ServerBooleanYesno;
use Upcloud\Types\ServerStorageDevices;
use Upcloud\Types\ServerStorageDevicesStorageDeviceItem;
use Upcloud\Types\ServerStorageDevicesStorageDeviceItemAction;
use Upcloud\Server\Requests\ModifyServer;
use Upcloud\Server\Types\ModifyServerServer;
use Upcloud\Server\Requests\DeleteServerRequest;
use Upcloud\Server\Requests\ServerAttachPrivateFirewallRuleset;
use Upcloud\Server\Types\ServerAttachPrivateFirewallRulesetFirewallRuleset;
use Upcloud\Server\Requests\ServerLoadCdrom;
use Upcloud\Server\Types\ServerLoadCdromStorageDevice;
use Upcloud\Server\Requests\ServerDetachPrivateFirewallRuleset;
use Upcloud\Server\Types\ServerDetachPrivateFirewallRulesetFirewallRuleset;
use Upcloud\Server\Requests\ServerCreateFirewallRule;
use Upcloud\Server\Types\ServerCreateFirewallRuleFirewallRule;
use Upcloud\Server\Types\ServerCreateFirewallRuleFirewallRuleAction;
use Upcloud\Server\Types\ServerCreateFirewallRuleFirewallRuleDirection;
use Upcloud\Server\Types\ServerCreateFirewallRuleFirewallRuleFamily;
use Upcloud\Server\Types\ServerCreateFirewallRuleFirewallRuleProtocol;
use Upcloud\Server\Requests\ServerUpdateFirewallRules;
use Upcloud\Server\Types\ServerUpdateFirewallRulesFirewallRules;
use Upcloud\Types\ServerFirewallRuleItem;
use Upcloud\Types\ServerFirewallRuleItemAction;
use Upcloud\Types\ServerFirewallRuleItemDirection;
use Upcloud\Types\ServerFirewallRuleItemFamily;
use Upcloud\Types\ServerFirewallRuleItemProtocol;
use Upcloud\Server\Requests\ServerAddInterface;
use Upcloud\Server\Types\ServerAddInterfaceInterface;
use Upcloud\Server\Types\ServerAddInterfaceInterfaceIpAddresses;
use Upcloud\Server\Types\ServerAddInterfaceInterfaceIpAddressesIpAddressItem;
use Upcloud\Server\Requests\ServerModifyInterface;
use Upcloud\Server\Types\ServerModifyInterfaceInterface;
use Upcloud\Server\Requests\ServerAddIpAddress;
use Upcloud\Server\Types\ServerAddIpAddressIpAddress;
use Upcloud\Server\Requests\ServerRebuild;
use Upcloud\Server\Types\ServerRebuildServerRebuild;
use Upcloud\Types\ServerLegacyBoolean;
use Upcloud\Server\Types\ServerRebuildServerRebuildLoginUser;
use Upcloud\Server\Types\ServerRebuildServerRebuildLoginUserSshKeys;
use Upcloud\Server\Types\ServerRebuildServerRebuildPasswordDelivery;
use Upcloud\Server\Requests\RelocateServer;
use Upcloud\Server\Requests\RestartServer;
use Upcloud\Server\Types\RestartServerRestartServerStopType;
use Upcloud\Server\Types\RestartServerRestartServerStopTypeStopType;
use Upcloud\Server\Requests\StartServer;
use Upcloud\Server\Types\StartServerServer;
use Upcloud\Server\Types\StartServerServerStartType;
use Upcloud\Types\ServerStatsPeriod;
use Upcloud\Server\Types\GetDiskStatsRequestType;
use Upcloud\Server\Types\GetDiskStatsByPeriodRequestType;
use Upcloud\Types\ServerStatsNetworkType;
use Upcloud\Server\Requests\StopServer;
use Upcloud\Server\Types\StopServerStopServer;
use Upcloud\Server\Types\StopServerStopServerStopType;
use Upcloud\Server\Requests\ServerAttachStorage;
use Upcloud\Server\Types\ServerAttachStorageStorageDevice;
use Upcloud\Server\Types\ServerAttachStorageStorageDeviceType;
use Upcloud\Server\Requests\ServerDetachStorage;

class ServerWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListServers(): void {
        $testId = 'server.list_servers.0';
        $this->client->server->listServers(
            new ListServersRequest([
                'uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
                'host' => 7653311107,
                'tag' => 'prod,web',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.list_servers.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server",
            ['uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599', 'host' => '7653311107', 'tag' => 'prod,web', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testCreateServer(): void {
        $testId = 'server.create_server.0';
        $this->client->server->createServer(
            new CreateServer([
                'server' => new CreateServerServer([
                    'hostname' => 'my-server.example.com',
                    'loginUser' => new ServerLoginUser([
                        'sshKeys' => new ServerLoginUserSshKeys([
                            'sshKey' => [
                                'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIO3t5AQcuv4+KxJ5rC75N8bW/e7eOq0k5Y2L7V1oH3Z5 user@example.com',
                            ],
                        ]),
                        'username' => 'upclouduser',
                    ]),
                    'networking' => new ServerCreateNetworking([
                        'interfaces' => new ServerCreateNetworkingInterfaces([
                            'interface' => [
                                new ServerCreateNetworkingInterfacesInterfaceItem([
                                    'ipAddresses' => new ServerCreateNetworkingInterfacesInterfaceItemIpAddresses([
                                        'ipAddress' => [
                                            new ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem([
                                                'family' => ServerIpFamily::IPv4->value,
                                            ]),
                                        ],
                                    ]),
                                    'type' => ServerNetworkType::Public_->value,
                                ]),
                                new ServerCreateNetworkingInterfacesInterfaceItem([
                                    'ipAddresses' => new ServerCreateNetworkingInterfacesInterfaceItemIpAddresses([
                                        'ipAddress' => [
                                            new ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem([
                                                'family' => ServerIpFamily::IPv4->value,
                                            ]),
                                        ],
                                    ]),
                                    'type' => ServerNetworkType::Utility->value,
                                ]),
                                new ServerCreateNetworkingInterfacesInterfaceItem([
                                    'ipAddresses' => new ServerCreateNetworkingInterfacesInterfaceItemIpAddresses([
                                        'ipAddress' => [
                                            new ServerCreateNetworkingInterfacesInterfaceItemIpAddressesIpAddressItem([
                                                'family' => ServerIpFamily::IPv4->value,
                                            ]),
                                        ],
                                    ]),
                                    'network' => '03000000-0000-4000-8000-000000000000',
                                    'type' => ServerNetworkType::Private_->value,
                                ]),
                            ],
                        ]),
                    ]),
                    'plan' => '1xCPU-1GB',
                    'metadata' => ServerBooleanYesno::Yes->value,
                    'storageDevices' => new ServerStorageDevices([
                        'storageDevice' => [
                            new ServerStorageDevicesStorageDeviceItem([
                                'action' => ServerStorageDevicesStorageDeviceItemAction::Clone_->value,
                                'size' => 30,
                                'storage' => '01000000-0000-4000-8000-000020080100',
                                'tier' => 'maxiops',
                                'title' => 'Debian Trixie',
                            ]),
                        ],
                    ]),
                    'title' => 'My Server',
                    'zone' => 'fi-hel1',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.create_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server",
            null,
            1
        );
    }

    /**
     */
    public function testListFirewallRulesetRelationships(): void {
        $testId = 'server.list_firewall_ruleset_relationships.0';
        $this->client->server->listFirewallRulesetRelationships(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.list_firewall_ruleset_relationships.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/firewall_ruleset_relationships/private/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testGetLabels(): void {
        $testId = 'server.get_labels.0';
        $this->client->server->getLabels(
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/labels",
            null,
            1
        );
    }

    /**
     */
    public function testGetServer(): void {
        $testId = 'server.get_server.0';
        $this->client->server->getServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testModifyServer(): void {
        $testId = 'server.modify_server.0';
        $this->client->server->modifyServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ModifyServer([
                'server' => new ModifyServerServer([
                    'coreNumber' => 8,
                    'memoryAmount' => 16384,
                    'plan' => 'custom',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.modify_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteServer(): void {
        $testId = 'server.delete_server.0';
        $this->client->server->deleteServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new DeleteServerRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.delete_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testAttachPrivateFirewallRuleset(): void {
        $testId = 'server.attach_private_firewall_ruleset.0';
        $this->client->server->attachPrivateFirewallRuleset(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerAttachPrivateFirewallRuleset([
                'firewallRuleset' => new ServerAttachPrivateFirewallRulesetFirewallRuleset([
                    'firewallRulesetUuid' => '190f56d8-4b3f-4a89-9e5f-320fbc3d17c8',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.attach_private_firewall_ruleset.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/attach_firewall_ruleset/private",
            null,
            1
        );
    }

    /**
     */
    public function testCancelServerOperation(): void {
        $testId = 'server.cancel_server_operation.0';
        $this->client->server->cancelServerOperation(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.cancel_server_operation.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/cancel",
            null,
            1
        );
    }

    /**
     */
    public function testEjectCdrom(): void {
        $testId = 'server.eject_cdrom.0';
        $this->client->server->ejectCdrom(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.eject_cdrom.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/cdrom/eject",
            null,
            1
        );
    }

    /**
     */
    public function testLoadCdrom(): void {
        $testId = 'server.load_cdrom.0';
        $this->client->server->loadCdrom(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerLoadCdrom([
                'storageDevice' => new ServerLoadCdromStorageDevice([
                    'storage' => '01000000-0000-4000-8000-000060010101',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.load_cdrom.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/cdrom/load",
            null,
            1
        );
    }

    /**
     */
    public function testDetachPrivateFirewallRuleset(): void {
        $testId = 'server.detach_private_firewall_ruleset.0';
        $this->client->server->detachPrivateFirewallRuleset(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerDetachPrivateFirewallRuleset([
                'firewallRuleset' => new ServerDetachPrivateFirewallRulesetFirewallRuleset([
                    'firewallRulesetUuid' => '190f56d8-4b3f-4a89-9e5f-320fbc3d17c8',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.detach_private_firewall_ruleset.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/detach_firewall_ruleset/private",
            null,
            1
        );
    }

    /**
     */
    public function testListFirewallRules(): void {
        $testId = 'server.list_firewall_rules.0';
        $this->client->server->listFirewallRules(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.list_firewall_rules.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/firewall_rule",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFirewallRule(): void {
        $testId = 'server.create_firewall_rule.0';
        $this->client->server->createFirewallRule(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerCreateFirewallRule([
                'firewallRule' => new ServerCreateFirewallRuleFirewallRule([
                    'action' => ServerCreateFirewallRuleFirewallRuleAction::Accept->value,
                    'comment' => 'Allow SSH from the office network',
                    'destinationPortEnd' => '22',
                    'destinationPortStart' => '22',
                    'direction' => ServerCreateFirewallRuleFirewallRuleDirection::In->value,
                    'family' => ServerCreateFirewallRuleFirewallRuleFamily::IPv4->value,
                    'position' => '1',
                    'protocol' => ServerCreateFirewallRuleFirewallRuleProtocol::Tcp->value,
                    'sourceAddressEnd' => '192.0.2.255',
                    'sourceAddressStart' => '192.0.2.1',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.create_firewall_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/firewall_rule",
            null,
            1
        );
    }

    /**
     */
    public function testUpdateFirewallRules(): void {
        $testId = 'server.update_firewall_rules.0';
        $this->client->server->updateFirewallRules(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerUpdateFirewallRules([
                'firewallRules' => new ServerUpdateFirewallRulesFirewallRules([
                    'firewallRule' => [
                        new ServerFirewallRuleItem([
                            'action' => ServerFirewallRuleItemAction::Accept->value,
                            'comment' => 'Allow SSH',
                            'destinationPortEnd' => '22',
                            'destinationPortStart' => '22',
                            'direction' => ServerFirewallRuleItemDirection::In->value,
                            'family' => ServerFirewallRuleItemFamily::IPv4->value,
                            'protocol' => ServerFirewallRuleItemProtocol::Tcp->value,
                        ]),
                        new ServerFirewallRuleItem([
                            'action' => ServerFirewallRuleItemAction::Drop->value,
                            'direction' => ServerFirewallRuleItemDirection::In->value,
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.update_firewall_rules.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/firewall_rule",
            null,
            1
        );
    }

    /**
     */
    public function testGetFirewallRule(): void {
        $testId = 'server.get_firewall_rule.0';
        $this->client->server->getFirewallRule(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            1,
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_firewall_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/firewall_rule/1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFirewallRule(): void {
        $testId = 'server.delete_firewall_rule.0';
        $this->client->server->deleteFirewallRule(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            1,
            [
                'headers' => [
                    'X-Test-Id' => 'server.delete_firewall_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/firewall_rule/1",
            null,
            1
        );
    }

    /**
     */
    public function testListPrivateFirewallRulesetRelationships(): void {
        $testId = 'server.list_private_firewall_ruleset_relationships.0';
        $this->client->server->listPrivateFirewallRulesetRelationships(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.list_private_firewall_ruleset_relationships.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/firewall_ruleset_relationships/private",
            null,
            1
        );
    }

    /**
     */
    public function testListServerGpUs(): void {
        $testId = 'server.list_server_gp_us.0';
        $this->client->server->listServerGpUs(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.list_server_gp_us.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/gpus",
            null,
            1
        );
    }

    /**
     */
    public function testGetServerNetworking(): void {
        $testId = 'server.get_server_networking.0';
        $this->client->server->getServerNetworking(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_server_networking.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/networking",
            null,
            1
        );
    }

    /**
     */
    public function testAddServerInterface(): void {
        $testId = 'server.add_server_interface.0';
        $this->client->server->addServerInterface(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerAddInterface([
                'interface' => new ServerAddInterfaceInterface([
                    'ipAddresses' => new ServerAddInterfaceInterfaceIpAddresses([
                        'ipAddress' => [
                            new ServerAddInterfaceInterfaceIpAddressesIpAddressItem([
                                'address' => '10.0.0.20',
                                'dhcpProvided' => ServerBooleanYesno::Yes->value,
                                'family' => ServerIpFamily::IPv4->value,
                            ]),
                        ],
                    ]),
                    'network' => '0374ce47-4303-4490-987d-32dc96cfd79b',
                    'sourceIpFiltering' => ServerBooleanYesno::Yes->value,
                    'type' => ServerNetworkType::Private_->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.add_server_interface.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/networking/interface",
            null,
            1
        );
    }

    /**
     */
    public function testModifyServerInterface(): void {
        $testId = 'server.modify_server_interface.0';
        $this->client->server->modifyServerInterface(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            1,
            new ServerModifyInterface([
                'interface' => new ServerModifyInterfaceInterface([
                    'bootable' => ServerBooleanYesno::Yes->value,
                    'index' => 5,
                    'sourceIpFiltering' => ServerBooleanYesno::No->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.modify_server_interface.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/networking/interface/1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteServerInterface(): void {
        $testId = 'server.delete_server_interface.0';
        $this->client->server->deleteServerInterface(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            1,
            [
                'headers' => [
                    'X-Test-Id' => 'server.delete_server_interface.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/networking/interface/1",
            null,
            1
        );
    }

    /**
     */
    public function testAddServerInterfaceIpAddress(): void {
        $testId = 'server.add_server_interface_ip_address.0';
        $this->client->server->addServerInterfaceIpAddress(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            1,
            new ServerAddIpAddress([
                'ipAddress' => new ServerAddIpAddressIpAddress([
                    'address' => '10.0.0.30',
                    'family' => ServerIpFamily::IPv4->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.add_server_interface_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/networking/interface/1/ip_address",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteServerInterfaceIpAddress(): void {
        $testId = 'server.delete_server_interface_ip_address.0';
        $this->client->server->deleteServerInterfaceIpAddress(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            1,
            'ip',
            [
                'headers' => [
                    'X-Test-Id' => 'server.delete_server_interface_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/networking/interface/1/ip_address/ip",
            null,
            1
        );
    }

    /**
     */
    public function testRebuildServer(): void {
        $testId = 'server.rebuild_server.0';
        $this->client->server->rebuildServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerRebuild([
                'serverRebuild' => new ServerRebuildServerRebuild([
                    'cloneSource' => '01000000-0000-4000-8000-000020050100',
                    'deleteDetachedDisk' => ServerLegacyBoolean::Yes->value,
                    'detachDisk' => '0169b4f8-051c-4a86-9484-f5b798249949',
                    'encrypted' => ServerLegacyBoolean::Yes->value,
                    'loginUser' => new ServerRebuildServerRebuildLoginUser([
                        'createPassword' => ServerLegacyBoolean::No->value,
                        'sshKeys' => new ServerRebuildServerRebuildLoginUserSshKeys([
                            'sshKey' => [
                                'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIEexamplekey user@example',
                            ],
                        ]),
                        'username' => 'debian',
                    ]),
                    'passwordDelivery' => ServerRebuildServerRebuildPasswordDelivery::None->value,
                    'storageTitle' => 'Rebuilt system disk',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.rebuild_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/rebuild",
            null,
            1
        );
    }

    /**
     */
    public function testRelocateServer(): void {
        $testId = 'server.relocate_server.0';
        $this->client->server->relocateServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new RelocateServer([
                'zone' => 'fi-hel2',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.relocate_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/relocate",
            null,
            1
        );
    }

    /**
     */
    public function testGetRemoteAccessDetails(): void {
        $testId = 'server.get_remote_access_details.0';
        $this->client->server->getRemoteAccessDetails(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_remote_access_details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/remote_access_details",
            null,
            1
        );
    }

    /**
     */
    public function testRestartServer(): void {
        $testId = 'server.restart_server.0';
        $this->client->server->restartServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new RestartServer([
                'restartServer' => new RestartServerRestartServerStopType([
                    'stopType' => RestartServerRestartServerStopTypeStopType::Hard->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.restart_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/restart",
            null,
            1
        );
    }

    /**
     */
    public function testStartServer(): void {
        $testId = 'server.start_server.0';
        $this->client->server->startServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new StartServer([
                'server' => new StartServerServer([
                    'host' => 8055964291,
                    'startType' => StartServerServerStartType::Sync->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.start_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/start",
            null,
            1
        );
    }

    /**
     */
    public function testGetCpuStats(): void {
        $testId = 'server.get_cpu_stats.0';
        $this->client->server->getCpuStats(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_cpu_stats.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/stats/cpu",
            null,
            1
        );
    }

    /**
     */
    public function testGetCpuStatsByPeriod(): void {
        $testId = 'server.get_cpu_stats_by_period.0';
        $this->client->server->getCpuStatsByPeriod(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            ServerStatsPeriod::Daily->value,
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_cpu_stats_by_period.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/stats/cpu/daily",
            null,
            1
        );
    }

    /**
     */
    public function testGetDiskStats(): void {
        $testId = 'server.get_disk_stats.0';
        $this->client->server->getDiskStats(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            GetDiskStatsRequestType::Bytes->value,
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_disk_stats.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/stats/disk/bytes",
            null,
            1
        );
    }

    /**
     */
    public function testGetDiskStatsByPeriod(): void {
        $testId = 'server.get_disk_stats_by_period.0';
        $this->client->server->getDiskStatsByPeriod(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            GetDiskStatsByPeriodRequestType::Bytes->value,
            ServerStatsPeriod::Daily->value,
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_disk_stats_by_period.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/stats/disk/bytes/daily",
            null,
            1
        );
    }

    /**
     */
    public function testGetNetworkStats(): void {
        $testId = 'server.get_network_stats.0';
        $this->client->server->getNetworkStats(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            ServerStatsNetworkType::Bytes->value,
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_network_stats.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/stats/network/bytes",
            null,
            1
        );
    }

    /**
     */
    public function testGetNetworkStatsByNetwork(): void {
        $testId = 'server.get_network_stats_by_network.0';
        $this->client->server->getNetworkStatsByNetwork(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            ServerStatsNetworkType::Bytes->value,
            ServerNetworkType::Public_->value,
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_network_stats_by_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/stats/network/bytes/public",
            null,
            1
        );
    }

    /**
     */
    public function testGetNetworkStatsByNetworkAndPeriod(): void {
        $testId = 'server.get_network_stats_by_network_and_period.0';
        $this->client->server->getNetworkStatsByNetworkAndPeriod(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            ServerStatsNetworkType::Bytes->value,
            ServerNetworkType::Public_->value,
            ServerStatsPeriod::Daily->value,
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_network_stats_by_network_and_period.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/stats/network/bytes/public/daily",
            null,
            1
        );
    }

    /**
     */
    public function testStopServer(): void {
        $testId = 'server.stop_server.0';
        $this->client->server->stopServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new StopServer([
                'stopServer' => new StopServerStopServer([
                    'stopType' => StopServerStopServerStopType::Soft->value,
                    'timeout' => '60',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.stop_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/stop",
            null,
            1
        );
    }

    /**
     */
    public function testAttachStorageDevice(): void {
        $testId = 'server.attach_storage_device.0';
        $this->client->server->attachStorageDevice(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerAttachStorage([
                'storageDevice' => new ServerAttachStorageStorageDevice([
                    'address' => 'virtio:0',
                    'bootDisk' => 1,
                    'storage' => '012580a1-32a1-466e-a323-689ca16f2d43',
                    'type' => ServerAttachStorageStorageDeviceType::Disk->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.attach_storage_device.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/storage/attach",
            null,
            1
        );
    }

    /**
     */
    public function testDetachStorageDevice(): void {
        $testId = 'server.detach_storage_device.0';
        $this->client->server->detachStorageDevice(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerDetachStorage([
                'storageDevice' => [
                    'address' => "virtio:0",
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server.detach_storage_device.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/storage/detach",
            null,
            1
        );
    }

    /**
     */
    public function testGetVncDetails(): void {
        $testId = 'server.get_vnc_details.0';
        $this->client->server->getVncDetails(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server.get_vnc_details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server/0414e0d7-4436-4037-9dd8-6eaf47dce599/vnc_details",
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

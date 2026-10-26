<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Network\Requests\ListNetworksRequest;
use Upcloud\Network\Requests\CreateNetworkRequest;
use Upcloud\Network\Types\CreateNetworkRequestNetwork;
use Upcloud\Types\NetworkType;
use Upcloud\Network\Types\CreateNetworkRequestNetworkIpNetworks;
use Upcloud\Network\Types\CreateNetworkRequestNetworkIpNetworksIpNetworkItem;
use Upcloud\Types\NetworkIpFamily;
use Upcloud\Types\NetworkBooleanYesno;
use Upcloud\Network\Requests\NetworkCreateInterfaceRequest;
use Upcloud\Network\Types\NetworkCreateInterfaceRequestInterface;
use Upcloud\Network\Requests\ModifyNetworkRequest;
use Upcloud\Network\Types\ModifyNetworkRequestNetwork;
use Upcloud\Types\NetworkTags;
use Upcloud\Types\NetworkTagsTags;
use Upcloud\Types\NetworkTagsTagsTagItem;
use Upcloud\Types\NetworkServers;
use Upcloud\Types\NetworkLabels;
use Upcloud\Types\NetworkLabel;
use Upcloud\Network\Types\ModifyNetworkRequestNetworkIpNetworks;
use Upcloud\Network\Types\ModifyNetworkRequestNetworkIpNetworksIpNetworkItem;
use Upcloud\Types\NetworkFeatures;

class NetworkWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListNetworks(): void {
        $testId = 'network.list_networks.0';
        $this->client->network->listNetworks(
            new ListNetworksRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'network.list_networks.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/network",
            null,
            1
        );
    }

    /**
     */
    public function testCreateNetwork(): void {
        $testId = 'network.create_network.0';
        $this->client->network->createNetwork(
            new CreateNetworkRequest([
                'network' => new CreateNetworkRequestNetwork([
                    'type' => NetworkType::Private_->value,
                    'name' => 'backend-net',
                    'zone' => 'fi-hel2',
                    'ipNetworks' => new CreateNetworkRequestNetworkIpNetworks([
                        'ipNetwork' => [
                            new CreateNetworkRequestNetworkIpNetworksIpNetworkItem([
                                'family' => NetworkIpFamily::IPv4->value,
                                'address' => '10.0.0.0/24',
                                'dhcp' => NetworkBooleanYesno::Yes->value,
                            ]),
                        ],
                    ]),
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'network.create_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/network",
            null,
            1
        );
    }

    /**
     */
    public function testListNetworkInterfaces(): void {
        $testId = 'network.list_network_interfaces.0';
        $this->client->network->listNetworkInterfaces(
            [
                'headers' => [
                    'X-Test-Id' => 'network.list_network_interfaces.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/network/interface",
            null,
            1
        );
    }

    /**
     */
    public function testCreateNetworkInterface(): void {
        $testId = 'network.create_network_interface.0';
        $this->client->network->createNetworkInterface(
            new NetworkCreateInterfaceRequest([
                'mainAccountId' => 123456,
                'interface' => new NetworkCreateInterfaceRequestInterface([
                    'bootable' => NetworkBooleanYesno::No->value,
                    'network' => '8f6d1ec2-8f5e-4b67-8fcb-6fa9c1a8a001',
                    'sourceIpFiltering' => NetworkBooleanYesno::Yes->value,
                    'type' => NetworkType::Private_->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'network.create_network_interface.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/network/interface",
            null,
            1
        );
    }

    /**
     */
    public function testGetNetworkInterfaceDetails(): void {
        $testId = 'network.get_network_interface_details.0';
        $this->client->network->getNetworkInterfaceDetails(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'network.get_network_interface_details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/network/interface/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteNetworkInterface(): void {
        $testId = 'network.delete_network_interface.0';
        $this->client->network->deleteNetworkInterface(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'network.delete_network_interface.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/network/interface/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testGetNetworkDetails(): void {
        $testId = 'network.get_network_details.0';
        $this->client->network->getNetworkDetails(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'network.get_network_details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/network/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testModifyNetwork(): void {
        $testId = 'network.modify_network.0';
        $this->client->network->modifyNetwork(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ModifyNetworkRequest([
                'network' => new ModifyNetworkRequestNetwork([
                    'type' => NetworkType::Public_->value,
                    'name' => 'name',
                    'zone' => 'fi-hel1',
                    'tags' => new NetworkTags([
                        'tags' => new NetworkTagsTags([
                            'tag' => [
                                new NetworkTagsTagsTagItem([
                                    'description' => 'Production servers',
                                    'name' => 'PROD',
                                    'servers' => new NetworkServers([
                                        'server' => [
                                            '0077fa3d-32db-4b09-9f5f-30d9e9afb565',
                                        ],
                                    ]),
                                ]),
                            ],
                        ]),
                    ]),
                    'labels' => new NetworkLabels([
                        'label' => [
                            new NetworkLabel([
                                'key' => 'env',
                                'value' => 'prod',
                            ]),
                            new NetworkLabel([
                                'key' => 'team',
                                'value' => 'network',
                            ]),
                        ],
                    ]),
                    'router' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
                    'grtExport' => 1000000,
                    'parentNetwork' => 'parent_network',
                    'ipNetworks' => new ModifyNetworkRequestNetworkIpNetworks([
                        'ipNetwork' => [
                            new ModifyNetworkRequestNetworkIpNetworksIpNetworkItem([
                                'family' => NetworkIpFamily::IPv4->value,
                                'address' => 'address',
                            ]),
                        ],
                    ]),
                    'networkFeatures' => NetworkFeatures::AllowLinklocalAddress->value,
                    'mainAccountId' => 1000000,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'network.modify_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/network/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteNetwork(): void {
        $testId = 'network.delete_network.0';
        $this->client->network->deleteNetwork(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'network.delete_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/network/0414e0d7-4436-4037-9dd8-6eaf47dce599",
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

<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\NetworkPeering\Requests\ListNetworkPeeringsRequest;
use Upcloud\NetworkPeering\Requests\NetworkPeeringCreate;
use Upcloud\NetworkPeering\Types\NetworkPeeringCreateConfiguredStatus;
use Upcloud\NetworkPeering\Types\NetworkPeeringCreateNetwork;
use Upcloud\NetworkPeering\Types\NetworkPeeringCreatePeerNetwork;
use Upcloud\NetworkPeering\Requests\NetworkPeeringModify;
use Upcloud\NetworkPeering\Types\NetworkPeeringModifyConfiguredStatus;

class NetworkPeeringWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListNetworkPeerings(): void {
        $testId = 'network_peering.list_network_peerings.0';
        $this->client->networkPeering->listNetworkPeerings(
            new ListNetworkPeeringsRequest([
                'uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
                'networkUuidLocal' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
                'networkUuidPeer' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'network_peering.list_network_peerings.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/network-peering",
            ['uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599', 'network_uuid_local' => '0414e0d7-4436-4037-9dd8-6eaf47dce599', 'network_uuid_peer' => '0414e0d7-4436-4037-9dd8-6eaf47dce599'],
            1
        );
    }

    /**
     */
    public function testCreateNetworkPeering(): void {
        $testId = 'network_peering.create_network_peering.0';
        $this->client->networkPeering->createNetworkPeering(
            new NetworkPeeringCreate([
                'configuredStatus' => NetworkPeeringCreateConfiguredStatus::Active->value,
                'name' => 'Peering A->B',
                'network' => new NetworkPeeringCreateNetwork([
                    'uuid' => '03126dc1-a69f-4bc2-8b24-e31c22d64712',
                ]),
                'peerNetwork' => new NetworkPeeringCreatePeerNetwork([
                    'uuid' => '03585987-bf7d-4544-8e9b-5a1b4d74a333',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'network_peering.create_network_peering.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/network-peering",
            null,
            1
        );
    }

    /**
     */
    public function testGetNetworkPeering(): void {
        $testId = 'network_peering.get_network_peering.0';
        $this->client->networkPeering->getNetworkPeering(
            'peering_uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'network_peering.get_network_peering.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/network-peering/peering_uuid",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteNetworkPeering(): void {
        $testId = 'network_peering.delete_network_peering.0';
        $this->client->networkPeering->deleteNetworkPeering(
            'peering_uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'network_peering.delete_network_peering.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/network-peering/peering_uuid",
            null,
            1
        );
    }

    /**
     */
    public function testModifyNetworkPeering(): void {
        $testId = 'network_peering.modify_network_peering.0';
        $this->client->networkPeering->modifyNetworkPeering(
            'peering_uuid',
            new NetworkPeeringModify([
                'configuredStatus' => NetworkPeeringModifyConfiguredStatus::Disabled->value,
                'name' => 'Peering A->B modified',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'network_peering.modify_network_peering.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/network-peering/peering_uuid",
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

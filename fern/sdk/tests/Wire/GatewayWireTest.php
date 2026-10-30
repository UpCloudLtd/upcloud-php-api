<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Gateway\Requests\ListGatewayPlansRequest;
use Upcloud\Gateway\Requests\ListGatewayServicesRequest;
use Upcloud\Gateway\Requests\GatewayServiceCreateRequest;
use Upcloud\Types\GatewayServiceFeatures;
use Upcloud\Types\GatewayRouterCreateRequest;
use Upcloud\Types\GatewayAddressCreateRequest;
use Upcloud\Types\GatewayConnectionCreateRequest;
use Upcloud\Types\GatewayConnectionType;
use Upcloud\Types\GatewayConnectionRouteRequest;
use Upcloud\Types\GatewayConnectionRouteType;
use Upcloud\Types\GatewayTunnelCreateRequest;
use Upcloud\Types\GatewayTunnelCreateRequestLocalAddress;
use Upcloud\Types\GatewayTunnelCreateRequestRemoteAddress;
use Upcloud\Types\GatewayTunnelCreateRequestIpsec;
use Upcloud\Types\GatewayTunnelCreateRequestIpsecAuthentication;
use Upcloud\Types\GatewayIpsecAuthenticationType;
use Upcloud\Types\GatewayLabelCreateRequest;
use Upcloud\Types\GatewayServiceConfiguredStatus;
use Upcloud\Gateway\Requests\GatewayServiceReplaceRequest;
use Upcloud\Gateway\Requests\GatewayServiceModifyRequest;
use Upcloud\Types\GatewayConnectionModifyRequest;
use Upcloud\Gateway\Requests\CreateGatewayConnectionRequest;
use Upcloud\Gateway\Requests\ModifyGatewayConnectionRequest;
use Upcloud\Gateway\Requests\CreateGatewayTunnelRequest;
use Upcloud\Types\GatewaySupportedProposalAlgorithms;
use Upcloud\Types\GatewaySupportedIntegrityAlgorithms;
use Upcloud\Gateway\Requests\ModifyGatewayTunnelRequest;
use Upcloud\Types\GatewayTunnelModifyRequest;
use Upcloud\Types\GatewayTunnelModifyRequestLocalAddress;
use Upcloud\Types\GatewayTunnelModifyRequestRemoteAddress;
use Upcloud\Types\GatewayTunnelModifyRequestIpsec;
use Upcloud\Types\GatewayTunnelModifyRequestIpsecAuthentication;
use Upcloud\Gateway\Requests\CreateGatewayServiceLabelRequest;
use Upcloud\Gateway\Requests\GatewayLabelModifyRequest;
use Upcloud\Gateway\Requests\GatewayAddressModifyRequest;
use Upcloud\Gateway\Requests\GatewayServiceLogSessionCreateRequest;
use Upcloud\Types\GatewayServiceLogSessionTypes;

class GatewayWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListGatewayPlans(): void {
        $testId = 'gateway.list_gateway_plans.0';
        $this->client->gateway->listGatewayPlans(
            new ListGatewayPlansRequest([
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.list_gateway_plans.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/plans",
            ['limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetGatewayPlan(): void {
        $testId = 'gateway.get_gateway_plan.0';
        $this->client->gateway->getGatewayPlan(
            'advanced',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.get_gateway_plan.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/plans/advanced",
            null,
            1
        );
    }

    /**
     */
    public function testListGatewayServices(): void {
        $testId = 'gateway.list_gateway_services.0';
        $this->client->gateway->listGatewayServices(
            new ListGatewayServicesRequest([
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.list_gateway_services.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway",
            ['limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testCreateGatewayService(): void {
        $testId = 'gateway.create_gateway_service.0';
        $this->client->gateway->createGatewayService(
            new GatewayServiceCreateRequest([
                'name' => 'gateway-service',
                'plan' => 'development-gwaas-1c2g',
                'zone' => 'fi-hel1',
                'features' => [
                    GatewayServiceFeatures::Nat->value,
                ],
                'routers' => [
                    new GatewayRouterCreateRequest([
                        'uuid' => 'fedcba98-7654-3210-fedc-ba9876543210',
                    ]),
                ],
                'addresses' => [
                    new GatewayAddressCreateRequest([
                        'name' => 'gateway-service',
                    ]),
                ],
                'connections' => [
                    new GatewayConnectionCreateRequest([
                        'name' => 'gateway-service',
                        'type' => GatewayConnectionType::Ipsec->value,
                        'localRoutes' => [
                            new GatewayConnectionRouteRequest([
                                'name' => 'upcloud-example-route',
                                'type' => GatewayConnectionRouteType::Static_->value,
                                'staticNetwork' => '10.0.0.0/24',
                            ]),
                        ],
                        'remoteRoutes' => [
                            new GatewayConnectionRouteRequest([
                                'name' => 'remote-example-route',
                                'type' => GatewayConnectionRouteType::Static_->value,
                                'staticNetwork' => '10.0.1.0/24',
                            ]),
                        ],
                        'tunnels' => [
                            new GatewayTunnelCreateRequest([
                                'name' => 'example-tunnel-1',
                                'localAddress' => new GatewayTunnelCreateRequestLocalAddress([
                                    'name' => 'public-ip-1',
                                ]),
                                'remoteAddress' => new GatewayTunnelCreateRequestRemoteAddress([
                                    'address' => '100.10.0.111',
                                ]),
                                'ipsec' => new GatewayTunnelCreateRequestIpsec([
                                    'authentication' => new GatewayTunnelCreateRequestIpsecAuthentication([
                                        'authentication' => GatewayIpsecAuthenticationType::Psk->value,
                                        'psk' => '{your PSK}',
                                    ]),
                                ]),
                                'tunnelInternalIp' => '169.254.17.1',
                                'internalPeerPingInterval' => 0,
                            ]),
                        ],
                    ]),
                ],
                'labels' => [
                    new GatewayLabelCreateRequest([
                        'key' => 'environment',
                        'value' => 'production',
                    ]),
                ],
                'configuredStatus' => GatewayServiceConfiguredStatus::Started->value,
                'automaticTunnelInternalIpAllocation' => true,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.create_gateway_service.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/gateway",
            null,
            1
        );
    }

    /**
     */
    public function testGetGatewayService(): void {
        $testId = 'gateway.get_gateway_service.0';
        $this->client->gateway->getGatewayService(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.get_gateway_service.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testReplaceGatewayService(): void {
        $testId = 'gateway.replace_gateway_service.0';
        $this->client->gateway->replaceGatewayService(
            '01234567-89ab-cdef-0123-456789abcdef',
            new GatewayServiceReplaceRequest([
                'name' => 'gateway-service',
                'plan' => 'development-gwaas-1c2g',
                'configuredStatus' => GatewayServiceConfiguredStatus::Started->value,
                'labels' => [
                    new GatewayLabelCreateRequest([
                        'key' => 'environment',
                        'value' => 'production',
                    ]),
                ],
                'automaticTunnelInternalIpAllocation' => true,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.replace_gateway_service.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteGatewayService(): void {
        $testId = 'gateway.delete_gateway_service.0';
        $this->client->gateway->deleteGatewayService(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.delete_gateway_service.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyGatewayService(): void {
        $testId = 'gateway.modify_gateway_service.0';
        $this->client->gateway->modifyGatewayService(
            '01234567-89ab-cdef-0123-456789abcdef',
            new GatewayServiceModifyRequest([
                'name' => 'gateway-service',
                'features' => [
                    GatewayServiceFeatures::Nat->value,
                ],
                'plan' => 'development-gwaas-1c2g',
                'configuredStatus' => GatewayServiceConfiguredStatus::Started->value,
                'connections' => [
                    new GatewayConnectionModifyRequest([
                        'uuid' => '01234567-89ab-cdef-0123-456789abcdef',
                        'name' => 'gateway-service',
                        'type' => GatewayConnectionType::Ipsec->value,
                        'localRoutes' => [
                            new GatewayConnectionRouteRequest([
                                'name' => 'modified-routes',
                                'type' => GatewayConnectionRouteType::Static_->value,
                                'staticNetwork' => '10.0.22.0/24',
                            ]),
                        ],
                    ]),
                ],
                'labels' => [
                    new GatewayLabelCreateRequest([
                        'key' => 'environment',
                        'value' => 'production',
                    ]),
                ],
                'automaticTunnelInternalIpAllocation' => true,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.modify_gateway_service.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testFlushGatewayNat(): void {
        $testId = 'gateway.flush_gateway_nat.0';
        $this->client->gateway->flushGatewayNat(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.flush_gateway_nat.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/actions/nat-flush-connections",
            null,
            1
        );
    }

    /**
     */
    public function testListGatewayConnections(): void {
        $testId = 'gateway.list_gateway_connections.0';
        $this->client->gateway->listGatewayConnections(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.list_gateway_connections.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections",
            null,
            1
        );
    }

    /**
     */
    public function testCreateGatewayConnection(): void {
        $testId = 'gateway.create_gateway_connection.0';
        $this->client->gateway->createGatewayConnection(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateGatewayConnectionRequest([
                'body' => new GatewayConnectionCreateRequest([
                    'name' => 'gateway-service',
                    'type' => GatewayConnectionType::Ipsec->value,
                    'localRoutes' => [
                        new GatewayConnectionRouteRequest([
                            'name' => 'upcloud-example-route',
                            'type' => GatewayConnectionRouteType::Static_->value,
                            'staticNetwork' => '10.0.0.0/24',
                        ]),
                    ],
                    'remoteRoutes' => [
                        new GatewayConnectionRouteRequest([
                            'name' => 'remote-example-route',
                            'type' => GatewayConnectionRouteType::Static_->value,
                            'staticNetwork' => '10.0.1.0/24',
                        ]),
                    ],
                    'tunnels' => [
                        new GatewayTunnelCreateRequest([
                            'name' => 'example-tunnel-1',
                            'localAddress' => new GatewayTunnelCreateRequestLocalAddress([
                                'name' => 'public-ip-1',
                            ]),
                            'remoteAddress' => new GatewayTunnelCreateRequestRemoteAddress([
                                'address' => '100.10.0.111',
                            ]),
                            'ipsec' => new GatewayTunnelCreateRequestIpsec([
                                'authentication' => new GatewayTunnelCreateRequestIpsecAuthentication([
                                    'authentication' => GatewayIpsecAuthenticationType::Psk->value,
                                    'psk' => '{your PSK}',
                                ]),
                            ]),
                            'tunnelInternalIp' => '169.254.17.1',
                            'internalPeerPingInterval' => 0,
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.create_gateway_connection.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections",
            null,
            1
        );
    }

    /**
     */
    public function testGetGatewayConnection(): void {
        $testId = 'gateway.get_gateway_connection.0';
        $this->client->gateway->getGatewayConnection(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.get_gateway_connection.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteGatewayConnection(): void {
        $testId = 'gateway.delete_gateway_connection.0';
        $this->client->gateway->deleteGatewayConnection(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.delete_gateway_connection.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyGatewayConnection(): void {
        $testId = 'gateway.modify_gateway_connection.0';
        $this->client->gateway->modifyGatewayConnection(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            new ModifyGatewayConnectionRequest([
                'body' => new GatewayConnectionModifyRequest([
                    'uuid' => '01234567-89ab-cdef-0123-456789abcdef',
                    'name' => 'gateway-service',
                    'type' => GatewayConnectionType::Ipsec->value,
                    'localRoutes' => [
                        new GatewayConnectionRouteRequest([
                            'name' => 'modified-routes',
                            'type' => GatewayConnectionRouteType::Static_->value,
                            'staticNetwork' => '10.0.22.0/24',
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.modify_gateway_connection.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testListGatewayTunnels(): void {
        $testId = 'gateway.list_gateway_tunnels.0';
        $this->client->gateway->listGatewayTunnels(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.list_gateway_tunnels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections/01234567-89ab-cdef-0123-456789abcdef/tunnels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateGatewayTunnel(): void {
        $testId = 'gateway.create_gateway_tunnel.0';
        $this->client->gateway->createGatewayTunnel(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateGatewayTunnelRequest([
                'body' => new GatewayTunnelCreateRequest([
                    'name' => 'gateway-service',
                    'localAddress' => new GatewayTunnelCreateRequestLocalAddress([
                        'name' => 'gateway-service',
                    ]),
                    'remoteAddress' => new GatewayTunnelCreateRequestRemoteAddress([
                        'address' => '203.0.113.10',
                    ]),
                    'ipsec' => new GatewayTunnelCreateRequestIpsec([
                        'authentication' => new GatewayTunnelCreateRequestIpsecAuthentication([
                            'authentication' => GatewayIpsecAuthenticationType::Psk->value,
                            'psk' => 'MySecretPsk123',
                        ]),
                        'phase1Algorithms' => [
                            GatewaySupportedProposalAlgorithms::Aes128->value,
                            GatewaySupportedProposalAlgorithms::Aes256->value,
                            GatewaySupportedProposalAlgorithms::Aes128Gcm128->value,
                            GatewaySupportedProposalAlgorithms::Aes256Gcm128->value,
                        ],
                        'phase2Algorithms' => [
                            GatewaySupportedProposalAlgorithms::Aes128->value,
                            GatewaySupportedProposalAlgorithms::Aes256->value,
                            GatewaySupportedProposalAlgorithms::Aes128Gcm128->value,
                            GatewaySupportedProposalAlgorithms::Aes256Gcm128->value,
                        ],
                        'phase1IntegrityAlgorithms' => [
                            GatewaySupportedIntegrityAlgorithms::Sha256->value,
                            GatewaySupportedIntegrityAlgorithms::Sha384->value,
                            GatewaySupportedIntegrityAlgorithms::Sha512->value,
                        ],
                        'phase2IntegrityAlgorithms' => [
                            GatewaySupportedIntegrityAlgorithms::Sha256->value,
                            GatewaySupportedIntegrityAlgorithms::Sha384->value,
                            GatewaySupportedIntegrityAlgorithms::Sha512->value,
                        ],
                        'phase1DhGroupNumbers' => [
                            16,
                            18,
                            19,
                        ],
                        'phase2DhGroupNumbers' => [
                            14,
                            16,
                            18,
                            19,
                        ],
                    ]),
                    'tunnelInternalIp' => '10.0.0.1',
                    'internalPeerPingInterval' => 0,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.create_gateway_tunnel.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections/01234567-89ab-cdef-0123-456789abcdef/tunnels",
            null,
            1
        );
    }

    /**
     */
    public function testGetGatewayTunnel(): void {
        $testId = 'gateway.get_gateway_tunnel.0';
        $this->client->gateway->getGatewayTunnel(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.get_gateway_tunnel.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections/01234567-89ab-cdef-0123-456789abcdef/tunnels/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteGatewayTunnel(): void {
        $testId = 'gateway.delete_gateway_tunnel.0';
        $this->client->gateway->deleteGatewayTunnel(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.delete_gateway_tunnel.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections/01234567-89ab-cdef-0123-456789abcdef/tunnels/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyGatewayTunnel(): void {
        $testId = 'gateway.modify_gateway_tunnel.0';
        $this->client->gateway->modifyGatewayTunnel(
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            '01234567-89ab-cdef-0123-456789abcdef',
            new ModifyGatewayTunnelRequest([
                'body' => new GatewayTunnelModifyRequest([
                    'uuid' => '01234567-89ab-cdef-0123-456789abcdef',
                    'name' => 'gateway-service',
                    'localAddress' => new GatewayTunnelModifyRequestLocalAddress([
                        'name' => 'gateway-service',
                    ]),
                    'remoteAddress' => new GatewayTunnelModifyRequestRemoteAddress([
                        'address' => '203.0.113.10',
                    ]),
                    'ipsec' => new GatewayTunnelModifyRequestIpsec([
                        'authentication' => new GatewayTunnelModifyRequestIpsecAuthentication([
                            'authentication' => GatewayIpsecAuthenticationType::Psk->value,
                            'psk' => 'MySecretPsk123',
                        ]),
                        'phase1Algorithms' => [
                            GatewaySupportedProposalAlgorithms::Aes128Gcm16->value,
                        ],
                        'phase2Algorithms' => [
                            GatewaySupportedProposalAlgorithms::Aes128Gcm16->value,
                        ],
                        'phase1IntegrityAlgorithms' => [
                            GatewaySupportedIntegrityAlgorithms::Sha256->value,
                            GatewaySupportedIntegrityAlgorithms::Sha384->value,
                            GatewaySupportedIntegrityAlgorithms::Sha512->value,
                        ],
                        'phase2IntegrityAlgorithms' => [
                            GatewaySupportedIntegrityAlgorithms::Sha256->value,
                            GatewaySupportedIntegrityAlgorithms::Sha384->value,
                            GatewaySupportedIntegrityAlgorithms::Sha512->value,
                        ],
                        'phase1DhGroupNumbers' => [
                            16,
                            18,
                            19,
                        ],
                        'phase2DhGroupNumbers' => [
                            14,
                            16,
                            18,
                            19,
                        ],
                    ]),
                    'tunnelInternalIp' => '10.0.0.1',
                    'internalPeerPingInterval' => 0,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.modify_gateway_tunnel.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/connections/01234567-89ab-cdef-0123-456789abcdef/tunnels/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testListGatewayServiceLabels(): void {
        $testId = 'gateway.list_gateway_service_labels.0';
        $this->client->gateway->listGatewayServiceLabels(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.list_gateway_service_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateGatewayServiceLabel(): void {
        $testId = 'gateway.create_gateway_service_label.0';
        $this->client->gateway->createGatewayServiceLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateGatewayServiceLabelRequest([
                'body' => new GatewayLabelCreateRequest([
                    'key' => 'environment',
                    'value' => 'production',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.create_gateway_service_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testGetGatewayServiceLabel(): void {
        $testId = 'gateway.get_gateway_service_label.0';
        $this->client->gateway->getGatewayServiceLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.get_gateway_service_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteGatewayServiceLabel(): void {
        $testId = 'gateway.delete_gateway_service_label.0';
        $this->client->gateway->deleteGatewayServiceLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.delete_gateway_service_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testModifyGatewayServiceLabel(): void {
        $testId = 'gateway.modify_gateway_service_label.0';
        $this->client->gateway->modifyGatewayServiceLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            new GatewayLabelModifyRequest([
                'key' => 'environment',
                'value' => 'production',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.modify_gateway_service_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testListGatewayAddresses(): void {
        $testId = 'gateway.list_gateway_addresses.0';
        $this->client->gateway->listGatewayAddresses(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.list_gateway_addresses.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/addresses",
            null,
            1
        );
    }

    /**
     */
    public function testGetGatewayAddress(): void {
        $testId = 'gateway.get_gateway_address.0';
        $this->client->gateway->getGatewayAddress(
            '01234567-89ab-cdef-0123-456789abcdef',
            'advanced',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.get_gateway_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/addresses/advanced",
            null,
            1
        );
    }

    /**
     */
    public function testModifyGatewayAddress(): void {
        $testId = 'gateway.modify_gateway_address.0';
        $this->client->gateway->modifyGatewayAddress(
            '01234567-89ab-cdef-0123-456789abcdef',
            'advanced',
            new GatewayAddressModifyRequest([
                'address' => '203.0.113.10',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.modify_gateway_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/addresses/advanced",
            null,
            1
        );
    }

    /**
     */
    public function testReleaseGatewayFloatingIp(): void {
        $testId = 'gateway.release_gateway_floating_ip.0';
        $this->client->gateway->releaseGatewayFloatingIp(
            '01234567-89ab-cdef-0123-456789abcdef',
            'advanced',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.release_gateway_floating_ip.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/addresses/advanced/release",
            null,
            1
        );
    }

    /**
     */
    public function testGetGatewayMetrics(): void {
        $testId = 'gateway.get_gateway_metrics.0';
        $this->client->gateway->getGatewayMetrics(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.get_gateway_metrics.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/metrics",
            null,
            1
        );
    }

    /**
     */
    public function testCreateGatewayServiceLogSession(): void {
        $testId = 'gateway.create_gateway_service_log_session.0';
        $this->client->gateway->createGatewayServiceLogSession(
            '01234567-89ab-cdef-0123-456789abcdef',
            new GatewayServiceLogSessionCreateRequest([
                'sessionType' => GatewayServiceLogSessionTypes::Vpn->value,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'gateway.create_gateway_service_log_session.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/gateway/01234567-89ab-cdef-0123-456789abcdef/logs",
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

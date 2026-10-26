<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\LoadBalancer\Requests\ListLoadBalancersRequest;
use Upcloud\LoadBalancer\Requests\LoadBalancerServiceCreate;
use Upcloud\Types\LoadBalancerServiceConfiguredStatus;
use Upcloud\Types\LoadBalancerFrontendCreate;
use Upcloud\Types\LoadBalancerFrontendMode;
use Upcloud\LoadBalancer\Requests\LoadBalancerServiceReplace;
use Upcloud\LoadBalancer\Requests\LoadBalancerServiceModify;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerFrontendRequest;
use Upcloud\LoadBalancer\Requests\LoadBalancerFrontendModify;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerFrontendTlsConfigRequest;
use Upcloud\Types\LoadBalancerTlsConfigCreate;
use Upcloud\LoadBalancer\Requests\ModifyLoadBalancerFrontendTlsConfigRequest;
use Upcloud\Types\LoadBalancerTlsConfigModify;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerRuleRequest;
use Upcloud\Types\LoadBalancerRuleCreate;
use Upcloud\Types\LoadBalancerMatchingCondition;
use Upcloud\Types\LoadBalancerMatcherCreateMatchSrcIp;
use Upcloud\Types\LoadBalancerMatcherCreateMatchSrcIpType;
use Upcloud\Types\LoadBalancerMatcherIpCreate;
use Upcloud\Types\LoadBalancerActionCreateActionUseBackend;
use Upcloud\Types\LoadBalancerActionCreateActionUseBackendType;
use Upcloud\Types\LoadBalancerActionUseBackendCreate;
use Upcloud\LoadBalancer\Requests\ReplaceLoadBalancerRuleRequest;
use Upcloud\LoadBalancer\Requests\LoadBalancerRuleModify;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerBackendRequest;
use Upcloud\Types\LoadBalancerBackendCreate;
use Upcloud\Types\LoadBalancerMemberCreateZero;
use Upcloud\Types\LoadBalancerMemberCreateZeroType;
use Upcloud\LoadBalancer\Requests\LoadBalancerBackendModify;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerMemberRequest;
use Upcloud\LoadBalancer\Requests\ModifyLoadBalancerMemberRequest;
use Upcloud\Types\LoadBalancerMemberModifyZero;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerBackendTlsConfigRequest;
use Upcloud\LoadBalancer\Requests\ModifyLoadBalancerBackendTlsConfigRequest;
use Upcloud\LoadBalancer\Requests\LoadBalancerNetworkModify;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerIpAddressRequest;
use Upcloud\Types\LoadBalancerIpAddressCreate;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerResolverRequest;
use Upcloud\Types\LoadBalancerResolverCreate;
use Upcloud\LoadBalancer\Requests\LoadBalancerResolverModify;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerLabelRequest;
use Upcloud\Types\LoadBalancerLabelCreate;
use Upcloud\LoadBalancer\Requests\ModifyLoadBalancerLabelRequest;
use Upcloud\Types\LoadBalancerLabelModify;
use Upcloud\LoadBalancer\Requests\GetLoadBalancerFrontendCombinedMetricsSeriesRequest;
use Upcloud\LoadBalancer\Requests\GetLoadBalancerFrontendMetricsSeriesRequest;
use Upcloud\LoadBalancer\Requests\GetLoadBalancerBackendCombinedMetricsSeriesRequest;
use Upcloud\LoadBalancer\Requests\GetLoadBalancerBackendMetricsSeriesRequest;
use Upcloud\LoadBalancer\Requests\GetLoadBalancerMemberCombinedMetricsSeriesRequest;
use Upcloud\LoadBalancer\Requests\GetLoadBalancerMemberMetricsSeriesRequest;
use Upcloud\LoadBalancer\Requests\ListLoadBalancerCertificateBundlesRequest;
use Upcloud\Types\LoadBalancerCertificateBundleCreateZero;
use Upcloud\Types\LoadBalancerCertificateBundleCreateZeroType;
use Upcloud\LoadBalancer\Requests\ModifyLoadBalancerCertificateBundleRequest;
use Upcloud\Types\LoadBalancerCertificateBundleManualModify;
use Upcloud\LoadBalancer\Requests\CreateLoadBalancerCertificateBundleLabelRequest;
use Upcloud\LoadBalancer\Requests\ModifyLoadBalancerCertificateBundleLabelRequest;
use Upcloud\LoadBalancer\Requests\ListLoadBalancerPlansRequest;

class LoadBalancerWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListLoadBalancers(): void {
        $testId = 'load_balancer.list_load_balancers.0';
        $this->client->loadBalancer->listLoadBalancers(
            new ListLoadBalancersRequest([
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancers.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer",
            ['limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancer(): void {
        $testId = 'load_balancer.create_load_balancer.0';
        $this->client->loadBalancer->createLoadBalancer(
            new LoadBalancerServiceCreate([
                'name' => 'my-loadbalancer',
                'zone' => 'fi-hel1',
                'plan' => 'production-small',
                'configuredStatus' => LoadBalancerServiceConfiguredStatus::Started->value,
                'frontends' => [
                    new LoadBalancerFrontendCreate([
                        'name' => 'my-frontend',
                        'port' => 80,
                        'mode' => LoadBalancerFrontendMode::Http->value,
                        'defaultBackend' => 'my-backend',
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancer(): void {
        $testId = 'load_balancer.get_load_balancer.0';
        $this->client->loadBalancer->getLoadBalancer(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testReplaceLoadBalancer(): void {
        $testId = 'load_balancer.replace_load_balancer.0';
        $this->client->loadBalancer->replaceLoadBalancer(
            '01234567-89ab-cdef-0123-456789abcdef',
            new LoadBalancerServiceReplace([
                'name' => 'my-loadbalancer',
                'plan' => 'production',
                'configuredStatus' => LoadBalancerServiceConfiguredStatus::Started->value,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.replace_load_balancer.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancer(): void {
        $testId = 'load_balancer.delete_load_balancer.0';
        $this->client->loadBalancer->deleteLoadBalancer(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancer(): void {
        $testId = 'load_balancer.modify_load_balancer.0';
        $this->client->loadBalancer->modifyLoadBalancer(
            '01234567-89ab-cdef-0123-456789abcdef',
            new LoadBalancerServiceModify([
                'name' => 'updated-loadbalancer',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerFrontends(): void {
        $testId = 'load_balancer.list_load_balancer_frontends.0';
        $this->client->loadBalancer->listLoadBalancerFrontends(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_frontends.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerFrontend(): void {
        $testId = 'load_balancer.create_load_balancer_frontend.0';
        $this->client->loadBalancer->createLoadBalancerFrontend(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateLoadBalancerFrontendRequest([
                'body' => new LoadBalancerFrontendCreate([
                    'name' => 'my-frontend',
                    'port' => 80,
                    'mode' => LoadBalancerFrontendMode::Http->value,
                    'defaultBackend' => 'my-backend',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_frontend.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerFrontend(): void {
        $testId = 'load_balancer.get_load_balancer_frontend.0';
        $this->client->loadBalancer->getLoadBalancerFrontend(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_frontend.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerFrontend(): void {
        $testId = 'load_balancer.delete_load_balancer_frontend.0';
        $this->client->loadBalancer->deleteLoadBalancerFrontend(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_frontend.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerFrontend(): void {
        $testId = 'load_balancer.modify_load_balancer_frontend.0';
        $this->client->loadBalancer->modifyLoadBalancerFrontend(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            new LoadBalancerFrontendModify([
                'name' => 'updated-frontend',
                'port' => 443,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_frontend.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerFrontendTlsConfigs(): void {
        $testId = 'load_balancer.list_load_balancer_frontend_tls_configs.0';
        $this->client->loadBalancer->listLoadBalancerFrontendTlsConfigs(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_frontend_tls_configs.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/tls-configs",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerFrontendTlsConfig(): void {
        $testId = 'load_balancer.create_load_balancer_frontend_tls_config.0';
        $this->client->loadBalancer->createLoadBalancerFrontendTlsConfig(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            new CreateLoadBalancerFrontendTlsConfigRequest([
                'body' => new LoadBalancerTlsConfigCreate([
                    'name' => 'tls-config-1',
                    'certificateBundleUuid' => '123e4567-e89b-12d3-a456-426614174000',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_frontend_tls_config.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/tls-configs",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerFrontendTlsConfig(): void {
        $testId = 'load_balancer.get_load_balancer_frontend_tls_config.0';
        $this->client->loadBalancer->getLoadBalancerFrontendTlsConfig(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            'example-tls-config-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_frontend_tls_config.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/tls-configs/example-tls-config-1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerFrontendTlsConfig(): void {
        $testId = 'load_balancer.delete_load_balancer_frontend_tls_config.0';
        $this->client->loadBalancer->deleteLoadBalancerFrontendTlsConfig(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            'example-tls-config-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_frontend_tls_config.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/tls-configs/example-tls-config-1",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerFrontendTlsConfig(): void {
        $testId = 'load_balancer.modify_load_balancer_frontend_tls_config.0';
        $this->client->loadBalancer->modifyLoadBalancerFrontendTlsConfig(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            'example-tls-config-1',
            new ModifyLoadBalancerFrontendTlsConfigRequest([
                'body' => new LoadBalancerTlsConfigModify([
                    'name' => 'tls-config-1',
                    'certificateBundleUuid' => '123e4567-e89b-12d3-a456-426614174000',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_frontend_tls_config.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/tls-configs/example-tls-config-1",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerRules(): void {
        $testId = 'load_balancer.list_load_balancer_rules.0';
        $this->client->loadBalancer->listLoadBalancerRules(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_rules.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/rules",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerRule(): void {
        $testId = 'load_balancer.create_load_balancer_rule.0';
        $this->client->loadBalancer->createLoadBalancerRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            new CreateLoadBalancerRuleRequest([
                'body' => new LoadBalancerRuleCreate([
                    'name' => 'my-rule',
                    'priority' => 10,
                    'matchingCondition' => LoadBalancerMatchingCondition::And_->value,
                    'matchers' => [
                        new LoadBalancerMatcherCreateMatchSrcIp([
                            'type' => LoadBalancerMatcherCreateMatchSrcIpType::SrcIp->value,
                            'matchSrcIp' => new LoadBalancerMatcherIpCreate([
                                'value' => '192.168.1.1',
                            ]),
                        ]),
                    ],
                    'actions' => [
                        new LoadBalancerActionCreateActionUseBackend([
                            'type' => LoadBalancerActionCreateActionUseBackendType::UseBackend->value,
                            'actionUseBackend' => new LoadBalancerActionUseBackendCreate([
                                'backend' => 'backend-1',
                            ]),
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/rules",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerRule(): void {
        $testId = 'load_balancer.get_load_balancer_rule.0';
        $this->client->loadBalancer->getLoadBalancerRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            'example-rule-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/rules/example-rule-1",
            null,
            1
        );
    }

    /**
     */
    public function testReplaceLoadBalancerRule(): void {
        $testId = 'load_balancer.replace_load_balancer_rule.0';
        $this->client->loadBalancer->replaceLoadBalancerRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            'example-rule-1',
            new ReplaceLoadBalancerRuleRequest([
                'body' => new LoadBalancerRuleCreate([
                    'name' => 'my-rule',
                    'priority' => 10,
                    'matchingCondition' => LoadBalancerMatchingCondition::And_->value,
                    'matchers' => [
                        new LoadBalancerMatcherCreateMatchSrcIp([
                            'type' => LoadBalancerMatcherCreateMatchSrcIpType::SrcIp->value,
                            'matchSrcIp' => new LoadBalancerMatcherIpCreate([
                                'value' => '192.168.1.1',
                            ]),
                        ]),
                    ],
                    'actions' => [
                        new LoadBalancerActionCreateActionUseBackend([
                            'type' => LoadBalancerActionCreateActionUseBackendType::UseBackend->value,
                            'actionUseBackend' => new LoadBalancerActionUseBackendCreate([
                                'backend' => 'backend-1',
                            ]),
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.replace_load_balancer_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/rules/example-rule-1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerRule(): void {
        $testId = 'load_balancer.delete_load_balancer_rule.0';
        $this->client->loadBalancer->deleteLoadBalancerRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            'example-rule-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/rules/example-rule-1",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerRule(): void {
        $testId = 'load_balancer.modify_load_balancer_rule.0';
        $this->client->loadBalancer->modifyLoadBalancerRule(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            'example-rule-1',
            new LoadBalancerRuleModify([
                'name' => 'updated-rule',
                'priority' => 10,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_rule.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/frontends/example-frontend-1/rules/example-rule-1",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerBackends(): void {
        $testId = 'load_balancer.list_load_balancer_backends.0';
        $this->client->loadBalancer->listLoadBalancerBackends(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_backends.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerBackend(): void {
        $testId = 'load_balancer.create_load_balancer_backend.0';
        $this->client->loadBalancer->createLoadBalancerBackend(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateLoadBalancerBackendRequest([
                'body' => new LoadBalancerBackendCreate([
                    'name' => 'my-backend',
                    'members' => [
                        new LoadBalancerMemberCreateZero([
                            'type' => LoadBalancerMemberCreateZeroType::Static_->value,
                            'ip' => 'ip',
                            'port' => 1,
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_backend.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerBackend(): void {
        $testId = 'load_balancer.get_load_balancer_backend.0';
        $this->client->loadBalancer->getLoadBalancerBackend(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_backend.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerBackend(): void {
        $testId = 'load_balancer.delete_load_balancer_backend.0';
        $this->client->loadBalancer->deleteLoadBalancerBackend(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_backend.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerBackend(): void {
        $testId = 'load_balancer.modify_load_balancer_backend.0';
        $this->client->loadBalancer->modifyLoadBalancerBackend(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            new LoadBalancerBackendModify([
                'name' => 'updated-backend',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_backend.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerMembers(): void {
        $testId = 'load_balancer.list_load_balancer_members.0';
        $this->client->loadBalancer->listLoadBalancerMembers(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_members.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/members",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerMember(): void {
        $testId = 'load_balancer.create_load_balancer_member.0';
        $this->client->loadBalancer->createLoadBalancerMember(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            new CreateLoadBalancerMemberRequest([
                'body' => new LoadBalancerMemberCreateZero([
                    'type' => LoadBalancerMemberCreateZeroType::Static_->value,
                    'ip' => 'ip',
                    'port' => 1,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_member.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/members",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerMember(): void {
        $testId = 'load_balancer.get_load_balancer_member.0';
        $this->client->loadBalancer->getLoadBalancerMember(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            'dev-member',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_member.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/members/dev-member",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerMember(): void {
        $testId = 'load_balancer.delete_load_balancer_member.0';
        $this->client->loadBalancer->deleteLoadBalancerMember(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            'dev-member',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_member.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/members/dev-member",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerMember(): void {
        $testId = 'load_balancer.modify_load_balancer_member.0';
        $this->client->loadBalancer->modifyLoadBalancerMember(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            'dev-member',
            new ModifyLoadBalancerMemberRequest([
                'body' => new LoadBalancerMemberModifyZero([]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_member.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/members/dev-member",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerBackendTlsConfigs(): void {
        $testId = 'load_balancer.list_load_balancer_backend_tls_configs.0';
        $this->client->loadBalancer->listLoadBalancerBackendTlsConfigs(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_backend_tls_configs.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/tls-configs",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerBackendTlsConfig(): void {
        $testId = 'load_balancer.create_load_balancer_backend_tls_config.0';
        $this->client->loadBalancer->createLoadBalancerBackendTlsConfig(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            new CreateLoadBalancerBackendTlsConfigRequest([
                'body' => new LoadBalancerTlsConfigCreate([
                    'name' => 'tls-config-1',
                    'certificateBundleUuid' => '123e4567-e89b-12d3-a456-426614174000',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_backend_tls_config.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/tls-configs",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerBackendTlsConfig(): void {
        $testId = 'load_balancer.get_load_balancer_backend_tls_config.0';
        $this->client->loadBalancer->getLoadBalancerBackendTlsConfig(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            'example-tls-config-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_backend_tls_config.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/tls-configs/example-tls-config-1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerBackendTlsConfig(): void {
        $testId = 'load_balancer.delete_load_balancer_backend_tls_config.0';
        $this->client->loadBalancer->deleteLoadBalancerBackendTlsConfig(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            'example-tls-config-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_backend_tls_config.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/tls-configs/example-tls-config-1",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerBackendTlsConfig(): void {
        $testId = 'load_balancer.modify_load_balancer_backend_tls_config.0';
        $this->client->loadBalancer->modifyLoadBalancerBackendTlsConfig(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            'example-tls-config-1',
            new ModifyLoadBalancerBackendTlsConfigRequest([
                'body' => new LoadBalancerTlsConfigModify([
                    'name' => 'tls-config-1',
                    'certificateBundleUuid' => '123e4567-e89b-12d3-a456-426614174000',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_backend_tls_config.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/backends/backend-infra/tls-configs/example-tls-config-1",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerNetwork(): void {
        $testId = 'load_balancer.modify_load_balancer_network.0';
        $this->client->loadBalancer->modifyLoadBalancerNetwork(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-network-1',
            new LoadBalancerNetworkModify([
                'name' => 'updated-network',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/networks/example-network-1",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerIpAddresses(): void {
        $testId = 'load_balancer.list_load_balancer_ip_addresses.0';
        $this->client->loadBalancer->listLoadBalancerIpAddresses(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_ip_addresses.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/ip-addresses",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerIpAddress(): void {
        $testId = 'load_balancer.create_load_balancer_ip_address.0';
        $this->client->loadBalancer->createLoadBalancerIpAddress(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateLoadBalancerIpAddressRequest([
                'body' => new LoadBalancerIpAddressCreate([
                    'address' => '192.168.1.10',
                    'networkName' => 'private-net-1',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/ip-addresses",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerIpAddress(): void {
        $testId = 'load_balancer.get_load_balancer_ip_address.0';
        $this->client->loadBalancer->getLoadBalancerIpAddress(
            '01234567-89ab-cdef-0123-456789abcdef',
            '192.168.1.1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/ip-addresses/192.168.1.1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerIpAddress(): void {
        $testId = 'load_balancer.delete_load_balancer_ip_address.0';
        $this->client->loadBalancer->deleteLoadBalancerIpAddress(
            '01234567-89ab-cdef-0123-456789abcdef',
            '192.168.1.1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/ip-addresses/192.168.1.1",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerResolvers(): void {
        $testId = 'load_balancer.list_load_balancer_resolvers.0';
        $this->client->loadBalancer->listLoadBalancerResolvers(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_resolvers.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/resolvers",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerResolver(): void {
        $testId = 'load_balancer.create_load_balancer_resolver.0';
        $this->client->loadBalancer->createLoadBalancerResolver(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateLoadBalancerResolverRequest([
                'body' => new LoadBalancerResolverCreate([
                    'name' => 'default-resolver',
                    'nameservers' => [
                        '1.1.1.1:53',
                        '8.8.8.8:53',
                    ],
                    'retries' => 3,
                    'timeout' => 5,
                    'timeoutRetry' => 3,
                    'cacheValid' => 300,
                    'cacheInvalid' => 60,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_resolver.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/resolvers",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerResolver(): void {
        $testId = 'load_balancer.get_load_balancer_resolver.0';
        $this->client->loadBalancer->getLoadBalancerResolver(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-resolver-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_resolver.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/resolvers/example-resolver-1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerResolver(): void {
        $testId = 'load_balancer.delete_load_balancer_resolver.0';
        $this->client->loadBalancer->deleteLoadBalancerResolver(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-resolver-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_resolver.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/resolvers/example-resolver-1",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerResolver(): void {
        $testId = 'load_balancer.modify_load_balancer_resolver.0';
        $this->client->loadBalancer->modifyLoadBalancerResolver(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-resolver-1',
            new LoadBalancerResolverModify([
                'name' => 'default-resolver',
                'nameservers' => [
                    '1.1.1.1:53',
                    '8.8.8.8:53',
                ],
                'retries' => 3,
                'timeout' => 5,
                'timeoutRetry' => 3,
                'cacheValid' => 300,
                'cacheInvalid' => 60,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_resolver.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/resolvers/example-resolver-1",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerLabels(): void {
        $testId = 'load_balancer.list_load_balancer_labels.0';
        $this->client->loadBalancer->listLoadBalancerLabels(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerLabel(): void {
        $testId = 'load_balancer.create_load_balancer_label.0';
        $this->client->loadBalancer->createLoadBalancerLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateLoadBalancerLabelRequest([
                'body' => new LoadBalancerLabelCreate([
                    'key' => 'environment',
                    'value' => 'production',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerLabel(): void {
        $testId = 'load_balancer.get_load_balancer_label.0';
        $this->client->loadBalancer->getLoadBalancerLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-key-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/labels/example-key-1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerLabel(): void {
        $testId = 'load_balancer.delete_load_balancer_label.0';
        $this->client->loadBalancer->deleteLoadBalancerLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-key-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/labels/example-key-1",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerLabel(): void {
        $testId = 'load_balancer.modify_load_balancer_label.0';
        $this->client->loadBalancer->modifyLoadBalancerLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-key-1',
            new ModifyLoadBalancerLabelRequest([
                'body' => new LoadBalancerLabelModify([
                    'key' => 'environment',
                    'value' => 'production',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/labels/example-key-1",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerMetrics(): void {
        $testId = 'load_balancer.get_load_balancer_metrics.0';
        $this->client->loadBalancer->getLoadBalancerMetrics(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_metrics.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/metrics",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerMetricsSeries(): void {
        $testId = 'load_balancer.get_load_balancer_metrics_series.0';
        $this->client->loadBalancer->getLoadBalancerMetricsSeries(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_metrics_series.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/metrics/series",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerFrontendCombinedMetricsSeries(): void {
        $testId = 'load_balancer.get_load_balancer_frontend_combined_metrics_series.0';
        $this->client->loadBalancer->getLoadBalancerFrontendCombinedMetricsSeries(
            '01234567-89ab-cdef-0123-456789abcdef',
            new GetLoadBalancerFrontendCombinedMetricsSeriesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_frontend_combined_metrics_series.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/metrics/series/frontends",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerFrontendMetricsSeries(): void {
        $testId = 'load_balancer.get_load_balancer_frontend_metrics_series.0';
        $this->client->loadBalancer->getLoadBalancerFrontendMetricsSeries(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-frontend-1',
            new GetLoadBalancerFrontendMetricsSeriesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_frontend_metrics_series.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/metrics/series/frontends/example-frontend-1",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerBackendCombinedMetricsSeries(): void {
        $testId = 'load_balancer.get_load_balancer_backend_combined_metrics_series.0';
        $this->client->loadBalancer->getLoadBalancerBackendCombinedMetricsSeries(
            '01234567-89ab-cdef-0123-456789abcdef',
            new GetLoadBalancerBackendCombinedMetricsSeriesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_backend_combined_metrics_series.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/metrics/series/backends",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerBackendMetricsSeries(): void {
        $testId = 'load_balancer.get_load_balancer_backend_metrics_series.0';
        $this->client->loadBalancer->getLoadBalancerBackendMetricsSeries(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            new GetLoadBalancerBackendMetricsSeriesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_backend_metrics_series.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/metrics/series/backends/backend-infra",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerMemberCombinedMetricsSeries(): void {
        $testId = 'load_balancer.get_load_balancer_member_combined_metrics_series.0';
        $this->client->loadBalancer->getLoadBalancerMemberCombinedMetricsSeries(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            new GetLoadBalancerMemberCombinedMetricsSeriesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_member_combined_metrics_series.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/metrics/series/backends/backend-infra/members",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerMemberMetricsSeries(): void {
        $testId = 'load_balancer.get_load_balancer_member_metrics_series.0';
        $this->client->loadBalancer->getLoadBalancerMemberMetricsSeries(
            '01234567-89ab-cdef-0123-456789abcdef',
            'backend-infra',
            'dev-member',
            new GetLoadBalancerMemberMetricsSeriesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_member_metrics_series.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/01234567-89ab-cdef-0123-456789abcdef/metrics/series/backends/backend-infra/members/dev-member",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerCertificateBundles(): void {
        $testId = 'load_balancer.list_load_balancer_certificate_bundles.0';
        $this->client->loadBalancer->listLoadBalancerCertificateBundles(
            new ListLoadBalancerCertificateBundlesRequest([
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_certificate_bundles.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/certificate-bundles",
            ['limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerCertificateBundle(): void {
        $testId = 'load_balancer.create_load_balancer_certificate_bundle.0';
        $this->client->loadBalancer->createLoadBalancerCertificateBundle(
            new LoadBalancerCertificateBundleCreateZero([
                'type' => LoadBalancerCertificateBundleCreateZeroType::Manual->value,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_certificate_bundle.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/certificate-bundles",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerCertificateBundle(): void {
        $testId = 'load_balancer.get_load_balancer_certificate_bundle.0';
        $this->client->loadBalancer->getLoadBalancerCertificateBundle(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_certificate_bundle.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/certificate-bundles/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerCertificateBundle(): void {
        $testId = 'load_balancer.delete_load_balancer_certificate_bundle.0';
        $this->client->loadBalancer->deleteLoadBalancerCertificateBundle(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_certificate_bundle.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/certificate-bundles/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerCertificateBundle(): void {
        $testId = 'load_balancer.modify_load_balancer_certificate_bundle.0';
        $this->client->loadBalancer->modifyLoadBalancerCertificateBundle(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ModifyLoadBalancerCertificateBundleRequest([
                'body' => new LoadBalancerCertificateBundleManualModify([
                    'name' => 'updated-manual-cert',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_certificate_bundle.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/certificate-bundles/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerCertificateBundleLabels(): void {
        $testId = 'load_balancer.list_load_balancer_certificate_bundle_labels.0';
        $this->client->loadBalancer->listLoadBalancerCertificateBundleLabels(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_certificate_bundle_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/certificate-bundles/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateLoadBalancerCertificateBundleLabel(): void {
        $testId = 'load_balancer.create_load_balancer_certificate_bundle_label.0';
        $this->client->loadBalancer->createLoadBalancerCertificateBundleLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateLoadBalancerCertificateBundleLabelRequest([
                'body' => new LoadBalancerLabelCreate([
                    'key' => 'environment',
                    'value' => 'production',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.create_load_balancer_certificate_bundle_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/load-balancer/certificate-bundles/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerCertificateBundleLabel(): void {
        $testId = 'load_balancer.get_load_balancer_certificate_bundle_label.0';
        $this->client->loadBalancer->getLoadBalancerCertificateBundleLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-key-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_certificate_bundle_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/certificate-bundles/01234567-89ab-cdef-0123-456789abcdef/labels/example-key-1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteLoadBalancerCertificateBundleLabel(): void {
        $testId = 'load_balancer.delete_load_balancer_certificate_bundle_label.0';
        $this->client->loadBalancer->deleteLoadBalancerCertificateBundleLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-key-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.delete_load_balancer_certificate_bundle_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/load-balancer/certificate-bundles/01234567-89ab-cdef-0123-456789abcdef/labels/example-key-1",
            null,
            1
        );
    }

    /**
     */
    public function testModifyLoadBalancerCertificateBundleLabel(): void {
        $testId = 'load_balancer.modify_load_balancer_certificate_bundle_label.0';
        $this->client->loadBalancer->modifyLoadBalancerCertificateBundleLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example-key-1',
            new ModifyLoadBalancerCertificateBundleLabelRequest([
                'body' => new LoadBalancerLabelModify([
                    'key' => 'environment',
                    'value' => 'production',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.modify_load_balancer_certificate_bundle_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/load-balancer/certificate-bundles/01234567-89ab-cdef-0123-456789abcdef/labels/example-key-1",
            null,
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerDnsChallengeDomain(): void {
        $testId = 'load_balancer.get_load_balancer_dns_challenge_domain.0';
        $this->client->loadBalancer->getLoadBalancerDnsChallengeDomain(
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_dns_challenge_domain.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/certificate-bundles/dns-challenge-domain",
            null,
            1
        );
    }

    /**
     */
    public function testListLoadBalancerPlans(): void {
        $testId = 'load_balancer.list_load_balancer_plans.0';
        $this->client->loadBalancer->listLoadBalancerPlans(
            new ListLoadBalancerPlansRequest([
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.list_load_balancer_plans.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/plans",
            ['limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetLoadBalancerPlan(): void {
        $testId = 'load_balancer.get_load_balancer_plan.0';
        $this->client->loadBalancer->getLoadBalancerPlan(
            'example-plan-1',
            [
                'headers' => [
                    'X-Test-Id' => 'load_balancer.get_load_balancer_plan.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/load-balancer/plans/example-plan-1",
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

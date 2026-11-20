<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\ContainerRegistry\Requests\ListContainerRegistriesRequest;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryServiceCreate;
use Upcloud\Types\ContainerRegistryTier;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceCreateLabelsItem;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceCreateProperties;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryServiceModify;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceModifyLabelsItem;
use Upcloud\ContainerRegistry\Types\ContainerRegistryServiceModifyProperties;
use Upcloud\ContainerRegistry\Requests\GetContainerRegistryMetricsRequest;
use Upcloud\ContainerRegistry\Requests\GetContainerRegistryTrafficMetricsRequest;
use Upcloud\ContainerRegistry\Requests\ListContainerRegistryEventsRequest;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryUserCreate;
use Upcloud\Types\ContainerRegistryPermissionsItem;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryUserModify;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryChangePassword;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryNetworkPeeringCreate;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryAccessModeModify;
use Upcloud\ContainerRegistry\Types\ContainerRegistryAccessModeModifyAccessMode;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryIpAllowlistCreate;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryWebhookCreate;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryWebhookModify;
use Upcloud\ContainerRegistry\Requests\ListContainerRegistryRepositoriesRequest;
use Upcloud\ContainerRegistry\Requests\ContainerRegistryTagDigestRequest;

class ContainerRegistryWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListContainerRegistries(): void {
        $testId = 'container_registry.list_container_registries.0';
        $this->client->containerRegistry->listContainerRegistries(
            new ListContainerRegistriesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registries.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry",
            null,
            1
        );
    }

    /**
     */
    public function testCreateContainerRegistry(): void {
        $testId = 'container_registry.create_container_registry.0';
        $this->client->containerRegistry->createContainerRegistry(
            new ContainerRegistryServiceCreate([
                'name' => 'my-registry',
                'tier' => ContainerRegistryTier::StarterBeta->value,
                'region' => 'fi-hel1',
                'labels' => [
                    new ContainerRegistryServiceCreateLabelsItem([
                        'key' => 'env',
                        'value' => 'prod',
                    ]),
                    new ContainerRegistryServiceCreateLabelsItem([
                        'key' => 'team',
                        'value' => 'platform',
                    ]),
                ],
                'properties' => new ContainerRegistryServiceCreateProperties([
                    'anonymousPullsAllowed' => false,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.create_container_registry.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryRegions(): void {
        $testId = 'container_registry.list_container_registry_regions.0';
        $this->client->containerRegistry->listContainerRegistryRegions(
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_regions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/regions",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryPlans(): void {
        $testId = 'container_registry.list_container_registry_plans.0';
        $this->client->containerRegistry->listContainerRegistryPlans(
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_plans.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/plans",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistry(): void {
        $testId = 'container_registry.get_container_registry.0';
        $this->client->containerRegistry->getContainerRegistry(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteContainerRegistry(): void {
        $testId = 'container_registry.delete_container_registry.0';
        $this->client->containerRegistry->deleteContainerRegistry(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.delete_container_registry.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/container-registry/uuid",
            null,
            1
        );
    }

    /**
     */
    public function testModifyContainerRegistry(): void {
        $testId = 'container_registry.modify_container_registry.0';
        $this->client->containerRegistry->modifyContainerRegistry(
            'uuid',
            new ContainerRegistryServiceModify([
                'tier' => ContainerRegistryTier::ProBeta->value,
                'labels' => [
                    new ContainerRegistryServiceModifyLabelsItem([
                        'key' => 'env',
                        'value' => 'prod',
                    ]),
                    new ContainerRegistryServiceModifyLabelsItem([
                        'key' => 'criticality',
                        'value' => 'high',
                    ]),
                ],
                'properties' => new ContainerRegistryServiceModifyProperties([
                    'anonymousPullsAllowed' => true,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.modify_container_registry.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/container-registry/uuid",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistryProvisioning(): void {
        $testId = 'container_registry.get_container_registry_provisioning.0';
        $this->client->containerRegistry->getContainerRegistryProvisioning(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry_provisioning.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/provisioning",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistryMetrics(): void {
        $testId = 'container_registry.get_container_registry_metrics.0';
        $this->client->containerRegistry->getContainerRegistryMetrics(
            'uuid',
            new GetContainerRegistryMetricsRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry_metrics.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/metrics",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistryTrafficMetrics(): void {
        $testId = 'container_registry.get_container_registry_traffic_metrics.0';
        $this->client->containerRegistry->getContainerRegistryTrafficMetrics(
            'uuid',
            new GetContainerRegistryTrafficMetricsRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry_traffic_metrics.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/metrics/traffic",
            null,
            1
        );
    }

    /**
     */
    public function testSyncContainerRegistryStorage(): void {
        $testId = 'container_registry.sync_container_registry_storage.0';
        $this->client->containerRegistry->syncContainerRegistryStorage(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.sync_container_registry_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/sync-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryEvents(): void {
        $testId = 'container_registry.list_container_registry_events.0';
        $this->client->containerRegistry->listContainerRegistryEvents(
            'uuid',
            new ListContainerRegistryEventsRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_events.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/events",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistryConnection(): void {
        $testId = 'container_registry.get_container_registry_connection.0';
        $this->client->containerRegistry->getContainerRegistryConnection(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry_connection.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/connection",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistryCredentials(): void {
        $testId = 'container_registry.get_container_registry_credentials.0';
        $this->client->containerRegistry->getContainerRegistryCredentials(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry_credentials.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/credentials",
            null,
            1
        );
    }

    /**
     */
    public function testRotateContainerRegistryCredentials(): void {
        $testId = 'container_registry.rotate_container_registry_credentials.0';
        $this->client->containerRegistry->rotateContainerRegistryCredentials(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.rotate_container_registry_credentials.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/credentials",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryUsers(): void {
        $testId = 'container_registry.list_container_registry_users.0';
        $this->client->containerRegistry->listContainerRegistryUsers(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_users.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/users",
            null,
            1
        );
    }

    /**
     */
    public function testCreateContainerRegistryUser(): void {
        $testId = 'container_registry.create_container_registry_user.0';
        $this->client->containerRegistry->createContainerRegistryUser(
            'uuid',
            new ContainerRegistryUserCreate([
                'username' => 'deploy-bot',
                'password' => 'change-me-please',
                'permissions' => [
                    ContainerRegistryPermissionsItem::Read->value,
                    ContainerRegistryPermissionsItem::Create->value,
                    ContainerRegistryPermissionsItem::Update->value,
                ],
                'displayName' => 'Deployment Bot',
                'email' => 'deploy-bot@example.com',
                'description' => 'CI service account used by the deploy pipeline.',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.create_container_registry_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/users",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistryUser(): void {
        $testId = 'container_registry.get_container_registry_user.0';
        $this->client->containerRegistry->getContainerRegistryUser(
            'uuid',
            'username',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/users/username",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteContainerRegistryUser(): void {
        $testId = 'container_registry.delete_container_registry_user.0';
        $this->client->containerRegistry->deleteContainerRegistryUser(
            'uuid',
            'username',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.delete_container_registry_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/container-registry/uuid/users/username",
            null,
            1
        );
    }

    /**
     */
    public function testModifyContainerRegistryUser(): void {
        $testId = 'container_registry.modify_container_registry_user.0';
        $this->client->containerRegistry->modifyContainerRegistryUser(
            'uuid',
            'username',
            new ContainerRegistryUserModify([
                'permissions' => [
                    ContainerRegistryPermissionsItem::Read->value,
                ],
                'active' => true,
                'displayName' => 'Deployment Bot (read-only)',
                'email' => 'deploy-bot@example.com',
                'description' => 'Demoted to read-only after rotation.',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.modify_container_registry_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/container-registry/uuid/users/username",
            null,
            1
        );
    }

    /**
     */
    public function testChangeContainerRegistryUserPassword(): void {
        $testId = 'container_registry.change_container_registry_user_password.0';
        $this->client->containerRegistry->changeContainerRegistryUserPassword(
            'uuid',
            'username',
            new ContainerRegistryChangePassword([
                'newPassword' => 'new-strong-password',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.change_container_registry_user_password.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/users/username/password",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryNetworkPeerings(): void {
        $testId = 'container_registry.list_container_registry_network_peerings.0';
        $this->client->containerRegistry->listContainerRegistryNetworkPeerings(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_network_peerings.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/networks",
            null,
            1
        );
    }

    /**
     */
    public function testCreateContainerRegistryNetworkPeering(): void {
        $testId = 'container_registry.create_container_registry_network_peering.0';
        $this->client->containerRegistry->createContainerRegistryNetworkPeering(
            'uuid',
            new ContainerRegistryNetworkPeeringCreate([
                'networkUuid' => '00000000-0000-0000-0000-000000000001',
                'networkCidr' => '10.20.0.0/16',
                'zone' => 'fi-hel1',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.create_container_registry_network_peering.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/networks",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistryNetworkPeering(): void {
        $testId = 'container_registry.get_container_registry_network_peering.0';
        $this->client->containerRegistry->getContainerRegistryNetworkPeering(
            'uuid',
            'peering_uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry_network_peering.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/networks/peering_uuid",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteContainerRegistryNetworkPeering(): void {
        $testId = 'container_registry.delete_container_registry_network_peering.0';
        $this->client->containerRegistry->deleteContainerRegistryNetworkPeering(
            'uuid',
            'peering_uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.delete_container_registry_network_peering.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/container-registry/uuid/networks/peering_uuid",
            null,
            1
        );
    }

    /**
     */
    public function testGetContainerRegistryAccessMode(): void {
        $testId = 'container_registry.get_container_registry_access_mode.0';
        $this->client->containerRegistry->getContainerRegistryAccessMode(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.get_container_registry_access_mode.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/access-mode",
            null,
            1
        );
    }

    /**
     */
    public function testModifyContainerRegistryAccessMode(): void {
        $testId = 'container_registry.modify_container_registry_access_mode.0';
        $this->client->containerRegistry->modifyContainerRegistryAccessMode(
            'uuid',
            new ContainerRegistryAccessModeModify([
                'accessMode' => ContainerRegistryAccessModeModifyAccessMode::Dual->value,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.modify_container_registry_access_mode.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/container-registry/uuid/access-mode",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryIpAllowlist(): void {
        $testId = 'container_registry.list_container_registry_ip_allowlist.0';
        $this->client->containerRegistry->listContainerRegistryIpAllowlist(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_ip_allowlist.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/allowlist",
            null,
            1
        );
    }

    /**
     */
    public function testCreateContainerRegistryIpAllowlistEntry(): void {
        $testId = 'container_registry.create_container_registry_ip_allowlist_entry.0';
        $this->client->containerRegistry->createContainerRegistryIpAllowlistEntry(
            'uuid',
            new ContainerRegistryIpAllowlistCreate([
                'cidr' => '203.0.113.0/24',
                'description' => 'Office egress range',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.create_container_registry_ip_allowlist_entry.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/allowlist",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteContainerRegistryIpAllowlistEntry(): void {
        $testId = 'container_registry.delete_container_registry_ip_allowlist_entry.0';
        $this->client->containerRegistry->deleteContainerRegistryIpAllowlistEntry(
            'uuid',
            'entry_uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.delete_container_registry_ip_allowlist_entry.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/container-registry/uuid/allowlist/entry_uuid",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryWebhooks(): void {
        $testId = 'container_registry.list_container_registry_webhooks.0';
        $this->client->containerRegistry->listContainerRegistryWebhooks(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_webhooks.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/webhooks",
            null,
            1
        );
    }

    /**
     */
    public function testCreateContainerRegistryWebhook(): void {
        $testId = 'container_registry.create_container_registry_webhook.0';
        $this->client->containerRegistry->createContainerRegistryWebhook(
            'uuid',
            new ContainerRegistryWebhookCreate([
                'name' => 'audit-stream',
                'url' => 'https://events.example.com/upregistry-audit',
                'headers' => [
                    'X-Tenant' => 'prod',
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.create_container_registry_webhook.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/webhooks",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteContainerRegistryWebhook(): void {
        $testId = 'container_registry.delete_container_registry_webhook.0';
        $this->client->containerRegistry->deleteContainerRegistryWebhook(
            'uuid',
            'name',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.delete_container_registry_webhook.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/container-registry/uuid/webhooks/name",
            null,
            1
        );
    }

    /**
     */
    public function testModifyContainerRegistryWebhook(): void {
        $testId = 'container_registry.modify_container_registry_webhook.0';
        $this->client->containerRegistry->modifyContainerRegistryWebhook(
            'uuid',
            'name',
            new ContainerRegistryWebhookModify([
                'url' => 'https://events.example.com/upregistry-audit-v2',
                'headers' => [
                    'X-Tenant' => 'prod',
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.modify_container_registry_webhook.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/container-registry/uuid/webhooks/name",
            null,
            1
        );
    }

    /**
     */
    public function testRotateContainerRegistryWebhookSecret(): void {
        $testId = 'container_registry.rotate_container_registry_webhook_secret.0';
        $this->client->containerRegistry->rotateContainerRegistryWebhookSecret(
            'uuid',
            'name',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.rotate_container_registry_webhook_secret.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/webhooks/name/rotate-secret",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryRepositories(): void {
        $testId = 'container_registry.list_container_registry_repositories.0';
        $this->client->containerRegistry->listContainerRegistryRepositories(
            'uuid',
            new ListContainerRegistryRepositoriesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_repositories.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/repositories",
            null,
            1
        );
    }

    /**
     */
    public function testListContainerRegistryRepositoryTags(): void {
        $testId = 'container_registry.list_container_registry_repository_tags.0';
        $this->client->containerRegistry->listContainerRegistryRepositoryTags(
            'uuid',
            'repo',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.list_container_registry_repository_tags.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/container-registry/uuid/repositories/repo",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteContainerRegistryRepository(): void {
        $testId = 'container_registry.delete_container_registry_repository.0';
        $this->client->containerRegistry->deleteContainerRegistryRepository(
            'uuid',
            'repo',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.delete_container_registry_repository.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/container-registry/uuid/repositories/repo",
            null,
            1
        );
    }

    /**
     */
    public function testTagContainerRegistryDigest(): void {
        $testId = 'container_registry.tag_container_registry_digest.0';
        $this->client->containerRegistry->tagContainerRegistryDigest(
            'uuid',
            'repo',
            'tag',
            new ContainerRegistryTagDigestRequest([
                'digest' => 'sha256:1111111111111111111111111111111111111111111111111111111111111111',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.tag_container_registry_digest.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/container-registry/uuid/repositories/repo/tags/tag",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteContainerRegistryRepositoryTag(): void {
        $testId = 'container_registry.delete_container_registry_repository_tag.0';
        $this->client->containerRegistry->deleteContainerRegistryRepositoryTag(
            'uuid',
            'repo',
            'tag',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.delete_container_registry_repository_tag.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/container-registry/uuid/repositories/repo/tags/tag",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteContainerRegistryRepositoryManifest(): void {
        $testId = 'container_registry.delete_container_registry_repository_manifest.0';
        $this->client->containerRegistry->deleteContainerRegistryRepositoryManifest(
            'uuid',
            'repo',
            'digest',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.delete_container_registry_repository_manifest.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/container-registry/uuid/repositories/repo/manifests/digest",
            null,
            1
        );
    }

    /**
     */
    public function testRestartContainerRegistry(): void {
        $testId = 'container_registry.restart_container_registry.0';
        $this->client->containerRegistry->restartContainerRegistry(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'container_registry.restart_container_registry.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/container-registry/uuid/restart",
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

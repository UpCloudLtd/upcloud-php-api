<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Types\KubernetesCluster;
use Upcloud\Types\KubernetesNodeGroup;
use Upcloud\Types\KubernetesKubeletArg;
use Upcloud\Types\KubernetesLabel;
use Upcloud\Types\KubernetesTaint;
use Upcloud\Types\KubernetesEffect;
use Upcloud\Kubernetes\Requests\KubernetesClusterPatch;
use Upcloud\Kubernetes\Requests\UpgradeKubernetesClusterRequest;
use Upcloud\Types\KubernetesClusterAvailableUpgradesPost;
use Upcloud\Kubernetes\Requests\CreateKubernetesClusterNodeGroupRequest;
use Upcloud\Kubernetes\Requests\KubernetesNodeGroupPatch;
use Upcloud\Kubernetes\Requests\CreateClusterAuthenticationRequest;
use Upcloud\Types\KubernetesAuthenticationIssuerConfig;
use Upcloud\Kubernetes\Requests\SetClusterAuthenticationRequest;
use Upcloud\Kubernetes\Requests\UpdateClusterAuthenticationRequest;
use Upcloud\Kubernetes\Requests\GetKubernetesClusterOidcKubeconfigRequest;

class KubernetesWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListKubernetesClusters(): void {
        $testId = 'kubernetes.list_kubernetes_clusters.0';
        $this->client->kubernetes->listKubernetesClusters(
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.list_kubernetes_clusters.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes",
            null,
            1
        );
    }

    /**
     */
    public function testCreateKubernetesCluster(): void {
        $testId = 'kubernetes.create_kubernetes_cluster.0';
        $this->client->kubernetes->createKubernetesCluster(
            new KubernetesCluster([
                'controlPlaneIpFilter' => [
                    '1.2.3.0/24',
                    '1.1.1.1',
                ],
                'name' => 'example-cluster',
                'network' => '33333333-3333-3333-333333333333',
                'networkCidr' => '172.16.0.0/24',
                'nodeGroups' => [
                    new KubernetesNodeGroup([
                        'count' => 4,
                        'kubeletArgs' => [
                            new KubernetesKubeletArg([
                                'key' => 'log-flush-frequency',
                                'value' => '5s',
                            ]),
                        ],
                        'labels' => [
                            new KubernetesLabel([
                                'key' => 'managedBy',
                                'value' => 'exampleDevelopmentTeam',
                            ]),
                            new KubernetesLabel([
                                'key' => 'environment',
                                'value' => 'development',
                            ]),
                        ],
                        'name' => 'small',
                        'plan' => 'K8S-2xCPU-4GB',
                        'sshKeys' => [
                            'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCDxPPyWRTVHYOOaCE/gqDzcdJFZdo1mD8k+BBvZ4an/khT+rzJGT/K1kvxs1vS1AMzaVbuWH1bLVk8XVDVJ3J7Rf76E50O1mj3+SWW81bjneVlAxw7DRoxZInFio7TMFTt6eSRkOGQ2GVpvkePgunVZsk+XE13fSnthqS1TiiivnmaNXsaVIOSZICzTWVKqRz1XVR4fdyKJxEpFhHCIu0ui9SeB887IdcS3KshvNqJo3Jm0LmBLL1vzcbucc7T02wiqvdDSPO7TO8Wlc7sJXwmMImEDBkPYQTHmeOqsKbW0OiGuJniwg93pBt0BqNhn3gxtYLrmjha+PqO9gVR6XkV',
                        ],
                        'storage' => '01000000-0000-4000-8000-000160010100',
                        'taints' => [
                            new KubernetesTaint([
                                'effect' => KubernetesEffect::NoSchedule->value,
                                'key' => 'environment',
                                'value' => 'development',
                            ]),
                        ],
                    ]),
                    new KubernetesNodeGroup([
                        'count' => 8,
                        'kubeletArgs' => [
                            new KubernetesKubeletArg([
                                'key' => 'log-flush-frequency',
                                'value' => '15s',
                            ]),
                        ],
                        'labels' => [
                            new KubernetesLabel([
                                'key' => 'managedBy',
                                'value' => 'exampleStagingTeam',
                            ]),
                            new KubernetesLabel([
                                'key' => 'environment',
                                'value' => 'staging',
                            ]),
                        ],
                        'name' => 'medium',
                        'plan' => 'K8S-4xCPU-8GB',
                        'sshKeys' => [
                            'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCDxPPyWRTVHYOOaCE/gqDzcdJFZdo1mD8k+BBvZ4an/khT+rzJGT/K1kvxs1vS1AMzaVbuWH1bLVk8XVDVJ3J7Rf76E50O1mj3+SWW81bjneVlAxw7DRoxZInFio7TMFTt6eSRkOGQ2GVpvkePgunVZsk+XE13fSnthqS1TiiivnmaNXsaVIOSZICzTWVKqRz1XVR4fdyKJxEpFhHCIu0ui9SeB887IdcS3KshvNqJo3Jm0LmBLL1vzcbucc7T02wiqvdDSPO7TO8Wlc7sJXwmMImEDBkPYQTHmeOqsKbW0OiGuJniwg93pBt0BqNhn3gxtYLrmjha+PqO9gVR6XkV',
                        ],
                        'storage' => '01000000-0000-4000-8000-000160010100',
                        'taints' => [
                            new KubernetesTaint([
                                'effect' => KubernetesEffect::NoSchedule->value,
                                'key' => 'environment',
                                'value' => 'staging',
                            ]),
                        ],
                    ]),
                ],
                'zone' => 'de-fra1',
                'version' => 'version',
                'labels' => [
                    [
                        'key' => "env",
                        'value' => "prod",
                    ],
                    [
                        'key' => "app",
                        'value' => "cats-dating-app",
                    ],
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.create_kubernetes_cluster.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/kubernetes",
            null,
            1
        );
    }

    /**
     */
    public function testGetKubernetesCluster(): void {
        $testId = 'kubernetes.get_kubernetes_cluster.0';
        $this->client->kubernetes->getKubernetesCluster(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.get_kubernetes_cluster.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/uuid",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteKubernetesCluster(): void {
        $testId = 'kubernetes.delete_kubernetes_cluster.0';
        $this->client->kubernetes->deleteKubernetesCluster(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.delete_kubernetes_cluster.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/kubernetes/uuid",
            null,
            1
        );
    }

    /**
     */
    public function testModifyKubernetesCluster(): void {
        $testId = 'kubernetes.modify_kubernetes_cluster.0';
        $this->client->kubernetes->modifyKubernetesCluster(
            'uuid',
            new KubernetesClusterPatch([
                'controlPlaneIpFilter' => [
                    '1.2.3.0/24',
                    '1.1.1.1',
                ],
                'labels' => [
                    [
                        'key' => "env",
                        'value' => "prod",
                    ],
                    [
                        'key' => "app",
                        'value' => "cats-dating-app",
                    ],
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.modify_kubernetes_cluster.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/kubernetes/uuid",
            null,
            1
        );
    }

    /**
     */
    public function testGetKubernetesClusterKubeconfig(): void {
        $testId = 'kubernetes.get_kubernetes_cluster_kubeconfig.0';
        $this->client->kubernetes->getKubernetesClusterKubeconfig(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.get_kubernetes_cluster_kubeconfig.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/uuid/kubeconfig",
            null,
            1
        );
    }

    /**
     */
    public function testGetKubernetesClusterAvailableUpgrades(): void {
        $testId = 'kubernetes.get_kubernetes_cluster_available_upgrades.0';
        $this->client->kubernetes->getKubernetesClusterAvailableUpgrades(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.get_kubernetes_cluster_available_upgrades.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/uuid/available-upgrades",
            null,
            1
        );
    }

    /**
     */
    public function testUpgradeKubernetesCluster(): void {
        $testId = 'kubernetes.upgrade_kubernetes_cluster.0';
        $this->client->kubernetes->upgradeKubernetesCluster(
            'uuid',
            new UpgradeKubernetesClusterRequest([
                'body' => new KubernetesClusterAvailableUpgradesPost([
                    'version' => '1.31',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.upgrade_kubernetes_cluster.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/kubernetes/uuid/available-upgrades",
            null,
            1
        );
    }

    /**
     */
    public function testListKubernetesClusterNodeGroups(): void {
        $testId = 'kubernetes.list_kubernetes_cluster_node_groups.0';
        $this->client->kubernetes->listKubernetesClusterNodeGroups(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.list_kubernetes_cluster_node_groups.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/uuid/node-groups",
            null,
            1
        );
    }

    /**
     */
    public function testCreateKubernetesClusterNodeGroup(): void {
        $testId = 'kubernetes.create_kubernetes_cluster_node_group.0';
        $this->client->kubernetes->createKubernetesClusterNodeGroup(
            'uuid',
            new CreateKubernetesClusterNodeGroupRequest([
                'body' => new KubernetesNodeGroup([
                    'count' => 4,
                    'kubeletArgs' => [
                        new KubernetesKubeletArg([
                            'key' => 'log-flush-frequency',
                            'value' => '5s',
                        ]),
                    ],
                    'labels' => [
                        new KubernetesLabel([
                            'key' => 'managedBy',
                            'value' => 'exampleDevelopmentTeam',
                        ]),
                        new KubernetesLabel([
                            'key' => 'environment',
                            'value' => 'development',
                        ]),
                    ],
                    'name' => 'small',
                    'plan' => 'K8S-2xCPU-4GB',
                    'sshKeys' => [
                        'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCDxPPyWRTVHYOOaCE/gqDzcdJFZdo1mD8k+BBvZ4an/khT+rzJGT/K1kvxs1vS1AMzaVbuWH1bLVk8XVDVJ3J7Rf76E50O1mj3+SWW81bjneVlAxw7DRoxZInFio7TMFTt6eSRkOGQ2GVpvkePgunVZsk+XE13fSnthqS1TiiivnmaNXsaVIOSZICzTWVKqRz1XVR4fdyKJxEpFhHCIu0ui9SeB887IdcS3KshvNqJo3Jm0LmBLL1vzcbucc7T02wiqvdDSPO7TO8Wlc7sJXwmMImEDBkPYQTHmeOqsKbW0OiGuJniwg93pBt0BqNhn3gxtYLrmjha+PqO9gVR6XkV',
                    ],
                    'storage' => '01000000-0000-4000-8000-000160010100',
                    'taints' => [
                        new KubernetesTaint([
                            'effect' => KubernetesEffect::NoSchedule->value,
                            'key' => 'environment',
                            'value' => 'development',
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.create_kubernetes_cluster_node_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/kubernetes/uuid/node-groups",
            null,
            1
        );
    }

    /**
     */
    public function testGetKubernetesClusterNodeGroup(): void {
        $testId = 'kubernetes.get_kubernetes_cluster_node_group.0';
        $this->client->kubernetes->getKubernetesClusterNodeGroup(
            'uuid',
            'name',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.get_kubernetes_cluster_node_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/uuid/node-groups/name",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteKubernetesClusterNodeGroup(): void {
        $testId = 'kubernetes.delete_kubernetes_cluster_node_group.0';
        $this->client->kubernetes->deleteKubernetesClusterNodeGroup(
            'uuid',
            'name',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.delete_kubernetes_cluster_node_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/kubernetes/uuid/node-groups/name",
            null,
            1
        );
    }

    /**
     */
    public function testModifyKubernetesClusterNodeGroup(): void {
        $testId = 'kubernetes.modify_kubernetes_cluster_node_group.0';
        $this->client->kubernetes->modifyKubernetesClusterNodeGroup(
            'uuid',
            'name',
            new KubernetesNodeGroupPatch([
                'count' => 16,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.modify_kubernetes_cluster_node_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/kubernetes/uuid/node-groups/name",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteKubernetesClusterNodeGroupNode(): void {
        $testId = 'kubernetes.delete_kubernetes_cluster_node_group_node.0';
        $this->client->kubernetes->deleteKubernetesClusterNodeGroupNode(
            'uuid',
            'name',
            'node-name',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.delete_kubernetes_cluster_node_group_node.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/kubernetes/uuid/node-groups/name/node-name",
            null,
            1
        );
    }

    /**
     */
    public function testListKubernetesPlans(): void {
        $testId = 'kubernetes.list_kubernetes_plans.0';
        $this->client->kubernetes->listKubernetesPlans(
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.list_kubernetes_plans.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/plans",
            null,
            1
        );
    }

    /**
     */
    public function testListKubernetesVersions(): void {
        $testId = 'kubernetes.list_kubernetes_versions.0';
        $this->client->kubernetes->listKubernetesVersions(
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.list_kubernetes_versions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/versions",
            null,
            1
        );
    }

    /**
     */
    public function testListClusterAuthentication(): void {
        $testId = 'kubernetes.list_cluster_authentication.0';
        $this->client->kubernetes->listClusterAuthentication(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.list_cluster_authentication.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/uuid/authentication",
            null,
            1
        );
    }

    /**
     */
    public function testCreateClusterAuthentication(): void {
        $testId = 'kubernetes.create_cluster_authentication.0';
        $this->client->kubernetes->createClusterAuthentication(
            'uuid',
            new CreateClusterAuthenticationRequest([
                'body' => new KubernetesAuthenticationIssuerConfig([
                    'name' => 'name',
                    'issuerUrl' => 'https://accounts.myoidcprovider.com',
                    'audiences' => [
                        'client-id-123',
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.create_cluster_authentication.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/kubernetes/uuid/authentication",
            null,
            1
        );
    }

    /**
     */
    public function testSetClusterAuthentication(): void {
        $testId = 'kubernetes.set_cluster_authentication.0';
        $this->client->kubernetes->setClusterAuthentication(
            'uuid',
            new SetClusterAuthenticationRequest([
                'body' => [
                    new KubernetesAuthenticationIssuerConfig([
                        'name' => 'name',
                        'issuerUrl' => 'https://accounts.myoidcprovider.com',
                        'audiences' => [
                            'client-id-123',
                        ],
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.set_cluster_authentication.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/kubernetes/uuid/authentication",
            null,
            1
        );
    }

    /**
     */
    public function testImportClusterAuthentication(): void {
        $testId = 'kubernetes.import_cluster_authentication.0';
        $this->client->kubernetes->importClusterAuthentication(
            'uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.import_cluster_authentication.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/kubernetes/uuid/authentication/import",
            null,
            1
        );
    }

    /**
     */
    public function testGetClusterAuthentication(): void {
        $testId = 'kubernetes.get_cluster_authentication.0';
        $this->client->kubernetes->getClusterAuthentication(
            'uuid',
            'name',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.get_cluster_authentication.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/uuid/authentication/name",
            null,
            1
        );
    }

    /**
     */
    public function testUpdateClusterAuthentication(): void {
        $testId = 'kubernetes.update_cluster_authentication.0';
        $this->client->kubernetes->updateClusterAuthentication(
            'uuid',
            'name',
            new UpdateClusterAuthenticationRequest([
                'body' => new KubernetesAuthenticationIssuerConfig([
                    'name' => 'name',
                    'issuerUrl' => 'https://accounts.myoidcprovider.com',
                    'audiences' => [
                        'client-id-123',
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.update_cluster_authentication.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/kubernetes/uuid/authentication/name",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteClusterAuthentication(): void {
        $testId = 'kubernetes.delete_cluster_authentication.0';
        $this->client->kubernetes->deleteClusterAuthentication(
            'uuid',
            'name',
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.delete_cluster_authentication.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/kubernetes/uuid/authentication/name",
            null,
            1
        );
    }

    /**
     */
    public function testGetKubernetesClusterOidcKubeconfig(): void {
        $testId = 'kubernetes.get_kubernetes_cluster_oidc_kubeconfig.0';
        $this->client->kubernetes->getKubernetesClusterOidcKubeconfig(
            'uuid',
            'name',
            new GetKubernetesClusterOidcKubeconfigRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'kubernetes.get_kubernetes_cluster_oidc_kubeconfig.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/kubernetes/uuid/authentication/name/kubeconfig",
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

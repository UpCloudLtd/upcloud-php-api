<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\ObjectStorage2\Requests\ListObjectStoragesRequest;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2ServiceCreate;
use Upcloud\Types\ObjectStorage2PropertyConfiguredStatus;
use Upcloud\Types\ObjectStorage2NetworkCreate;
use Upcloud\Types\ObjectStorage2NetworkType;
use Upcloud\Types\ObjectStorage2NetworkFamily;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2ServiceReplace;
use Upcloud\Types\ObjectStorage2LabelCreate;
use Upcloud\ObjectStorage2\Requests\DeleteObjectStorageRequest;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2ServiceModify;
use Upcloud\ObjectStorage2\Requests\CreateObjectStorageNetworkRequest;
use Upcloud\ObjectStorage2\Requests\AttachObjectStorageCustomDomainRequest;
use Upcloud\Types\ObjectStorage2CustomDomainCreate;
use Upcloud\Types\ObjectStorage2CustomDomainCreateType;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2CustomDomainModify;
use Upcloud\ObjectStorage2\Types\ObjectStorage2CustomDomainModifyType;
use Upcloud\ObjectStorage2\Requests\ListObjectStorageBucketMetricsRequest;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2BucketCreate;
use Upcloud\ObjectStorage2\Requests\ListObjectStorageMetricsSeriesRequest;
use DateTime;
use Upcloud\ObjectStorage2\Requests\CreateObjectStorageLabelRequest;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2LabelModify;
use Upcloud\ObjectStorage2\Requests\CreateObjectStorageStaticWebsiteRequest;
use Upcloud\Types\ObjectStorage2StaticWebsiteConfigCreate;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2StaticWebsiteConfigModify;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2UserCreate;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2AccessKeyModify;
use Upcloud\ObjectStorage2\Types\ObjectStorage2AccessKeyModifyStatus;
use Upcloud\ObjectStorage2\Requests\AttachObjectStorageUserPolicyRequest;
use Upcloud\Types\ObjectStorage2PolicyAttachmentCreate;
use Upcloud\ObjectStorage2\Requests\CreateObjectStorageUserInlinePolicyRequest;
use Upcloud\Types\ObjectStorage2InlinePolicyCreate;
use Upcloud\ObjectStorage2\Requests\ReplaceObjectStorageUserTagsRequest;
use Upcloud\Types\ObjectStorage2TagListRequestItem;
use Upcloud\ObjectStorage2\Requests\CreateObjectStorageUserPermissionsBoundaryRequest;
use Upcloud\Types\ObjectStorage2PermissionsBoundaryCreate;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2PolicyVersionCreate;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2PolicySetDefaultVersion;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2PolicyCreate;
use Upcloud\ObjectStorage2\Requests\AttachObjectStorageIamGroupPolicyRequest;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2GroupCreate;
use Upcloud\ObjectStorage2\Requests\CreateObjectStorageGroupInlinePolicyRequest;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2RoleCreate;
use Upcloud\Types\ObjectStorage2RoleTag;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2RoleUpdate;
use Upcloud\ObjectStorage2\Requests\CreateObjectStorageRoleInlinePolicyRequest;
use Upcloud\ObjectStorage2\Requests\CreateObjectStorageRolePermissionsBoundaryRequest;
use Upcloud\ObjectStorage2\Requests\ObjectStorage2AssumeRolePolicyRequest;
use Upcloud\ObjectStorage2\Requests\AttachObjectStoragePolicyToRoleRequest;
use Upcloud\ObjectStorage2\Requests\ReplaceObjectStorageRoleTagsRequest;

class ObjectStorage2WireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListObjectStorages(): void {
        $testId = 'object_storage_2.list_object_storages.0';
        $this->client->objectStorage2->listObjectStorages(
            new ListObjectStoragesRequest([
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storages.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2",
            ['limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testCreateObjectStorage(): void {
        $testId = 'object_storage_2.create_object_storage.0';
        $this->client->objectStorage2->createObjectStorage(
            new ObjectStorage2ServiceCreate([
                'name' => 'example-service',
                'region' => 'example',
                'configuredStatus' => ObjectStorage2PropertyConfiguredStatus::Started->value,
                'networks' => [
                    new ObjectStorage2NetworkCreate([
                        'name' => 'example-public-network',
                        'type' => ObjectStorage2NetworkType::Public_->value,
                        'family' => ObjectStorage2NetworkFamily::IPv4->value,
                    ]),
                    new ObjectStorage2NetworkCreate([
                        'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                        'name' => 'example-private-network',
                        'type' => ObjectStorage2NetworkType::Private_->value,
                        'family' => ObjectStorage2NetworkFamily::IPv4->value,
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorage(): void {
        $testId = 'object_storage_2.get_object_storage.0';
        $this->client->objectStorage2->getObjectStorage(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testReplaceObjectStorage(): void {
        $testId = 'object_storage_2.replace_object_storage.0';
        $this->client->objectStorage2->replaceObjectStorage(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ObjectStorage2ServiceReplace([
                'name' => 'example-service',
                'configuredStatus' => ObjectStorage2PropertyConfiguredStatus::Started->value,
                'networks' => [
                    new ObjectStorage2NetworkCreate([
                        'name' => 'example-public-network',
                        'type' => ObjectStorage2NetworkType::Public_->value,
                        'family' => ObjectStorage2NetworkFamily::IPv4->value,
                    ]),
                    new ObjectStorage2NetworkCreate([
                        'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                        'name' => 'example-private-network',
                        'type' => ObjectStorage2NetworkType::Private_->value,
                        'family' => ObjectStorage2NetworkFamily::IPv4->value,
                    ]),
                ],
                'labels' => [
                    new ObjectStorage2LabelCreate([
                        'key' => 'example-label-key',
                        'value' => 'example-label-value',
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.replace_object_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorage(): void {
        $testId = 'object_storage_2.delete_object_storage.0';
        $this->client->objectStorage2->deleteObjectStorage(
            '01234567-89ab-cdef-0123-456789abcdef',
            new DeleteObjectStorageRequest([
                'force' => true,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef",
            ['force' => 'true'],
            1
        );
    }

    /**
     */
    public function testModifyObjectStorage(): void {
        $testId = 'object_storage_2.modify_object_storage.0';
        $this->client->objectStorage2->modifyObjectStorage(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ObjectStorage2ServiceModify([
                'name' => 'example-service',
                'configuredStatus' => ObjectStorage2PropertyConfiguredStatus::Started->value,
                'networks' => [
                    new ObjectStorage2NetworkCreate([
                        'uuid' => '03aa7245-2ff9-49c8-9f0e-7ca0270d71a4',
                        'name' => 'example-private-network',
                        'type' => ObjectStorage2NetworkType::Private_->value,
                        'family' => ObjectStorage2NetworkFamily::IPv4->value,
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.modify_object_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageNetworks(): void {
        $testId = 'object_storage_2.list_object_storage_networks.0';
        $this->client->objectStorage2->listObjectStorageNetworks(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_networks.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/networks",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageNetwork(): void {
        $testId = 'object_storage_2.create_object_storage_network.0';
        $this->client->objectStorage2->createObjectStorageNetwork(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateObjectStorageNetworkRequest([
                'body' => new ObjectStorage2NetworkCreate([
                    'name' => 'example-public-network',
                    'type' => ObjectStorage2NetworkType::Public_->value,
                    'family' => ObjectStorage2NetworkFamily::IPv4->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/networks",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageNetwork(): void {
        $testId = 'object_storage_2.get_object_storage_network.0';
        $this->client->objectStorage2->getObjectStorageNetwork(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/networks/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageNetwork(): void {
        $testId = 'object_storage_2.delete_object_storage_network.0';
        $this->client->objectStorage2->deleteObjectStorageNetwork(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/networks/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageCustomDomains(): void {
        $testId = 'object_storage_2.list_object_storage_custom_domains.0';
        $this->client->objectStorage2->listObjectStorageCustomDomains(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_custom_domains.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/custom-domains",
            null,
            1
        );
    }

    /**
     */
    public function testAttachObjectStorageCustomDomain(): void {
        $testId = 'object_storage_2.attach_object_storage_custom_domain.0';
        $this->client->objectStorage2->attachObjectStorageCustomDomain(
            '01234567-89ab-cdef-0123-456789abcdef',
            new AttachObjectStorageCustomDomainRequest([
                'body' => new ObjectStorage2CustomDomainCreate([
                    'type' => ObjectStorage2CustomDomainCreateType::Public_->value,
                    'domainName' => 'example.com',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.attach_object_storage_custom_domain.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/custom-domains",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageCustomDomain(): void {
        $testId = 'object_storage_2.get_object_storage_custom_domain.0';
        $this->client->objectStorage2->getObjectStorageCustomDomain(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example.com',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_custom_domain.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/custom-domains/example.com",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageCustomDomain(): void {
        $testId = 'object_storage_2.delete_object_storage_custom_domain.0';
        $this->client->objectStorage2->deleteObjectStorageCustomDomain(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example.com',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_custom_domain.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/custom-domains/example.com",
            null,
            1
        );
    }

    /**
     */
    public function testModifyObjectStorageCustomDomain(): void {
        $testId = 'object_storage_2.modify_object_storage_custom_domain.0';
        $this->client->objectStorage2->modifyObjectStorageCustomDomain(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example.com',
            new ObjectStorage2CustomDomainModify([
                'type' => ObjectStorage2CustomDomainModifyType::Public_->value,
                'domainName' => 'example.com',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.modify_object_storage_custom_domain.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/custom-domains/example.com",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageRegions(): void {
        $testId = 'object_storage_2.list_object_storage_regions.0';
        $this->client->objectStorage2->listObjectStorageRegions(
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_regions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/regions",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageRegion(): void {
        $testId = 'object_storage_2.get_object_storage_region.0';
        $this->client->objectStorage2->getObjectStorageRegion(
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_region.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/regions/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageMetrics(): void {
        $testId = 'object_storage_2.get_object_storage_metrics.0';
        $this->client->objectStorage2->getObjectStorageMetrics(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_metrics.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/metrics",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageBucketMetrics(): void {
        $testId = 'object_storage_2.list_object_storage_bucket_metrics.0';
        $this->client->objectStorage2->listObjectStorageBucketMetrics(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ListObjectStorageBucketMetricsRequest([
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_bucket_metrics.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/buckets",
            ['limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageBucket(): void {
        $testId = 'object_storage_2.create_object_storage_bucket.0';
        $this->client->objectStorage2->createObjectStorageBucket(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ObjectStorage2BucketCreate([
                'name' => 'my-bucket-1',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_bucket.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/buckets",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageBucket(): void {
        $testId = 'object_storage_2.delete_object_storage_bucket.0';
        $this->client->objectStorage2->deleteObjectStorageBucket(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_bucket.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/buckets/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageMetricsSeries(): void {
        $testId = 'object_storage_2.list_object_storage_metrics_series.0';
        $this->client->objectStorage2->listObjectStorageMetricsSeries(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ListObjectStorageMetricsSeriesRequest([
                'from' => new DateTime('2024-01-01T00:00:00Z'),
                'to' => new DateTime('2024-01-01T00:00:00Z'),
                'interval' => '1h',
                'limit' => 10,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_metrics_series.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/metrics/series",
            ['from' => '2024-01-01T00:00:00Z', 'to' => '2024-01-01T00:00:00Z', 'interval' => '1h', 'limit' => '10', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testListObjectStorageLabels(): void {
        $testId = 'object_storage_2.list_object_storage_labels.0';
        $this->client->objectStorage2->listObjectStorageLabels(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageLabel(): void {
        $testId = 'object_storage_2.create_object_storage_label.0';
        $this->client->objectStorage2->createObjectStorageLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateObjectStorageLabelRequest([
                'body' => new ObjectStorage2LabelCreate([
                    'key' => 'foo',
                    'value' => 'bar',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/labels",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageLabel(): void {
        $testId = 'object_storage_2.get_object_storage_label.0';
        $this->client->objectStorage2->getObjectStorageLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageLabel(): void {
        $testId = 'object_storage_2.delete_object_storage_label.0';
        $this->client->objectStorage2->deleteObjectStorageLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testModifyObjectStorageLabel(): void {
        $testId = 'object_storage_2.modify_object_storage_label.0';
        $this->client->objectStorage2->modifyObjectStorageLabel(
            '01234567-89ab-cdef-0123-456789abcdef',
            'environment',
            new ObjectStorage2LabelModify([
                'key' => 'foo',
                'value' => 'bar',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.modify_object_storage_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageStaticWebsites(): void {
        $testId = 'object_storage_2.list_object_storage_static_websites.0';
        $this->client->objectStorage2->listObjectStorageStaticWebsites(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_static_websites.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/static-websites",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageStaticWebsite(): void {
        $testId = 'object_storage_2.create_object_storage_static_website.0';
        $this->client->objectStorage2->createObjectStorageStaticWebsite(
            '01234567-89ab-cdef-0123-456789abcdef',
            new CreateObjectStorageStaticWebsiteRequest([
                'body' => new ObjectStorage2StaticWebsiteConfigCreate([
                    'bucketName' => 'my-website',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_static_website.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/static-websites",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageStaticWebsite(): void {
        $testId = 'object_storage_2.get_object_storage_static_website.0';
        $this->client->objectStorage2->getObjectStorageStaticWebsite(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example.com',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_static_website.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/static-websites/example.com",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageStaticWebsite(): void {
        $testId = 'object_storage_2.delete_object_storage_static_website.0';
        $this->client->objectStorage2->deleteObjectStorageStaticWebsite(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example.com',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_static_website.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/static-websites/example.com",
            null,
            1
        );
    }

    /**
     */
    public function testModifyObjectStorageStaticWebsite(): void {
        $testId = 'object_storage_2.modify_object_storage_static_website.0';
        $this->client->objectStorage2->modifyObjectStorageStaticWebsite(
            '01234567-89ab-cdef-0123-456789abcdef',
            'example.com',
            new ObjectStorage2StaticWebsiteConfigModify([]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.modify_object_storage_static_website.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/static-websites/example.com",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageDomains(): void {
        $testId = 'object_storage_2.list_object_storage_domains.0';
        $this->client->objectStorage2->listObjectStorageDomains(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_domains.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/domains",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageUsers(): void {
        $testId = 'object_storage_2.list_object_storage_users.0';
        $this->client->objectStorage2->listObjectStorageUsers(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_users.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageUser(): void {
        $testId = 'object_storage_2.create_object_storage_user.0';
        $this->client->objectStorage2->createObjectStorageUser(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ObjectStorage2UserCreate([
                'username' => 'example_user',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageUser(): void {
        $testId = 'object_storage_2.get_object_storage_user.0';
        $this->client->objectStorage2->getObjectStorageUser(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageUser(): void {
        $testId = 'object_storage_2.delete_object_storage_user.0';
        $this->client->objectStorage2->deleteObjectStorageUser(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageAccessKeys(): void {
        $testId = 'object_storage_2.list_object_storage_access_keys.0';
        $this->client->objectStorage2->listObjectStorageAccessKeys(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_access_keys.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/access-keys",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageAccessKey(): void {
        $testId = 'object_storage_2.create_object_storage_access_key.0';
        $this->client->objectStorage2->createObjectStorageAccessKey(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_access_key.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/access-keys",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageAccessKeyDetails(): void {
        $testId = 'object_storage_2.get_object_storage_access_key_details.0';
        $this->client->objectStorage2->getObjectStorageAccessKeyDetails(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'UCK1234567890ABCDEF',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_access_key_details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/access-keys/UCK1234567890ABCDEF",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageAccessKey(): void {
        $testId = 'object_storage_2.delete_object_storage_access_key.0';
        $this->client->objectStorage2->deleteObjectStorageAccessKey(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'UCK1234567890ABCDEF',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_access_key.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/access-keys/UCK1234567890ABCDEF",
            null,
            1
        );
    }

    /**
     */
    public function testModifyObjectStorageAccessKeyDetails(): void {
        $testId = 'object_storage_2.modify_object_storage_access_key_details.0';
        $this->client->objectStorage2->modifyObjectStorageAccessKeyDetails(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'UCK1234567890ABCDEF',
            new ObjectStorage2AccessKeyModify([
                'status' => ObjectStorage2AccessKeyModifyStatus::Inactive->value,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.modify_object_storage_access_key_details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/access-keys/UCK1234567890ABCDEF",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageAttachedUserPolicies(): void {
        $testId = 'object_storage_2.list_object_storage_attached_user_policies.0';
        $this->client->objectStorage2->listObjectStorageAttachedUserPolicies(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_attached_user_policies.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/policies",
            null,
            1
        );
    }

    /**
     */
    public function testAttachObjectStorageUserPolicy(): void {
        $testId = 'object_storage_2.attach_object_storage_user_policy.0';
        $this->client->objectStorage2->attachObjectStorageUserPolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new AttachObjectStorageUserPolicyRequest([
                'body' => new ObjectStorage2PolicyAttachmentCreate([
                    'name' => 'test-policy',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.attach_object_storage_user_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/policies",
            null,
            1
        );
    }

    /**
     */
    public function testDetachObjectStorageUserPolicy(): void {
        $testId = 'object_storage_2.detach_object_storage_user_policy.0';
        $this->client->objectStorage2->detachObjectStorageUserPolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.detach_object_storage_user_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageUserInlinePolicy(): void {
        $testId = 'object_storage_2.get_object_storage_user_inline_policy.0';
        $this->client->objectStorage2->getObjectStorageUserInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_user_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/inline-policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageUserInlinePolicy(): void {
        $testId = 'object_storage_2.delete_object_storage_user_inline_policy.0';
        $this->client->objectStorage2->deleteObjectStorageUserInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_user_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/inline-policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageUserInlinePolicies(): void {
        $testId = 'object_storage_2.list_object_storage_user_inline_policies.0';
        $this->client->objectStorage2->listObjectStorageUserInlinePolicies(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_user_inline_policies.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/inline-policies",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageUserInlinePolicy(): void {
        $testId = 'object_storage_2.create_object_storage_user_inline_policy.0';
        $this->client->objectStorage2->createObjectStorageUserInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new CreateObjectStorageUserInlinePolicyRequest([
                'body' => new ObjectStorage2InlinePolicyCreate([
                    'name' => 'ECSS3FullAccess',
                    'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_user_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/inline-policies",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageUserTags(): void {
        $testId = 'object_storage_2.get_object_storage_user_tags.0';
        $this->client->objectStorage2->getObjectStorageUserTags(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_user_tags.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/tags",
            null,
            1
        );
    }

    /**
     */
    public function testReplaceObjectStorageUserTags(): void {
        $testId = 'object_storage_2.replace_object_storage_user_tags.0';
        $this->client->objectStorage2->replaceObjectStorageUserTags(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new ReplaceObjectStorageUserTagsRequest([
                'body' => [
                    new ObjectStorage2TagListRequestItem([
                        'key' => 'environment',
                        'value' => 'production',
                    ]),
                    new ObjectStorage2TagListRequestItem([
                        'key' => 'team',
                        'value' => 'backend',
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.replace_object_storage_user_tags.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/tags",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageUserTag(): void {
        $testId = 'object_storage_2.delete_object_storage_user_tag.0';
        $this->client->objectStorage2->deleteObjectStorageUserTag(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_user_tag.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/tags/environment",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageUserPermissionsBoundary(): void {
        $testId = 'object_storage_2.create_object_storage_user_permissions_boundary.0';
        $this->client->objectStorage2->createObjectStorageUserPermissionsBoundary(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new CreateObjectStorageUserPermissionsBoundaryRequest([
                'body' => new ObjectStorage2PermissionsBoundaryCreate([
                    'policyName' => 'sample-policy',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_user_permissions_boundary.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/permissions-boundary",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageUserPermissionsBoundary(): void {
        $testId = 'object_storage_2.delete_object_storage_user_permissions_boundary.0';
        $this->client->objectStorage2->deleteObjectStorageUserPermissionsBoundary(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_user_permissions_boundary.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/users/my-object-storage/permissions-boundary",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStoragePolicyVersions(): void {
        $testId = 'object_storage_2.list_object_storage_policy_versions.0';
        $this->client->objectStorage2->listObjectStoragePolicyVersions(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_policy_versions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies/my-object-storage/versions",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStoragePolicyVersion(): void {
        $testId = 'object_storage_2.create_object_storage_policy_version.0';
        $this->client->objectStorage2->createObjectStoragePolicyVersion(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new ObjectStorage2PolicyVersionCreate([
                'document' => '{"Version":"2012-10-17","Statement":[{"Action":["*"],"Effect":"Deny","Resource":"*"}]}',
                'isDefault' => true,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_policy_version.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies/my-object-storage/versions",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStoragePolicyVersion(): void {
        $testId = 'object_storage_2.get_object_storage_policy_version.0';
        $this->client->objectStorage2->getObjectStoragePolicyVersion(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'v1',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_policy_version.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies/my-object-storage/versions/v1",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStoragePolicyVersion(): void {
        $testId = 'object_storage_2.delete_object_storage_policy_version.0';
        $this->client->objectStorage2->deleteObjectStoragePolicyVersion(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'v1',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_policy_version.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies/my-object-storage/versions/v1",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStoragePolicy(): void {
        $testId = 'object_storage_2.get_object_storage_policy.0';
        $this->client->objectStorage2->getObjectStoragePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStoragePolicy(): void {
        $testId = 'object_storage_2.delete_object_storage_policy.0';
        $this->client->objectStorage2->deleteObjectStoragePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testSetObjectStorageDefaultPolicyVersion(): void {
        $testId = 'object_storage_2.set_object_storage_default_policy_version.0';
        $this->client->objectStorage2->setObjectStorageDefaultPolicyVersion(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new ObjectStorage2PolicySetDefaultVersion([
                'versionId' => 'v2',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.set_object_storage_default_policy_version.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStoragePolicies(): void {
        $testId = 'object_storage_2.list_object_storage_policies.0';
        $this->client->objectStorage2->listObjectStoragePolicies(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_policies.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStoragePolicy(): void {
        $testId = 'object_storage_2.create_object_storage_policy.0';
        $this->client->objectStorage2->createObjectStoragePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ObjectStorage2PolicyCreate([
                'name' => 'example-policy',
                'description' => 'example-description',
                'document' => '%7B%22Version%22%3A%20%222012-10-17%22%2C%20%20%22Statement%22%3A%20%5B%7B%22Action%22%3A%20%5B%22iam%3AGetUser%22%5D%2C%20%22Resource%22%3A%20%22%2A%22%2C%20%22Effect%22%3A%20%22Allow%22%2C%20%22Sid%22%3A%20%22editor%22%7D%5D%7D',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/policies",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageIamGroupPolicies(): void {
        $testId = 'object_storage_2.list_object_storage_iam_group_policies.0';
        $this->client->objectStorage2->listObjectStorageIamGroupPolicies(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_iam_group_policies.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/policies",
            null,
            1
        );
    }

    /**
     */
    public function testAttachObjectStorageIamGroupPolicy(): void {
        $testId = 'object_storage_2.attach_object_storage_iam_group_policy.0';
        $this->client->objectStorage2->attachObjectStorageIamGroupPolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new AttachObjectStorageIamGroupPolicyRequest([
                'body' => new ObjectStorage2PolicyAttachmentCreate([
                    'name' => 'test-policy',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.attach_object_storage_iam_group_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/policies",
            null,
            1
        );
    }

    /**
     */
    public function testDetachObjectStorageIamGroupPolicy(): void {
        $testId = 'object_storage_2.detach_object_storage_iam_group_policy.0';
        $this->client->objectStorage2->detachObjectStorageIamGroupPolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.detach_object_storage_iam_group_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageGroups(): void {
        $testId = 'object_storage_2.list_object_storage_groups.0';
        $this->client->objectStorage2->listObjectStorageGroups(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_groups.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageGroup(): void {
        $testId = 'object_storage_2.create_object_storage_group.0';
        $this->client->objectStorage2->createObjectStorageGroup(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ObjectStorage2GroupCreate([
                'name' => 'new-group',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageGroup(): void {
        $testId = 'object_storage_2.get_object_storage_group.0';
        $this->client->objectStorage2->getObjectStorageGroup(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageGroup(): void {
        $testId = 'object_storage_2.delete_object_storage_group.0';
        $this->client->objectStorage2->deleteObjectStorageGroup(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testAttachObjectStorageUserToGroup(): void {
        $testId = 'object_storage_2.attach_object_storage_user_to_group.0';
        $this->client->objectStorage2->attachObjectStorageUserToGroup(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.attach_object_storage_user_to_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/users/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testRemoveObjectStorageUserFromGroup(): void {
        $testId = 'object_storage_2.remove_object_storage_user_from_group.0';
        $this->client->objectStorage2->removeObjectStorageUserFromGroup(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.remove_object_storage_user_from_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/users/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageGroupInlinePolicies(): void {
        $testId = 'object_storage_2.list_object_storage_group_inline_policies.0';
        $this->client->objectStorage2->listObjectStorageGroupInlinePolicies(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_group_inline_policies.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/inline-policies",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageGroupInlinePolicy(): void {
        $testId = 'object_storage_2.create_object_storage_group_inline_policy.0';
        $this->client->objectStorage2->createObjectStorageGroupInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new CreateObjectStorageGroupInlinePolicyRequest([
                'body' => new ObjectStorage2InlinePolicyCreate([
                    'name' => 'ECSS3FullAccess',
                    'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_group_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/inline-policies",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageGroupInlinePolicy(): void {
        $testId = 'object_storage_2.get_object_storage_group_inline_policy.0';
        $this->client->objectStorage2->getObjectStorageGroupInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_group_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/inline-policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageGroupInlinePolicy(): void {
        $testId = 'object_storage_2.delete_object_storage_group_inline_policy.0';
        $this->client->objectStorage2->deleteObjectStorageGroupInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_group_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/groups/my-object-storage/inline-policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageRoles(): void {
        $testId = 'object_storage_2.list_object_storage_roles.0';
        $this->client->objectStorage2->listObjectStorageRoles(
            '01234567-89ab-cdef-0123-456789abcdef',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_roles.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageRole(): void {
        $testId = 'object_storage_2.create_object_storage_role.0';
        $this->client->objectStorage2->createObjectStorageRole(
            '01234567-89ab-cdef-0123-456789abcdef',
            new ObjectStorage2RoleCreate([
                'name' => 'test-role',
                'assumeRolePolicyDocument' => '{"Version": "2012-10-17","Statement": [{"Action": "sts:AssumeRole","Principal": {"AWS": ["urn:ecs:iam::ns1:user/Demby"]},"Effect": "Allow","Resource": "*"}]}',
                'description' => 'A test role.',
                'maxSessionDuration' => 3600,
                'permissionsBoundary' => 'test-policy',
                'tags' => [
                    new ObjectStorage2RoleTag([
                        'key' => 'department',
                        'value' => 'Finance',
                    ]),
                    new ObjectStorage2RoleTag([
                        'key' => 'school',
                        'value' => 'University of Helsinki',
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_role.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageRole(): void {
        $testId = 'object_storage_2.get_object_storage_role.0';
        $this->client->objectStorage2->getObjectStorageRole(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_role.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageRole(): void {
        $testId = 'object_storage_2.delete_object_storage_role.0';
        $this->client->objectStorage2->deleteObjectStorageRole(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_role.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testUpdateObjectStorageRole(): void {
        $testId = 'object_storage_2.update_object_storage_role.0';
        $this->client->objectStorage2->updateObjectStorageRole(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new ObjectStorage2RoleUpdate([
                'description' => 'New description',
                'maxSessionDuration' => 3900,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.update_object_storage_role.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageRoleInlinePolicies(): void {
        $testId = 'object_storage_2.list_object_storage_role_inline_policies.0';
        $this->client->objectStorage2->listObjectStorageRoleInlinePolicies(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_role_inline_policies.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/inline-policies",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageRoleInlinePolicy(): void {
        $testId = 'object_storage_2.create_object_storage_role_inline_policy.0';
        $this->client->objectStorage2->createObjectStorageRoleInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new CreateObjectStorageRoleInlinePolicyRequest([
                'body' => new ObjectStorage2InlinePolicyCreate([
                    'name' => 'ECSS3FullAccess',
                    'document' => '{"Version":"2012-10-17","Statement":[{"Action":"sts:AssumeRole","Effect":"Allow","Resource":"*"}]}',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_role_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/inline-policies",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageRoleInlinePolicy(): void {
        $testId = 'object_storage_2.get_object_storage_role_inline_policy.0';
        $this->client->objectStorage2->getObjectStorageRoleInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_role_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/inline-policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageRoleInlinePolicy(): void {
        $testId = 'object_storage_2.delete_object_storage_role_inline_policy.0';
        $this->client->objectStorage2->deleteObjectStorageRoleInlinePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_role_inline_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/inline-policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testCreateObjectStorageRolePermissionsBoundary(): void {
        $testId = 'object_storage_2.create_object_storage_role_permissions_boundary.0';
        $this->client->objectStorage2->createObjectStorageRolePermissionsBoundary(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new CreateObjectStorageRolePermissionsBoundaryRequest([
                'body' => new ObjectStorage2PermissionsBoundaryCreate([
                    'policyName' => 'sample-policy',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.create_object_storage_role_permissions_boundary.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/permissions-boundary",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageRolePermissionsBoundary(): void {
        $testId = 'object_storage_2.delete_object_storage_role_permissions_boundary.0';
        $this->client->objectStorage2->deleteObjectStorageRolePermissionsBoundary(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_role_permissions_boundary.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/permissions-boundary",
            null,
            1
        );
    }

    /**
     */
    public function testAssumeObjectStorageRolePolicy(): void {
        $testId = 'object_storage_2.assume_object_storage_role_policy.0';
        $this->client->objectStorage2->assumeObjectStorageRolePolicy(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new ObjectStorage2AssumeRolePolicyRequest([
                'document' => '{"Version":"2012-10-17","Statement":[{"Effect":"Allow","Principal":{"Service":"backup.upcloud.com"},"Action":"sts:AssumeRole"}]}',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.assume_object_storage_role_policy.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/assume-role-policy",
            null,
            1
        );
    }

    /**
     */
    public function testListObjectStorageAttachedRolePolicies(): void {
        $testId = 'object_storage_2.list_object_storage_attached_role_policies.0';
        $this->client->objectStorage2->listObjectStorageAttachedRolePolicies(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.list_object_storage_attached_role_policies.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/policies",
            null,
            1
        );
    }

    /**
     */
    public function testAttachObjectStoragePolicyToRole(): void {
        $testId = 'object_storage_2.attach_object_storage_policy_to_role.0';
        $this->client->objectStorage2->attachObjectStoragePolicyToRole(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new AttachObjectStoragePolicyToRoleRequest([
                'body' => new ObjectStorage2PolicyAttachmentCreate([
                    'name' => 'test-policy',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.attach_object_storage_policy_to_role.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/policies",
            null,
            1
        );
    }

    /**
     */
    public function testDetachObjectStoragePolicyFromRole(): void {
        $testId = 'object_storage_2.detach_object_storage_policy_from_role.0';
        $this->client->objectStorage2->detachObjectStoragePolicyFromRole(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.detach_object_storage_policy_from_role.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/policies/my-object-storage",
            null,
            1
        );
    }

    /**
     */
    public function testGetObjectStorageRoleTags(): void {
        $testId = 'object_storage_2.get_object_storage_role_tags.0';
        $this->client->objectStorage2->getObjectStorageRoleTags(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.get_object_storage_role_tags.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/tags",
            null,
            1
        );
    }

    /**
     */
    public function testReplaceObjectStorageRoleTags(): void {
        $testId = 'object_storage_2.replace_object_storage_role_tags.0';
        $this->client->objectStorage2->replaceObjectStorageRoleTags(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            new ReplaceObjectStorageRoleTagsRequest([
                'body' => [
                    new ObjectStorage2TagListRequestItem([
                        'key' => 'environment',
                        'value' => 'production',
                    ]),
                    new ObjectStorage2TagListRequestItem([
                        'key' => 'team',
                        'value' => 'backend',
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.replace_object_storage_role_tags.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/tags",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteObjectStorageRoleTag(): void {
        $testId = 'object_storage_2.delete_object_storage_role_tag.0';
        $this->client->objectStorage2->deleteObjectStorageRoleTag(
            '01234567-89ab-cdef-0123-456789abcdef',
            'my-object-storage',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'object_storage_2.delete_object_storage_role_tag.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/object-storage-2/01234567-89ab-cdef-0123-456789abcdef/roles/my-object-storage/tags/environment",
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

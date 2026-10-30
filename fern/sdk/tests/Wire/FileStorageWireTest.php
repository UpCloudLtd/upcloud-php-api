<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\FileStorage\Requests\ListFileStoragesRequest;
use Upcloud\FileStorage\Requests\FileStorageServiceCreate;
use Upcloud\Types\FileStorageConfiguredStatus;
use Upcloud\Types\FileStorageNetworkCreate;
use Upcloud\Types\FileStorageNetworkFamily;
use Upcloud\Types\FileStorageShareCreate;
use Upcloud\Types\FileStorageAclCreate;
use Upcloud\Types\FileStoragePermission;
use Upcloud\Types\FileStorageLabelCreate;
use Upcloud\FileStorage\Requests\FileStorageServiceReplace;
use Upcloud\FileStorage\Requests\FileStorageServiceModify;
use Upcloud\FileStorage\Requests\CreateFileStorageNetworkRequest;
use Upcloud\FileStorage\Requests\FileStorageNetworkModify;
use Upcloud\FileStorage\Requests\CreateFileStorageShareRequest;
use Upcloud\FileStorage\Requests\FileStorageShareModify;
use Upcloud\FileStorage\Requests\CreateFileStorageAclRequest;
use Upcloud\FileStorage\Requests\FileStorageAclModify;
use Upcloud\FileStorage\Requests\CreateFileStorageLabelRequest;
use Upcloud\FileStorage\Requests\FileStorageLabelModify;

class FileStorageWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListFileStorages(): void {
        $testId = 'file_storage.list_file_storages.0';
        $this->client->fileStorage->listFileStorages(
            new ListFileStoragesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storages.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorage(): void {
        $testId = 'file_storage.create_file_storage.0';
        $this->client->fileStorage->createFileStorage(
            new FileStorageServiceCreate([
                'name' => 'test-name',
                'zone' => 'fi-hel2',
                'configuredStatus' => FileStorageConfiguredStatus::Started->value,
                'sizeGib' => 250,
                'encrypted' => false,
                'networks' => [
                    new FileStorageNetworkCreate([
                        'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                        'name' => 'net',
                        'family' => FileStorageNetworkFamily::IPv4->value,
                        'ipAddress' => '192.168.147.120',
                    ]),
                ],
                'shares' => [
                    new FileStorageShareCreate([
                        'name' => 'read',
                        'path' => '/public',
                        'acl' => [
                            new FileStorageAclCreate([
                                'name' => 'test-name',
                                'target' => '*',
                                'permission' => FileStoragePermission::Ro->value,
                            ]),
                        ],
                    ]),
                    new FileStorageShareCreate([
                        'name' => 'write',
                        'path' => '/project/data',
                        'acl' => [
                            new FileStorageAclCreate([
                                'name' => 'test-name',
                                'target' => '192.168.147.0/24',
                                'permission' => FileStoragePermission::Rw->value,
                            ]),
                            new FileStorageAclCreate([
                                'name' => 'test-name',
                                'target' => 'local.domain',
                                'permission' => FileStoragePermission::Rw->value,
                            ]),
                        ],
                    ]),
                ],
                'labels' => [
                    new FileStorageLabelCreate([
                        'key' => 'environment',
                        'value' => 'production',
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.create_file_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/file-storage",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorage(): void {
        $testId = 'file_storage.get_file_storage.0';
        $this->client->fileStorage->getFileStorage(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069",
            null,
            1
        );
    }

    /**
     */
    public function testReplaceFileStorage(): void {
        $testId = 'file_storage.replace_file_storage.0';
        $this->client->fileStorage->replaceFileStorage(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            new FileStorageServiceReplace([
                'name' => 'test-name',
                'configuredStatus' => FileStorageConfiguredStatus::Started->value,
                'sizeGib' => 250,
                'networks' => [
                    new FileStorageNetworkCreate([
                        'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                        'name' => 'net',
                        'family' => FileStorageNetworkFamily::IPv4->value,
                        'ipAddress' => '192.168.147.120',
                    ]),
                ],
                'labels' => [
                    new FileStorageLabelCreate([
                        'key' => 'environment',
                        'value' => 'production',
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.replace_file_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorage(): void {
        $testId = 'file_storage.delete_file_storage.0';
        $this->client->fileStorage->deleteFileStorage(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorage(): void {
        $testId = 'file_storage.modify_file_storage.0';
        $this->client->fileStorage->modifyFileStorage(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            new FileStorageServiceModify([
                'name' => 'test-name',
                'configuredStatus' => FileStorageConfiguredStatus::Started->value,
                'sizeGib' => 250,
                'networks' => [
                    new FileStorageNetworkCreate([
                        'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                        'name' => 'net',
                        'family' => FileStorageNetworkFamily::IPv4->value,
                        'ipAddress' => '192.168.147.120',
                    ]),
                ],
                'labels' => [
                    new FileStorageLabelCreate([
                        'key' => 'environment',
                        'value' => 'production',
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.modify_file_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069",
            null,
            1
        );
    }

    /**
     */
    public function testListFileStorageNetworks(): void {
        $testId = 'file_storage.list_file_storage_networks.0';
        $this->client->fileStorage->listFileStorageNetworks(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storage_networks.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/networks",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorageNetwork(): void {
        $testId = 'file_storage.create_file_storage_network.0';
        $this->client->fileStorage->createFileStorageNetwork(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            new CreateFileStorageNetworkRequest([
                'body' => new FileStorageNetworkCreate([
                    'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                    'name' => 'test-name',
                    'family' => FileStorageNetworkFamily::IPv4->value,
                    'ipAddress' => '10.20.30.40',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.create_file_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/networks",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageNetwork(): void {
        $testId = 'file_storage.get_file_storage_network.0';
        $this->client->fileStorage->getFileStorageNetwork(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/networks/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorageNetwork(): void {
        $testId = 'file_storage.delete_file_storage_network.0';
        $this->client->fileStorage->deleteFileStorageNetwork(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/networks/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorageNetwork(): void {
        $testId = 'file_storage.modify_file_storage_network.0';
        $this->client->fileStorage->modifyFileStorageNetwork(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            new FileStorageNetworkModify([
                'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                'name' => 'test-name',
                'family' => FileStorageNetworkFamily::IPv4->value,
                'ipAddress' => '10.20.30.40',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.modify_file_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/networks/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testListFileStorageShares(): void {
        $testId = 'file_storage.list_file_storage_shares.0';
        $this->client->fileStorage->listFileStorageShares(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storage_shares.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorageShare(): void {
        $testId = 'file_storage.create_file_storage_share.0';
        $this->client->fileStorage->createFileStorageShare(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            new CreateFileStorageShareRequest([
                'body' => new FileStorageShareCreate([
                    'name' => 'read',
                    'path' => '/public',
                    'acl' => [
                        new FileStorageAclCreate([
                            'name' => 'test-name',
                            'target' => '192.168.147.0/24',
                            'permission' => FileStoragePermission::Ro->value,
                        ]),
                    ],
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.create_file_storage_share.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageShare(): void {
        $testId = 'file_storage.get_file_storage_share.0';
        $this->client->fileStorage->getFileStorageShare(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_share.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorageShare(): void {
        $testId = 'file_storage.delete_file_storage_share.0';
        $this->client->fileStorage->deleteFileStorageShare(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage_share.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorageShare(): void {
        $testId = 'file_storage.modify_file_storage_share.0';
        $this->client->fileStorage->modifyFileStorageShare(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            new FileStorageShareModify([
                'name' => 'test-name',
                'acl' => [
                    new FileStorageAclCreate([
                        'name' => 'test-name',
                        'target' => '192.168.25.0/24',
                        'permission' => FileStoragePermission::Ro->value,
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.modify_file_storage_share.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testListFileStorageAcls(): void {
        $testId = 'file_storage.list_file_storage_acls.0';
        $this->client->fileStorage->listFileStorageAcls(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storage_acls.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares/test-name/acl",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorageAcl(): void {
        $testId = 'file_storage.create_file_storage_acl.0';
        $this->client->fileStorage->createFileStorageAcl(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            new CreateFileStorageAclRequest([
                'body' => new FileStorageAclCreate([
                    'name' => 'test-name',
                    'target' => '192.168.25.147',
                    'permission' => FileStoragePermission::Ro->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.create_file_storage_acl.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares/test-name/acl",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageAcl(): void {
        $testId = 'file_storage.get_file_storage_acl.0';
        $this->client->fileStorage->getFileStorageAcl(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            'test-name',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_acl.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares/test-name/acl/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorageAcl(): void {
        $testId = 'file_storage.delete_file_storage_acl.0';
        $this->client->fileStorage->deleteFileStorageAcl(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            'test-name',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage_acl.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares/test-name/acl/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorageAcl(): void {
        $testId = 'file_storage.modify_file_storage_acl.0';
        $this->client->fileStorage->modifyFileStorageAcl(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'test-name',
            'test-name',
            new FileStorageAclModify([
                'name' => 'test-name',
                'target' => '192.168.25.0/24',
                'permission' => FileStoragePermission::Rw->value,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.modify_file_storage_acl.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/shares/test-name/acl/test-name",
            null,
            1
        );
    }

    /**
     */
    public function testListFileStorageLabels(): void {
        $testId = 'file_storage.list_file_storage_labels.0';
        $this->client->fileStorage->listFileStorageLabels(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storage_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/labels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorageLabel(): void {
        $testId = 'file_storage.create_file_storage_label.0';
        $this->client->fileStorage->createFileStorageLabel(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            new CreateFileStorageLabelRequest([
                'body' => new FileStorageLabelCreate([
                    'key' => 'environment',
                    'value' => 'production',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.create_file_storage_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/labels",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageLabel(): void {
        $testId = 'file_storage.get_file_storage_label.0';
        $this->client->fileStorage->getFileStorageLabel(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorageLabel(): void {
        $testId = 'file_storage.delete_file_storage_label.0';
        $this->client->fileStorage->deleteFileStorageLabel(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'environment',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorageLabel(): void {
        $testId = 'file_storage.modify_file_storage_label.0';
        $this->client->fileStorage->modifyFileStorageLabel(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            'environment',
            new FileStorageLabelModify([
                'key' => 'environment',
                'value' => 'production',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.modify_file_storage_label.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageCurrentState(): void {
        $testId = 'file_storage.get_file_storage_current_state.0';
        $this->client->fileStorage->getFileStorageCurrentState(
            '17fd43a5-a97e-44f7-98a8-0a787da67069',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_current_state.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17fd43a5-a97e-44f7-98a8-0a787da67069/current-state",
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

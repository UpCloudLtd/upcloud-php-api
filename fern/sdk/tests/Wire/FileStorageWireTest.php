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
use Upcloud\Types\FileStorageAclPermission;
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
            new ListFileStoragesRequest([
                'limit' => 25,
                'offset' => 20,
            ]),
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
            ['limit' => '25', 'offset' => '20'],
            1
        );
    }

    /**
     */
    public function testCreateFileStorage(): void {
        $testId = 'file_storage.create_file_storage.0';
        $this->client->fileStorage->createFileStorage(
            new FileStorageServiceCreate([
                'name' => 'production-files',
                'zone' => 'fi-hel2',
                'configuredStatus' => FileStorageConfiguredStatus::Started->value,
                'sizeGib' => 250,
                'encrypted' => false,
                'networks' => [
                    new FileStorageNetworkCreate([
                        'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                        'name' => 'private-net',
                        'family' => FileStorageNetworkFamily::IPv4->value,
                        'ipAddress' => '192.168.147.120',
                    ]),
                ],
                'shares' => [
                    new FileStorageShareCreate([
                        'name' => 'project-data',
                        'path' => '/project/data',
                        'acl' => [
                            new FileStorageAclCreate([
                                'name' => 'office-write',
                                'target' => '192.168.147.0/24',
                                'permission' => FileStorageAclPermission::Rw->value,
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
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe",
            null,
            1
        );
    }

    /**
     */
    public function testReplaceFileStorage(): void {
        $testId = 'file_storage.replace_file_storage.0';
        $this->client->fileStorage->replaceFileStorage(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            new FileStorageServiceReplace([
                'name' => 'production-files',
                'configuredStatus' => FileStorageConfiguredStatus::Started->value,
                'sizeGib' => 250,
                'networks' => [
                    new FileStorageNetworkCreate([
                        'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                        'name' => 'private-net',
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorage(): void {
        $testId = 'file_storage.delete_file_storage.0';
        $this->client->fileStorage->deleteFileStorage(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorage(): void {
        $testId = 'file_storage.modify_file_storage.0';
        $this->client->fileStorage->modifyFileStorage(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            new FileStorageServiceModify([
                'name' => 'production-files',
                'sizeGib' => 500,
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe",
            null,
            1
        );
    }

    /**
     */
    public function testListFileStorageNetworks(): void {
        $testId = 'file_storage.list_file_storage_networks.0';
        $this->client->fileStorage->listFileStorageNetworks(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storage_networks.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/networks",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorageNetwork(): void {
        $testId = 'file_storage.create_file_storage_network.0';
        $this->client->fileStorage->createFileStorageNetwork(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            new CreateFileStorageNetworkRequest([
                'body' => new FileStorageNetworkCreate([
                    'uuid' => '03720d07-80a9-41ac-90b0-68a932109339',
                    'name' => 'private-net',
                    'family' => FileStorageNetworkFamily::IPv4->value,
                    'ipAddress' => '192.168.147.120',
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/networks",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageNetwork(): void {
        $testId = 'file_storage.get_file_storage_network.0';
        $this->client->fileStorage->getFileStorageNetwork(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'production-files',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/networks/production-files",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorageNetwork(): void {
        $testId = 'file_storage.delete_file_storage_network.0';
        $this->client->fileStorage->deleteFileStorageNetwork(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'production-files',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage_network.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/networks/production-files",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorageNetwork(): void {
        $testId = 'file_storage.modify_file_storage_network.0';
        $this->client->fileStorage->modifyFileStorageNetwork(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'production-files',
            new FileStorageNetworkModify([
                'ipAddress' => '192.168.147.121',
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/networks/production-files",
            null,
            1
        );
    }

    /**
     */
    public function testListFileStorageShares(): void {
        $testId = 'file_storage.list_file_storage_shares.0';
        $this->client->fileStorage->listFileStorageShares(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storage_shares.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorageShare(): void {
        $testId = 'file_storage.create_file_storage_share.0';
        $this->client->fileStorage->createFileStorageShare(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            new CreateFileStorageShareRequest([
                'body' => new FileStorageShareCreate([
                    'name' => 'project-data',
                    'path' => '/project/data',
                    'acl' => [
                        new FileStorageAclCreate([
                            'name' => 'office-write',
                            'target' => '192.168.147.0/24',
                            'permission' => FileStorageAclPermission::Rw->value,
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageShare(): void {
        $testId = 'file_storage.get_file_storage_share.0';
        $this->client->fileStorage->getFileStorageShare(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'project-data',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_share.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares/project-data",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorageShare(): void {
        $testId = 'file_storage.delete_file_storage_share.0';
        $this->client->fileStorage->deleteFileStorageShare(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'project-data',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage_share.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares/project-data",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorageShare(): void {
        $testId = 'file_storage.modify_file_storage_share.0';
        $this->client->fileStorage->modifyFileStorageShare(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'project-data',
            new FileStorageShareModify([
                'acl' => [
                    new FileStorageAclCreate([
                        'name' => 'office-read',
                        'target' => '192.168.147.0/24',
                        'permission' => FileStorageAclPermission::Ro->value,
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares/project-data",
            null,
            1
        );
    }

    /**
     */
    public function testListFileStorageAcls(): void {
        $testId = 'file_storage.list_file_storage_acls.0';
        $this->client->fileStorage->listFileStorageAcls(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'project-data',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storage_acls.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares/project-data/acl",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorageAcl(): void {
        $testId = 'file_storage.create_file_storage_acl.0';
        $this->client->fileStorage->createFileStorageAcl(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'project-data',
            new CreateFileStorageAclRequest([
                'body' => new FileStorageAclCreate([
                    'name' => 'office-write',
                    'target' => '192.168.147.0/24',
                    'permission' => FileStorageAclPermission::Rw->value,
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares/project-data/acl",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageAcl(): void {
        $testId = 'file_storage.get_file_storage_acl.0';
        $this->client->fileStorage->getFileStorageAcl(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'project-data',
            'production-files',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_acl.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares/project-data/acl/production-files",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorageAcl(): void {
        $testId = 'file_storage.delete_file_storage_acl.0';
        $this->client->fileStorage->deleteFileStorageAcl(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'project-data',
            'production-files',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.delete_file_storage_acl.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares/project-data/acl/production-files",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorageAcl(): void {
        $testId = 'file_storage.modify_file_storage_acl.0';
        $this->client->fileStorage->modifyFileStorageAcl(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            'project-data',
            'production-files',
            new FileStorageAclModify([
                'permission' => FileStorageAclPermission::Ro->value,
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/shares/project-data/acl/production-files",
            null,
            1
        );
    }

    /**
     */
    public function testListFileStorageLabels(): void {
        $testId = 'file_storage.list_file_storage_labels.0';
        $this->client->fileStorage->listFileStorageLabels(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.list_file_storage_labels.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/labels",
            null,
            1
        );
    }

    /**
     */
    public function testCreateFileStorageLabel(): void {
        $testId = 'file_storage.create_file_storage_label.0';
        $this->client->fileStorage->createFileStorageLabel(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/labels",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageLabel(): void {
        $testId = 'file_storage.get_file_storage_label.0';
        $this->client->fileStorage->getFileStorageLabel(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteFileStorageLabel(): void {
        $testId = 'file_storage.delete_file_storage_label.0';
        $this->client->fileStorage->deleteFileStorageLabel(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testModifyFileStorageLabel(): void {
        $testId = 'file_storage.modify_file_storage_label.0';
        $this->client->fileStorage->modifyFileStorageLabel(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
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
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/labels/environment",
            null,
            1
        );
    }

    /**
     */
    public function testGetFileStorageCurrentState(): void {
        $testId = 'file_storage.get_file_storage_current_state.0';
        $this->client->fileStorage->getFileStorageCurrentState(
            '17871d62-6964-4336-b68d-4a85a8ee10fe',
            [
                'headers' => [
                    'X-Test-Id' => 'file_storage.get_file_storage_current_state.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/file-storage/17871d62-6964-4336-b68d-4a85a8ee10fe/current-state",
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

<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Storage\Requests\GetStorageListRequest;
use Upcloud\Storage\Requests\CreateStorageRequest;
use Upcloud\Storage\Types\CreateStorageRequestStorage;
use Upcloud\Types\StorageBackupRule;
use Upcloud\Types\StorageBackupRuleInterval;
use Upcloud\Types\StorageEncrypted;
use Upcloud\Types\StorageLabel;
use Upcloud\Types\StorageTier;
use Upcloud\Storage\Requests\GetStorageListByBackupRequest;
use Upcloud\Storage\Requests\GetStorageListByCdromRequest;
use Upcloud\Storage\Requests\GetStorageListByNormalRequest;
use Upcloud\Storage\Requests\GetStorageListByPrivateAccessRequest;
use Upcloud\Storage\Requests\GetStorageListByPublicAccessRequest;
use Upcloud\Storage\Requests\GetStorageListByTemplateRequest;
use Upcloud\Types\StorageType;
use Upcloud\Types\StorageAccessFilter;
use Upcloud\Storage\Requests\GetStorageListByTypeAndAccessRequest;
use Upcloud\Storage\Requests\ModifyStorageBody;
use Upcloud\Storage\Types\ModifyStorageBodyStorage;
use Upcloud\Storage\Requests\DeleteStorageRequest;
use Upcloud\Storage\Requests\AttachStorageRequest;
use Upcloud\Storage\Types\AttachStorageRequestStorageDevice;
use Upcloud\Storage\Types\AttachStorageRequestStorageDeviceType;
use Upcloud\Storage\Requests\CreateStorageBackupRequest;
use Upcloud\Storage\Types\CreateStorageBackupRequestStorage;
use Upcloud\Storage\Requests\CloneStorageRequest;
use Upcloud\Storage\Types\CloneStorageRequestStorage;
use Upcloud\Storage\Requests\CreateStorageImportRequest;
use Upcloud\Storage\Types\CreateStorageImportRequestStorageImport;
use Upcloud\Storage\Types\CreateStorageImportRequestStorageImportSource;
use Upcloud\Storage\Requests\CreateStorageTemplateRequest;
use Upcloud\Storage\Types\CreateStorageTemplateRequestStorage;

class StorageWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testGetStorageList(): void {
        $testId = 'storage.get_storage_list.0';
        $this->client->storage->getStorageList(
            new GetStorageListRequest([
                'label' => 'environment',
                'search' => 'database',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_list.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage",
            ['label' => 'environment', 'search' => 'database', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testCreateStorage(): void {
        $testId = 'storage.create_storage.0';
        $this->client->storage->createStorage(
            new CreateStorageRequest([
                'storage' => new CreateStorageRequestStorage([
                    'backupRule' => new StorageBackupRule([
                        'interval' => StorageBackupRuleInterval::Daily->value,
                        'time' => '0400',
                        'retention' => '7',
                    ]),
                    'encrypted' => StorageEncrypted::Yes->value,
                    'labels' => [
                        new StorageLabel([
                            'key' => 'environment',
                            'value' => 'production',
                        ]),
                    ],
                    'size' => 50,
                    'tier' => StorageTier::Maxiops->value,
                    'title' => 'Block Storage 1',
                    'zone' => 'fi-hel1',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.create_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage",
            null,
            1
        );
    }

    /**
     */
    public function testGetStorageListByBackup(): void {
        $testId = 'storage.get_storage_list_by_backup.0';
        $this->client->storage->getStorageListByBackup(
            new GetStorageListByBackupRequest([
                'label' => 'environment',
                'search' => 'database',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_list_by_backup.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/backup",
            ['label' => 'environment', 'search' => 'database', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetStorageListByCdrom(): void {
        $testId = 'storage.get_storage_list_by_cdrom.0';
        $this->client->storage->getStorageListByCdrom(
            new GetStorageListByCdromRequest([
                'label' => 'environment',
                'search' => 'database',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_list_by_cdrom.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/cdrom",
            ['label' => 'environment', 'search' => 'database', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetFavoriteStorageList(): void {
        $testId = 'storage.get_favorite_storage_list.0';
        $this->client->storage->getFavoriteStorageList(
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_favorite_storage_list.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/favorite",
            null,
            1
        );
    }

    /**
     */
    public function testGetStorageListByNormal(): void {
        $testId = 'storage.get_storage_list_by_normal.0';
        $this->client->storage->getStorageListByNormal(
            new GetStorageListByNormalRequest([
                'label' => 'environment',
                'search' => 'database',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_list_by_normal.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/normal",
            ['label' => 'environment', 'search' => 'database', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetStorageListByPrivateAccess(): void {
        $testId = 'storage.get_storage_list_by_private_access.0';
        $this->client->storage->getStorageListByPrivateAccess(
            new GetStorageListByPrivateAccessRequest([
                'label' => 'environment',
                'search' => 'database',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_list_by_private_access.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/private",
            ['label' => 'environment', 'search' => 'database', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetStorageListByPublicAccess(): void {
        $testId = 'storage.get_storage_list_by_public_access.0';
        $this->client->storage->getStorageListByPublicAccess(
            new GetStorageListByPublicAccessRequest([
                'label' => 'environment',
                'search' => 'database',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_list_by_public_access.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/public",
            ['label' => 'environment', 'search' => 'database', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetStorageListByTemplate(): void {
        $testId = 'storage.get_storage_list_by_template.0';
        $this->client->storage->getStorageListByTemplate(
            new GetStorageListByTemplateRequest([
                'label' => 'environment',
                'search' => 'database',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_list_by_template.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/template",
            ['label' => 'environment', 'search' => 'database', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetStorageListByTypeAndAccess(): void {
        $testId = 'storage.get_storage_list_by_type_and_access.0';
        $this->client->storage->getStorageListByTypeAndAccess(
            StorageType::Normal->value,
            StorageAccessFilter::Public_->value,
            new GetStorageListByTypeAndAccessRequest([
                'label' => 'environment',
                'search' => 'database',
                'limit' => 25,
                'offset' => 0,
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_list_by_type_and_access.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/normal/public",
            ['label' => 'environment', 'search' => 'database', 'limit' => '25', 'offset' => '0'],
            1
        );
    }

    /**
     */
    public function testGetStorageInfo(): void {
        $testId = 'storage.get_storage_info.0';
        $this->client->storage->getStorageInfo(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_info.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testModifyStorage(): void {
        $testId = 'storage.modify_storage.0';
        $this->client->storage->modifyStorage(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ModifyStorageBody([
                'storage' => new ModifyStorageBodyStorage([
                    'size' => 100,
                    'title' => 'Production data expanded',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.modify_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteStorage(): void {
        $testId = 'storage.delete_storage.0';
        $this->client->storage->deleteStorage(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new DeleteStorageRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.delete_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testAttachStorageToServer(): void {
        $testId = 'storage.attach_storage_to_server.0';
        $this->client->storage->attachStorageToServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new AttachStorageRequest([
                'storageDevice' => new AttachStorageRequestStorageDevice([
                    'server' => '00798b85-efdc-41ca-8021-f6ef457b8531',
                    'type' => AttachStorageRequestStorageDeviceType::Disk->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.attach_storage_to_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/attach",
            null,
            1
        );
    }

    /**
     */
    public function testCreateOnDemandBackup(): void {
        $testId = 'storage.create_on_demand_backup.0';
        $this->client->storage->createOnDemandBackup(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new CreateStorageBackupRequest([
                'storage' => new CreateStorageBackupRequestStorage([
                    'title' => 'Manually created backup',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.create_on_demand_backup.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/backup",
            null,
            1
        );
    }

    /**
     */
    public function testCancelStorageOperation(): void {
        $testId = 'storage.cancel_storage_operation.0';
        $this->client->storage->cancelStorageOperation(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.cancel_storage_operation.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/cancel",
            null,
            1
        );
    }

    /**
     */
    public function testCloneStorage(): void {
        $testId = 'storage.clone_storage.0';
        $this->client->storage->cloneStorage(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new CloneStorageRequest([
                'storage' => new CloneStorageRequestStorage([
                    'encrypted' => StorageEncrypted::Yes->value,
                    'tier' => StorageTier::Maxiops->value,
                    'title' => 'Cloned Block Storage',
                    'zone' => 'fi-hel1',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.clone_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/clone",
            null,
            1
        );
    }

    /**
     */
    public function testDetachStorageFromServer(): void {
        $testId = 'storage.detach_storage_from_server.0';
        $this->client->storage->detachStorageFromServer(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.detach_storage_from_server.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/detach",
            null,
            1
        );
    }

    /**
     */
    public function testAddStorageToFavorites(): void {
        $testId = 'storage.add_storage_to_favorites.0';
        $this->client->storage->addStorageToFavorites(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.add_storage_to_favorites.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/favorite",
            null,
            1
        );
    }

    /**
     */
    public function testRemoveStorageFromFavorites(): void {
        $testId = 'storage.remove_storage_from_favorites.0';
        $this->client->storage->removeStorageFromFavorites(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.remove_storage_from_favorites.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/favorite",
            null,
            1
        );
    }

    /**
     */
    public function testGetStorageImportDetails(): void {
        $testId = 'storage.get_storage_import_details.0';
        $this->client->storage->getStorageImportDetails(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.get_storage_import_details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/import",
            null,
            1
        );
    }

    /**
     */
    public function testCreateStorageImport(): void {
        $testId = 'storage.create_storage_import.0';
        $this->client->storage->createStorageImport(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new CreateStorageImportRequest([
                'storageImport' => new CreateStorageImportRequestStorageImport([
                    'source' => CreateStorageImportRequestStorageImportSource::HttpImport->value,
                    'sourceLocation' => 'https://example.com/disk.raw',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.create_storage_import.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/import",
            null,
            1
        );
    }

    /**
     */
    public function testCancelStorageImport(): void {
        $testId = 'storage.cancel_storage_import.0';
        $this->client->storage->cancelStorageImport(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.cancel_storage_import.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/import/cancel",
            null,
            1
        );
    }

    /**
     */
    public function testResizeStorage(): void {
        $testId = 'storage.resize_storage.0';
        $this->client->storage->resizeStorage(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.resize_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/resize",
            null,
            1
        );
    }

    /**
     */
    public function testRestoreStorageFromBackup(): void {
        $testId = 'storage.restore_storage_from_backup.0';
        $this->client->storage->restoreStorageFromBackup(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'storage.restore_storage_from_backup.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/restore",
            null,
            1
        );
    }

    /**
     */
    public function testCreateTemplateFromStorage(): void {
        $testId = 'storage.create_template_from_storage.0';
        $this->client->storage->createTemplateFromStorage(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new CreateStorageTemplateRequest([
                'storage' => new CreateStorageTemplateRequestStorage([
                    'title' => 'My server template',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'storage.create_template_from_storage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/storage/0414e0d7-4436-4037-9dd8-6eaf47dce599/templatize",
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

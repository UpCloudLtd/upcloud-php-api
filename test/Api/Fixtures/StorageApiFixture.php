<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\AttachStorageDeviceRequest;
use Upcloud\ApiClient\Model\CloneStorageRequest;
use Upcloud\ApiClient\Model\CreateBackupStorageRequest;
use Upcloud\ApiClient\Model\CreateStorageRequest;
use Upcloud\ApiClient\Model\ModifyStorageRequest;
use Upcloud\ApiClient\Model\StorageDevice;
use Upcloud\ApiClient\Model\StorageDeviceDetachRequest;
use Upcloud\ApiClient\Model\StorageDeviceLoadRequest;
use Upcloud\ApiClient\Model\SuccessStoragesResponse;
use Upcloud\ApiClient\Model\TemplitizeStorageRequest;
use Upcloud\ApiClient\ObjectSerializer;

class StorageApiFixture
{

    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return json_encode($this->getList(), JSON_PRETTY_PRINT);
    }

    /**
     * @return string
     */
    public function getServerResponseBody(): string
    {
        return json_encode($this->getServerData(), JSON_PRETTY_PRINT);
    }

    /**
     * @param int $fromListIndex
     * @return string
     */
    public function getResponseBodyByIndex(int $fromListIndex = 0): string
    {
        return json_encode(
            [
                'storage' => $this->getByIndex($fromListIndex)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @return SuccessStoragesResponse
     */
    public function getResponse(): SuccessStoragesResponse
    {
        /**
         * @var SuccessStoragesResponse $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBody()),
            SuccessStoragesResponse::class,
            []
        );
        return $request;
    }

    /**
     * @param int $fromListIndex
     * @return CreateStorageRequest
     */
    public function getCreateRequest($fromListIndex = 0): CreateStorageRequest
    {
        /**
         * @var CreateStorageRequest $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBodyByIndex($fromListIndex)),
            CreateStorageRequest::class,
            []
        );
        return $request;
    }

    /**
     * @param int $fromListIndex
     * @return ModifyStorageRequest|mixed
     */
    public function getModifyRequest($fromListIndex = 0): ModifyStorageRequest
    {
        /**
         * @var ModifyStorageRequest $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBodyByIndex($fromListIndex)),
            ModifyStorageRequest::class,
            []
        );
        return $request;
    }

    /**
     * @param int $fromListIndex
     * @return CloneStorageRequest
     */
    public function getCloneRequest(int $fromListIndex = 0): CloneStorageRequest
    {
        /**
         * @var CloneStorageRequest $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBodyByIndex($fromListIndex)),
            CloneStorageRequest::class,
            []
        );
        return $request;
    }

    /**
     * @param int $fromListIndex
     * @return TemplitizeStorageRequest
     */
    public function getTemplitizeStorageRequest(int $fromListIndex = 0): TemplitizeStorageRequest
    {
        /**
         * @var TemplitizeStorageRequest $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBodyByIndex($fromListIndex)),
            TemplitizeStorageRequest::class,
            []
        );

        return $request;
    }

    /**
     * @param int $fromListIndex
     * @return CreateBackupStorageRequest
     */
    public function getBackupStorageRequest(int $fromListIndex = 0): CreateBackupStorageRequest
    {
        /**
         * @var CreateBackupStorageRequest $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBodyByIndex($fromListIndex)),
            CreateBackupStorageRequest::class,
            []
        );

        return $request;
    }

    /**
     * @return AttachStorageDeviceRequest
     */
    public function getAttachRequest(): AttachStorageDeviceRequest
    {
        $storageDevice = $this->getServerData()['server']['storage_devices']['storage_device'][0];
        return new AttachStorageDeviceRequest([
            'storage_device' =>  new StorageDevice($storageDevice)
        ]);
    }

    /**
     * @return StorageDeviceDetachRequest
     */
    public function getDetachRequest(): StorageDeviceDetachRequest
    {
        $storageDevices = $this->getServerData()['server']['storage_devices'];
        $storageDevices['storage_device'][0]['address'] = 'scsi:0:1';

        return new StorageDeviceDetachRequest([
            'storage_device' =>  new StorageDevice($storageDevices['storage_device'][0])
        ]);
    }

    /**
     * @return StorageDeviceLoadRequest
     */
    public function getLoadCdromRequest(): StorageDeviceLoadRequest
    {
        return new StorageDeviceLoadRequest([
            'storage_device' => new StorageDevice([
                'storage' => '01eff7ad-168e-413e-83b0-054f6a28fa23'
            ])
        ]);
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getByIndex(int $index): ?array
    {
        return $this->getList()['storages']['storage'][$index] ?? null;
    }

    public function getList(): array
    {
        return [
            'storages' => [
                'storage' => [
                    [
                        'access' => 'private',
                        'backup_rule' => [
                            'interval' => 'daily',
                            'hour' => '0430',
                            'retention' => '365'
                        ],
                        'backups' => [
                            'backup' => ['01d194c6-3061-40d0-a9dd-d400fc90b79a', '01000ded-b947-4a0d-a5b9-c55b7f18106c']
                        ],
                        'license' => 0.0,
                        'servers' => [
                            'server' => ['00f25527-c3d9-470b-a2a1-d3670e0c3cdf']
                        ],
                        'size' => 10,
                        'state' => 'online',
                        'tier' => 'hdd',
                        'title' => 'Operating system disk',
                        'type' => 'normal',
                        'uuid' => '01eff7ad-168e-413e-83b0-054f6a28fa23',
                        'zone' => 'fi-hel1',
                        'origin' => null,
                        'created' => '2020-10-28T13:11:02+00:00',
                    ],
                    [
                        'access' => 'private',
                        'backup_rule' => null,
                        'backups' => null,
                        'license' => 0,
                        'servers' => null,
                        'size' => 10,
                        'state' => 'online',
                        'tier' => null,
                        'title' => 'On demand backup',
                        'type' => 'backup',
                        'uuid' => '01287ad1-496c-4b5f-bb67-0fc2e3494740',
                        'zone' => 'fi-hel1',
                        'origin' => '01eff7ad-168e-413e-83b0-054f6a28fa23',
                        'created' => '2020-10-28T13:11:02+00:00',
                    ],
                    [
                        'access' => 'private',
                        'backup_rule' => null,
                        'backups' => null,
                        'license' => 0,
                        'servers' => null,
                        'part_of_plan' => 'yes',
                        'size' => 50,
                        'state' => 'online',
                        'tier' => 'maxiops',
                        'title' => 'Databases',
                        'type' => 'normal',
                        'uuid' => '01f3286c-a5ea-4670-8121-d0b9767d625b',
                        'zone' => 'fi-hel1',
                        'origin' => null,
                        'created' => null,
                    ],
                    [
                        'access' => 'private',
                        'backup_rule' => null,
                        'backups' => null,
                        'license' => 0,
                        'servers' => null,
                        'part_of_plan' => 'yes',
                        'size' => 50,
                        'state' => 'online',
                        'tier' => 'maxiops',
                        'title' => 'My server template',
                        'type' => 'template',
                        'uuid' => '01f3286c-a5ea-4670-8121-d0b9767d625b',
                        'zone' => 'fi-hel1',
                        'origin' => null,
                        'created' => null,
                    ]
                ]
            ]
        ];
    }

    public function getServerData(): array
    {
        return [
            'server' => [
                'boot_order' => 'disk',
                'core_number' => '2',
                'firewall' => 'on',
                'hostname' => 'debian.example.com',
                'ip_addresses' => [
                    'ip_address' => []
                ],
                'license' => 0,
                'memory_amount' => '4096',
                'nic_model' => 'virtio',
                'plan' => '2xCPU-4GB',
                'plan_ipv4_bytes' => '345346754423',
                'plan_ipv6_bytes' => '676300234',
                'state' => 'started',
                'storage_devices' => [
                    'storage_device' => [
                        [
                            'address' => 'scsi:0:0',
                            'storage' => '01eff7ad-168e-413e-83b0-054f6a28fa23',
                            'storage_size' => '10',
                            'storage_title' => 'Operating system disk',
                            'type' => 'disk',
                            'boot_disk' => '0'
                        ]
                    ]
                ],
                'tags' => [],
                'timezone' => 'UTC',
                'title' => 'My Debian server',
                'uuid' => '00c78863-db86-44ea-af70-d6edc4d162bf',
                'video_model' => 'cirrus',
                'vnc' => 'off',
                'vnc_password' => 'aabbccdd',
                'zone' => 'fi-hel1',
            ]
        ];
    }
}

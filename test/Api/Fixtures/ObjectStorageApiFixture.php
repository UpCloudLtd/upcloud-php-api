<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\CreateObjectStorageRequest;
use Upcloud\ApiClient\Model\ModifyObjectStorageRequest;
use Upcloud\ApiClient\Model\ObjectStorageListResponse;
use Upcloud\ApiClient\Model\ObjectStorageResponse;

class ObjectStorageApiFixture extends BaseFixture
{

    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return json_encode($this->getList(), JSON_PRETTY_PRINT);
    }

    /**
     * @param int $index
     * @return string
     */
    public function getResponseBodyByIndex(int $index = 0): string
    {
        return json_encode(
            [
                'object_storage' => $this->getByIndex($index)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @return ObjectStorageListResponse
     */
    public function getResponse()
    {
        return $this->serializer->deserialize(
            $this->getResponseBody(),
            ObjectStorageListResponse::class
        );
    }

    /**
     * @param int $index
     * @return ObjectStorageResponse
     */
    public function getResponseByIndex(int $index = 0)
    {
        return $this->serializer->deserialize(
            $this->getResponseBodyByIndex($index),
            ObjectStorageResponse::class
        );
    }

    /**
     * @param int $index
     * @return CreateObjectStorageRequest
     */
    public function getCreateRequest($index = 0): CreateObjectStorageRequest
    {
        return  new CreateObjectStorageRequest([
            'object_storage' => $this->getByIndex($index),
        ]);
    }
    /**
     * @param int $index
     * @return ModifyObjectStorageRequest
     */
    public function getModifyRequest($index = 0): ModifyObjectStorageRequest
    {
        return  new ModifyObjectStorageRequest([
            'object_storage' => $this->getByIndex($index),
        ]);
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getByIndex(int $index)
    {
        return $this->getList()['object_storages']['object_storage'][$index] ?? null;
    }


    public function getList()
    {
        return [
            'object_storages' => [
                'object_storage' => [
                    [
                        'created' => '2020-07-23T05=>06=>35Z',
                        'description' => 'Example object storage',
                        'name' => 'example-object-storage',
                        'size' => 250,
                        'used_space' => 0,
                        'state' => 'started',
                        'url' => 'https=>//example-object-storage.nl-ams1.upcloudobjects.com/',
                        'uuid' => '06832a75-be7b-4d23-be05-130dc3dfd9e7',
                        'access_key'=> 'UCOBTMRABUTKMC2WF6BD',
                        'secret_key'=> 'NCAtWEblflr7HhimErIgRVNo48+x546VLm0azVcO',
                        'zone' => 'uk-lon1'
                    ],
                    [
                        'created' => '2020-07-23T05=>06=>35Z',
                        'description' => 'App object storage',
                        'name' => 'app-object-storage',
                        'size' => 500,
                        'used_space' => 0,
                        'state' => 'started',
                        'url' => 'https=>//app-data-storage.nl-ams1.upcloudobjects.com/',
                        'uuid' => '06636a75-ae9b-4d23-be06-260dc3ded8e0',
                        'access_key'=> 'UCOBTMRABUTKMC2WF6BD',
                        'secret_key'=> 'NCAtWEblflr7HhimErIgRVNo48+x546VLm0azVcO',
                        'zone' => 'nl-ams1'
                    ]
                ]
            ]
        ];
    }
}

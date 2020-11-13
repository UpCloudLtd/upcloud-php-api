<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\HostResponse;
use Upcloud\ApiClient\Model\HostListResponse;
use Upcloud\ApiClient\Model\ModifyHostRequest;

class HostsApiFixture extends BaseFixture
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
                'host' => $this->getByIndex($index)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @return HostListResponse
     */
    public function getResponse()
    {
        return $this->serializer->deserialize(
            $this->getResponseBody(),
            HostListResponse::class
        );
    }

    /**
     * @param int $index
     * @return HostResponse
     */
    public function getResponseByIndex(int $index = 0)
    {
        return $this->serializer->deserialize(
            $this->getResponseBodyByIndex($index),
            HostResponse::class
        );
    }

    /**
     * @param int $index
     * @return ModifyHostRequest
     */
    public function getModifyRequest($index = 0): ModifyHostRequest
    {
        return  new ModifyHostRequest([
            'host' => $this->getByIndex($index),
        ]);
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getByIndex(int $index)
    {
        return $this->getList()['hosts']['host'][$index] ?? null;
    }


    public function getList()
    {
        return [
            'hosts' => [
                'host' => [
                    [
                        'id' => 7653311107,
                        'description' => 'My Host #1',
                        'zone' => 'private-zone-id',
                        'windows_enabled' => 'no',
                        'stats' => [
                            'stat' => [
                                [
                                    'name' => 'cpu_idle',
                                    'timestamp' => '2019-08-09T12=>46=>57Z',
                                    'value' => 95.2
                                ],
                                [
                                    'name' => 'memory_free',
                                    'timestamp' => '2019-08-09T12=>46=>57Z',
                                    'value' => 102
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 8055964291,
                        'description' => 'My Host #2',
                        'zone' => 'private-zone-id',
                        'windows_enabled' => 'no',
                        'stats' => [
                            'stat' => [
                                [
                                    'name' => 'cpu_idle',
                                    'timestamp' => '2019-08-09T12=>46=>57Z',
                                    'value' => 80.1
                                ],
                                [
                                    'name' => 'memory_free',
                                    'timestamp' => '2019-08-09T12=>46=>57Z',
                                    'value' => 61
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}

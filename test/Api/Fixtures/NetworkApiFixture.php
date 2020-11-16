<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\CreateNetworkInterfaceRequest;
use Upcloud\ApiClient\Model\CreateNetworkRequest;
use Upcloud\ApiClient\Model\ModifyNetworkInterfaceRequest;
use Upcloud\ApiClient\Model\ModifyNetworkRequest;
use Upcloud\ApiClient\Model\NetworkInterfaceResponse;
use Upcloud\ApiClient\Model\NetworkResponse;
use Upcloud\ApiClient\Model\NetworksListResponse;
use Upcloud\ApiClient\Model\RouterRequest;
use Upcloud\ApiClient\Model\RouterResponse;
use Upcloud\ApiClient\Model\RoutersListResponse;
use Upcloud\ApiClient\Model\ServerNetworksListResponse;

class NetworkApiFixture extends BaseFixture
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
                'network' => $this->getByIndex($index)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @param int $index
     * @return string
     */
    public function getNetworkInterfaceResponseBodyByIndex(int $index = 0): string
    {
        return json_encode(
            [
                'interface' => $this->getInterfaceByIndex($index)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @param int $index
     * @return string
     */
    public function getRouterResponseBodyByIndex(int $index = 0): string
    {
        return json_encode(
            [
                'router' => $this->getRouterByIndex($index)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @return string
     */
    public function getServerResponseBody(): string
    {
        return json_encode($this->getServerList(), JSON_PRETTY_PRINT);
    }

    /**
     * @return string
     */
    public function getRouterResponseBody(): string
    {
        return json_encode($this->getRouterList(), JSON_PRETTY_PRINT);
    }


    /**
     * @return NetworksListResponse
     */
    public function getResponse()
    {
        return $this->serializer->deserialize(
            $this->getResponseBody(),
            NetworksListResponse::class
        );
    }

    /**
     * @return ServerNetworksListResponse
     */
    public function getServerResponse()
    {
        return $this->serializer->deserialize(
            $this->getServerResponseBody(),
            ServerNetworksListResponse::class
        );
    }

    /**
     * @return RoutersListResponse
     */
    public function getRouterResponse()
    {
        return $this->serializer->deserialize(
            $this->getRouterResponseBody(),
            RoutersListResponse::class
        );
    }

    /**
     * @param int $index
     * @return NetworkResponse
     */
    public function getResponseByIndex(int $index = 0)
    {
        return $this->serializer->deserialize(
            $this->getResponseBodyByIndex($index),
            NetworkResponse::class
        );
    }

    /**
     * @param int $index
     * @return NetworkInterfaceResponse
     */
    public function getNetworkInterfaceResponseByIndex(int $index = 0)
    {
        return $this->serializer->deserialize(
            $this->getNetworkInterfaceResponseBodyByIndex($index),
            NetworkInterfaceResponse::class
        );
    }

    /**
     * @param int $index
     * @return RouterResponse
     */
    public function getRouterResponseByIndex(int $index = 0)
    {
        return $this->serializer->deserialize(
            $this->getRouterResponseBodyByIndex($index),
            RouterResponse::class
        );
    }

    /**
     * @param int $index
     * @return CreateNetworkRequest
     */
    public function getCreateRequest($index = 0): CreateNetworkRequest
    {
        return  new CreateNetworkRequest([
            'network' => $this->getByIndex($index),
        ]);
    }

    /**
     * @param int $index
     * @return ModifyNetworkRequest
     */
    public function getModifyRequest($index = 0): ModifyNetworkRequest
    {
        return  new ModifyNetworkRequest([
            'network' => $this->getByIndex($index),
        ]);
    }

    /**
     * @param int $index
     * @return CreateNetworkInterfaceRequest
     */
    public function getCreateNetworkInterfaceRequest($index = 0): CreateNetworkInterfaceRequest
    {
        return  new CreateNetworkInterfaceRequest([
            'interface' => $this->getInterfaceByIndex($index),
        ]);
    }

    /**
     * @param int $index
     * @return ModifyNetworkInterfaceRequest
     */
    public function getModifyNetworkInterfaceRequest($index = 0): ModifyNetworkInterfaceRequest
    {
        return  new ModifyNetworkInterfaceRequest([
            'interface' => $this->getInterfaceByIndex($index),
        ]);
    }

    /**
     * @param int $index
     * @return RouterRequest
     */
    public function getRouterRequest($index = 0): RouterRequest
    {
        return  new RouterRequest([
            'router' => $this->getRouterByIndex($index),
        ]);
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getByIndex(int $index)
    {
        return $this->getList()['networks']['network'][$index] ?? null;
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getInterfaceByIndex(int $index)
    {
        return $this->getServerList()['networking']['interfaces']['interface'][$index] ?? null;
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getRouterByIndex(int $index)
    {
        return $this->getRouterList()['routers']['router'][$index] ?? null;
    }

    public function getList()
    {
        return [
            'networks' => [
                'network' => [
                    [
                        'ip_networks' => [
                            'ip_network' => [
                                [
                                    'address' => '80.69.172.0/22',
                                    'dhcp' => 'yes',
                                    'dhcp_default_route' => 'yes',
                                    'dhcp_dns' => [
                                        '94.237.127.9',
                                        '94.237.40.9'
                                    ],
                                    'family' => 'IPv4',
                                    'gateway' => '80.69.172.1'
                                ]
                            ]
                        ],
                        'name' => 'Public 80.69.172.0/22',
                        'type' => 'public',
                        'uuid' => '03000000-0000-4000-8001-000000000000',
                        'zone' => 'fi-hel1',
                        'servers' => [
                            'server' => [
                                ['uuid' => '007e3200-268f-4848-8b45-bd88c44555d2', 'title' => 'Helsinki server #1'],
                                ['uuid' => '00c8f13a-945a-48b8-bf5c-db2d7a3a37fe', 'title' => 'Helsinki server #2'],
                            ]
                        ]
                    ],
                    [
                        'name' => 'Test private net',
                        'type' => 'private',
                        'uuid' => '034c12bc-cf15-4b19-97b2-0ab4e51bb98d',
                        'zone' => 'uk-lon1',
                        'router' => '04c0df35-2658-4b0c-8ac7-962090f4e92a',
                        'ip_networks' => [
                            'ip_network' => [
                                [
                                    'address' => '172.16.0.0/22',
                                    'dhcp' => 'yes',
                                    'dhcp_default_route' => 'no',
                                    'dhcp_dns' => [
                                        '172.16.0.10',
                                        '172.16.1.10'
                                    ],
                                    'family' => 'IPv4',
                                    'gateway' => '172.16.0.1'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    public function getServerList()
    {
        return [
            'networking' => [
                'interfaces' => [
                    'interface' => [
                        [
                            'index' => 2,
                            'ip_addresses' => [
                                'ip_address' => [
                                    [
                                        'address' => '94.237.0.207',
                                        'family' => 'IPv4'
                                    ]
                                ]
                            ],
                            'mac' => 'de:ff:ff:ff:66:89',
                            'network' => '037fcf2a-6745-45dd-867e-f9479ea8c044',
                            'source_ip_filtering' => 'yes',
                            'type' => 'public',
                            'bootable' => 'no'
                        ],
                        [
                            'index' => 3,
                            'ip_addresses' => [
                                'ip_address' => [
                                    [
                                        'address' => '10.199.3.15',
                                        'family' => 'IPv4'
                                    ]
                                ]
                            ],
                            'mac' => 'de:ff:ff:ff:ed:85',
                            'network' => '03c93fd8-cc60-4849-91b8-6e404b228e2a',
                            'source_ip_filtering' => 'yes',
                            'type' => 'utility',
                            'bootable' => 'no'
                        ],
                        [
                            'index' => 4,
                            'ip_addresses' => [
                                'ip_address' => [
                                    [
                                        'address' => '10.0.0.20',
                                        'family' => 'IPv4'
                                    ]
                                ]
                            ],
                            'mac' => 'de:ff:ff:ff:cc:20',
                            'network' => '0374ce47-4303-4490-987d-32dc96cfd79b',
                            'source_ip_filtering' => 'yes',
                            'type' => 'private',
                            'bootable' => 'no'
                        ]
                    ]
                ]
            ]
        ];
    }

    public function getRouterList()
    {
        return [
            'routers' => [
                'router' => [
                    [
                        'attached_networks' => [
                            'network' => [
                                '03000000-0000-4000-8001-000000000000',
                                '034c12bc-cf15-4b19-97b2-0ab4e51bb98d'
                            ]
                        ],
                        'name' => 'Example router',
                        'type' => 'normal',
                        'uuid' => '04c0df35-2658-4b0c-8ac7-962090f4e92a'
                    ]
                ]
            ]
        ];
    }
}

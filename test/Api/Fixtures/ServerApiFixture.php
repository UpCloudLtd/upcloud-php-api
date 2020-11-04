<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\ConfigurationListResponse;
use Upcloud\ApiClient\Model\CreateServerRequest;
use Upcloud\ApiClient\Model\ModifyServerRequest;
use Upcloud\ApiClient\Model\RestartServer;
use Upcloud\ApiClient\Model\ServerListResponse;
use Upcloud\ApiClient\Model\StopServer;
use Upcloud\ApiClient\ObjectSerializer;

class ServerApiFixture
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
    public function getResponseConfigBody(): string
    {
        return json_encode($this->getConfigurationsList(), JSON_PRETTY_PRINT);
    }

    /**
     * @param int $index
     * @return string
     */
    public function getResponseBodyByIndex(int $index = 0): string
    {
        return json_encode(
            [
                'server' => $this->getByIndex($index)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @return ServerListResponse
     */
    public function getResponse(): ServerListResponse
    {
        /**
         * @var ServerListResponse $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBody()),
            ServerListResponse::class,
            []
        );
        return $request;
    }

    /**
     * @return ConfigurationListResponse
     */
    public function getResponseConfig(): ConfigurationListResponse
    {
        /**
         * @var ConfigurationListResponse $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseConfigBody()),
            ConfigurationListResponse::class,
            []
        );
        return $request;
    }

    /**
     * @param int $index
     * @return CreateServerRequest

     */
    public function getCreateRequest($index = 0): CreateServerRequest
    {
        /**
         * @var CreateServerRequest $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBodyByIndex($index)),
            CreateServerRequest::class,
            []
        );
        return $request;
    }

    /**
     * @param int $index
     * @return ModifyServerRequest

     */
    public function getModifyRequest($index = 2): ModifyServerRequest
    {
        /**
         * @var ModifyServerRequest $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode($this->getResponseBodyByIndex($index)),
            ModifyServerRequest::class,
            []
        );
        return $request;
    }

    /**
     * @return StopServer
     */
    public function getStopRequest(): StopServer
    {
        /**
         * @var StopServer $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode('{"stop_server": {"stop_type": "soft","timeout": "60"}}'),
            StopServer::class,
            []
        );
        return $request;
    }
    /**
     * @return RestartServer
     */
    public function getRestartRequest(): RestartServer
    {
        /**
         * @var RestartServer $request
         */
        $request = ObjectSerializer::deserialize(
            json_decode('{"restart_server": {"stop_type": "soft","timeout": "60","timeout_action": "destroy"}}'),
            RestartServer::class,
            []
        );
        return $request;
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getByIndex(int $index): ?array
    {
        return $this->getList()['servers']['server'][$index] ?? null;
    }

    public function getList(): array
    {
        return [
            'servers' => [
                'server' => [
                    [
                        'boot_order' => 'disk',
                        'core_number' => 0,
                        'firewall' => 'on',
                        'host' => 7653311107,
                        'hostname' => 'server1.example.com',
                        'ip_addresses' => [
                            'ip_address' => [
                                [
                                    'access' => 'utility',
                                    'address' => '10.0.0.00',
                                    'family' => 'IPv4'
                                ],
                                [
                                    'access' => 'public',
                                    'address' => '0.0.0.0',
                                    'family' => 'IPv4'
                                ],
                                [
                                    'access' => 'public',
                                    'address' => 'xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx',
                                    'family' => 'IPv6'
                                ]
                            ]
                        ],
                        'license' => 0,
                        'memory_amount' => '2048',
                        'nic_model' => 'virtio',
                        'plan' => '1xCPU-2GB',
                        'plan_ivp4_bytes' => '34253332',
                        'plan_ipv6_bytes' => '0',
                        'state' => 'started',
                        'storage_devices' => [
                            'storage_device' => [
                                [
                                    'address' => 'virtio:0',
                                    'part_of_plan' => 'yes',
                                    'storage' => '01eff7ad-168e-413e-83b0-054f6a28fa23',
                                    'storage_size' => 20,
                                    'storage_title' => 'Storage for server1.example.com',
                                    'type' => 'disk',
                                    'boot_disk' => '0'
                                ]
                            ]
                        ],
                        'tags' => [
                            'tag' => [
                                'PROD',
                                'CentOS',
                                'TEST'
                            ]
                        ],
                        'firewall_rules' => [
                            'firewall_rule' => [
                                [
                                    'action' => 'accept',
                                    'comment' => 'Allow HTTP from anywhere',
                                    'destination_address_end' => '',
                                    'destination_address_start' => '',
                                    'destination_port_end' => '80',
                                    'destination_port_start' => '80',
                                    'direction' => 'in',
                                    'family' => 'IPv4',
                                    'icmp_type' => '',
                                    'position' => '1',
                                    'protocol' => 'tcp',
                                    'source_port_end' => '80',
                                    'source_port_start' => '80',
                                ]
                            ]],
                        'timezone' => 'UTC',
                        'title' => 'Test Helsinki server',
                        'uuid' => '00f25527-c3d9-470b-a2a1-d3670e0c3cdf',
                        'video_model' => 'cirrus',
                        'remote_access_enabled' => 'yes',
                        'remote_access_type' => 'vnc',
                        'remote_access_host' => 'fi-hel1.vnc.upcloud.com',
                        'remote_access_password' => 'aabbccdd',
                        'remote_access_port' => '3000',
                        'zone' => 'fi-hel1',

                    ],
                    [
                        'core_number' => '1',
                        'hostname' => 'uk.example.com',
                        'license' => 0,
                        'memory_amount' => '512',
                        'plan' => 'custom',
                        'state' => 'stopped',
                        'storage_devices' => [
                            'storage_device' => [
                                [
                                    'action' => 'create',
                                    'size' => '20',
                                    'tier' => 'maxiops',
                                    'title' => 'Debian from scratch'
                                ],
                                [
                                    'action' => 'attach',
                                    'storage' => '01000000-0000-4000-8000-000020010301',
                                    'type' => 'cdrom'
                                ]
                            ]
                        ],
                        'tags' => [
                            'tag' => [
                                'DEV',
                                'Ubuntu'
                            ]
                        ],
                        'title' => 'Test London server',
                        'uuid' => '009d64ef-31d1-4684-a26b-c86c955cbf46',
                        'zone' => 'uk-lon1',
                    ],
                    [
                        'title' => 'Test Modify server',
                    ]
                ]
            ]
        ];
    }

    public function getConfigurationsList()
    {
        return [
            'server_sizes' => [
                'server_size' => [
                    [
                        'core_number' => '1',
                        'memory_amount' => '512',
                    ],
                    [
                        'core_number' => '1',
                        'memory_amount' => '768',
                    ],
                    [
                        'core_number' => '10',
                        'memory_amount' => '65024',
                    ],
                    [
                        'core_number' => '10',
                        'memory_amount' => '65536',
                    ]
                ]
            ]
        ];
    }

}

<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\CreateNewTagResponse;
use Upcloud\ApiClient\Model\ModifyTagRequest;
use Upcloud\ApiClient\Model\Tag;
use Upcloud\ApiClient\Model\TagCreateRequest;
use Upcloud\ApiClient\Model\TagListResponse;
use Upcloud\ApiClient\ObjectSerializer;

class TagApiFixture
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
                'tag' => $this->getByIndex($fromListIndex)
            ],
            JSON_PRETTY_PRINT
        );
    }


    public function getCreateResponse(int $fromListIndex = 0)
    {
        return ObjectSerializer::deserialize(
            json_decode($this->getResponseBodyByIndex($fromListIndex)),
            CreateNewTagResponse::class,
            []
        );
    }

    /**
     * @return TagListResponse|mixed
     */
    public function getResponse()
    {
        return ObjectSerializer::deserialize(
            json_decode($this->getResponseBody()),
            TagListResponse::class,
            []
        );
    }

    /**
     * @param int $fromListIndex
     * @return TagCreateRequest
     */
    public function getCreateRequest($fromListIndex = 0): TagCreateRequest
    {
        return  new TagCreateRequest([
            'tag' => $this->getItem($fromListIndex),
        ]);
    }

    /**
     * @param int $fromListIndex
     * @return ModifyTagRequest
     */
    public function getModifyRequest($fromListIndex = 0): ModifyTagRequest
    {
        return  new ModifyTagRequest([
            'tag' => $this->getItem($fromListIndex),
        ]);
    }

    public function getItem($fromListIndex = 5): Tag
    {
        return new Tag($this->getByIndex($fromListIndex));
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getByIndex(int $index): ?array
    {
        return $this->getList()['tags']['tag'][$index] ?? null;
    }

    public function getList(): array
    {
        return [
            "tags" => [
                "tag" => [
                    [
                        "description" => "Development servers",
                        "name" => "TEST",
                        "servers" => [
                            "server" => [
                                0 => "0077fa3d-32db-4b09-9f5f-30d9e9afb565"
                            ]
                        ]
                    ],
                    [
                        "description" => "My own servers",
                        "name" => "DEV",
                        "servers" => [
                            "server" => []
                        ]
                    ],
                    [
                        "description" => "Production servers",
                        "name" => "PROD",
                        "servers" => [
                            "server" => []
                        ]
                    ]
                ]
            ]
        ];
    }


    public function getServerData(): array
    {
        return [
            "server" => [
                "boot_order" => "disk",
                "core_number" => "2",
                "firewall" => "on",
                "hostname" => "debian.example.com",
                "ip_addresses" => [
                    "ip_address" => []
                ],
                "license" => 0,
                "memory_amount" => "4096",
                "nic_model" => "virtio",
                "plan" => "2xCPU-4GB",
                "plan_ipv4_bytes" => "345346754423",
                "plan_ipv6_bytes" => "676300234",
                "state" => "started",
                "storage_devices" => [
                    "storage_device" => []
                ],
                "tags" => [
                    "tag" => [
                        "TEST"
                    ]
                ],
                "timezone" => "UTC",
                "title" => "My Debian server",
                "uuid" => "00c78863-db86-44ea-af70-d6edc4d162bf",
                "video_model" => "cirrus",
                "vnc" => "off",
                "vnc_password" => "aabbccdd",
                "zone" => "fi-hel1",
            ]
        ];
    }
}

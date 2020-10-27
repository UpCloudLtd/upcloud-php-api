<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\PriceListResponse;
use Upcloud\ApiClient\ObjectSerializer;

class PricesApiFixture
{
    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return json_encode($this->getList(), JSON_PRETTY_PRINT);
    }

    /**
     * @return PriceListResponse|mixed
     */
    public function getResponse()
    {
        return ObjectSerializer::deserialize(
            json_decode($this->getResponseBody()),
            PriceListResponse::class,
            []
        );
    }

    public function getList()
    {
        return [
            "prices" => [
                "zone" => [
                    [
                        "name" => "fi-hel1",
                        "firewall" => [
                            "amount" => 1,
                            "price" => 0.5,
                        ],
                        "io_request_backup" => [
                            "amount" => 1000000,
                            "price" => 10,
                        ],
                        "io_request_hdd" => [
                            "amount" => 1000000,
                            "price" => 0,
                        ],
                        "io_request_maxiops" => [
                            "amount" => 1000000,
                            "price" => 0,
                        ],
                        "ipv4_address" => [
                            "amount" => 1,
                            "price" => 0.3,
                        ],
                        "ipv6_address" => [
                            "amount" => 1,
                            "price" => 0,
                        ],
                        "public_ipv4_bandwidth_in" => [
                            "amount" => 1,
                            "price" => 0,
                        ],
                        "public_ipv4_bandwidth_out" => [
                            "amount" => 1,
                            "price" => 5,
                        ],
                        "public_ipv6_bandwidth_in" => [
                            "amount" => 1,
                            "price" => 0,
                        ],
                        "public_ipv6_bandwidth_out" => [
                            "amount" => 1,
                            "price" => 5,
                        ],
                        "server_core" => [
                            "amount" => 1,
                            "price" => 1.3,
                        ],
                        "server_memory" => [
                            "amount" => 256,
                            "price" => 0.45,
                        ],
                        "storage_backup" => [
                            "amount" => 1,
                            "price" => 0.007,
                        ],
                        "storage_hdd" => [
                            "amount" => 1,
                            "price" => 0.013,
                        ],
                        "storage_maxiops" => [
                            "amount" => 1,
                            "price" => 0.028,
                        ],
                        "server_plan_1xCPU-2GB" => [
                            "amount" => 1,
                            "price" => 2.2321,
                        ],
                        "server_plan_2xCPU-4GB" => [
                            "amount" => 1,
                            "price" => 4.4642,
                        ]
                    ]
                ]
            ]
        ];
    }
}

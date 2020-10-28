<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\AvailablePlanListResponse;
use Upcloud\ApiClient\ObjectSerializer;

class PlanApiFixture
{
    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return json_encode($this->getList(), JSON_PRETTY_PRINT);
    }

    /**
     * @return AvailablePlanListResponse|mixed
     */
    public function getResponse()
    {
        return ObjectSerializer::deserialize(
            json_decode($this->getResponseBody()),
            AvailablePlanListResponse::class,
            []
        );
    }

    public function getList()
    {
        return [
            'plans' => [
                'plan' => [
                    [
                        'core_number' => 1,
                        'memory_amount' => 2048,
                        'name' => '1xCPU-2GB',
                        'public_traffic_out' => 2048,
                        'storage_size' => 50,
                        'storage_tier' => 'maxiops',
                    ],
                    [
                        'core_number' => 2,
                        'memory_amount' => 4096,
                        'name' => '2xCPU-4GB',
                        'public_traffic_out' => 4096,
                        'storage_size' => 80,
                        'storage_tier' => 'maxiops',
                    ]
                ]
            ]
        ];
    }
}

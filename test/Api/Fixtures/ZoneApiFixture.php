<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\ZoneListResponse;

class ZoneApiFixture extends BaseFixture
{
    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return json_encode($this->getList(), JSON_PRETTY_PRINT);
    }

    /**
     * @return ZoneListResponse|mixed
     */
    public function getResponse()
    {
        return $this->serializer->deserialize(
            $this->getResponseBody(),
            ZoneListResponse::class
        );
    }

    public function getList()
    {
        return [
            'zones' => [
                'zone' => [
                    [
                        'description' => 'Frankfurt #1',
                        'id' => 'de-fra1',
                        'public' => 'yes',
                    ],
                    [
                        'description' => 'Helsinki #1',
                        'id' => 'fi-hel1',
                        'public' => 'yes',
                    ],
                    [
                        'description' => 'Helsinki #2',
                        'id' => 'fi-hel2',
                        'public' => 'yes',
                    ],
                    [
                        'description' => 'Amsterdam #1',
                        'id' => 'nl-ams1',
                        'public' => 'yes',
                    ],
                    [
                        'description' => 'Singapore #1',
                        'id' => 'sg-sin1',
                        'public' => 'yes',
                    ],
                    [
                        'description' => 'London #1',
                        'id' => 'uk-lon1',
                        'public' => 'yes',
                    ],
                    [
                        'description' => 'Chicago #1',
                        'id' => 'us-chi1',
                        'public' => 'yes',
                    ],
                    [
                        'description' => 'San Jose #1',
                        'id' => 'us-sjo1',
                        'public' => 'yes',
                    ]
                ]
            ]
        ];
    }
}

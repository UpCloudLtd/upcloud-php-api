<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\TimezoneListResponse;
use Upcloud\ApiClient\ObjectSerializer;

class TimezoneApiFixture
{
    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return json_encode($this->getList(), JSON_PRETTY_PRINT);
    }

    /**
     * @return TimezoneListResponse|mixed
     */
    public function getResponse()
    {
        return ObjectSerializer::deserialize(
            json_decode($this->getResponseBody()),
            TimezoneListResponse::class,
            []
        );
    }

    public function getList()
    {
        return [
            "timezones" => [
                "timezone" => [
                    "Africa/Abidjan",
                    "Africa/Accra",
                    "Africa/Addis_Ababa",
                    "Pacific/Truk",
                    "Pacific/Wake",
                    "Pacific/Wallis",
                    "UTC",
                ]
            ]
        ];
    }
}

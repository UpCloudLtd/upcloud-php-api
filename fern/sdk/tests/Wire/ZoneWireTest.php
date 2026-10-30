<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;

class ZoneWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListZones(): void {
        $testId = 'zone.list_zones.0';
        $this->client->zone->listZones(
            [
                'headers' => [
                    'X-Test-Id' => 'zone.list_zones.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/zone",
            null,
            1
        );
    }

    /**
     */
    public function testListZoneVlaNs(): void {
        $testId = 'zone.list_zone_vla_ns.0';
        $this->client->zone->listZoneVlaNs(
            'fi-hel1',
            [
                'headers' => [
                    'X-Test-Id' => 'zone.list_zone_vla_ns.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/zone/fi-hel1/vlans",
            null,
            1
        );
    }

    /**
     */
    protected function setUp(): void {
        parent::setUp();
        $this->client = new UpcloudClient(
            token: 'test-token',
        options: [
            'baseUrl' => 'http://localhost:8080',
        ],
        );
    }
}

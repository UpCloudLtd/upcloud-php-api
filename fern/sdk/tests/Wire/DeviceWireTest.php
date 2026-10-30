<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Device\Requests\GetAvailablePassthroughDevicesRequest;

class DeviceWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testGetAvailablePassthroughDevices(): void {
        $testId = 'device.get_available_passthrough_devices.0';
        $this->client->device->getAvailablePassthroughDevices(
            new GetAvailablePassthroughDevicesRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'device.get_available_passthrough_devices.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/device/availability",
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

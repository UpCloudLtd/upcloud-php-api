<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;

class ServerSizeWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListServerSizes(): void {
        $testId = 'server_size.list_server_sizes.0';
        $this->client->serverSize->listServerSizes(
            [
                'headers' => [
                    'X-Test-Id' => 'server_size.list_server_sizes.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server_size",
            null,
            1
        );
    }

    /**
     */
    public function testGetServerSizeLimits(): void {
        $testId = 'server_size.get_server_size_limits.0';
        $this->client->serverSize->getServerSizeLimits(
            [
                'headers' => [
                    'X-Test-Id' => 'server_size.get_server_size_limits.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server_size/limits",
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

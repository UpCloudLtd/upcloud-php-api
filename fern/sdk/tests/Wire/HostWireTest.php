<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Host\Requests\ListHostsRequest;
use Upcloud\Host\Requests\HostModify;
use Upcloud\Host\Types\HostModifyHost;

class HostWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListHosts(): void {
        $testId = 'host.list_hosts.0';
        $this->client->host->listHosts(
            new ListHostsRequest([
                'zone' => 'fi-hel1',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'host.list_hosts.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/host",
            ['zone' => 'fi-hel1'],
            1
        );
    }

    /**
     */
    public function testGetHost(): void {
        $testId = 'host.get_host.0';
        $this->client->host->getHost(
            7653311107,
            [
                'headers' => [
                    'X-Test-Id' => 'host.get_host.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/host/7653311107",
            null,
            1
        );
    }

    /**
     */
    public function testModifyHost(): void {
        $testId = 'host.modify_host.0';
        $this->client->host->modifyHost(
            7653311107,
            new HostModify([
                'host' => new HostModifyHost([
                    'description' => "My New Host",
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'host.modify_host.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/host/7653311107",
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

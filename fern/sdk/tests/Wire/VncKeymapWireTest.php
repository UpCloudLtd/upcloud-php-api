<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;

class VncKeymapWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListVncKeymaps(): void {
        $testId = 'vnc_keymap.list_vnc_keymaps.0';
        $this->client->vncKeymap->listVncKeymaps(
            [
                'headers' => [
                    'X-Test-Id' => 'vnc_keymap.list_vnc_keymaps.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/vnc_keymap",
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

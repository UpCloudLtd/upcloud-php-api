<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Partner\Requests\PartnerCreateAccount;

class PartnerWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListPartnerAccounts(): void {
        $testId = 'partner.list_partner_accounts.0';
        $this->client->partner->listPartnerAccounts(
            [
                'headers' => [
                    'X-Test-Id' => 'partner.list_partner_accounts.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/partner/accounts",
            null,
            1
        );
    }

    /**
     */
    public function testCreatePartnerAccount(): void {
        $testId = 'partner.create_partner_account.0';
        $this->client->partner->createPartnerAccount(
            new PartnerCreateAccount([
                'username' => 'newuser',
                'password' => 'superSecret123',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'partner.create_partner_account.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/partner/accounts",
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

<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\AccountTokens\Requests\ListTokensRequest;
use Upcloud\Types\AccountTokensCreateTokenRequestExpiresIn;

class AccountTokensWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListTokens(): void {
        $testId = 'account_tokens.list_tokens.0';
        $this->client->accountTokens->listTokens(
            new ListTokensRequest([
                'gui' => true,
                'sort' => '+name,-created_at',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'account_tokens.list_tokens.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/tokens",
            ['gui' => 'true', 'sort' => '+name,-created_at'],
            1
        );
    }

    /**
     */
    public function testCreateToken(): void {
        $testId = 'account_tokens.create_token.0';
        $this->client->accountTokens->createToken(
            new AccountTokensCreateTokenRequestExpiresIn([]),
            [
                'headers' => [
                    'X-Test-Id' => 'account_tokens.create_token.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/account/tokens",
            null,
            1
        );
    }

    /**
     */
    public function testGetToken(): void {
        $testId = 'account_tokens.get_token.0';
        $this->client->accountTokens->getToken(
            'token-uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'account_tokens.get_token.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/tokens/token-uuid",
            null,
            1
        );
    }

    /**
     */
    public function testRevokeToken(): void {
        $testId = 'account_tokens.revoke_token.0';
        $this->client->accountTokens->revokeToken(
            'token-uuid',
            [
                'headers' => [
                    'X-Test-Id' => 'account_tokens.revoke_token.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/account/tokens/token-uuid",
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

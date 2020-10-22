<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;
use Upcloud\ApiClient\Upcloud\AccountApi;

/**
 * AccountApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @internal
 */
class AccountApiTest extends TestCase
{
    /** Setup before running any test cases. */
    public $api;

    /**
     * Setup before running each test case.
     */
    protected function setUp(): void
    {
        $this->api = new AccountApi();
        $this->api->getConfig()->setUsername(\getenv('UPCLOUD_API_TEST_USER'));
        $this->api->getConfig()->setPassword(\getenv('UPCLOUD_API_TEST_PASSWORD'));
    }

    /**
     * Test case for getAccount.
     *
     * Account information.
     */
    public function testGetAccount()
    {
        $account = $this->api->getAccount()->getAccount();
        $this->assertEquals(\getenv('UPCLOUD_API_TEST_USER'), $account->getUsername());
        $this->assertArrayHasKey('credits', $account);
    }
}

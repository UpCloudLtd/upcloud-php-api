<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Account\Requests\GetMonthlyDetailedBillingSummaryRequest;
use Upcloud\Account\Requests\ListAccountsRequest;
use Upcloud\Account\Requests\GetAccountNetworkTopUsageRequest;
use DateTime;
use Upcloud\Account\Requests\GetAccountNetworkUsageRequest;
use Upcloud\Account\Requests\GetAccountResourceNetworkUsageRequest;
use Upcloud\Account\Requests\CreateSubaccountRequest;
use Upcloud\Account\Types\CreateSubaccountRequestSubAccount;
use Upcloud\Types\AccountBooleanYesno;
use Upcloud\Account\Types\CreateSubaccountRequestSubAccountRoles;
use Upcloud\Types\AccountLabel;
use Upcloud\Account\Types\CreateSubaccountRequestSubAccountIpFilters;

class AccountWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testDetails(): void {
        $testId = 'account.details.0';
        $this->client->account->details(
            [
                'headers' => [
                    'X-Test-Id' => 'account.details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account",
            null,
            1
        );
    }

    /**
     */
    public function testGetMonthlyDetailedBillingSummary(): void {
        $testId = 'account.get_monthly_detailed_billing_summary.0';
        $this->client->account->getMonthlyDetailedBillingSummary(
            'year',
            'month',
            new GetMonthlyDetailedBillingSummaryRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'account.get_monthly_detailed_billing_summary.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/billing/summary/year-month",
            null,
            1
        );
    }

    /**
     */
    public function testGetMonthlyBillingSummary(): void {
        $testId = 'account.get_monthly_billing_summary.0';
        $this->client->account->getMonthlyBillingSummary(
            'year',
            'month',
            [
                'headers' => [
                    'X-Test-Id' => 'account.get_monthly_billing_summary.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/billing_summary/year-month",
            null,
            1
        );
    }

    /**
     */
    public function testGetCurrentNetworkUsage(): void {
        $testId = 'account.get_current_network_usage.0';
        $this->client->account->getCurrentNetworkUsage(
            [
                'headers' => [
                    'X-Test-Id' => 'account.get_current_network_usage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/current_network_usage",
            null,
            1
        );
    }

    /**
     */
    public function testListAccounts(): void {
        $testId = 'account.list_accounts.0';
        $this->client->account->listAccounts(
            new ListAccountsRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'account.list_accounts.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/list",
            null,
            1
        );
    }

    /**
     */
    public function testCreateMslmaSigningLink(): void {
        $testId = 'account.create_mslma_signing_link.0';
        $this->client->account->createMslmaSigningLink(
            [
                'headers' => [
                    'X-Test-Id' => 'account.create_mslma_signing_link.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/account/ms_lma",
            null,
            1
        );
    }

    /**
     */
    public function testGetAccountNetworkTopUsage(): void {
        $testId = 'account.get_account_network_top_usage.0';
        $this->client->account->getAccountNetworkTopUsage(
            new GetAccountNetworkTopUsageRequest([
                'from' => new DateTime('2026-07-01T00:00:00Z'),
                'to' => new DateTime('2026-07-01T00:00:00Z'),
                'zone' => 'fi-hel1',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'account.get_account_network_top_usage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/network_top_usage",
            ['from' => '2026-07-01T00:00:00Z', 'to' => '2026-07-01T00:00:00Z', 'zone' => 'fi-hel1'],
            1
        );
    }

    /**
     */
    public function testGetAccountNetworkUsage(): void {
        $testId = 'account.get_account_network_usage.0';
        $this->client->account->getAccountNetworkUsage(
            new GetAccountNetworkUsageRequest([
                'from' => new DateTime('2026-07-01T00:00:00Z'),
                'to' => new DateTime('2026-07-01T00:00:00Z'),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'account.get_account_network_usage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/network_usage",
            ['from' => '2026-07-01T00:00:00Z', 'to' => '2026-07-01T00:00:00Z'],
            1
        );
    }

    /**
     */
    public function testGetAccountResourceUsage(): void {
        $testId = 'account.get_account_resource_usage.0';
        $this->client->account->getAccountResourceUsage(
            [
                'headers' => [
                    'X-Test-Id' => 'account.get_account_resource_usage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/resource-usage",
            null,
            1
        );
    }

    /**
     */
    public function testGetMonthlyResourceBillingSummary(): void {
        $testId = 'account.get_monthly_resource_billing_summary.0';
        $this->client->account->getMonthlyResourceBillingSummary(
            'resource_id',
            'year',
            'month',
            [
                'headers' => [
                    'X-Test-Id' => 'account.get_monthly_resource_billing_summary.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/resource_billing_summary/resource_id/year-month",
            null,
            1
        );
    }

    /**
     */
    public function testGetAccountResourceNetworkUsage(): void {
        $testId = 'account.get_account_resource_network_usage.0';
        $this->client->account->getAccountResourceNetworkUsage(
            new GetAccountResourceNetworkUsageRequest([
                'from' => new DateTime('2026-07-01T00:00:00Z'),
                'to' => new DateTime('2026-07-01T00:00:00Z'),
                'resourceId' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
                'zone' => 'fi-hel1',
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'account.get_account_resource_network_usage.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/account/resource_network_usage",
            ['from' => '2026-07-01T00:00:00Z', 'to' => '2026-07-01T00:00:00Z', 'resource_id' => '0414e0d7-4436-4037-9dd8-6eaf47dce599', 'zone' => 'fi-hel1'],
            1
        );
    }

    /**
     */
    public function testCreateSubaccount(): void {
        $testId = 'account.create_subaccount.0';
        $this->client->account->createSubaccount(
            new CreateSubaccountRequest([
                'subAccount' => new CreateSubaccountRequestSubAccount([
                    'username' => 'myusername',
                    'password' => 'mysecr3tPassword',
                    'firstName' => 'first',
                    'lastName' => 'last',
                    'company' => 'my company name',
                    'vatNumber' => 'my vat number',
                    'address' => 'my address',
                    'postalCode' => '00130',
                    'city' => 'Helsinki',
                    'state' => '',
                    'country' => 'FIN',
                    'email' => 'user@example.com',
                    'phone' => '+358.31245434',
                    'language' => 'en',
                    'currency' => 'EUR',
                    'timezone' => 'Europe/Helsinki',
                    'allowApi' => AccountBooleanYesno::Yes->value,
                    'allowGui' => AccountBooleanYesno::No->value,
                    'roles' => new CreateSubaccountRequestSubAccountRoles([
                        'role' => [
                            'technical',
                            'billing',
                            'aux_billing',
                        ],
                    ]),
                    'labels' => [
                        new AccountLabel([
                            'key' => 'department',
                            'value' => 'it',
                        ]),
                    ],
                    'ipFilters' => new CreateSubaccountRequestSubAccountIpFilters([
                        'ipFilter' => [
                            'ip_filter',
                        ],
                    ]),
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'account.create_subaccount.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/account/sub",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteSubaccount(): void {
        $testId = 'account.delete_subaccount.0';
        $this->client->account->deleteSubaccount(
            'username',
            [
                'headers' => [
                    'X-Test-Id' => 'account.delete_subaccount.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/account/sub/username",
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

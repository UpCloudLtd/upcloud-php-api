<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\IpAddress\Requests\AddIpAddressRequest;
use Upcloud\IpAddress\Types\AddIpAddressRequestIpAddress;
use Upcloud\Types\IpAddressIpFamily;
use Upcloud\IpAddress\Requests\BulkPatchIpAddressesRequestV13;
use Upcloud\IpAddress\Types\BulkPatchIpAddressesRequestV13IpAddressesItem;
use Upcloud\Types\IpAddressIpReleasePolicy;
use Upcloud\IpAddress\Requests\ModifyIpAddressRequestV10;
use Upcloud\IpAddress\Types\ModifyIpAddressRequestV10IpAddress;
use Upcloud\IpAddress\Requests\PatchIpAddressRequestV13;
use Upcloud\IpAddress\Types\PatchIpAddressRequestV13IpAddress;

class IpAddressWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListIpAddresses(): void {
        $testId = 'ip_address.list_ip_addresses.0';
        $this->client->ipAddress->listIpAddresses(
            [
                'headers' => [
                    'X-Test-Id' => 'ip_address.list_ip_addresses.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/ip_address",
            null,
            1
        );
    }

    /**
     */
    public function testAddIpAddress(): void {
        $testId = 'ip_address.add_ip_address.0';
        $this->client->ipAddress->addIpAddress(
            new AddIpAddressRequest([
                'ipAddress' => new AddIpAddressRequestIpAddress([
                    'access' => 'access',
                    'family' => IpAddressIpFamily::IPv4->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'ip_address.add_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/ip_address",
            null,
            1
        );
    }

    /**
     */
    public function testBulkModifyIpAddresses(): void {
        $testId = 'ip_address.bulk_modify_ip_addresses.0';
        $this->client->ipAddress->bulkModifyIpAddresses(
            new BulkPatchIpAddressesRequestV13([
                'ipAddresses' => [
                    new BulkPatchIpAddressesRequestV13IpAddressesItem([
                        'address' => 'address',
                        'mainAccountId' => 1000000,
                        'delegatedToAccountId' => 1000000,
                        'releasePolicy' => IpAddressIpReleasePolicy::Release->value,
                    ]),
                ],
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'ip_address.bulk_modify_ip_addresses.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/ip_address/bulk",
            null,
            1
        );
    }

    /**
     */
    public function testGetIpAddressDetails(): void {
        $testId = 'ip_address.get_ip_address_details.0';
        $this->client->ipAddress->getIpAddressDetails(
            'address',
            [
                'headers' => [
                    'X-Test-Id' => 'ip_address.get_ip_address_details.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/ip_address/address",
            null,
            1
        );
    }

    /**
     */
    public function testModifyIpAddress(): void {
        $testId = 'ip_address.modify_ip_address.0';
        $this->client->ipAddress->modifyIpAddress(
            'address',
            new ModifyIpAddressRequestV10([
                'ipAddress' => new ModifyIpAddressRequestV10IpAddress([
                    'ptrRecord' => 'host.example.com',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'ip_address.modify_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/ip_address/address",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteIpAddress(): void {
        $testId = 'ip_address.delete_ip_address.0';
        $this->client->ipAddress->deleteIpAddress(
            'address',
            [
                'headers' => [
                    'X-Test-Id' => 'ip_address.delete_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/ip_address/address",
            null,
            1
        );
    }

    /**
     */
    public function testPatchModifyIpAddress(): void {
        $testId = 'ip_address.patch_modify_ip_address.0';
        $this->client->ipAddress->patchModifyIpAddress(
            'address',
            new PatchIpAddressRequestV13([
                'ipAddress' => new PatchIpAddressRequestV13IpAddress([]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'ip_address.patch_modify_ip_address.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/ip_address/address",
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

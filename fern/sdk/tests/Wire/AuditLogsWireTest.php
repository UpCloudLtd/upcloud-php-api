<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\AuditLogs\Requests\ListAuditLogsRequest;
use DateTime;
use Upcloud\AuditLogs\Requests\ExportAuditLogsRequest;

class AuditLogsWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListAuditLogs(): void {
        $testId = 'audit_logs.list_audit_logs.0';
        $this->client->auditLogs->listAuditLogs(
            new ListAuditLogsRequest([
                'q' => 'my_account',
                'limit' => 50,
                'offset' => 0,
                'createdAfter' => new DateTime('2024-01-01T00:00:00Z'),
                'createdBefore' => new DateTime('2024-12-31T23:59:59Z'),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'audit_logs.list_audit_logs.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/audit-logs",
            ['q' => 'my_account', 'limit' => '50', 'offset' => '0', 'created_after' => '2024-01-01T00:00:00Z', 'created_before' => '2024-12-31T23:59:59Z'],
            1
        );
    }

    /**
     */
    public function testExportAuditLogs(): void {
        $testId = 'audit_logs.export_audit_logs.0';
        $this->client->auditLogs->exportAuditLogs(
            new ExportAuditLogsRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'audit_logs.export_audit_logs.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/audit-logs/export",
            null,
            1
        );
    }

    /**
     */
    public function testGetAuditLog(): void {
        $testId = 'audit_logs.get_audit_log.0';
        $this->client->auditLogs->getAuditLog(
            '01HQXYZ123456789ABCDEFGHJK',
            [
                'headers' => [
                    'X-Test-Id' => 'audit_logs.get_audit_log.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/audit-logs/01HQXYZ123456789ABCDEFGHJK",
            null,
            1
        );
    }

    /**
     */
    public function testGetFilterOptions(): void {
        $testId = 'audit_logs.get_filter_options.0';
        $this->client->auditLogs->getFilterOptions(
            [
                'headers' => [
                    'X-Test-Id' => 'audit_logs.get_filter_options.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/audit-logs/filter-options",
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

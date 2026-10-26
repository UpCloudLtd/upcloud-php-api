<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Types\Permission;
use Upcloud\Permission\Requests\GrantPermissionRequest;
use Upcloud\Permission\Requests\RevokeAllPermissionsByTargetRequest;

class PermissionWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListPermissions(): void {
        $testId = 'permission.list_permissions.0';
        $this->client->permission->listPermissions(
            [
                'headers' => [
                    'X-Test-Id' => 'permission.list_permissions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/permission",
            null,
            1
        );
    }

    /**
     */
    public function testReplacePermissions(): void {
        $testId = 'permission.replace_permissions.0';
        $this->client->permission->replacePermissions(
            new Permission([]),
            [
                'headers' => [
                    'X-Test-Id' => 'permission.replace_permissions.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/permission",
            null,
            1
        );
    }

    /**
     */
    public function testGrantPermission(): void {
        $testId = 'permission.grant_permission.0';
        $this->client->permission->grantPermission(
            new GrantPermissionRequest([
                'body' => new Permission([]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'permission.grant_permission.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/permission/grant",
            null,
            1
        );
    }

    /**
     */
    public function testRevokePermission(): void {
        $testId = 'permission.revoke_permission.0';
        $this->client->permission->revokePermission(
            new Permission([]),
            [
                'headers' => [
                    'X-Test-Id' => 'permission.revoke_permission.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/permission/revoke",
            null,
            1
        );
    }

    /**
     */
    public function testRevokeAllPermissionsByTarget(): void {
        $testId = 'permission.revoke_all_permissions_by_target.0';
        $this->client->permission->revokeAllPermissionsByTarget(
            'target_type',
            'target_identifier',
            new RevokeAllPermissionsByTargetRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'permission.revoke_all_permissions_by_target.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/permission/revoke-all-from-target/target_type/target_identifier",
            null,
            1
        );
    }

    /**
     */
    public function testRevokeAllPermissionsByUser(): void {
        $testId = 'permission.revoke_all_permissions_by_user.0';
        $this->client->permission->revokeAllPermissionsByUser(
            'user',
            [
                'headers' => [
                    'X-Test-Id' => 'permission.revoke_all_permissions_by_user.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/permission/revoke-all-from-user/user",
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

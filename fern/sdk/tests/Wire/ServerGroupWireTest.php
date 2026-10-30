<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\ServerGroup\Requests\ListServerGroupsRequest;
use Upcloud\Types\ServerGroupModify;
use Upcloud\Types\ServerGroupModifyServerGroup;
use Upcloud\Types\ServerGroupServers;
use Upcloud\Types\ServerGroupModifyServerGroupLabels;
use Upcloud\Types\ServerGroupLabel;
use Upcloud\Types\ServerGroupAntiAffinity;
use Upcloud\ServerGroup\Requests\ModifyServerGroupRequest;
use Upcloud\ServerGroup\Requests\ServerGroupServerAdd;
use Upcloud\ServerGroup\Types\ServerGroupServerAddServer;

class ServerGroupWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListServerGroups(): void {
        $testId = 'server_group.list_server_groups.0';
        $this->client->serverGroup->listServerGroups(
            new ListServerGroupsRequest([]),
            [
                'headers' => [
                    'X-Test-Id' => 'server_group.list_server_groups.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server-group",
            null,
            1
        );
    }

    /**
     */
    public function testCreateServerGroup(): void {
        $testId = 'server_group.create_server_group.0';
        $this->client->serverGroup->createServerGroup(
            new ServerGroupModify([
                'serverGroup' => new ServerGroupModifyServerGroup([
                    'title' => 'edge-cluster-a',
                    'servers' => new ServerGroupServers([
                        'servers' => [
                            '00fce2f9-f9f4-46ff-86af-9e60f131f5cb',
                        ],
                    ]),
                    'labels' => new ServerGroupModifyServerGroupLabels([
                        'label' => [
                            new ServerGroupLabel([
                                'key' => 'env',
                                'value' => 'prod',
                            ]),
                        ],
                    ]),
                    'antiAffinity' => ServerGroupAntiAffinity::Yes->value,
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server_group.create_server_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server-group",
            null,
            1
        );
    }

    /**
     */
    public function testGetServerGroup(): void {
        $testId = 'server_group.get_server_group.0';
        $this->client->serverGroup->getServerGroup(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server_group.get_server_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server-group/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteServerGroup(): void {
        $testId = 'server_group.delete_server_group.0';
        $this->client->serverGroup->deleteServerGroup(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server_group.delete_server_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/server-group/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testModifyServerGroup(): void {
        $testId = 'server_group.modify_server_group.0';
        $this->client->serverGroup->modifyServerGroup(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ModifyServerGroupRequest([
                'body' => new ServerGroupModify([
                    'serverGroup' => new ServerGroupModifyServerGroup([
                        'title' => 'edge-cluster-a',
                        'servers' => new ServerGroupServers([
                            'servers' => [
                                '00fce2f9-f9f4-46ff-86af-9e60f131f5cb',
                            ],
                        ]),
                        'labels' => new ServerGroupModifyServerGroupLabels([
                            'label' => [
                                new ServerGroupLabel([
                                    'key' => 'env',
                                    'value' => 'prod',
                                ]),
                            ],
                        ]),
                        'antiAffinity' => ServerGroupAntiAffinity::Yes->value,
                    ]),
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server_group.modify_server_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PATCH",
            "/1.3/server-group/0414e0d7-4436-4037-9dd8-6eaf47dce599",
            null,
            1
        );
    }

    /**
     */
    public function testListServerGroupMembers(): void {
        $testId = 'server_group.list_server_group_members.0';
        $this->client->serverGroup->listServerGroupMembers(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server_group.list_server_group_members.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/server-group/0414e0d7-4436-4037-9dd8-6eaf47dce599/servers",
            null,
            1
        );
    }

    /**
     */
    public function testAddServerToGroup(): void {
        $testId = 'server_group.add_server_to_group.0';
        $this->client->serverGroup->addServerToGroup(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            new ServerGroupServerAdd([
                'server' => new ServerGroupServerAddServer([
                    'uuid' => '0414e0d7-4436-4037-9dd8-6eaf47dce599',
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'server_group.add_server_to_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/server-group/0414e0d7-4436-4037-9dd8-6eaf47dce599/servers",
            null,
            1
        );
    }

    /**
     */
    public function testRemoveServerFromGroup(): void {
        $testId = 'server_group.remove_server_from_group.0';
        $this->client->serverGroup->removeServerFromGroup(
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            '0414e0d7-4436-4037-9dd8-6eaf47dce599',
            [
                'headers' => [
                    'X-Test-Id' => 'server_group.remove_server_from_group.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/server-group/0414e0d7-4436-4037-9dd8-6eaf47dce599/servers/0414e0d7-4436-4037-9dd8-6eaf47dce599",
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

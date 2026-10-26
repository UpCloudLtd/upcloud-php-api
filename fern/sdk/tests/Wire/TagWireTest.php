<?php

namespace Upcloud\Tests;

use Upcloud\Tests\Wire\WireMockTestCase;
use Upcloud\UpcloudClient;
use Upcloud\Types\Tag;
use Upcloud\Types\TagTag;
use Upcloud\Types\TagServers;
use Upcloud\Tag\Requests\ModifyTagRequest;

class TagWireTest extends WireMockTestCase
{
    /**
     * @var UpcloudClient $client
     */
    private UpcloudClient $client;

    /**
     */
    public function testListTags(): void {
        $testId = 'tag.list_tags.0';
        $this->client->tag->listTags(
            [
                'headers' => [
                    'X-Test-Id' => 'tag.list_tags.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/tag",
            null,
            1
        );
    }

    /**
     */
    public function testCreateTag(): void {
        $testId = 'tag.create_tag.0';
        $this->client->tag->createTag(
            new Tag([
                'tag' => new TagTag([
                    'description' => 'Production servers',
                    'name' => 'PROD',
                    'servers' => new TagServers([
                        'server' => [
                            '0077fa3d-32db-4b09-9f5f-30d9e9afb565',
                        ],
                    ]),
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'tag.create_tag.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "POST",
            "/1.3/tag",
            null,
            1
        );
    }

    /**
     */
    public function testGetTag(): void {
        $testId = 'tag.get_tag.0';
        $this->client->tag->getTag(
            'DEV',
            [
                'headers' => [
                    'X-Test-Id' => 'tag.get_tag.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "GET",
            "/1.3/tag/DEV",
            null,
            1
        );
    }

    /**
     */
    public function testModifyTag(): void {
        $testId = 'tag.modify_tag.0';
        $this->client->tag->modifyTag(
            'DEV',
            new ModifyTagRequest([
                'body' => new Tag([
                    'tag' => new TagTag([
                        'description' => 'Production servers',
                        'name' => 'PROD',
                        'servers' => new TagServers([
                            'server' => [
                                '0077fa3d-32db-4b09-9f5f-30d9e9afb565',
                            ],
                        ]),
                    ]),
                ]),
            ]),
            [
                'headers' => [
                    'X-Test-Id' => 'tag.modify_tag.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "PUT",
            "/1.3/tag/DEV",
            null,
            1
        );
    }

    /**
     */
    public function testDeleteTag(): void {
        $testId = 'tag.delete_tag.0';
        $this->client->tag->deleteTag(
            'DEV',
            [
                'headers' => [
                    'X-Test-Id' => 'tag.delete_tag.0',
                ],
            ],
        );
        $this->verifyRequestCount(
            $testId,
            "DELETE",
            "/1.3/tag/DEV",
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

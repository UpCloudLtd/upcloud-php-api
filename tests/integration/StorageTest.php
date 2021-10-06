<?php

namespace UpCloudTests;

use PHPUnit\Framework\TestCase;
use UpCloud\Tests\IntegrationUtils;
use UpCloud\ApiClient;

class StorageTest extends TestCase
{
  // static $cleanupStorages = [];

  /**
   * @var \UpCloud\ApiClient
   */
  protected $client;

  protected function setUp(): void
  {
    if (empty($this->client)) {
      $this->client = new ApiClient();
    }
  }

  public static function tearDownAfterClass(): void
  {
    // IntegrationUtils::deleteStorages($cleanupStorages);
  }

  /**
   * Test storage creation, modifying & deletion.
   */
  public function testStorageBasicOperations()
  {
    $storage = $this->client->createStorage([
      'size' => 10,
      'tier' => 'maxiops',
      'title' => 'php-integration-test-storage',
      'zone' => 'de-fra1',
    ]);

    $this->assertSame(10, $storage->size);
    $this->assertSame('de-fra1', $storage->zone);
    $this->assertSame('maxiops', $storage->tier);
    $this->assertSame('php-integration-test-storage', $storage->title);
    $this->assertSame('online', $storage->state);

    // modify the storage
    $modifiedStorage = $this->client->modifyStorage($storage->uuid, [
      'title' => 'php-integration-test-storage-modified'
    ]);
    $this->assertSame('php-integration-test-storage-modified', $modifiedStorage->title);

    // delete the storage
    $response = $this->client->deleteStorage($storage->uuid);
    print_r($response);
  }
}

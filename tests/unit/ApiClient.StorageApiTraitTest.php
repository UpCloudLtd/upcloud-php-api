<?php

use UpCloud\Tests\BaseCase;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Psr7\Response;

class ApiClientStorageApiTraitTest extends BaseCase
{
  public function testGetStorages(): void
  {
    $storagesJson = file_get_contents(__DIR__ . '/../json/getStorages.json');

    $this->mock->append(function ($request) use ($storagesJson) {
      $this->assertRequest($request, 'GET', "https://api.upcloud.test/1.3/storage", '');
      return new Response(200, [], $storagesJson);
    });

    $storages = $this->client->getStorages();
    $storage = $storages[0];

    $this->assertCount(15, $storages);
    $this->assertSame('private', $storage->access);
    $this->assertSame('Operating system disk', $storage->title);
    $this->assertSame('01eff7ad-168e-413e-83b0-054f6a28fa23', $storage->uuid);
    $this->assertSame('public', $storages[14]->access);
  }

  public function testGetStoragesPrivate(): void
  {
    $storagesJson = file_get_contents(__DIR__ . '/../json/getStorages.json');

    $this->mock->append(function ($request) use ($storagesJson) {
      $this->assertRequest($request, 'GET', "https://api.upcloud.test/1.3/storage/private", '');
      return new Response(200, [], $storagesJson);
    });

    $this->client->getStorages('private');
  }

  public function testGetPublicTemplates(): void
  {
    $templatesJson = file_get_contents(__DIR__ . '/../json/publicTemplates.json');

    $this->mock->append(function ($request) use ($templatesJson) {
      $this->assertRequest($request, 'GET', "https://api.upcloud.test/1.3/storage/public", '');
      return new Response(200, [], $templatesJson);
    });

    $this->client->getPublicTemplates();
  }

  public function testGetStoragesByType(): void
  {
    $getStoragesJson = file_get_contents(__DIR__ . '/../json/getStorages.json');

    $this->mock->append(function ($request) use ($getStoragesJson) {
      $this->assertRequest($request, 'GET', "https://api.upcloud.test/1.3/storage/normal", '');
      return new Response(200, [], $getStoragesJson);
    });

    $this->client->getStoragesByType('normal');
  }

  public function testGetStorageDetails(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';
    $storageJson = file_get_contents(__DIR__ . '/../json/getStorage.json');

    $this->mock->append(function ($request) use ($uuid, $storageJson) {
      $this->assertRequest($request, 'GET', "https://api.upcloud.test/1.3/storage/$uuid", '');
      return new Response(200, [], $storageJson);
    });

    $response = $this->client->getStorage($uuid);

    $this->assertSame('Operating system disk', $response->title);
    $this->assertSame($uuid, $response->uuid);
  }

  public function testCreateStorage(): void
  {
    $storageDetails = [
      'size' => 10,
      'tier' => 'maxiops',
      'title' => 'new-storage',
      'zone' => 'fi-hel1',
    ];

    $this->mock->append(function ($request) use ($storageDetails) {
      $this->assertRequest(
        $request,
        'POST',
        'https://api.upcloud.test/1.3/storage',
        json_encode(['storage' => $storageDetails]),
      );

      return new Response(
        201,
        [],
        json_encode([
          'storage' => array_merge(['uuid' => '012426363573'], $storageDetails)
        ])
      );
    });

    $response = $this->client->createStorage($storageDetails);

    // assert that we got some data
    $this->assertSame($storageDetails['tier'], $response->tier);
  }

  public function testDeleteStorage(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest($request, 'DELETE', "https://api.upcloud.test/1.3/storage/$uuid", '');
      return new Response(204, [], '');
    });

    $this->client->deleteStorage($uuid);
  }

  public function testDeleteStorageAndBackups(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest($request, 'DELETE', "https://api.upcloud.test/1.3/storage/$uuid?backups=delete", '');
      return new Response(204, [], '');
    });

    $this->client->deleteStorage($uuid, ['backups' => 'delete']);
  }

  public function testModifyStorage(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'PUT',
        "https://api.upcloud.test/1.3/storage/$uuid",
        json_encode(['storage' => ['title' => 'modified']])
      );
      return new Response(202, [], json_encode(['storage' => ['title' => 'modified', 'uuid' => $uuid]]));
    });

    $response = $this->client->modifyStorage($uuid, ['title' => 'modified']);

    // assert that we got some data
    $this->assertSame($uuid, $response->uuid);
  }

  public function testCreateStorageImport(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/storage/$uuid/import",
        json_encode(['storage_import' => [
          'source' => 'http_import',
          'source_location' => 'https://example.com/disk.iso'
        ]])
      );
      return new Response(201, [], json_encode(['storage_import' => ['state' => 'prepared']]));
    });

    $response = $this->client->createStorageImportFromUrl($uuid, 'https://example.com/disk.iso');

    // assert that we got some data
    $this->assertSame('prepared', $response->state);
  }

  public function testCreateStorageImportUpload(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/storage/$uuid/import",
        json_encode(['storage_import' => [
          'source' => 'direct_upload',
        ]])
      );
      return new Response(201, [], json_encode(['storage_import' => ['state' => 'prepared']]));
    });

    $response = $this->client->createStorageImportUpload($uuid);

    // assert that we got some data
    $this->assertSame('prepared', $response->state);
  }

  public function testUploadToStorageImport(): void
  {
    $url = 'https://api.upcloud.test/fakeimport';
    $file = Utils::tryFopen(__FILE__, 'r');

    $this->mock->append(function ($request) use ($url, $file) {
      $this->assertSame('PUT', $request->getMethod());
      $this->assertSame($url, strval($request->getUri()));
      $this->assertEquals(
        file_get_contents(__FILE__),
        $request->getBody()->getContents()
      );

      return new Response(204, [], json_encode(['written_bytes' => '1']));
    });

    $response = $this->client->uploadToStorageImport($url, $file);

    // assert that we got some data
    $this->assertSame('1', $response->written_bytes);
  }
  public function testGetStorageImportDetails(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'GET',
        "https://api.upcloud.test/1.3/storage/$uuid/import",
        ''
      );
      return new Response(201, [], json_encode(['storage_import' => ['state' => 'prepared']]));
    });

    $response = $this->client->getStorageImportDetails($uuid);

    // assert that we got some data
    $this->assertSame('prepared', $response->state);
  }

  public function testCancelStorageImport(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/storage/$uuid/import/cancel",
        ''
      );
      return new Response(202, [], json_encode(['storage_import' => ['state' => 'cancelling']]));
    });

    $response = $this->client->cancelStorageImport($uuid);

    // assert that we got some data
    $this->assertSame('cancelling', $response->state);
  }

  public function testCloneStorage(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/storage/$uuid/clone",
        json_encode(['storage' => [
          'tier' => 'maxiops',
          'title' => 'Clone of storage',
          'zone' => 'fi-hel1',
        ]])
      );
      return new Response(201, [], json_encode(['storage' => ['state' => 'maintenance']]));
    });

    $response = $this->client->cloneStorage($uuid, [
      'tier' => 'maxiops',
      'title' => 'Clone of storage',
      'zone' => 'fi-hel1',
    ]);

    // assert that we got some data
    $this->assertSame('maintenance', $response->state);
  }

  public function testTemplatizeStorage(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/storage/$uuid/templatize",
        json_encode(['storage' => ['title' => 'Server Template']])
      );
      return new Response(201, [], json_encode(['storage' => ['state' => 'maintenance']]));
    });

    $response = $this->client->templatizeStorage($uuid, [
      'title' => 'Server Template',
    ]);

    // assert that we got some data
    $this->assertSame('maintenance', $response->state);
  }

  public function testCreateBackup(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/storage/$uuid/backup",
        json_encode(['storage' => ['title' => 'Manual backup']])
      );
      return new Response(201, [], json_encode(['storage' => ['state' => 'maintenance']]));
    });

    $response = $this->client->createBackup($uuid, [
      'title' => 'Manual backup',
    ]);

    // assert that we got some data
    $this->assertSame('maintenance', $response->state);
  }

  public function testRestoreBackup(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/storage/$uuid/restore",
        ''
      );
      return new Response(204, [], '');
    });

    $this->client->restoreBackup($uuid);
  }

  public function testCancelStorageOperation(): void
  {
    $uuid = '01d4fcd4-e446-433b-8a9c-551a1284952e';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/storage/$uuid/cancel",
        ''
      );
      return new Response(204, [], '');
    });

    $this->client->cancelStorageOperation($uuid);
  }
}

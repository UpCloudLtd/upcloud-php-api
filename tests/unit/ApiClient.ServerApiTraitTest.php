<?php

use UpCloud\Tests\BaseCase;
use GuzzleHttp\Psr7\Response;

class ApiClientServerApiTraitTest extends BaseCase
{
  public function testGetServerDetails(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertRequest($request, 'GET', "https://api.upcloud.test/1.3/server/$uuid", '');
      return new Response(200, [], $serverJson);
    });

    $server = $this->client->getServerDetails($uuid);

    $this->assertEquals('debian-1cpu-1gb-fi-hel1', $server->hostname);
    $this->assertEquals('debian-1cpu-1gb-fi-hel1', $server->title);
    $this->assertEquals('1xCPU-1GB', $server->plan);
  }

  public function testGetServers(): void
  {
    $serversJson = file_get_contents(__DIR__ . '/../json/getServers.json');

    $this->mock->append(function ($request) use ($serversJson) {
      $this->assertRequest($request, 'GET', "https://api.upcloud.test/1.3/server", '');
      return new Response(200, [], $serversJson);
    });

    $servers = $this->client->getServers();

    $serverTitleMap = function ($server) {
      return $server->title;
    };
    $this->assertEquals(
      ['debian-1cpu-1gb-fi-hel1', 'test server 1', 'test server 2'],
      array_map($serverTitleMap, $servers)
    );
  }

  public function testDeleteServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest($request, 'DELETE', "https://api.upcloud.test/1.3/server/$uuid", '');
      return new Response(204, [], '');
    });

    $this->client->deleteServer($uuid);
  }

  public function testDeleteServerWithStoragesAndBackups(): void
  {
    $uuid = '002f8ee8-d826-4597-999d-68b7ba623a4a';

    $this->mock->append(function ($request) use ($uuid) {
      $this->assertRequest(
        $request,
        'DELETE',
        "https://api.upcloud.test/1.3/server/$uuid?storages=1&backups=delete",
        '',
      );
      return new Response(204, [], '');
    });

    $this->client->deleteServer($uuid, ['storages' => 1, 'backups' => 'delete']);
  }

  public function testModifyServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/modifyServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertRequest(
        $request,
        'PUT',
        "https://api.upcloud.test/1.3/server/$uuid",
        json_encode(['server' => ['title' => 'modified title']])
      );
      return new Response(200, [], $serverJson);
    });

    $response = $this->client->modifyServer($uuid, ['title' => 'modified title']);

    $this->assertEquals('modified title', $response->title);
  }

  public function testStartServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertRequest($request, 'POST', "https://api.upcloud.test/1.3/server/$uuid/start", '');
      return new Response(200, [], $serverJson);
    });

    $this->client->startServer($uuid);
  }

  public function testStartServerAvoidHost(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertSame('{"server":{"avoid_host":13245662}}', strval($request->getBody()));
      return new Response(200, [], $serverJson);
    });

    $this->client->startServer($uuid, ['avoid_host' => 13245662]);
  }

  public function testStartServerAsync(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertSame('{"server":{"start_type":"async"}}', strval($request->getBody()));
      return new Response(200, [], $serverJson);
    });

    $this->client->startServer($uuid, ['start_type' => 'async']);
  }

  public function testStopServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/server/$uuid/stop",
        ''
      );
      return new Response(200, [], $serverJson);
    });

    $this->client->stopServer($uuid);
  }

  public function testStopServerHardAndTimeout(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/server/$uuid/stop",
        '{"stop_server":{"stop_type":"hard","timeout":60}}'
      );
      return new Response(200, [], $serverJson);
    });

    $this->client->stopServer($uuid, ['stop_type' => 'hard', 'timeout' => 60]);
  }

  public function testRestartServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertRequest($request, 'POST', "https://api.upcloud.test/1.3/server/$uuid/restart", '');
      return new Response(200, [], $serverJson);
    });

    $this->client->restartServer($uuid);
  }

  public function testRestartServerHardAndTimeout(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');

    $this->mock->append(function ($request) use ($uuid, $serverJson) {
      $this->assertRequest(
        $request,
        'POST',
        "https://api.upcloud.test/1.3/server/$uuid/restart",
        json_encode(['restart_server' => ['stop_type' => 'soft', 'timeout' => 60, 'timeout_action' => 'destroy']])
      );
      return new Response(200, [], $serverJson);
    });

    $this->client->restartServer($uuid, ['stop_type' => 'soft', 'timeout' => 60, 'timeout_action' => 'destroy']);
  }
}

<?php

use UpCloud\Tests\BaseCase;
use GuzzleHttp\Psr7\Response;

class ApiClientServerTraitTest extends BaseCase
{
  public function testGetServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');
    $this->mock->append(new Response(201, [], $serverJson));

    $server = $this->client->getServer($uuid);

    $this->assertEquals('debian-1cpu-1gb-fi-hel1', $server->hostname);
    $this->assertEquals('debian-1cpu-1gb-fi-hel1', $server->title);
    $this->assertEquals('1xCPU-1GB', $server->plan);
  }

  public function testGetServers(): void
  {
    $serversJson = file_get_contents(__DIR__ . '/../json/getServers.json');
    $this->mock->append(new Response(201, [], $serversJson));

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
    $this->mock->append(new Response(204, [], ''));

    $this->client->deleteServer($uuid);

    $this->assertEquals(count($this->container), 1);

    $this->assertEquals(
      $this->container[0]['request']->getUri(),
      "https://api.upcloud.test/1.3/server/$uuid"
    );

    $this->assertEquals(
      $this->container[0]['request']->getMethod(),
      'DELETE'
    );
  }

  public function testDeleteServerWithStoragesAndBackups(): void
  {
    $uuid = '002f8ee8-d826-4597-999d-68b7ba623a4a';
    $this->mock->append(new Response(204, [], ''));

    $this->client->deleteServer($uuid, ['storages' => 1, 'backups' => 'delete']);

    $this->assertEquals(
      $this->container[0]['request']->getUri(),
      "https://api.upcloud.test/1.3/server/$uuid?storages=1&backups=delete"
    );
  }

  public function testModifyServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/modifyServer.json');

    $this->mock->append(new Response(204, [], $serverJson));

    $response = $this->client->modifyServer($uuid, ['title' => 'modified title']);

    $this->assertEquals($this->container[0]['request']->getMethod(), 'PUT');

    $this->assertEquals(
      $response->title,
      'modified title'
    );
  }

  public function testStartServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');
    $this->mock->append(new Response(204, [], $serverJson));

    $this->client->startServer($uuid);

    $this->assertEquals($this->container[0]['request']->getMethod(), 'POST');

    $this->assertEquals(
      $this->container[0]['request']->getUri(),
      "https://api.upcloud.test/1.3/server/$uuid/start"
    );
  }

  public function testStartServerAvoidHost(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');
    $this->mock->append(new Response(204, [], $serverJson));

    $this->client->startServer($uuid, ['avoid_host' => 13245662]);

    $this->assertEquals(
      $this->container[0]['request']->getBody(),
      '{"server":{"avoid_host":13245662}}'
    );
  }

  public function testStartServerAsync(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');
    $this->mock->append(new Response(204, [], $serverJson));

    $this->client->startServer($uuid, ['start_type' => 'async']);

    $this->assertEquals(
      $this->container[0]['request']->getBody(),
      '{"server":{"start_type":"async"}}'
    );
  }

  public function testStopServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');
    $this->mock->append(new Response(204, [], $serverJson));

    $this->client->stopServer($uuid);

    $this->assertEquals($this->container[0]['request']->getMethod(), 'POST');

    $this->assertEquals(
      $this->container[0]['request']->getUri(),
      "https://api.upcloud.test/1.3/server/$uuid/stop"
    );
  }

  public function testStopServerHardAndTimeout(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');
    $this->mock->append(new Response(204, [], $serverJson));

    $this->client->stopServer($uuid, ['stop_type' => 'hard', 'timeout' => 60]);

    $this->assertEquals($this->container[0]['request']->getMethod(), 'POST');

    $this->assertEquals(
      $this->container[0]['request']->getUri(),
      "https://api.upcloud.test/1.3/server/$uuid/stop"
    );

    $this->assertEquals(
      $this->container[0]['request']->getBody(),
      '{"stop_server":{"stop_type":"hard","timeout":60}}'
    );
  }

  public function testRestartServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');
    $this->mock->append(new Response(204, [], $serverJson));

    $this->client->restartServer($uuid);

    $this->assertEquals($this->container[0]['request']->getMethod(), 'POST');

    $this->assertEquals(
      $this->container[0]['request']->getUri(),
      "https://api.upcloud.test/1.3/server/$uuid/restart"
    );
  }

  public function testRestartServerHardAndTimeout(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/../json/getServer.json');
    $this->mock->append(new Response(204, [], $serverJson));

    $this->client->restartServer($uuid, ['stop_type' => 'soft', 'timeout' => 60, 'timeout_action' => 'destroy']);

    $this->assertEquals($this->container[0]['request']->getMethod(), 'POST');

    $this->assertEquals(
      $this->container[0]['request']->getUri(),
      "https://api.upcloud.test/1.3/server/$uuid/restart"
    );

    $this->assertEquals(
      $this->container[0]['request']->getBody(),
      '{"restart_server":{"stop_type":"soft","timeout":60,"timeout_action":"destroy"}}'
    );
  }
}

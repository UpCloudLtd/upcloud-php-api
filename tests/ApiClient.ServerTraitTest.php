<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use UpCloud\ApiClient;
use UpCloud\HttpClient;

class ApiClientServerTraitTest extends TestCase
{
  private $client;

  private $mock;

  protected function setUp(): void
  {
    $this->mock = new MockHandler();

    if (getenv('NO_HTTP_MOCK') === '1') {
      // do not use HTTP mock, use the actual API
      $this->client = new ApiClient();
      return;
    }

    $httpClient = new HttpClient([
      'apiRoot' => 'http://localhost:6544',
      'handler' => HandlerStack::create($this->mock),
      'password' => getenv('UPCLOUD_PASSWORD'),
      'username' => getenv('UPCLOUD_USERNAME'),
    ]);

    $this->client = new ApiClient([
      'client' => $httpClient,
    ]);
  }

  public function testGetServer(): void
  {
    $uuid = '000f8ee8-d826-4597-999d-68b7ba623a4a';
    $serverJson = file_get_contents(__DIR__ . '/json/getServer.json');
    $this->mock->append(new Response(201, [], $serverJson));

    $server = $this->client->getServer($uuid);

    $this->assertEquals('debian-1cpu-1gb-fi-hel1', $server->hostname);
    $this->assertEquals('debian-1cpu-1gb-fi-hel1', $server->title);
    $this->assertEquals('1xCPU-1GB', $server->plan);
  }

  public function testGetServers(): void
  {
    $serversJson = file_get_contents(__DIR__ . '/json/getServers.json');
    $this->mock->append(new Response(201, [], $serversJson));

    $servers = $this->client->getServers();

    $serverTitleMap = function($server) { return $server->title; };
    $this->assertEquals(
      ['debian-1cpu-1gb-fi-hel1', 'test server 1', 'test server 2'],
      array_map($serverTitleMap, $servers)
    );
  }
}

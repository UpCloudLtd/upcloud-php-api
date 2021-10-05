<?php

namespace UpCloud\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use UpCloud\ApiClient;
use UpCloud\HttpClient;

abstract class BaseCase extends \PHPUnit\Framework\TestCase
{
  /**
   * @var \UpCloud\ApiClient
   */
  protected $client;

  /**
   * @var \UpCloud\HttpClient
   */
  protected $httpClient;

  /**
   * @var \GuzzleHttp\Handler\MockHandler
   */
  protected $mock;

  protected function setUp(): void
  {
    $this->mock = new MockHandler();

    if (getenv('NO_HTTP_MOCK') === '1') {
      // do not use HTTP mock, use the actual API
      $this->client = new ApiClient();
      return;
    }

    $this->container = [];
    $history = Middleware::history($this->container);
    $handlerStack = HandlerStack::create($this->mock);
    $handlerStack->push($history);

    $this->httpClient = new HttpClient([
      'apiRoot' => 'https://api.upcloud.test/1.3/',
      'handler' => $handlerStack,
      'password' => getenv('UPCLOUD_PASSWORD'),
      'username' => getenv('UPCLOUD_USERNAME'),
    ]);

    $this->client = new ApiClient([
      'client' => $this->httpClient,
    ]);
  }

  /**
   * Helper utility to assert the request.
   */
  protected function assertRequest($request, string $method, string $uri, $body)
  {
    $this->assertSame($method, $request->getMethod());
    $this->assertSame($uri, strval($request->getUri()));
    $this->assertSame($body, strval($request->getBody()));
  }
}

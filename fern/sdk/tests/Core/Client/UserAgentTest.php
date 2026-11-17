<?php

namespace Upcloud\Tests\Core\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Upcloud\Core\Client\HttpMethod;
use Upcloud\Core\Client\RawClient;
use Upcloud\Core\Json\JsonApiRequest;
use Upcloud\UpcloudClient;

class UserAgentTest extends TestCase
{
    public function testDefaultUserAgentIsAValidProductToken(): void
    {
        $request = $this->sendSdkRequest();

        $userAgents = $request->getHeader('User-Agent');
        $this->assertCount(1, $userAgents);
        $this->assertMatchesRegularExpression(
            '/^upcloud-php-api\/[A-Za-z0-9][A-Za-z0-9.+_-]*$/D',
            $userAgents[0],
        );
    }

    public function testUserAgentOverrideIsCaseInsensitive(): void
    {
        $request = $this->sendSdkRequest(['user-agent' => 'myapp/1.0']);

        $this->assertSame(['myapp/1.0'], $request->getHeader('User-Agent'));
    }

    /**
     * @param array<string, string> $headers
     */
    private function sendSdkRequest(array $headers = []): RequestInterface
    {
        $mockHandler = new MockHandler([new Response(200)]);
        $httpClient = new Client(['handler' => HandlerStack::create($mockHandler)]);
        $sdk = new UpcloudClient('test-token', ['client' => $httpClient, 'headers' => $headers]);
        $rawClientProperty = new \ReflectionProperty(UpcloudClient::class, 'client');
        $rawClient = $rawClientProperty->getValue($sdk);
        $this->assertInstanceOf(RawClient::class, $rawClient);

        $rawClient->sendRequest(new JsonApiRequest(
            'https://api.example.com',
            '/test',
            HttpMethod::GET,
        ));

        $request = $mockHandler->getLastRequest();
        $this->assertInstanceOf(RequestInterface::class, $request);
        return $request;
    }
}

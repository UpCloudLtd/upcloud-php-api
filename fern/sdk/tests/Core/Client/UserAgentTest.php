<?php

namespace Upcloud\Tests\Core\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Upcloud\UpcloudClient;

class UserAgentTest extends TestCase
{
    private MockHandler $mockHandler;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler([new Response(200)]);
    }

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

    /**
     * @dataProvider userAgentHeaderNames
     */
    public function testApplicationUserAgentIsAppendedCaseInsensitively(string $name): void
    {
        $request = $this->sendSdkRequest([$name => 'myapp/1.0']);

        $userAgents = $request->getHeader('User-Agent');
        $this->assertCount(1, $userAgents);
        $this->assertStringStartsWith('upcloud-php-api/', $userAgents[0]);
        $this->assertStringEndsWith(' myapp/1.0', $userAgents[0]);
        $this->assertMatchesRegularExpression(
            '/^upcloud-php-api\/[A-Za-z0-9][A-Za-z0-9.+_-]* myapp\/1\.0$/D',
            $userAgents[0],
        );
    }

    /**
     * @return array<string, array{string}>
     */
    public static function userAgentHeaderNames(): array
    {
        return [
            'canonical' => ['User-Agent'],
            'lowercase' => ['user-agent'],
            'mixed case' => ['uSeR-aGeNt'],
        ];
    }

    /**
     * @dataProvider blankUserAgents
     */
    public function testBlankApplicationUserAgentLeavesDefaultUnchanged(string $value): void
    {
        $request = $this->sendSdkRequest(['User-Agent' => $value]);

        $userAgents = $request->getHeader('User-Agent');
        $this->assertCount(1, $userAgents);
        $this->assertMatchesRegularExpression(
            '/^upcloud-php-api\/[A-Za-z0-9][A-Za-z0-9.+_-]*$/D',
            $userAgents[0],
        );
    }

    /**
     * @return array<string, array{string}>
     */
    public static function blankUserAgents(): array
    {
        return [
            'empty' => [''],
            'spaces' => ['   '],
            'spaces and tabs' => [" \t "],
        ];
    }

    public function testApplicationUserAgentTrimsOnlySurroundingSpacesAndTabs(): void
    {
        $request = $this->sendSdkRequest(['User-Agent' => " \tmyapp/1.0 plugin/2.0\t "]);

        $userAgents = $request->getHeader('User-Agent');
        $this->assertCount(1, $userAgents);
        $this->assertStringStartsWith('upcloud-php-api/', $userAgents[0]);
        $this->assertStringEndsWith(' myapp/1.0 plugin/2.0', $userAgents[0]);
    }

    public function testLastApplicationUserAgentWinsWithoutDuplicateHeaderValues(): void
    {
        $request = $this->sendSdkRequest([
            'User-Agent' => 'first/1.0',
            'user-agent' => 'last/2.0',
        ]);

        $userAgents = $request->getHeader('User-Agent');
        $this->assertCount(1, $userAgents);
        $this->assertStringEndsWith(' last/2.0', $userAgents[0]);
        $this->assertStringNotContainsString('first/1.0', $userAgents[0]);
    }

    public function testPerOperationUserAgentCanOverrideConstructorDefault(): void
    {
        $request = $this->sendSdkRequest(
            ['User-Agent' => 'myapp/1.0'],
            ['User-Agent' => 'one-off/2.0'],
        );

        $this->assertSame(['one-off/2.0'], $request->getHeader('User-Agent'));
    }

    public function testOtherHeadersArePreserved(): void
    {
        $request = $this->sendSdkRequest(['User-Agent' => 'myapp/1.0', 'X-Custom' => 'value']);

        $this->assertSame('value', $request->getHeaderLine('X-Custom'));
        $this->assertSame('Upcloud', $request->getHeaderLine('X-Fern-SDK-Name'));
    }

    /**
     * @dataProvider invalidUserAgents
     */
    public function testInvalidApplicationUserAgentIsRejectedBeforeSending(string $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('is not valid header value.');

        try {
            $this->sendSdkRequest(['User-Agent' => $value]);
        } finally {
            $this->assertNull($this->mockHandler->getLastRequest());
        }
    }

    /**
     * @return array<string, array{string}>
     */
    public static function invalidUserAgents(): array
    {
        return [
            'embedded CR' => ["myapp/1.0\rX-Other: value"],
            'embedded LF' => ["myapp/1.0\nX-Other: value"],
            'embedded CRLF' => ["myapp/1.0\r\nX-Other: value"],
            'leading CRLF' => ["\r\nmyapp/1.0"],
            'trailing CRLF' => ["myapp/1.0\r\n"],
            'only CRLF' => ["\r\n"],
        ];
    }

    /**
     * @param array<string, string> $headers
     * @param array<string, string> $requestHeaders
     */
    private function sendSdkRequest(array $headers = [], array $requestHeaders = []): RequestInterface
    {
        $httpClient = new Client(['handler' => HandlerStack::create($this->mockHandler)]);
        $sdk = new UpcloudClient('test-token', [
            'baseUrl' => 'https://api.example.test',
            'client' => $httpClient,
            'headers' => $headers,
        ]);
        $sdk->ipAddress->deleteIpAddress('192.0.2.10', ['headers' => $requestHeaders]);

        $request = $this->mockHandler->getLastRequest();
        $this->assertInstanceOf(RequestInterface::class, $request);
        return $request;
    }
}

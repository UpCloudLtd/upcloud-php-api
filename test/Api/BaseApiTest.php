<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;

abstract class BaseApiTest extends TestCase
{
    protected $url = 'https://api.upcloud.com/1.3';

    protected $testUsername = "test";
    protected $testPassword = "123456";

    protected $fakeRawRedirectHeader = "HTTP/1.1 302 Found
        Content-Type: text/html; charset=utf-8
        Location: https://foobar.com/\r\n\r\n";

    protected $fakeRawProxyHeader = "HTTP/1.0 200 Connection established\r\n\r\n";

    protected $fakeRawBody = "{\"account\":{\"credits\":\"42292.682\",\"username\":\"test\"}}";

    protected $fakeHeadersAsArray = [
        'Etag' => '"9d86b21aa74d74e574bbb35ba13524a52deb96e3"',
        'Content-Type' => 'application/json; charset=UTF-8',
        'Pragma' => 'no-cache',
        'Expires' => 'Sat, 01 Jan 2020 00:00:00 GMT',
        'Connection' => 'close',
        'Date' => 'Mon, 19 Oct 2020 18:37:17 GMT',
        'Content-Length' => '127',
        'Cache-Control' => 'private, no-cache, no-store, must-revalidate',
        'Access-Control-Allow-Origin' => '*',
    ];

    protected $fakeResponseHeadersAsArray = [
        'Date' => 'Mon, 19 Oct 2020 18:37:17 GMT',
        'Server' => 'Apache',
        'Content-Length' => '127',
        'Content-Type' => 'application/json; charset=UTF-8',
        'Strict-Transport-Security' => ['max-age=63072000']
    ];
}

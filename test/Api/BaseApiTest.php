<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api;

use PHPUnit\Framework\TestCase;

abstract class BaseApiTest extends TestCase
{
    protected $url = 'https://api.upcloud.com/1.3';

    protected $serverId = '00f25527-c3d9-470b-a2a1-d3670e0c3cdf';

    protected $testUsername = "test";
    protected $testPassword = "123456";

    protected $fakeRawRedirectHeader = "HTTP/1.1 302 Found
        Content-Type: text/html; charset=utf-8
        Location: https://foobar.com/\r\n\r\n";

    protected $fakeRawProxyHeader = "HTTP/1.0 200 Connection established\r\n\r\n";

    protected $fakeRawBody = "{
        \"account\":{
            \"credits\": 42292.682,
            \"username\": \"test\",
            \"resource_limits\": {
                \"cores\": 200,
                \"detached_floating_ips\": 10,
                \"memory\": 1048576,
                \"networks\": 100,
                \"public_ipv4\": 100,
                \"public_ipv6\": 100,
                \"storage_hdd\": 10240,
                \"storage_ssd\": 10240
            }
        }
    }";

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

    protected $isNoCredentials = false;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->isNoCredentials = \getenv('UPCLOUD_API_TEST_NO_CREDENTIALS');
    }

    protected function getUsername()
    {
        return \getenv('UPCLOUD_API_TEST_USER') && !$this->isNoCredentials
            ? \getenv('UPCLOUD_API_TEST_USER')
            : 'test';
    }

    protected function getPassword()
    {
        return \getenv('UPCLOUD_API_TEST_PASSWORD') && !$this->isNoCredentials
            ? \getenv('UPCLOUD_API_TEST_PASSWORD')
            : '';
    }

    protected function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

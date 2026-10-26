<?php

declare(strict_types=1);

require dirname(__DIR__, 2) . '/fern/sdk/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Upcloud\Exceptions\UpcloudApiException;
use Upcloud\Storage\Requests\GetStorageListRequest;
use Upcloud\Tag\Requests\ModifyTagRequest;
use Upcloud\Types\Tag;
use Upcloud\Types\TagServers;
use Upcloud\Types\TagTag;
use Upcloud\UpcloudClient;

function fail_test(string $message): never
{
    throw new RuntimeException($message);
}

function assert_test(bool $condition, string $message): void
{
    if (!$condition) {
        fail_test($message);
    }
}

function mock_client(MockHandler $mockHandler): UpcloudClient
{
    $handler = HandlerStack::create($mockHandler);
    return new UpcloudClient(
        token: 'smoke-test-token',
        options: [
            'baseUrl' => 'https://api.example.test',
            'client' => new Client(['handler' => $handler]),
        ],
    );
}

$mockHandler = new MockHandler();
$client = mock_client($mockHandler);

$mockHandler->append(new Response(200, [], json_encode(['storages' => ['storage' => []]], JSON_THROW_ON_ERROR)));
$client->storage->getStorageList(new GetStorageListRequest([
    'label' => 'team name',
    'search' => 'ubuntu/24',
    'sortBy' => 'created',
    'orderBy' => 'desc',
    'limit' => 10,
    'offset' => 20,
]));

$request = $mockHandler->getLastRequest();
assert_test($request->getMethod() === 'GET', 'Expected GET request for storage list');
assert_test(
    (string)$request->getUri() === 'https://api.example.test/1.3/storage?label=team+name&search=ubuntu%2F24&sort_by=created&order_by=desc&limit=10&offset=20',
    'Storage list request did not encode path and query parameters as expected: ' . $request->getUri(),
);
assert_test($request->getHeaderLine('Authorization') === 'Bearer smoke-test-token', 'Bearer authentication header is missing');

$mockHandler->append(new Response(200, [], json_encode(['tag' => [
    'name' => 'production',
    'description' => 'Production servers',
    'servers' => [],
]], JSON_THROW_ON_ERROR)));
$client->tag->modifyTag(
    'production',
    new ModifyTagRequest([
        'body' => new Tag([
            'tag' => new TagTag([
                'name' => 'production',
                'description' => 'Production servers',
                'servers' => new TagServers(),
            ]),
        ]),
    ]),
);

$request = $mockHandler->getLastRequest();
assert_test($request->getMethod() === 'PUT', 'Expected PUT request for tag modification');
assert_test((string)$request->getUri() === 'https://api.example.test/1.3/tag/production', 'Tag request path is incorrect');
assert_test(
    (string)$request->getBody() === '{"tag":{"description":"Production servers","name":"production","servers":[]}}',
    'Tag request body is incorrect: ' . $request->getBody(),
);

$mockHandler->append(new Response(404, [], '{"error":"missing"}'));
try {
    $client->ipAddress->deleteIpAddress('192.0.2.10');
    fail_test('Expected a 404 response to throw UpcloudApiException');
} catch (UpcloudApiException $exception) {
    assert_test($exception->getCode() === 404, 'API exception status code is incorrect');
    assert_test($exception->getBody() === '{"error":"missing"}', 'API exception body is incorrect');
}
$request = $mockHandler->getLastRequest();
assert_test($request->getMethod() === 'DELETE', 'Expected DELETE request for IP address deletion');
assert_test((string)$request->getUri() === 'https://api.example.test/1.3/ip_address/192.0.2.10', 'IP address path is incorrect');

printf("Generated request behavior checks passed: query, JSON body, auth, and errors\n");

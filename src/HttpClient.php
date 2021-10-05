<?php

namespace UpCloud;

use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

require_once 'Version.php';

class HttpClient
{
    /**
     * Guzzle client instance
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * Create a new default UpCloud API HTTP client.
     *
     * Client configuration options:
     *
     * - apiRoot: (string|UriInterface) Base URI for the API calls e.g. https://api.upcloud.com/1.3/
     * - handler: (callable) A \GuzzleHttp\Client compatible HTTP request handler
     * - username: (string) UpCloud API account username
     * - password: (string) UpCloud API account password
     *
     * @param array $config Client configuration options
     */
    public function __construct(array $config)
    {
        $authString = base64_encode(
            "{$config['username']}:{$config['password']}"
        );

        $this->guzzle = new \GuzzleHttp\Client([
            'base_uri' => $config['apiRoot'],
            'handler' => $config['handler'] ?? null,
            'headers' => [
                'Authorization' => "Basic $authString",
                'Content-Type' => 'application/json; charset=UTF-8',
                'User-Agent' => "upcloud-php-api/{$GLOBALS['version']}",
            ]
        ]);
    }

    /**
     * Sends a HTTP request with payload encoded as JSON and response decoded from JSON.
     *
     * @param string $method HTTP method, e.g. HEAD, GET, POST, PUT, PATCH, DELETE, etc.
     * @param string|UriInterface $path Path for the HTTP request, will be appended to the API root
     * @param mixed $payload Any payload to be sent, or null for no payload
     */
    public function jsonRequest(string $method, string $path, $payload = null)
    {
        $response = $this->request($method, $path, [
            'body' => isset($payload) ? json_encode($payload) : ''
        ]);

        return json_decode($response->getBody());
    }

    /**
     * Send a raw HTTP request
     *
     * @param string $method HTTP method, e.g. HEAD, GET, POST, PUT, PATCH, DELETE, etc.
     * @param string|UriInterface $path Path for the HTTP request, will be appended to the API root
     * @param array $opts Request options. See \GuzzleHttp\RequestOptions.
     *
     * @throws \Exception
     */
    public function request(string $method, string $path, $opts = []): ResponseInterface
    {
        try {
            $response = $this->guzzle->request($method, $path, $opts);
        } catch (ClientException $e) {
            throw new \Exception($e->getResponse()->getBody());
        }

        return $response;
    }

    /**
     * HTTP GET request
     *
     * @param string $path Path for the request
     */
    public function get(string $path)
    {
        return $this->jsonRequest('GET', $path);
    }

    /**
     * HTTP POST request
     *
     * @param string $path Path for the request
     * @param mixed $payload Payload for the POST request ('null' for no payload)
     */
    public function post(string $path, $payload)
    {
        return $this->jsonRequest('POST', $path, $payload);
    }

    /**
     * HTTP PUT request
     *
     * @param string $path Path for the request
     * @param mixed $payload Payload for the request ('null' for no payload)
     */
    public function put(string $path, $payload)
    {
        return $this->jsonRequest('PUT', $path, $payload);
    }

    /**
     * HTTP PATCH request
     *
     * @param string $path Path for the request
     * @param mixed $payload Payload for the request ('null' for no payload)
     */
    public function patch(string $path, $payload)
    {
        return $this->jsonRequest('PATCH', $path, $payload);
    }

    /**
     * HTTP DELETE request
     *
     * @param string $path Path for the request
     */
    public function delete(string $path)
    {
        return $this->jsonRequest('DELETE', $path);
    }
}

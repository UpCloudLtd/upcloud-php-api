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
     * Send a raw HTTP request
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
     */
    public function get(string $path)
    {
        $response = $this->request('GET', $path);
        return json_decode($response->getBody());
    }

    /**
     * HTTP POST request
     */
    public function post(string $path, $payload)
    {
        $response = $this->request('POST', $path, [
            'body' => json_encode($payload),
        ]);

        return json_decode($response->getBody());
    }

    public function put()
    {
        //
    }

    public function patch()
    {
        //
    }

    public function delete()
    {
        //
    }
}

<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\HttpClient;

use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Upcloud\ApiClient\Configuration;
use Upcloud\ApiClient\ApiException;

class UpcloudHttpClient
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    private $config;

    public $headers = [
        'Content-Type'     => 'application/json; charset=UTF-8'
    ];

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null $config
     */
    public function __construct(ClientInterface $client = null, Configuration $config = null)
    {
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->client = $client ?: new Client([
            'base_uri' => rtrim($this->config->getHost(), '/') . '/'
        ]);
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Send an HTTP request.
     *
     * @param RequestInterface $request Request to send
     * @param array            $options Request options to apply to the given
     *                                  request and to the transfer.
     *
     * @return UpcloudApiResponse
     * @throws ApiException|GuzzleException
     */
    public function send(RequestInterface $request, array $options = []): UpcloudApiResponse
    {
        $request = $this->combineRequest($request);

        try {
            $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? $e->getResponse()->getBody() : null
            );
        }

        return new UpcloudApiResponse($response->getHeaders(), $response->getBody(), $response->getStatusCode());
    }

    /**
     * Asynchronously send an HTTP request.
     *
     * @param RequestInterface $request Request to send
     * @param array            $options Request options to apply to the given
     *                                  request and to the transfer.
     * @return PromiseInterface
     */
    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        return $this->client->sendAsync($request, $options);
    }

    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    private function combineRequest(RequestInterface $request): RequestInterface
    {
        $modify = [];
        foreach ($this->getDefaultHeaders() as $key => $value) {
            if (!$request->hasHeader($key)) {
                $modify['set_headers'][$key] = $value;
            }
        }

        return Psr7\Utils::modifyRequest($request, $modify);
    }

    /**
     * @return array
     */
    private function getDefaultHeaders(): array
    {
        return array_merge(
            $this->headers,
            [
                'User-Agent' => $this->config->getUserAgent()
            ],
            [
                'Authorization' => 'Basic ' . base64_encode(
                    $this->config->getUsername() . ":" . $this->config->getPassword()
                )
            ]
        );
    }
}

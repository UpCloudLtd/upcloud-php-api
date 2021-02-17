<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\ClientInterface;
use Upcloud\ApiClient\Configuration;
use Upcloud\ApiClient\HttpClient\UpcloudHttpClient;

abstract class BaseApi
{
    /**
     * @var null|UpcloudHttpClient
     */
    protected $client;
    /**
     * @var null|Configuration
     */
    protected $config;

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null $config
     */
    public function __construct(ClientInterface $client = null, Configuration $config = null)
    {
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->client = new UpcloudHttpClient($client, $this->config);
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * @param string $path
     * @param array $parts
     * @return string
     */
    protected function buildPath(string $path, array $parts = []): string
    {
        foreach ($parts as $search => $replace) {
            $path =  str_replace('{' . $search . '}', $this->toPathValue($replace), $path);
        }
        return $path;
    }

    protected function toPathValue($value)
    {
        return rawurlencode($this->toString($value));
    }

    protected function toString($value)
    {
        if ($value instanceof \DateTime) { // datetime in ISO8601 format
            return $value->format(\DateTime::ATOM);
        } else {
            return strval($value);
        }
    }
}

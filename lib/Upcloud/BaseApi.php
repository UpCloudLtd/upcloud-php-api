<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\ClientInterface;
use Upcloud\ApiClient\Configuration;
use Upcloud\ApiClient\HeaderSelector;
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
     * @var null|HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null $config
     * @param HeaderSelector|null $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->client = new UpcloudHttpClient($client, $this->config);
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }
}

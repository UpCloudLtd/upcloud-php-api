<?php

namespace UpCloud;

use RuntimeException;

require_once 'Version.php';

class ApiClient
{
    use ServerApiTrait;
    use StorageApiTrait;
    // use AccountApiTrait;
    // use PriceApiTrait;
    // use PlanApiTrait;
    // use TagApiTrait;
    // use TimezoneApiTrait;

    /**
     * Root URL for the UpCloud API
     */
    protected $apiRoot = "https://api.upcloud.com/1.3/";

    /**
     * The HTTP client for making the requests
     * @var \UpCloud\HttpClient
     */
    protected $httpClient;

    public function __construct(array $config = null)
    {
        $username = $config['username'] ?? getenv('UPCLOUD_USERNAME');
        $password = $config['password'] ?? getenv('UPCLOUD_PASSWORD');

        if (empty($username)) {
            throw new RuntimeException('could not initialize API client: username missing');
        }

        if (empty($password)) {
            throw new RuntimeException('could not initialize API client: password missing');
        }

        $this->httpClient = $config['client'] ?? new HttpClient([
            'apiRoot' => $this->apiRoot,
            'password' => $password,
            'username' => $username,
        ]);
    }

    /**
     * Send a raw HTTP request
     */
    public function request(string $method, string $path, string $body)
    {
        return $this->httpClient->request($method, $path, $body);
    }
}

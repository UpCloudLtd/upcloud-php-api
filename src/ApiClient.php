<?php

namespace UpCloud;

use RuntimeException;

require_once 'Version.php';

/**
 * UpCloud API client. The main class for connecting to the UpCloud API.
 */
class ApiClient
{
    use ServerApiTrait;
    use ServerFirewallApiTrait;
    use StorageApiTrait;
    use TagApiTrait;
    // use AccountApiTrait;
    // use PriceApiTrait;
    // use PlanApiTrait;
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

    /**
     * A UpCloud API client instance.
     *
     * Example:
     *
     * ```
     * $client = new \UpCloud\ApiClient([
     *     'username' => $secrets['username'],
     *     'password' => $secrets['password'],
     * ]);
     * ```
     *
     * @param array|null $config (optional) Configuration options:
     *
     * - username: (string|null) UpCloud API account username (will attempt to use env variable if null)
     * - password: (string|null) UpCloud API account password (will attempt to use env variable if null)
     * - client: (\UpCloud\HttpClient|null) Instance of the HTTP client for making HTTP requests to the UpCloud API
     */
    public function __construct(array $config = null)
    {
        $username = $config['username'] ?? getenv('UPCLOUD_USERNAME');
        $password = $config['password'] ?? getenv('UPCLOUD_PASSWORD');

        if (empty($username)) {
            throw new RuntimeException('Please provide your UpCloud account username');
        }

        if (empty($password)) {
            throw new RuntimeException('Please provide your UpCloud account password');
        }

        $this->httpClient = $config['client'] ?? new HttpClient([
            'apiRoot' => $this->apiRoot,
            'password' => $password,
            'username' => $username,
        ]);
    }

    /**
     * @see \UpCloud\HttpClient::request
     */
    public function request(string $method, string $path, $opts)
    {
        return $this->httpClient->request($method, $path, $opts);
    }
}

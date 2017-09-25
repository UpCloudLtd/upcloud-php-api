<?php
/**
 * ServerApi
 * PHP version 5
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */

/**
 * Upcloud api
 *
 * The UpCloud API consists of operations used to control resources on UpCloud. The API is a web service interface. HTTPS is used to connect to the API. The API follows the principles of a RESTful web service wherever possible. The base URL for all API operations is  https://api.upcloud.com/. All API operations require authentication.
 *
 * OpenAPI spec version: 1.2.0
 * 
 */


namespace Upcloud\ApiClient\Upcloud;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use Upcloud\ApiClient\ApiException;
use Upcloud\ApiClient\Configuration;
use Upcloud\ApiClient\HeaderSelector;
use Upcloud\ApiClient\ObjectSerializer;

/**
 * ServerApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class ServerApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param ClientInterface $client
     * @param Configuration $config
     * @param HeaderSelector $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation assignTag
     *
     * Assign tag to a server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_list List of tags (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function assignTag($server_id, $tag_list)
    {
        list($response) = $this->assignTagWithHttpInfo($server_id, $tag_list);
        return $response;
    }

    /**
     * Operation assignTagWithHttpInfo
     *
     * Assign tag to a server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_list List of tags (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function assignTagWithHttpInfo($server_id, $tag_list)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->assignTagRequest($server_id, $tag_list);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation assignTagAsync
     *
     * Assign tag to a server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_list List of tags (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function assignTagAsync($server_id, $tag_list)
    {
        return $this->assignTagAsyncWithHttpInfo($server_id, $tag_list)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation assignTagAsyncWithHttpInfo
     *
     * Assign tag to a server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_list List of tags (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function assignTagAsyncWithHttpInfo($server_id, $tag_list)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->assignTagRequest($server_id, $tag_list);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'assignTag'
     *
     * @param string $server_id Server id (required)
     * @param string $tag_list List of tags (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function assignTagRequest($server_id, $tag_list)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling assignTag');
        }
        // verify the required parameter 'tag_list' is set
        if ($tag_list === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_list when calling assignTag');
        }

        $resourcePath = '/server/{serverId}/tag/{tagList}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }
        // path params
        if ($tag_list !== null) {
            $resourcePath = str_replace('{' . 'tagList' . '}', ObjectSerializer::toPathValue($tag_list), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation attachStorage
     *
     * Attach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function attachStorage($server_id, $storage_device)
    {
        list($response) = $this->attachStorageWithHttpInfo($server_id, $storage_device);
        return $response;
    }

    /**
     * Operation attachStorageWithHttpInfo
     *
     * Attach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function attachStorageWithHttpInfo($server_id, $storage_device)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->attachStorageRequest($server_id, $storage_device);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation attachStorageAsync
     *
     * Attach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function attachStorageAsync($server_id, $storage_device)
    {
        return $this->attachStorageAsyncWithHttpInfo($server_id, $storage_device)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation attachStorageAsyncWithHttpInfo
     *
     * Attach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function attachStorageAsyncWithHttpInfo($server_id, $storage_device)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->attachStorageRequest($server_id, $storage_device);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'attachStorage'
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function attachStorageRequest($server_id, $storage_device)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling attachStorage');
        }
        // verify the required parameter 'storage_device' is set
        if ($storage_device === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_device when calling attachStorage');
        }

        $resourcePath = '/server/{serverId}/storage/attach';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($storage_device)) {
            $_tempBody = $storage_device;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createFirewallRule
     *
     * Create firewall rule
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\FirewallRuleRequest $firewall_rule  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\FirewallRuleCreateResponse
     */
    public function createFirewallRule($server_id, $firewall_rule)
    {
        list($response) = $this->createFirewallRuleWithHttpInfo($server_id, $firewall_rule);
        return $response;
    }

    /**
     * Operation createFirewallRuleWithHttpInfo
     *
     * Create firewall rule
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\FirewallRuleRequest $firewall_rule  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\FirewallRuleCreateResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createFirewallRuleWithHttpInfo($server_id, $firewall_rule)
    {
        $returnType = '\Upcloud\ApiClient\Model\FirewallRuleCreateResponse';
        $request = $this->createFirewallRuleRequest($server_id, $firewall_rule);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\FirewallRuleCreateResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createFirewallRuleAsync
     *
     * Create firewall rule
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\FirewallRuleRequest $firewall_rule  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createFirewallRuleAsync($server_id, $firewall_rule)
    {
        return $this->createFirewallRuleAsyncWithHttpInfo($server_id, $firewall_rule)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createFirewallRuleAsyncWithHttpInfo
     *
     * Create firewall rule
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\FirewallRuleRequest $firewall_rule  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createFirewallRuleAsyncWithHttpInfo($server_id, $firewall_rule)
    {
        $returnType = '\Upcloud\ApiClient\Model\FirewallRuleCreateResponse';
        $request = $this->createFirewallRuleRequest($server_id, $firewall_rule);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'createFirewallRule'
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\FirewallRuleRequest $firewall_rule  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createFirewallRuleRequest($server_id, $firewall_rule)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling createFirewallRule');
        }
        // verify the required parameter 'firewall_rule' is set
        if ($firewall_rule === null) {
            throw new \InvalidArgumentException('Missing the required parameter $firewall_rule when calling createFirewallRule');
        }

        $resourcePath = '/server/{serverId}/firewall_rule';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($firewall_rule)) {
            $_tempBody = $firewall_rule;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createServer
     *
     * Create server
     *
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function createServer($server = null)
    {
        list($response) = $this->createServerWithHttpInfo($server);
        return $response;
    }

    /**
     * Operation createServerWithHttpInfo
     *
     * Create server
     *
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createServerWithHttpInfo($server = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->createServerRequest($server);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createServerAsync
     *
     * Create server
     *
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createServerAsync($server = null)
    {
        return $this->createServerAsyncWithHttpInfo($server)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createServerAsyncWithHttpInfo
     *
     * Create server
     *
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createServerAsyncWithHttpInfo($server = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->createServerRequest($server);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'createServer'
     *
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createServerRequest($server = null)
    {

        $resourcePath = '/server';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($server)) {
            $_tempBody = $server;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteFirewallRule
     *
     * Remove firewall rule
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteFirewallRule($server_id, $firewall_rule_number)
    {
        $this->deleteFirewallRuleWithHttpInfo($server_id, $firewall_rule_number);
    }

    /**
     * Operation deleteFirewallRuleWithHttpInfo
     *
     * Remove firewall rule
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteFirewallRuleWithHttpInfo($server_id, $firewall_rule_number)
    {
        $returnType = '';
        $request = $this->deleteFirewallRuleRequest($server_id, $firewall_rule_number);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteFirewallRuleAsync
     *
     * Remove firewall rule
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFirewallRuleAsync($server_id, $firewall_rule_number)
    {
        return $this->deleteFirewallRuleAsyncWithHttpInfo($server_id, $firewall_rule_number)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteFirewallRuleAsyncWithHttpInfo
     *
     * Remove firewall rule
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFirewallRuleAsyncWithHttpInfo($server_id, $firewall_rule_number)
    {
        $returnType = '';
        $request = $this->deleteFirewallRuleRequest($server_id, $firewall_rule_number);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            return [null, $response->getStatusCode(), $response->getHeaders()];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'deleteFirewallRule'
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteFirewallRuleRequest($server_id, $firewall_rule_number)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling deleteFirewallRule');
        }
        // verify the required parameter 'firewall_rule_number' is set
        if ($firewall_rule_number === null) {
            throw new \InvalidArgumentException('Missing the required parameter $firewall_rule_number when calling deleteFirewallRule');
        }

        $resourcePath = '/server/{serverId}/firewall_rule/{firewallRuleNumber}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }
        // path params
        if ($firewall_rule_number !== null) {
            $resourcePath = str_replace('{' . 'firewallRuleNumber' . '}', ObjectSerializer::toPathValue($firewall_rule_number), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'DELETE',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteServer
     *
     * Delete server
     *
     * @param string $server_id Id of server to delete (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteServer($server_id)
    {
        $this->deleteServerWithHttpInfo($server_id);
    }

    /**
     * Operation deleteServerWithHttpInfo
     *
     * Delete server
     *
     * @param string $server_id Id of server to delete (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteServerWithHttpInfo($server_id)
    {
        $returnType = '';
        $request = $this->deleteServerRequest($server_id);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteServerAsync
     *
     * Delete server
     *
     * @param string $server_id Id of server to delete (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteServerAsync($server_id)
    {
        return $this->deleteServerAsyncWithHttpInfo($server_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteServerAsyncWithHttpInfo
     *
     * Delete server
     *
     * @param string $server_id Id of server to delete (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteServerAsyncWithHttpInfo($server_id)
    {
        $returnType = '';
        $request = $this->deleteServerRequest($server_id);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            return [null, $response->getStatusCode(), $response->getHeaders()];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'deleteServer'
     *
     * @param string $server_id Id of server to delete (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteServerRequest($server_id)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling deleteServer');
        }

        $resourcePath = '/server/{serverId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'DELETE',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation detachStorage
     *
     * Detach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function detachStorage($server_id, $storage_device)
    {
        list($response) = $this->detachStorageWithHttpInfo($server_id, $storage_device);
        return $response;
    }

    /**
     * Operation detachStorageWithHttpInfo
     *
     * Detach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function detachStorageWithHttpInfo($server_id, $storage_device)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->detachStorageRequest($server_id, $storage_device);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation detachStorageAsync
     *
     * Detach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detachStorageAsync($server_id, $storage_device)
    {
        return $this->detachStorageAsyncWithHttpInfo($server_id, $storage_device)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation detachStorageAsyncWithHttpInfo
     *
     * Detach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function detachStorageAsyncWithHttpInfo($server_id, $storage_device)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->detachStorageRequest($server_id, $storage_device);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'detachStorage'
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice $storage_device  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function detachStorageRequest($server_id, $storage_device)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling detachStorage');
        }
        // verify the required parameter 'storage_device' is set
        if ($storage_device === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_device when calling detachStorage');
        }

        $resourcePath = '/server/{serverId}/storage/detach';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($storage_device)) {
            $_tempBody = $storage_device;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation ejectCdrom
     *
     * Eject CD-ROM
     *
     * @param string $server_id Server id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function ejectCdrom($server_id)
    {
        list($response) = $this->ejectCdromWithHttpInfo($server_id);
        return $response;
    }

    /**
     * Operation ejectCdromWithHttpInfo
     *
     * Eject CD-ROM
     *
     * @param string $server_id Server id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function ejectCdromWithHttpInfo($server_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->ejectCdromRequest($server_id);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ejectCdromAsync
     *
     * Eject CD-ROM
     *
     * @param string $server_id Server id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ejectCdromAsync($server_id)
    {
        return $this->ejectCdromAsyncWithHttpInfo($server_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation ejectCdromAsyncWithHttpInfo
     *
     * Eject CD-ROM
     *
     * @param string $server_id Server id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ejectCdromAsyncWithHttpInfo($server_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->ejectCdromRequest($server_id);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'ejectCdrom'
     *
     * @param string $server_id Server id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ejectCdromRequest($server_id)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling ejectCdrom');
        }

        $resourcePath = '/server/{serverId}/storage/cdrom/eject';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getFirewallRule
     *
     * Get firewall rule details
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\FirewallRuleCreateResponse
     */
    public function getFirewallRule($server_id, $firewall_rule_number)
    {
        list($response) = $this->getFirewallRuleWithHttpInfo($server_id, $firewall_rule_number);
        return $response;
    }

    /**
     * Operation getFirewallRuleWithHttpInfo
     *
     * Get firewall rule details
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\FirewallRuleCreateResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFirewallRuleWithHttpInfo($server_id, $firewall_rule_number)
    {
        $returnType = '\Upcloud\ApiClient\Model\FirewallRuleCreateResponse';
        $request = $this->getFirewallRuleRequest($server_id, $firewall_rule_number);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\FirewallRuleCreateResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getFirewallRuleAsync
     *
     * Get firewall rule details
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFirewallRuleAsync($server_id, $firewall_rule_number)
    {
        return $this->getFirewallRuleAsyncWithHttpInfo($server_id, $firewall_rule_number)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getFirewallRuleAsyncWithHttpInfo
     *
     * Get firewall rule details
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFirewallRuleAsyncWithHttpInfo($server_id, $firewall_rule_number)
    {
        $returnType = '\Upcloud\ApiClient\Model\FirewallRuleCreateResponse';
        $request = $this->getFirewallRuleRequest($server_id, $firewall_rule_number);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'getFirewallRule'
     *
     * @param string $server_id Server id (required)
     * @param string $firewall_rule_number Denotes the index of the firewall rule in the server&#39;s firewall rule list (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getFirewallRuleRequest($server_id, $firewall_rule_number)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling getFirewallRule');
        }
        // verify the required parameter 'firewall_rule_number' is set
        if ($firewall_rule_number === null) {
            throw new \InvalidArgumentException('Missing the required parameter $firewall_rule_number when calling getFirewallRule');
        }

        $resourcePath = '/server/{serverId}/firewall_rule/{firewallRuleNumber}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }
        // path params
        if ($firewall_rule_number !== null) {
            $resourcePath = str_replace('{' . 'firewallRuleNumber' . '}', ObjectSerializer::toPathValue($firewall_rule_number), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'GET',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listServerConfigurations
     *
     * List server configurations
     *
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\ConfigurationListResponse
     */
    public function listServerConfigurations()
    {
        list($response) = $this->listServerConfigurationsWithHttpInfo();
        return $response;
    }

    /**
     * Operation listServerConfigurationsWithHttpInfo
     *
     * List server configurations
     *
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\ConfigurationListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listServerConfigurationsWithHttpInfo()
    {
        $returnType = '\Upcloud\ApiClient\Model\ConfigurationListResponse';
        $request = $this->listServerConfigurationsRequest();

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\ConfigurationListResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listServerConfigurationsAsync
     *
     * List server configurations
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listServerConfigurationsAsync()
    {
        return $this->listServerConfigurationsAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listServerConfigurationsAsyncWithHttpInfo
     *
     * List server configurations
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listServerConfigurationsAsyncWithHttpInfo()
    {
        $returnType = '\Upcloud\ApiClient\Model\ConfigurationListResponse';
        $request = $this->listServerConfigurationsRequest();

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'listServerConfigurations'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listServerConfigurationsRequest()
    {

        $resourcePath = '/server_size';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'GET',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listServers
     *
     * List of servers
     *
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\ServerListResponse
     */
    public function listServers()
    {
        list($response) = $this->listServersWithHttpInfo();
        return $response;
    }

    /**
     * Operation listServersWithHttpInfo
     *
     * List of servers
     *
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\ServerListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listServersWithHttpInfo()
    {
        $returnType = '\Upcloud\ApiClient\Model\ServerListResponse';
        $request = $this->listServersRequest();

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\ServerListResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listServersAsync
     *
     * List of servers
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listServersAsync()
    {
        return $this->listServersAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listServersAsyncWithHttpInfo
     *
     * List of servers
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listServersAsyncWithHttpInfo()
    {
        $returnType = '\Upcloud\ApiClient\Model\ServerListResponse';
        $request = $this->listServersRequest();

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'listServers'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listServersRequest()
    {

        $resourcePath = '/server';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'GET',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation loadCdrom
     *
     * Load CD-ROM
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice1 $storage_device  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function loadCdrom($server_id, $storage_device = null)
    {
        list($response) = $this->loadCdromWithHttpInfo($server_id, $storage_device);
        return $response;
    }

    /**
     * Operation loadCdromWithHttpInfo
     *
     * Load CD-ROM
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice1 $storage_device  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function loadCdromWithHttpInfo($server_id, $storage_device = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->loadCdromRequest($server_id, $storage_device);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation loadCdromAsync
     *
     * Load CD-ROM
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice1 $storage_device  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function loadCdromAsync($server_id, $storage_device = null)
    {
        return $this->loadCdromAsyncWithHttpInfo($server_id, $storage_device)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation loadCdromAsyncWithHttpInfo
     *
     * Load CD-ROM
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice1 $storage_device  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function loadCdromAsyncWithHttpInfo($server_id, $storage_device = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->loadCdromRequest($server_id, $storage_device);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'loadCdrom'
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDevice1 $storage_device  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function loadCdromRequest($server_id, $storage_device = null)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling loadCdrom');
        }

        $resourcePath = '/server/{serverId}/storage/cdrom/load';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($storage_device)) {
            $_tempBody = $storage_device;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation modifyServer
     *
     * Modify server
     *
     * @param string $server_id Id of server to modify (required)
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function modifyServer($server_id, $server = null)
    {
        list($response) = $this->modifyServerWithHttpInfo($server_id, $server);
        return $response;
    }

    /**
     * Operation modifyServerWithHttpInfo
     *
     * Modify server
     *
     * @param string $server_id Id of server to modify (required)
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyServerWithHttpInfo($server_id, $server = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->modifyServerRequest($server_id, $server);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 202:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation modifyServerAsync
     *
     * Modify server
     *
     * @param string $server_id Id of server to modify (required)
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function modifyServerAsync($server_id, $server = null)
    {
        return $this->modifyServerAsyncWithHttpInfo($server_id, $server)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyServerAsyncWithHttpInfo
     *
     * Modify server
     *
     * @param string $server_id Id of server to modify (required)
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function modifyServerAsyncWithHttpInfo($server_id, $server = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->modifyServerRequest($server_id, $server);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'modifyServer'
     *
     * @param string $server_id Id of server to modify (required)
     * @param \Upcloud\ApiClient\Model\Server $server  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function modifyServerRequest($server_id, $server = null)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling modifyServer');
        }

        $resourcePath = '/server/{serverId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($server)) {
            $_tempBody = $server;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'PUT',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation restartServer
     *
     * Restart server
     *
     * @param string $server_id Id of server to restart (required)
     * @param \Upcloud\ApiClient\Model\RestartServer $restart_server  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function restartServer($server_id, $restart_server)
    {
        list($response) = $this->restartServerWithHttpInfo($server_id, $restart_server);
        return $response;
    }

    /**
     * Operation restartServerWithHttpInfo
     *
     * Restart server
     *
     * @param string $server_id Id of server to restart (required)
     * @param \Upcloud\ApiClient\Model\RestartServer $restart_server  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function restartServerWithHttpInfo($server_id, $restart_server)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->restartServerRequest($server_id, $restart_server);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation restartServerAsync
     *
     * Restart server
     *
     * @param string $server_id Id of server to restart (required)
     * @param \Upcloud\ApiClient\Model\RestartServer $restart_server  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function restartServerAsync($server_id, $restart_server)
    {
        return $this->restartServerAsyncWithHttpInfo($server_id, $restart_server)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation restartServerAsyncWithHttpInfo
     *
     * Restart server
     *
     * @param string $server_id Id of server to restart (required)
     * @param \Upcloud\ApiClient\Model\RestartServer $restart_server  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function restartServerAsyncWithHttpInfo($server_id, $restart_server)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->restartServerRequest($server_id, $restart_server);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'restartServer'
     *
     * @param string $server_id Id of server to restart (required)
     * @param \Upcloud\ApiClient\Model\RestartServer $restart_server  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function restartServerRequest($server_id, $restart_server)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling restartServer');
        }
        // verify the required parameter 'restart_server' is set
        if ($restart_server === null) {
            throw new \InvalidArgumentException('Missing the required parameter $restart_server when calling restartServer');
        }

        $resourcePath = '/server/{serverId}/restart';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($restart_server)) {
            $_tempBody = $restart_server;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation serverDetails
     *
     * Get server details
     *
     * @param string $server_id Id of server to return (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function serverDetails($server_id)
    {
        list($response) = $this->serverDetailsWithHttpInfo($server_id);
        return $response;
    }

    /**
     * Operation serverDetailsWithHttpInfo
     *
     * Get server details
     *
     * @param string $server_id Id of server to return (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function serverDetailsWithHttpInfo($server_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->serverDetailsRequest($server_id);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation serverDetailsAsync
     *
     * Get server details
     *
     * @param string $server_id Id of server to return (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function serverDetailsAsync($server_id)
    {
        return $this->serverDetailsAsyncWithHttpInfo($server_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation serverDetailsAsyncWithHttpInfo
     *
     * Get server details
     *
     * @param string $server_id Id of server to return (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function serverDetailsAsyncWithHttpInfo($server_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->serverDetailsRequest($server_id);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'serverDetails'
     *
     * @param string $server_id Id of server to return (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function serverDetailsRequest($server_id)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling serverDetails');
        }

        $resourcePath = '/server/{serverId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'GET',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation serverServerIdFirewallRuleGet
     *
     * List firewall rules
     *
     * @param string $server_id Server id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\FirewallRuleListResponse
     */
    public function serverServerIdFirewallRuleGet($server_id)
    {
        list($response) = $this->serverServerIdFirewallRuleGetWithHttpInfo($server_id);
        return $response;
    }

    /**
     * Operation serverServerIdFirewallRuleGetWithHttpInfo
     *
     * List firewall rules
     *
     * @param string $server_id Server id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\FirewallRuleListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function serverServerIdFirewallRuleGetWithHttpInfo($server_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\FirewallRuleListResponse';
        $request = $this->serverServerIdFirewallRuleGetRequest($server_id);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\FirewallRuleListResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation serverServerIdFirewallRuleGetAsync
     *
     * List firewall rules
     *
     * @param string $server_id Server id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function serverServerIdFirewallRuleGetAsync($server_id)
    {
        return $this->serverServerIdFirewallRuleGetAsyncWithHttpInfo($server_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation serverServerIdFirewallRuleGetAsyncWithHttpInfo
     *
     * List firewall rules
     *
     * @param string $server_id Server id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function serverServerIdFirewallRuleGetAsyncWithHttpInfo($server_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\FirewallRuleListResponse';
        $request = $this->serverServerIdFirewallRuleGetRequest($server_id);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'serverServerIdFirewallRuleGet'
     *
     * @param string $server_id Server id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function serverServerIdFirewallRuleGetRequest($server_id)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling serverServerIdFirewallRuleGet');
        }

        $resourcePath = '/server/{serverId}/firewall_rule';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'GET',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation startServer
     *
     * Start server
     *
     * @param string $server_id Id of server to start (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function startServer($server_id)
    {
        list($response) = $this->startServerWithHttpInfo($server_id);
        return $response;
    }

    /**
     * Operation startServerWithHttpInfo
     *
     * Start server
     *
     * @param string $server_id Id of server to start (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function startServerWithHttpInfo($server_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->startServerRequest($server_id);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation startServerAsync
     *
     * Start server
     *
     * @param string $server_id Id of server to start (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function startServerAsync($server_id)
    {
        return $this->startServerAsyncWithHttpInfo($server_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation startServerAsyncWithHttpInfo
     *
     * Start server
     *
     * @param string $server_id Id of server to start (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function startServerAsyncWithHttpInfo($server_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->startServerRequest($server_id);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'startServer'
     *
     * @param string $server_id Id of server to start (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function startServerRequest($server_id)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling startServer');
        }

        $resourcePath = '/server/{serverId}/start';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation stopServer
     *
     * Stop server
     *
     * @param string $server_id Id of server to stop (required)
     * @param \Upcloud\ApiClient\Model\StopServer $stop_server  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function stopServer($server_id, $stop_server)
    {
        list($response) = $this->stopServerWithHttpInfo($server_id, $stop_server);
        return $response;
    }

    /**
     * Operation stopServerWithHttpInfo
     *
     * Stop server
     *
     * @param string $server_id Id of server to stop (required)
     * @param \Upcloud\ApiClient\Model\StopServer $stop_server  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function stopServerWithHttpInfo($server_id, $stop_server)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->stopServerRequest($server_id, $stop_server);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation stopServerAsync
     *
     * Stop server
     *
     * @param string $server_id Id of server to stop (required)
     * @param \Upcloud\ApiClient\Model\StopServer $stop_server  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function stopServerAsync($server_id, $stop_server)
    {
        return $this->stopServerAsyncWithHttpInfo($server_id, $stop_server)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation stopServerAsyncWithHttpInfo
     *
     * Stop server
     *
     * @param string $server_id Id of server to stop (required)
     * @param \Upcloud\ApiClient\Model\StopServer $stop_server  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function stopServerAsyncWithHttpInfo($server_id, $stop_server)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->stopServerRequest($server_id, $stop_server);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'stopServer'
     *
     * @param string $server_id Id of server to stop (required)
     * @param \Upcloud\ApiClient\Model\StopServer $stop_server  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function stopServerRequest($server_id, $stop_server)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling stopServer');
        }
        // verify the required parameter 'stop_server' is set
        if ($stop_server === null) {
            throw new \InvalidArgumentException('Missing the required parameter $stop_server when calling stopServer');
        }

        $resourcePath = '/server/{serverId}/stop';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($stop_server)) {
            $_tempBody = $stop_server;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation untag
     *
     * Remove tag from server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_name Tag name (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateServerResponse
     */
    public function untag($server_id, $tag_name)
    {
        list($response) = $this->untagWithHttpInfo($server_id, $tag_name);
        return $response;
    }

    /**
     * Operation untagWithHttpInfo
     *
     * Remove tag from server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_name Tag name (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateServerResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function untagWithHttpInfo($server_id, $tag_name)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->untagRequest($server_id, $tag_name);

        try {

            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    "[$statusCode] Error connecting to the API ({$request->getUri()})",
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateServerResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation untagAsync
     *
     * Remove tag from server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_name Tag name (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function untagAsync($server_id, $tag_name)
    {
        return $this->untagAsyncWithHttpInfo($server_id, $tag_name)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation untagAsyncWithHttpInfo
     *
     * Remove tag from server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_name Tag name (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function untagAsyncWithHttpInfo($server_id, $tag_name)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateServerResponse';
        $request = $this->untagRequest($server_id, $tag_name);

        return $this->client->sendAsync($request)->then(function ($response) use ($returnType) {
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }, function ($exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                "[$statusCode] Error connecting to the API ({$exception->getRequest()->getUri()})",
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        });
    }

    /**
     * Create request for operation 'untag'
     *
     * @param string $server_id Server id (required)
     * @param string $tag_name Tag name (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function untagRequest($server_id, $tag_name)
    {
        // verify the required parameter 'server_id' is set
        if ($server_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $server_id when calling untag');
        }
        // verify the required parameter 'tag_name' is set
        if ($tag_name === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_name when calling untag');
        }

        $resourcePath = '/server/{serverId}/untag/{tagName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($server_id !== null) {
            $resourcePath = str_replace('{' . 'serverId' . '}', ObjectSerializer::toPathValue($server_id), $resourcePath);
        }
        // path params
        if ($tag_name !== null) {
            $resourcePath = str_replace('{' . 'tagName' . '}', ObjectSerializer::toPathValue($tag_name), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present

        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                $httpBody = new MultipartStream($multipartContents); // for HTTP post (form)

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams); // for HTTP post (form)
            }
        }


        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        $url = $this->config->getHost() . $resourcePath . ($query ? '?' . $query : '');

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        return new Request(
            'POST',
            $url,
            $headers,
            $httpBody
        );
    }

}

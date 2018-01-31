<?php
/**
 * IPAddressApi
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
 * IPAddressApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class IPAddressApi
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
        $this->config = $config ?: Configuration::getDefaultConfiguration();
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
     * Operation addIp
     *
     * Assign IP address
     *
     * @param \Upcloud\ApiClient\Model\AddIpRequest $ip_address  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\AssignIpResponse
     */
    public function addIp($ip_address = null)
    {
        list($response) = $this->addIpWithHttpInfo($ip_address);
        return $response;
    }

    /**
     * Operation addIpWithHttpInfo
     *
     * Assign IP address
     *
     * @param \Upcloud\ApiClient\Model\AddIpRequest $ip_address  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\AssignIpResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function addIpWithHttpInfo($ip_address = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\AssignIpResponse';
        $request = $this->addIpRequest($ip_address);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\AssignIpResponse', $e->getResponseHeaders());
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
     * Operation addIpAsync
     *
     * Assign IP address
     *
     * @param \Upcloud\ApiClient\Model\AddIpRequest $ip_address  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addIpAsync($ip_address = null)
    {
        return $this->addIpAsyncWithHttpInfo($ip_address)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation addIpAsyncWithHttpInfo
     *
     * Assign IP address
     *
     * @param \Upcloud\ApiClient\Model\AddIpRequest $ip_address  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addIpAsyncWithHttpInfo($ip_address = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\AssignIpResponse';
        $request = $this->addIpRequest($ip_address);

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
     * Create request for operation 'addIp'
     *
     * @param \Upcloud\ApiClient\Model\AddIpRequest $ip_address  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function addIpRequest($ip_address = null)
    {

        $resourcePath = '/ip_address';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($ip_address)) {
            $_tempBody = $ip_address;
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

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
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
     * Operation deleteIp
     *
     * Release IP address
     *
     * @param string $ip Ip address (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteIp($ip)
    {
        $this->deleteIpWithHttpInfo($ip);
    }

    /**
     * Operation deleteIpWithHttpInfo
     *
     * Release IP address
     *
     * @param string $ip Ip address (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteIpWithHttpInfo($ip)
    {
        $returnType = '';
        $request = $this->deleteIpRequest($ip);

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
     * Operation deleteIpAsync
     *
     * Release IP address
     *
     * @param string $ip Ip address (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteIpAsync($ip)
    {
        return $this->deleteIpAsyncWithHttpInfo($ip)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteIpAsyncWithHttpInfo
     *
     * Release IP address
     *
     * @param string $ip Ip address (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteIpAsyncWithHttpInfo($ip)
    {
        $returnType = '';
        $request = $this->deleteIpRequest($ip);

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
     * Create request for operation 'deleteIp'
     *
     * @param string $ip Ip address (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteIpRequest($ip)
    {
        // verify the required parameter 'ip' is set
        if ($ip === null) {
            throw new \InvalidArgumentException('Missing the required parameter $ip when calling deleteIp');
        }

        $resourcePath = '/ip_address/{ip}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($ip !== null) {
            $resourcePath = str_replace('{' . 'ip' . '}', ObjectSerializer::toPathValue($ip), $resourcePath);
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

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
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
     * Operation getDetails
     *
     * Get IP address details
     *
     * @param string $ip Ip address (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\AssignIpResponse
     */
    public function getDetails($ip)
    {
        list($response) = $this->getDetailsWithHttpInfo($ip);
        return $response;
    }

    /**
     * Operation getDetailsWithHttpInfo
     *
     * Get IP address details
     *
     * @param string $ip Ip address (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\AssignIpResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDetailsWithHttpInfo($ip)
    {
        $returnType = '\Upcloud\ApiClient\Model\AssignIpResponse';
        $request = $this->getDetailsRequest($ip);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\AssignIpResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDetailsAsync
     *
     * Get IP address details
     *
     * @param string $ip Ip address (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDetailsAsync($ip)
    {
        return $this->getDetailsAsyncWithHttpInfo($ip)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getDetailsAsyncWithHttpInfo
     *
     * Get IP address details
     *
     * @param string $ip Ip address (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDetailsAsyncWithHttpInfo($ip)
    {
        $returnType = '\Upcloud\ApiClient\Model\AssignIpResponse';
        $request = $this->getDetailsRequest($ip);

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
     * Create request for operation 'getDetails'
     *
     * @param string $ip Ip address (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getDetailsRequest($ip)
    {
        // verify the required parameter 'ip' is set
        if ($ip === null) {
            throw new \InvalidArgumentException('Missing the required parameter $ip when calling getDetails');
        }

        $resourcePath = '/ip_address/{ip}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($ip !== null) {
            $resourcePath = str_replace('{' . 'ip' . '}', ObjectSerializer::toPathValue($ip), $resourcePath);
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

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
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
     * Operation listIps
     *
     * List IP addresses
     *
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\IpAddressListResponse
     */
    public function listIps()
    {
        list($response) = $this->listIpsWithHttpInfo();
        return $response;
    }

    /**
     * Operation listIpsWithHttpInfo
     *
     * List IP addresses
     *
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\IpAddressListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listIpsWithHttpInfo()
    {
        $returnType = '\Upcloud\ApiClient\Model\IpAddressListResponse';
        $request = $this->listIpsRequest();

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\IpAddressListResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listIpsAsync
     *
     * List IP addresses
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listIpsAsync()
    {
        return $this->listIpsAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listIpsAsyncWithHttpInfo
     *
     * List IP addresses
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listIpsAsyncWithHttpInfo()
    {
        $returnType = '\Upcloud\ApiClient\Model\IpAddressListResponse';
        $request = $this->listIpsRequest();

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
     * Create request for operation 'listIps'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listIpsRequest()
    {

        $resourcePath = '/ip_address';
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

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
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
     * Operation modifyIp
     *
     * Modify IP address
     *
     * @param string $ip Ip address (required)
     * @param \Upcloud\ApiClient\Model\ModifyIpRequest $ip_address  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\AssignIpResponse
     */
    public function modifyIp($ip, $ip_address = null)
    {
        list($response) = $this->modifyIpWithHttpInfo($ip, $ip_address);
        return $response;
    }

    /**
     * Operation modifyIpWithHttpInfo
     *
     * Modify IP address
     *
     * @param string $ip Ip address (required)
     * @param \Upcloud\ApiClient\Model\ModifyIpRequest $ip_address  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\AssignIpResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyIpWithHttpInfo($ip, $ip_address = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\AssignIpResponse';
        $request = $this->modifyIpRequest($ip, $ip_address);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\AssignIpResponse', $e->getResponseHeaders());
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
     * Operation modifyIpAsync
     *
     * Modify IP address
     *
     * @param string $ip Ip address (required)
     * @param \Upcloud\ApiClient\Model\ModifyIpRequest $ip_address  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function modifyIpAsync($ip, $ip_address = null)
    {
        return $this->modifyIpAsyncWithHttpInfo($ip, $ip_address)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyIpAsyncWithHttpInfo
     *
     * Modify IP address
     *
     * @param string $ip Ip address (required)
     * @param \Upcloud\ApiClient\Model\ModifyIpRequest $ip_address  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function modifyIpAsyncWithHttpInfo($ip, $ip_address = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\AssignIpResponse';
        $request = $this->modifyIpRequest($ip, $ip_address);

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
     * Create request for operation 'modifyIp'
     *
     * @param string $ip Ip address (required)
     * @param \Upcloud\ApiClient\Model\ModifyIpRequest $ip_address  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function modifyIpRequest($ip, $ip_address = null)
    {
        // verify the required parameter 'ip' is set
        if ($ip === null) {
            throw new \InvalidArgumentException('Missing the required parameter $ip when calling modifyIp');
        }

        $resourcePath = '/ip_address/{ip}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($ip !== null) {
            $resourcePath = str_replace('{' . 'ip' . '}', ObjectSerializer::toPathValue($ip), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($ip_address)) {
            $_tempBody = $ip_address;
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

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
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

}

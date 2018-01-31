<?php
/**
 * StorageApi
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
 * StorageApi Class Doc Comment
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */
class StorageApi
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
     * Operation attachStorage
     *
     * Attach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\AttachStorageDeviceRequest $storage_device  (required)
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
     * @param \Upcloud\ApiClient\Model\AttachStorageDeviceRequest $storage_device  (required)
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
     * @param \Upcloud\ApiClient\Model\AttachStorageDeviceRequest $storage_device  (required)
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
     * @param \Upcloud\ApiClient\Model\AttachStorageDeviceRequest $storage_device  (required)
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
     * @param \Upcloud\ApiClient\Model\AttachStorageDeviceRequest $storage_device  (required)
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
     * Operation backupStorage
     *
     * Create backup
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CreateBackupStorageRequest $storage  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateStorageResponse
     */
    public function backupStorage($storage_id, $storage)
    {
        list($response) = $this->backupStorageWithHttpInfo($storage_id, $storage);
        return $response;
    }

    /**
     * Operation backupStorageWithHttpInfo
     *
     * Create backup
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CreateBackupStorageRequest $storage  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function backupStorageWithHttpInfo($storage_id, $storage)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->backupStorageRequest($storage_id, $storage);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateStorageResponse', $e->getResponseHeaders());
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
     * Operation backupStorageAsync
     *
     * Create backup
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CreateBackupStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function backupStorageAsync($storage_id, $storage)
    {
        return $this->backupStorageAsyncWithHttpInfo($storage_id, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation backupStorageAsyncWithHttpInfo
     *
     * Create backup
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CreateBackupStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function backupStorageAsyncWithHttpInfo($storage_id, $storage)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->backupStorageRequest($storage_id, $storage);

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
     * Create request for operation 'backupStorage'
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CreateBackupStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function backupStorageRequest($storage_id, $storage)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling backupStorage');
        }
        // verify the required parameter 'storage' is set
        if ($storage === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage when calling backupStorage');
        }

        $resourcePath = '/storage/{storageId}/backup';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($storage)) {
            $_tempBody = $storage;
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
     * Operation cancelOperation
     *
     * Cancel storage operation
     *
     * @param string $storage_id Strage id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function cancelOperation($storage_id)
    {
        $this->cancelOperationWithHttpInfo($storage_id);
    }

    /**
     * Operation cancelOperationWithHttpInfo
     *
     * Cancel storage operation
     *
     * @param string $storage_id Strage id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelOperationWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->cancelOperationRequest($storage_id);

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
     * Operation cancelOperationAsync
     *
     * Cancel storage operation
     *
     * @param string $storage_id Strage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelOperationAsync($storage_id)
    {
        return $this->cancelOperationAsyncWithHttpInfo($storage_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation cancelOperationAsyncWithHttpInfo
     *
     * Cancel storage operation
     *
     * @param string $storage_id Strage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelOperationAsyncWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->cancelOperationRequest($storage_id);

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
     * Create request for operation 'cancelOperation'
     *
     * @param string $storage_id Strage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelOperationRequest($storage_id)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling cancelOperation');
        }

        $resourcePath = '/storage/{storageId}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
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
     * Operation cloneStorage
     *
     * Clone storage
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CloneStorageRequest $storage  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateStorageResponse
     */
    public function cloneStorage($storage_id, $storage)
    {
        list($response) = $this->cloneStorageWithHttpInfo($storage_id, $storage);
        return $response;
    }

    /**
     * Operation cloneStorageWithHttpInfo
     *
     * Clone storage
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CloneStorageRequest $storage  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function cloneStorageWithHttpInfo($storage_id, $storage)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->cloneStorageRequest($storage_id, $storage);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateStorageResponse', $e->getResponseHeaders());
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
     * Operation cloneStorageAsync
     *
     * Clone storage
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CloneStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cloneStorageAsync($storage_id, $storage)
    {
        return $this->cloneStorageAsyncWithHttpInfo($storage_id, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation cloneStorageAsyncWithHttpInfo
     *
     * Clone storage
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CloneStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cloneStorageAsyncWithHttpInfo($storage_id, $storage)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->cloneStorageRequest($storage_id, $storage);

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
     * Create request for operation 'cloneStorage'
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\CloneStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cloneStorageRequest($storage_id, $storage)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling cloneStorage');
        }
        // verify the required parameter 'storage' is set
        if ($storage === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage when calling cloneStorage');
        }

        $resourcePath = '/storage/{storageId}/clone';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($storage)) {
            $_tempBody = $storage;
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
     * Operation createStorage
     *
     * Create storage
     *
     * @param \Upcloud\ApiClient\Model\CreateStorageRequest $storage  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateStorageResponse
     */
    public function createStorage($storage)
    {
        list($response) = $this->createStorageWithHttpInfo($storage);
        return $response;
    }

    /**
     * Operation createStorageWithHttpInfo
     *
     * Create storage
     *
     * @param \Upcloud\ApiClient\Model\CreateStorageRequest $storage  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createStorageWithHttpInfo($storage)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->createStorageRequest($storage);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateStorageResponse', $e->getResponseHeaders());
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
     * Operation createStorageAsync
     *
     * Create storage
     *
     * @param \Upcloud\ApiClient\Model\CreateStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createStorageAsync($storage)
    {
        return $this->createStorageAsyncWithHttpInfo($storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createStorageAsyncWithHttpInfo
     *
     * Create storage
     *
     * @param \Upcloud\ApiClient\Model\CreateStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createStorageAsyncWithHttpInfo($storage)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->createStorageRequest($storage);

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
     * Create request for operation 'createStorage'
     *
     * @param \Upcloud\ApiClient\Model\CreateStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createStorageRequest($storage)
    {
        // verify the required parameter 'storage' is set
        if ($storage === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage when calling createStorage');
        }

        $resourcePath = '/storage';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($storage)) {
            $_tempBody = $storage;
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
     * Operation deleteStorage
     *
     * Delete storage
     *
     * @param string $storage_id  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteStorage($storage_id)
    {
        $this->deleteStorageWithHttpInfo($storage_id);
    }

    /**
     * Operation deleteStorageWithHttpInfo
     *
     * Delete storage
     *
     * @param string $storage_id  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteStorageWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->deleteStorageRequest($storage_id);

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
     * Operation deleteStorageAsync
     *
     * Delete storage
     *
     * @param string $storage_id  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteStorageAsync($storage_id)
    {
        return $this->deleteStorageAsyncWithHttpInfo($storage_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteStorageAsyncWithHttpInfo
     *
     * Delete storage
     *
     * @param string $storage_id  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteStorageAsyncWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->deleteStorageRequest($storage_id);

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
     * Create request for operation 'deleteStorage'
     *
     * @param string $storage_id  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteStorageRequest($storage_id)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling deleteStorage');
        }

        $resourcePath = '/storage/{storageId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
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
     * Operation detachStorage
     *
     * Detach storage
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDeviceDetachRequest $storage_device  (required)
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
     * @param \Upcloud\ApiClient\Model\StorageDeviceDetachRequest $storage_device  (required)
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
     * @param \Upcloud\ApiClient\Model\StorageDeviceDetachRequest $storage_device  (required)
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
     * @param \Upcloud\ApiClient\Model\StorageDeviceDetachRequest $storage_device  (required)
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
     * @param \Upcloud\ApiClient\Model\StorageDeviceDetachRequest $storage_device  (required)
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
     * Operation ejectCdrom
     *
     * Eject CD-ROM
     *
     * @param string $server_id Server id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function ejectCdrom($server_id)
    {
        $this->ejectCdromWithHttpInfo($server_id);
    }

    /**
     * Operation ejectCdromWithHttpInfo
     *
     * Eject CD-ROM
     *
     * @param string $server_id Server id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function ejectCdromWithHttpInfo($server_id)
    {
        $returnType = '';
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
        $returnType = '';
        $request = $this->ejectCdromRequest($server_id);

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

        $resourcePath = '/server/{serverId}/cdrom/eject';
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
     * Operation favoriteStorage
     *
     * Add storage to favorites
     *
     * @param string $storage_id Storage id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function favoriteStorage($storage_id)
    {
        $this->favoriteStorageWithHttpInfo($storage_id);
    }

    /**
     * Operation favoriteStorageWithHttpInfo
     *
     * Add storage to favorites
     *
     * @param string $storage_id Storage id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function favoriteStorageWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->favoriteStorageRequest($storage_id);

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
            }
            throw $e;
        }
    }

    /**
     * Operation favoriteStorageAsync
     *
     * Add storage to favorites
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function favoriteStorageAsync($storage_id)
    {
        return $this->favoriteStorageAsyncWithHttpInfo($storage_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation favoriteStorageAsyncWithHttpInfo
     *
     * Add storage to favorites
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function favoriteStorageAsyncWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->favoriteStorageRequest($storage_id);

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
     * Create request for operation 'favoriteStorage'
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function favoriteStorageRequest($storage_id)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling favoriteStorage');
        }

        $resourcePath = '/storage/{storageId}/favorite';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
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
     * Operation getStorageDetails
     *
     * Get storage details
     *
     * @param string $storage_id  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateStorageResponse
     */
    public function getStorageDetails($storage_id)
    {
        list($response) = $this->getStorageDetailsWithHttpInfo($storage_id);
        return $response;
    }

    /**
     * Operation getStorageDetailsWithHttpInfo
     *
     * Get storage details
     *
     * @param string $storage_id  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStorageDetailsWithHttpInfo($storage_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->getStorageDetailsRequest($storage_id);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateStorageResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getStorageDetailsAsync
     *
     * Get storage details
     *
     * @param string $storage_id  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStorageDetailsAsync($storage_id)
    {
        return $this->getStorageDetailsAsyncWithHttpInfo($storage_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getStorageDetailsAsyncWithHttpInfo
     *
     * Get storage details
     *
     * @param string $storage_id  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStorageDetailsAsyncWithHttpInfo($storage_id)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->getStorageDetailsRequest($storage_id);

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
     * Create request for operation 'getStorageDetails'
     *
     * @param string $storage_id  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getStorageDetailsRequest($storage_id)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling getStorageDetails');
        }

        $resourcePath = '/storage/{storageId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
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
     * Operation listStorageTypes
     *
     * List of storages by type
     *
     * @param string $type Storage&#39;s access type (&#x60;public&#x60; or &#x60;private&#x60;) or storage type (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;) or &#x60;favorite&#x60; status (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\SuccessStoragesResponse
     */
    public function listStorageTypes($type)
    {
        list($response) = $this->listStorageTypesWithHttpInfo($type);
        return $response;
    }

    /**
     * Operation listStorageTypesWithHttpInfo
     *
     * List of storages by type
     *
     * @param string $type Storage&#39;s access type (&#x60;public&#x60; or &#x60;private&#x60;) or storage type (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;) or &#x60;favorite&#x60; status (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\SuccessStoragesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listStorageTypesWithHttpInfo($type)
    {
        $returnType = '\Upcloud\ApiClient\Model\SuccessStoragesResponse';
        $request = $this->listStorageTypesRequest($type);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\SuccessStoragesResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listStorageTypesAsync
     *
     * List of storages by type
     *
     * @param string $type Storage&#39;s access type (&#x60;public&#x60; or &#x60;private&#x60;) or storage type (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;) or &#x60;favorite&#x60; status (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listStorageTypesAsync($type)
    {
        return $this->listStorageTypesAsyncWithHttpInfo($type)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listStorageTypesAsyncWithHttpInfo
     *
     * List of storages by type
     *
     * @param string $type Storage&#39;s access type (&#x60;public&#x60; or &#x60;private&#x60;) or storage type (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;) or &#x60;favorite&#x60; status (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listStorageTypesAsyncWithHttpInfo($type)
    {
        $returnType = '\Upcloud\ApiClient\Model\SuccessStoragesResponse';
        $request = $this->listStorageTypesRequest($type);

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
     * Create request for operation 'listStorageTypes'
     *
     * @param string $type Storage&#39;s access type (&#x60;public&#x60; or &#x60;private&#x60;) or storage type (&#x60;normal&#x60;, &#x60;backup&#x60;, &#x60;cdrom&#x60; or &#x60;template&#x60;) or &#x60;favorite&#x60; status (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listStorageTypesRequest($type)
    {
        // verify the required parameter 'type' is set
        if ($type === null) {
            throw new \InvalidArgumentException('Missing the required parameter $type when calling listStorageTypes');
        }

        $resourcePath = '/storage/{type}/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($type !== null) {
            $resourcePath = str_replace('{' . 'type' . '}', ObjectSerializer::toPathValue($type), $resourcePath);
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
     * Operation listStorages
     *
     * List of storages
     *
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\SuccessStoragesResponse
     */
    public function listStorages()
    {
        list($response) = $this->listStoragesWithHttpInfo();
        return $response;
    }

    /**
     * Operation listStoragesWithHttpInfo
     *
     * List of storages
     *
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\SuccessStoragesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listStoragesWithHttpInfo()
    {
        $returnType = '\Upcloud\ApiClient\Model\SuccessStoragesResponse';
        $request = $this->listStoragesRequest();

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\SuccessStoragesResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listStoragesAsync
     *
     * List of storages
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listStoragesAsync()
    {
        return $this->listStoragesAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listStoragesAsyncWithHttpInfo
     *
     * List of storages
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listStoragesAsyncWithHttpInfo()
    {
        $returnType = '\Upcloud\ApiClient\Model\SuccessStoragesResponse';
        $request = $this->listStoragesRequest();

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
     * Create request for operation 'listStorages'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listStoragesRequest()
    {

        $resourcePath = '/storage';
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
     * Operation loadCdrom
     *
     * Load CD-ROM
     *
     * @param string $server_id Server id (required)
     * @param \Upcloud\ApiClient\Model\StorageDeviceLoadRequest $storage_device  (optional)
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
     * @param \Upcloud\ApiClient\Model\StorageDeviceLoadRequest $storage_device  (optional)
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
     * @param \Upcloud\ApiClient\Model\StorageDeviceLoadRequest $storage_device  (optional)
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
     * @param \Upcloud\ApiClient\Model\StorageDeviceLoadRequest $storage_device  (optional)
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
     * @param \Upcloud\ApiClient\Model\StorageDeviceLoadRequest $storage_device  (optional)
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
     * Operation modifyStorage
     *
     * Modify storage
     *
     * @param string $storage_id  (required)
     * @param \Upcloud\ApiClient\Model\ModifyStorageRequest $storage  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateStorageResponse
     */
    public function modifyStorage($storage_id, $storage)
    {
        list($response) = $this->modifyStorageWithHttpInfo($storage_id, $storage);
        return $response;
    }

    /**
     * Operation modifyStorageWithHttpInfo
     *
     * Modify storage
     *
     * @param string $storage_id  (required)
     * @param \Upcloud\ApiClient\Model\ModifyStorageRequest $storage  (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyStorageWithHttpInfo($storage_id, $storage)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->modifyStorageRequest($storage_id, $storage);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateStorageResponse', $e->getResponseHeaders());
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
     * Operation modifyStorageAsync
     *
     * Modify storage
     *
     * @param string $storage_id  (required)
     * @param \Upcloud\ApiClient\Model\ModifyStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function modifyStorageAsync($storage_id, $storage)
    {
        return $this->modifyStorageAsyncWithHttpInfo($storage_id, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyStorageAsyncWithHttpInfo
     *
     * Modify storage
     *
     * @param string $storage_id  (required)
     * @param \Upcloud\ApiClient\Model\ModifyStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function modifyStorageAsyncWithHttpInfo($storage_id, $storage)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->modifyStorageRequest($storage_id, $storage);

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
     * Create request for operation 'modifyStorage'
     *
     * @param string $storage_id  (required)
     * @param \Upcloud\ApiClient\Model\ModifyStorageRequest $storage  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function modifyStorageRequest($storage_id, $storage)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling modifyStorage');
        }
        // verify the required parameter 'storage' is set
        if ($storage === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage when calling modifyStorage');
        }

        $resourcePath = '/storage/{storageId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($storage)) {
            $_tempBody = $storage;
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

    /**
     * Operation restoreStorage
     *
     * Restore backup
     *
     * @param string $storage_id Storage id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function restoreStorage($storage_id)
    {
        $this->restoreStorageWithHttpInfo($storage_id);
    }

    /**
     * Operation restoreStorageWithHttpInfo
     *
     * Restore backup
     *
     * @param string $storage_id Storage id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function restoreStorageWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->restoreStorageRequest($storage_id);

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
     * Operation restoreStorageAsync
     *
     * Restore backup
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function restoreStorageAsync($storage_id)
    {
        return $this->restoreStorageAsyncWithHttpInfo($storage_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation restoreStorageAsyncWithHttpInfo
     *
     * Restore backup
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function restoreStorageAsyncWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->restoreStorageRequest($storage_id);

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
     * Create request for operation 'restoreStorage'
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function restoreStorageRequest($storage_id)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling restoreStorage');
        }

        $resourcePath = '/storage/{storageId}/restore';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
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
     * Operation templatizeStorage
     *
     * Templatize storage
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\TemplitizeStorageRequest $storage  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Upcloud\ApiClient\Model\CreateStorageResponse
     */
    public function templatizeStorage($storage_id, $storage = null)
    {
        list($response) = $this->templatizeStorageWithHttpInfo($storage_id, $storage);
        return $response;
    }

    /**
     * Operation templatizeStorageWithHttpInfo
     *
     * Templatize storage
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\TemplitizeStorageRequest $storage  (optional)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Upcloud\ApiClient\Model\CreateStorageResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function templatizeStorageWithHttpInfo($storage_id, $storage = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->templatizeStorageRequest($storage_id, $storage);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Upcloud\ApiClient\Model\CreateStorageResponse', $e->getResponseHeaders());
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
     * Operation templatizeStorageAsync
     *
     * Templatize storage
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\TemplitizeStorageRequest $storage  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function templatizeStorageAsync($storage_id, $storage = null)
    {
        return $this->templatizeStorageAsyncWithHttpInfo($storage_id, $storage)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation templatizeStorageAsyncWithHttpInfo
     *
     * Templatize storage
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\TemplitizeStorageRequest $storage  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function templatizeStorageAsyncWithHttpInfo($storage_id, $storage = null)
    {
        $returnType = '\Upcloud\ApiClient\Model\CreateStorageResponse';
        $request = $this->templatizeStorageRequest($storage_id, $storage);

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
     * Create request for operation 'templatizeStorage'
     *
     * @param string $storage_id Storage id (required)
     * @param \Upcloud\ApiClient\Model\TemplitizeStorageRequest $storage  (optional)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function templatizeStorageRequest($storage_id, $storage = null)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling templatizeStorage');
        }

        $resourcePath = '/storage/{storageId}/templatize';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($storage)) {
            $_tempBody = $storage;
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
     * Operation unfavoriteStorage
     *
     * Remove storage from favorites
     *
     * @param string $storage_id Storage id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function unfavoriteStorage($storage_id)
    {
        $this->unfavoriteStorageWithHttpInfo($storage_id);
    }

    /**
     * Operation unfavoriteStorageWithHttpInfo
     *
     * Remove storage from favorites
     *
     * @param string $storage_id Storage id (required)
     * @throws \Upcloud\ApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function unfavoriteStorageWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->unfavoriteStorageRequest($storage_id);

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
            }
            throw $e;
        }
    }

    /**
     * Operation unfavoriteStorageAsync
     *
     * Remove storage from favorites
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function unfavoriteStorageAsync($storage_id)
    {
        return $this->unfavoriteStorageAsyncWithHttpInfo($storage_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation unfavoriteStorageAsyncWithHttpInfo
     *
     * Remove storage from favorites
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function unfavoriteStorageAsyncWithHttpInfo($storage_id)
    {
        $returnType = '';
        $request = $this->unfavoriteStorageRequest($storage_id);

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
     * Create request for operation 'unfavoriteStorage'
     *
     * @param string $storage_id Storage id (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function unfavoriteStorageRequest($storage_id)
    {
        // verify the required parameter 'storage_id' is set
        if ($storage_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $storage_id when calling unfavoriteStorage');
        }

        $resourcePath = '/storage/{storageId}/favorite';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($storage_id !== null) {
            $resourcePath = str_replace('{' . 'storageId' . '}', ObjectSerializer::toPathValue($storage_id), $resourcePath);
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

}

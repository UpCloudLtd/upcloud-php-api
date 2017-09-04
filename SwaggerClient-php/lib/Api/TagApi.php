<?php
/**
 * TagApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 */

/**
 * Upcloud api
 *
 * The UpCloud API consists of operations used to control resources on UpCloud. The API is a web service interface. HTTPS is used to connect to the API. The API follows the principles of a RESTful web service wherever possible. The base URL for all API operations is  https://api.upcloud.com/. All API operations require authentication.
 *
 * OpenAPI spec version: 1.2.0
 * 
 */


namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * TagApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 */
class TagApi
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
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ServerListResponse
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
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ServerListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function assignTagWithHttpInfo($server_id, $tag_list)
    {
        $returnType = '\Swagger\Client\Model\ServerListResponse';
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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\ServerListResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
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
        $returnType = '\Swagger\Client\Model\ServerListResponse';
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
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
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
     * Operation createTag
     *
     * Create a new tag
     *
     * @param \Swagger\Client\Model\Tag $tag  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\CreateNewTagResponse
     */
    public function createTag($tag)
    {
        list($response) = $this->createTagWithHttpInfo($tag);
        return $response;
    }

    /**
     * Operation createTagWithHttpInfo
     *
     * Create a new tag
     *
     * @param \Swagger\Client\Model\Tag $tag  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\CreateNewTagResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTagWithHttpInfo($tag)
    {
        $returnType = '\Swagger\Client\Model\CreateNewTagResponse';
        $request = $this->createTagRequest($tag);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\CreateNewTagResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createTagAsync
     *
     * Create a new tag
     *
     * @param \Swagger\Client\Model\Tag $tag  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTagAsync($tag)
    {
        return $this->createTagAsyncWithHttpInfo($tag)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation createTagAsyncWithHttpInfo
     *
     * Create a new tag
     *
     * @param \Swagger\Client\Model\Tag $tag  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTagAsyncWithHttpInfo($tag)
    {
        $returnType = '\Swagger\Client\Model\CreateNewTagResponse';
        $request = $this->createTagRequest($tag);

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
     * Create request for operation 'createTag'
     *
     * @param \Swagger\Client\Model\Tag $tag  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createTagRequest($tag)
    {
        // verify the required parameter 'tag' is set
        if ($tag === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag when calling createTag');
        }

        $resourcePath = '/tag';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($tag)) {
            $_tempBody = $tag;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
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
     * Operation deleteTag
     *
     * Delete tag
     *
     * @param string $tag_name Tag name (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteTag($tag_name)
    {
        $this->deleteTagWithHttpInfo($tag_name);
    }

    /**
     * Operation deleteTagWithHttpInfo
     *
     * Delete tag
     *
     * @param string $tag_name Tag name (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteTagWithHttpInfo($tag_name)
    {
        $returnType = '';
        $request = $this->deleteTagRequest($tag_name);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteTagAsync
     *
     * Delete tag
     *
     * @param string $tag_name Tag name (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTagAsync($tag_name)
    {
        return $this->deleteTagAsyncWithHttpInfo($tag_name)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteTagAsyncWithHttpInfo
     *
     * Delete tag
     *
     * @param string $tag_name Tag name (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTagAsyncWithHttpInfo($tag_name)
    {
        $returnType = '';
        $request = $this->deleteTagRequest($tag_name);

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
     * Create request for operation 'deleteTag'
     *
     * @param string $tag_name Tag name (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteTagRequest($tag_name)
    {
        // verify the required parameter 'tag_name' is set
        if ($tag_name === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_name when calling deleteTag');
        }

        $resourcePath = '/tag/{tagName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($tag_name !== null) {
            $resourcePath = str_replace('{' . 'tagName' . '}', ObjectSerializer::toPathValue($tag_name), $resourcePath);
        }


        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
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
     * Operation listTags
     *
     * List existing tags
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TagListResponse
     */
    public function listTags()
    {
        list($response) = $this->listTagsWithHttpInfo();
        return $response;
    }

    /**
     * Operation listTagsWithHttpInfo
     *
     * List existing tags
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TagListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listTagsWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\TagListResponse';
        $request = $this->listTagsRequest();

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\TagListResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listTagsAsync
     *
     * List existing tags
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTagsAsync()
    {
        return $this->listTagsAsyncWithHttpInfo()->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation listTagsAsyncWithHttpInfo
     *
     * List existing tags
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTagsAsyncWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\TagListResponse';
        $request = $this->listTagsRequest();

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
     * Create request for operation 'listTags'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listTagsRequest()
    {

        $resourcePath = '/tag';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
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
     * Operation modifyTag
     *
     * Modify existing tag
     *
     * @param string $tag_name Tag name (required)
     * @param \Swagger\Client\Model\Tag1 $tag  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\CreateNewTagResponse
     */
    public function modifyTag($tag_name, $tag)
    {
        list($response) = $this->modifyTagWithHttpInfo($tag_name, $tag);
        return $response;
    }

    /**
     * Operation modifyTagWithHttpInfo
     *
     * Modify existing tag
     *
     * @param string $tag_name Tag name (required)
     * @param \Swagger\Client\Model\Tag1 $tag  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\CreateNewTagResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function modifyTagWithHttpInfo($tag_name, $tag)
    {
        $returnType = '\Swagger\Client\Model\CreateNewTagResponse';
        $request = $this->modifyTagRequest($tag_name, $tag);

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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\CreateNewTagResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation modifyTagAsync
     *
     * Modify existing tag
     *
     * @param string $tag_name Tag name (required)
     * @param \Swagger\Client\Model\Tag1 $tag  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function modifyTagAsync($tag_name, $tag)
    {
        return $this->modifyTagAsyncWithHttpInfo($tag_name, $tag)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation modifyTagAsyncWithHttpInfo
     *
     * Modify existing tag
     *
     * @param string $tag_name Tag name (required)
     * @param \Swagger\Client\Model\Tag1 $tag  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function modifyTagAsyncWithHttpInfo($tag_name, $tag)
    {
        $returnType = '\Swagger\Client\Model\CreateNewTagResponse';
        $request = $this->modifyTagRequest($tag_name, $tag);

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
     * Create request for operation 'modifyTag'
     *
     * @param string $tag_name Tag name (required)
     * @param \Swagger\Client\Model\Tag1 $tag  (required)
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function modifyTagRequest($tag_name, $tag)
    {
        // verify the required parameter 'tag_name' is set
        if ($tag_name === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_name when calling modifyTag');
        }
        // verify the required parameter 'tag' is set
        if ($tag === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag when calling modifyTag');
        }

        $resourcePath = '/tag/{tagName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($tag_name !== null) {
            $resourcePath = str_replace('{' . 'tagName' . '}', ObjectSerializer::toPathValue($tag_name), $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($tag)) {
            $_tempBody = $tag;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
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
     * Operation untag
     *
     * Remove tag from server
     *
     * @param string $server_id Server id (required)
     * @param string $tag_name Tag name (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ServerListResponse
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
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ServerListResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function untagWithHttpInfo($server_id, $tag_name)
    {
        $returnType = '\Swagger\Client\Model\ServerListResponse';
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
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\ServerListResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Swagger\Client\Model\Error', $e->getResponseHeaders());
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
        $returnType = '\Swagger\Client\Model\ServerListResponse';
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
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
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

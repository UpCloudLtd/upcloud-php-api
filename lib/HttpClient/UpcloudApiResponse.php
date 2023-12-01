<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\HttpClient;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Upcloud\ApiClient\Serializer;
use Upcloud\ApiClient\SerializerInterface;

class UpcloudApiResponse
{
    /**
     * @var array The response headers in the form of an associative array.
     */
    protected $headers;

    /**
     * @var StreamInterface The raw response body.
     */
    protected $body;

    /**
     * @var int The HTTP status response code.
     */
    protected $statusCode;

    /**
     * @var SerializerInterface|null
     */
    protected $serializer = null;

    /**
     * Creates a new UpcloudApiResponse
     *
     * @param string|array $headers The headers as a raw string or array.
     * @param StreamInterface $body The raw response body.
     * @param null|int $statusCode The HTTP response code (if sending headers as parsed array).
     */
    public function __construct($headers, StreamInterface $body, $statusCode = null)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
        $this->serializer = new Serializer;
    }

    public static function createFromResponse(ResponseInterface $response): self
    {
        return new self(
            $response->getHeaders(),
            $response->getBody(),
            $response->getStatusCode()
        );
    }

    /**
     * Return the response headers.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Return the body of the response.
     *
     * @return StreamInterface
     */
    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    /**
     * Return the HTTP response code.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param SerializerInterface $serializer
     * @return $this
     */
    public function setSerializer(SerializerInterface $serializer): self
    {

        $this->serializer = $serializer;

        return $this;
    }

    /**
     * @param $class
     * @return array|mixed|object
     */
    public function deserializeBody($class)
    {
        return $this->serializer->deserialize(
            (string) $this->getBody(),
            $class,
            'json'
        );
    }

    /**
     * @param null $class
     * @return array
     */
    public function toArray($class = null): array
    {
        return [
            $class ? $this->deserializeBody($class) : null,
            $this->statusCode,
            $this->headers
        ];
    }
}

<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\HttpClient;

use GuzzleHttp\Utils;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Upcloud\ApiClient\ObjectSerializer;

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
     * @param $class
     * @return array|\DateTime|object|\SplFileObject|null
     */
    public function deserializeBody($class)
    {
        return ObjectSerializer::deserialize(
            Utils::jsonDecode((string) $this->body),
            $class,
            $this->headers
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

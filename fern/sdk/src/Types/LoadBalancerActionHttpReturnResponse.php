<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Defines a custom HTTP response returned to the client when a rule matches. Used when the action type is 'http_return'.
 */
class LoadBalancerActionHttpReturnResponse extends JsonSerializableType
{
    /**
     * @var int $status HTTP status code to return.
     */
    #[JsonProperty('status')]
    public int $status;

    /**
     * @var string $contentType MIME type of the response body.
     */
    #[JsonProperty('content_type')]
    public string $contentType;

    /**
     * @var string $payload Base64-encoded payload returned as the response body.
     */
    #[JsonProperty('payload')]
    public string $payload;

    /**
     * @param array{
     *   status: int,
     *   contentType: string,
     *   payload: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
        $this->contentType = $values['contentType'];
        $this->payload = $values['payload'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

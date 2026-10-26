<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Forwarding rule HTTP Return action
 */
class LoadBalancerActionHttpReturnCreate extends JsonSerializableType
{
    /**
     * @var int $status HTTP Status code
     */
    #[JsonProperty('status')]
    public int $status;

    /**
     * @var value-of<LoadBalancerContentTypes> $contentType
     */
    #[JsonProperty('content_type')]
    public string $contentType;

    /**
     * @var string $payload Response body content to return to the client.
     */
    #[JsonProperty('payload')]
    public string $payload;

    /**
     * @param array{
     *   status: int,
     *   contentType: value-of<LoadBalancerContentTypes>,
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

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for server size limits
 */
class ServerSizeLimits extends JsonSerializableType
{
    /**
     * @var ServerSizeLimitsServerSizeLimits $serverSizeLimits
     */
    #[JsonProperty('server_size_limits')]
    public ServerSizeLimitsServerSizeLimits $serverSizeLimits;

    /**
     * @param array{
     *   serverSizeLimits: ServerSizeLimitsServerSizeLimits,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serverSizeLimits = $values['serverSizeLimits'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

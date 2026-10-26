<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * List of server sizes
 */
class ServerSizes extends JsonSerializableType
{
    /**
     * @var ServerSizesServerSizes $serverSizes
     */
    #[JsonProperty('server_sizes')]
    public ServerSizesServerSizes $serverSizes;

    /**
     * @param array{
     *   serverSizes: ServerSizesServerSizes,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serverSizes = $values['serverSizes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

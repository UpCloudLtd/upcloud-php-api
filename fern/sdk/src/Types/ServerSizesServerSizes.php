<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerSizesServerSizes extends JsonSerializableType
{
    /**
     * @var array<ServerSizesServerSizesServerSizeItem> $serverSize
     */
    #[JsonProperty('server_size'), ArrayType([ServerSizesServerSizesServerSizeItem::class])]
    public array $serverSize;

    /**
     * @param array{
     *   serverSize: array<ServerSizesServerSizesServerSizeItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serverSize = $values['serverSize'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

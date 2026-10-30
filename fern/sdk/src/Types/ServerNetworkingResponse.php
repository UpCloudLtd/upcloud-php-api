<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Cloud Server networking response
 */
class ServerNetworkingResponse extends JsonSerializableType
{
    /**
     * @var ServerNetworking $networking
     */
    #[JsonProperty('networking')]
    public ServerNetworking $networking;

    /**
     * @param array{
     *   networking: ServerNetworking,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->networking = $values['networking'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

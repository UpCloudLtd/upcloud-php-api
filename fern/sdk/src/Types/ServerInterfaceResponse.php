<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Network interface response
 */
class ServerInterfaceResponse extends JsonSerializableType
{
    /**
     * @var ServerInterface $interface
     */
    #[JsonProperty('interface')]
    public ServerInterface $interface;

    /**
     * @param array{
     *   interface: ServerInterface,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interface = $values['interface'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerAddInterfaceInterface;
use Upcloud\Core\Json\JsonProperty;

class ServerAddInterface extends JsonSerializableType
{
    /**
     * @var ServerAddInterfaceInterface $interface
     */
    #[JsonProperty('interface')]
    public ServerAddInterfaceInterface $interface;

    /**
     * @param array{
     *   interface: ServerAddInterfaceInterface,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interface = $values['interface'];
    }
}

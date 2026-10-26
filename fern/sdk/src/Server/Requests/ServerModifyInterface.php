<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Server\Types\ServerModifyInterfaceInterface;
use Upcloud\Core\Json\JsonProperty;

class ServerModifyInterface extends JsonSerializableType
{
    /**
     * @var ServerModifyInterfaceInterface $interface
     */
    #[JsonProperty('interface')]
    public ServerModifyInterfaceInterface $interface;

    /**
     * @param array{
     *   interface: ServerModifyInterfaceInterface,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interface = $values['interface'];
    }
}

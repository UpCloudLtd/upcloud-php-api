<?php

namespace Upcloud\Server\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ServerBooleanYesno;
use Upcloud\Server\Types\ServerAddIpAddressIpAddress;
use Upcloud\Core\Json\JsonProperty;

class ServerAddIpAddress extends JsonSerializableType
{
    /**
     * @var ?value-of<ServerBooleanYesno> $force Move the address from another interface when that interface can retain its required minimum number of addresses
     */
    public ?string $force;

    /**
     * @var ServerAddIpAddressIpAddress $ipAddress
     */
    #[JsonProperty('ip_address')]
    public ServerAddIpAddressIpAddress $ipAddress;

    /**
     * @param array{
     *   ipAddress: ServerAddIpAddressIpAddress,
     *   force?: ?value-of<ServerBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->force = $values['force'] ?? null;
        $this->ipAddress = $values['ipAddress'];
    }
}

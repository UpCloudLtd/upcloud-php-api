<?php

namespace Upcloud\NetworkPeering\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\NetworkPeering\Types\NetworkPeeringModifyConfiguredStatus;
use Upcloud\Core\Json\JsonProperty;

class NetworkPeeringModify extends JsonSerializableType
{
    /**
     * @var ?value-of<NetworkPeeringModifyConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public ?string $configuredStatus;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   configuredStatus?: ?value-of<NetworkPeeringModifyConfiguredStatus>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}

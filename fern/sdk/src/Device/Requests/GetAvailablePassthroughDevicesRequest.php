<?php

namespace Upcloud\Device\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Device\Types\GetAvailablePassthroughDevicesRequestType;

class GetAvailablePassthroughDevicesRequest extends JsonSerializableType
{
    /**
     * @var ?string $zone Filter results to a specific zone.
     */
    public ?string $zone;

    /**
     * @var ?value-of<GetAvailablePassthroughDevicesRequestType> $type Filter results to a specific device type. The only valid type is "gpu" for now.
     */
    public ?string $type;

    /**
     * @param array{
     *   zone?: ?string,
     *   type?: ?value-of<GetAvailablePassthroughDevicesRequestType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->zone = $values['zone'] ?? null;
        $this->type = $values['type'] ?? null;
    }
}

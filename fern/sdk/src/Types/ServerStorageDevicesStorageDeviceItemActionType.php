<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerStorageDevicesStorageDeviceItemActionType extends JsonSerializableType
{
    /**
     * @var value-of<ServerStorageDevicesStorageDeviceItemActionTypeType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<ServerStorageDevicesStorageDeviceItemActionTypeType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

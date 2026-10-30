<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for passthrough device information.
 */
class ServerDevice extends JsonSerializableType
{
    /**
     * @var string $serial
     */
    #[JsonProperty('serial')]
    public string $serial;

    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $model
     */
    #[JsonProperty('model')]
    public string $model;

    /**
     * @var ServerDeviceMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public ServerDeviceMetadata $metadata;

    /**
     * @param array{
     *   serial: string,
     *   type: string,
     *   model: string,
     *   metadata: ServerDeviceMetadata,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serial = $values['serial'];
        $this->type = $values['type'];
        $this->model = $values['model'];
        $this->metadata = $values['metadata'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

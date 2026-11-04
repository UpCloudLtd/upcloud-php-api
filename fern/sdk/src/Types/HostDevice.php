<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for passthrough device information.
 */
class HostDevice extends JsonSerializableType
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
     * @var ?string $server
     */
    #[JsonProperty('server')]
    public ?string $server;

    /**
     * @var HostDeviceMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public HostDeviceMetadata $metadata;

    /**
     * @param array{
     *   serial: string,
     *   type: string,
     *   model: string,
     *   metadata: HostDeviceMetadata,
     *   server?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serial = $values['serial'];
        $this->type = $values['type'];
        $this->model = $values['model'];
        $this->server = $values['server'] ?? null;
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

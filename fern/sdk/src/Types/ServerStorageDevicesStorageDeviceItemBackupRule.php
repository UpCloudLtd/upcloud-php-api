<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerStorageDevicesStorageDeviceItemBackupRule extends JsonSerializableType
{
    /**
     * @var ?string $interval Backup weekday, or daily to create a backup every day
     */
    #[JsonProperty('interval')]
    public ?string $interval;

    /**
     * @var ?int $retention Number of days before an automatic backup is deleted
     */
    #[JsonProperty('retention')]
    public ?int $retention;

    /**
     * @var ?string $time UTC backup start time in HHMM format
     */
    #[JsonProperty('time')]
    public ?string $time;

    /**
     * @param array{
     *   interval?: ?string,
     *   retention?: ?int,
     *   time?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->interval = $values['interval'] ?? null;
        $this->retention = $values['retention'] ?? null;
        $this->time = $values['time'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

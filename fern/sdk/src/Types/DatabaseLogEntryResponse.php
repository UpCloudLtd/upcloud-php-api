<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Schema representing a log entry from an UpCloud service.
 */
class DatabaseLogEntryResponse extends JsonSerializableType
{
    /**
     * @var ?string $hostname The name of the UpCloud service host where the log entry originated.
     */
    #[JsonProperty('hostname')]
    public ?string $hostname;

    /**
     * @var ?string $msg The log message content.
     */
    #[JsonProperty('msg')]
    public ?string $msg;

    /**
     * @var ?DateTime $time Timestamp of the log entry.
     */
    #[JsonProperty('time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $time;

    /**
     * @var ?string $service Name of the UpCloud service that generated the log entry.
     */
    #[JsonProperty('service')]
    public ?string $service;

    /**
     * @param array{
     *   hostname?: ?string,
     *   msg?: ?string,
     *   time?: ?DateTime,
     *   service?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->hostname = $values['hostname'] ?? null;
        $this->msg = $values['msg'] ?? null;
        $this->time = $values['time'] ?? null;
        $this->service = $values['service'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

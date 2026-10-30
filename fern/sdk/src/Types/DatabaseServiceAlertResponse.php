<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

/**
 * Schema for a service alert
 */
class DatabaseServiceAlertResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $createTime The time when the alert was created.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?string $event A brief description of the alert event.
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?string $serviceType The type of service associated with the alert.
     */
    #[JsonProperty('service_type')]
    public ?string $serviceType;

    /**
     * @var ?string $severity The severity level of the alert.
     */
    #[JsonProperty('severity')]
    public ?string $severity;

    /**
     * @param array{
     *   createTime?: ?DateTime,
     *   event?: ?string,
     *   serviceType?: ?string,
     *   severity?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createTime = $values['createTime'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->serviceType = $values['serviceType'] ?? null;
        $this->severity = $values['severity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

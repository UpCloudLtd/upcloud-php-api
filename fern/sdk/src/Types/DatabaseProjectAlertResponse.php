<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Date;

/**
 * Schema for a project alert response
 */
class DatabaseProjectAlertResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $createTime Timestamp when the alert was created
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?string $event Event type for the alert
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?string $uuid Unique identifier for the alert
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $title Optional title of the alert
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $serviceType Service type related to the alert
     */
    #[JsonProperty('service_type')]
    public ?string $serviceType;

    /**
     * @var ?string $severity Severity of the alert
     */
    #[JsonProperty('severity')]
    public ?string $severity;

    /**
     * @param array{
     *   createTime?: ?DateTime,
     *   event?: ?string,
     *   uuid?: ?string,
     *   title?: ?string,
     *   serviceType?: ?string,
     *   severity?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createTime = $values['createTime'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->uuid = $values['uuid'] ?? null;
        $this->title = $values['title'] ?? null;
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

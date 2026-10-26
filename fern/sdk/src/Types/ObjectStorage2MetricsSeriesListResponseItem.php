<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class ObjectStorage2MetricsSeriesListResponseItem extends JsonSerializableType
{
    /**
     * @var ?int $bytesCreated
     */
    #[JsonProperty('bytes_created')]
    public ?int $bytesCreated;

    /**
     * @var ?int $bytesDeleted
     */
    #[JsonProperty('bytes_deleted')]
    public ?int $bytesDeleted;

    /**
     * @var ?int $bytesReceived
     */
    #[JsonProperty('bytes_received')]
    public ?int $bytesReceived;

    /**
     * @var ?int $bytesTotal
     */
    #[JsonProperty('bytes_total')]
    public ?int $bytesTotal;

    /**
     * @var ?int $bytesTransmitted
     */
    #[JsonProperty('bytes_transmitted')]
    public ?int $bytesTransmitted;

    /**
     * @var ?DateTime $endAt
     */
    #[JsonProperty('end_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endAt;

    /**
     * @var ?int $objectsCreated
     */
    #[JsonProperty('objects_created')]
    public ?int $objectsCreated;

    /**
     * @var ?int $objectsDeleted
     */
    #[JsonProperty('objects_deleted')]
    public ?int $objectsDeleted;

    /**
     * @var ?int $objectsTotal
     */
    #[JsonProperty('objects_total')]
    public ?int $objectsTotal;

    /**
     * @var ?DateTime $startAt
     */
    #[JsonProperty('start_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startAt;

    /**
     * @param array{
     *   bytesCreated?: ?int,
     *   bytesDeleted?: ?int,
     *   bytesReceived?: ?int,
     *   bytesTotal?: ?int,
     *   bytesTransmitted?: ?int,
     *   endAt?: ?DateTime,
     *   objectsCreated?: ?int,
     *   objectsDeleted?: ?int,
     *   objectsTotal?: ?int,
     *   startAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bytesCreated = $values['bytesCreated'] ?? null;
        $this->bytesDeleted = $values['bytesDeleted'] ?? null;
        $this->bytesReceived = $values['bytesReceived'] ?? null;
        $this->bytesTotal = $values['bytesTotal'] ?? null;
        $this->bytesTransmitted = $values['bytesTransmitted'] ?? null;
        $this->endAt = $values['endAt'] ?? null;
        $this->objectsCreated = $values['objectsCreated'] ?? null;
        $this->objectsDeleted = $values['objectsDeleted'] ?? null;
        $this->objectsTotal = $values['objectsTotal'] ?? null;
        $this->startAt = $values['startAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

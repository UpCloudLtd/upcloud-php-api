<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class AccountResourceNetworkUsageStatsStatItem extends JsonSerializableType
{
    /**
     * @var string $resourceId
     */
    #[JsonProperty('resource_id')]
    public string $resourceId;

    /**
     * @var value-of<AccountResourceNetworkUsageType> $service
     */
    #[JsonProperty('service')]
    public string $service;

    /**
     * @var string $zone
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var DateTime $startTime
     */
    #[JsonProperty('start_time'), Date(Date::TYPE_DATETIME)]
    public DateTime $startTime;

    /**
     * @var ?int $sentBytes
     */
    #[JsonProperty('sent_bytes')]
    public ?int $sentBytes;

    /**
     * @param array{
     *   resourceId: string,
     *   service: value-of<AccountResourceNetworkUsageType>,
     *   zone: string,
     *   startTime: DateTime,
     *   sentBytes?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resourceId = $values['resourceId'];
        $this->service = $values['service'];
        $this->zone = $values['zone'];
        $this->startTime = $values['startTime'];
        $this->sentBytes = $values['sentBytes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

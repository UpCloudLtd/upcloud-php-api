<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class DatabaseVersionsResponseItem extends JsonSerializableType
{
    /**
     * @var string $majorVersion The major version of the service
     */
    #[JsonProperty('major_version')]
    public string $majorVersion;

    /**
     * @var value-of<DatabaseVersionsResponseItemServiceType> $serviceType The type of service (e.g., mysql, pg, opensearch, valkey)
     */
    #[JsonProperty('service_type')]
    public string $serviceType;

    /**
     * @var value-of<DatabaseVersionsResponseItemState> $state The availability state of the version
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var ?DateTime $endOfLifeTime The date when this version reaches end of life
     */
    #[JsonProperty('end_of_life_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endOfLifeTime;

    /**
     * @var ?DateTime $availabilityEndTime The date when this version will no longer be available for new services
     */
    #[JsonProperty('availability_end_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $availabilityEndTime;

    /**
     * @var ?DateTime $availabilityStartTime The date when this version became available
     */
    #[JsonProperty('availability_start_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $availabilityStartTime;

    /**
     * @var ?DateTime $terminationTime The date when services running this version will be terminated
     */
    #[JsonProperty('termination_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $terminationTime;

    /**
     * @var ?DateTime $upgradeToServiceType The service type to upgrade to when this version reaches end of life
     */
    #[JsonProperty('upgrade_to_service_type'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $upgradeToServiceType;

    /**
     * @var ?string $upgradeToVersion The version to upgrade to when this version reaches end of life
     */
    #[JsonProperty('upgrade_to_version')]
    public ?string $upgradeToVersion;

    /**
     * @var ?DateTime $upstreamEndOfLifeTime The upstream end of life date for this version
     */
    #[JsonProperty('upstream_end_of_life_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $upstreamEndOfLifeTime;

    /**
     * @param array{
     *   majorVersion: string,
     *   serviceType: value-of<DatabaseVersionsResponseItemServiceType>,
     *   state: value-of<DatabaseVersionsResponseItemState>,
     *   endOfLifeTime?: ?DateTime,
     *   availabilityEndTime?: ?DateTime,
     *   availabilityStartTime?: ?DateTime,
     *   terminationTime?: ?DateTime,
     *   upgradeToServiceType?: ?DateTime,
     *   upgradeToVersion?: ?string,
     *   upstreamEndOfLifeTime?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->majorVersion = $values['majorVersion'];
        $this->serviceType = $values['serviceType'];
        $this->state = $values['state'];
        $this->endOfLifeTime = $values['endOfLifeTime'] ?? null;
        $this->availabilityEndTime = $values['availabilityEndTime'] ?? null;
        $this->availabilityStartTime = $values['availabilityStartTime'] ?? null;
        $this->terminationTime = $values['terminationTime'] ?? null;
        $this->upgradeToServiceType = $values['upgradeToServiceType'] ?? null;
        $this->upgradeToVersion = $values['upgradeToVersion'] ?? null;
        $this->upstreamEndOfLifeTime = $values['upstreamEndOfLifeTime'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

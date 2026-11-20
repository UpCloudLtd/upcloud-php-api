<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Summary of repeated provisioning failures, omitted when healthy
 */
class ContainerRegistryServiceDetailResponseLoopStats extends JsonSerializableType
{
    /**
     * @var ?int $failureCount
     */
    #[JsonProperty('failure_count')]
    public ?int $failureCount;

    /**
     * @var ?DateTime $firstFailedAt
     */
    #[JsonProperty('first_failed_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $firstFailedAt;

    /**
     * @var ?DateTime $lastFailedAt
     */
    #[JsonProperty('last_failed_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastFailedAt;

    /**
     * @var ?float $loopAgeSeconds
     */
    #[JsonProperty('loop_age_seconds')]
    public ?float $loopAgeSeconds;

    /**
     * @param array{
     *   failureCount?: ?int,
     *   firstFailedAt?: ?DateTime,
     *   lastFailedAt?: ?DateTime,
     *   loopAgeSeconds?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->failureCount = $values['failureCount'] ?? null;
        $this->firstFailedAt = $values['firstFailedAt'] ?? null;
        $this->lastFailedAt = $values['lastFailedAt'] ?? null;
        $this->loopAgeSeconds = $values['loopAgeSeconds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

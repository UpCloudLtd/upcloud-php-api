<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Backup characteristics of the plan
 */
class DatabasePlanComponentsResponseBackups extends JsonSerializableType
{
    /**
     * @var ?value-of<DatabasePlanComponentsResponseBackupsName> $name Backup tier name for tiered plans. Omitted when the plan retention does not map to a named tier.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $retentionDays Backup retention in days
     */
    #[JsonProperty('retention_days')]
    public ?int $retentionDays;

    /**
     * @var ?DatabasePlanComponentsResponseBackupsFrequent $frequent Frequent backup window, OpenSearch only
     */
    #[JsonProperty('frequent')]
    public ?DatabasePlanComponentsResponseBackupsFrequent $frequent;

    /**
     * @var ?DatabasePlanComponentsResponseBackupsInfrequent $infrequent Infrequent backup window, OpenSearch only
     */
    #[JsonProperty('infrequent')]
    public ?DatabasePlanComponentsResponseBackupsInfrequent $infrequent;

    /**
     * @param array{
     *   name?: ?value-of<DatabasePlanComponentsResponseBackupsName>,
     *   retentionDays?: ?int,
     *   frequent?: ?DatabasePlanComponentsResponseBackupsFrequent,
     *   infrequent?: ?DatabasePlanComponentsResponseBackupsInfrequent,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->retentionDays = $values['retentionDays'] ?? null;
        $this->frequent = $values['frequent'] ?? null;
        $this->infrequent = $values['infrequent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

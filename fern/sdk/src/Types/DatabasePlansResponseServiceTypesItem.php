<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class DatabasePlansResponseServiceTypesItem extends JsonSerializableType
{
    /**
     * @var value-of<DatabasePlansResponseServiceTypesItemType> $type Service type identifier.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $latestVersion Latest available major version for this service type. Omitted when not applicable.
     */
    #[JsonProperty('latest_version')]
    public ?string $latestVersion;

    /**
     * @var bool $componentised Always true for entries in this response; kept as an explicit indicator of componentised plans.
     */
    #[JsonProperty('componentised')]
    public bool $componentised;

    /**
     * @var array<string> $zones Zones where this service type is available.
     */
    #[JsonProperty('zones'), ArrayType(['string'])]
    public array $zones;

    /**
     * @var ?array<value-of<DatabasePlansResponseServiceTypesItemBackupTiersItem>> $backupTiers Backup tiers offered across this service type's plans. Omitted when the service type exposes no named backup tiers.
     */
    #[JsonProperty('backup_tiers'), ArrayType(['string'])]
    public ?array $backupTiers;

    /**
     * @var array<int> $nodeCounts Distinct node counts offered across this service type's plans.
     */
    #[JsonProperty('node_counts'), ArrayType(['integer'])]
    public array $nodeCounts;

    /**
     * @var array<DatabasePlansResponseServiceTypesItemComputeShapesItem> $computeShapes Distinct compute shapes offered for this service type.
     */
    #[JsonProperty('compute_shapes'), ArrayType([DatabasePlansResponseServiceTypesItemComputeShapesItem::class])]
    public array $computeShapes;

    /**
     * @param array{
     *   type: value-of<DatabasePlansResponseServiceTypesItemType>,
     *   componentised: bool,
     *   zones: array<string>,
     *   nodeCounts: array<int>,
     *   computeShapes: array<DatabasePlansResponseServiceTypesItemComputeShapesItem>,
     *   latestVersion?: ?string,
     *   backupTiers?: ?array<value-of<DatabasePlansResponseServiceTypesItemBackupTiersItem>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->latestVersion = $values['latestVersion'] ?? null;
        $this->componentised = $values['componentised'];
        $this->zones = $values['zones'];
        $this->backupTiers = $values['backupTiers'] ?? null;
        $this->nodeCounts = $values['nodeCounts'];
        $this->computeShapes = $values['computeShapes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

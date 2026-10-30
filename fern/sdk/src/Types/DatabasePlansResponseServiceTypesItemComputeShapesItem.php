<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class DatabasePlansResponseServiceTypesItemComputeShapesItem extends JsonSerializableType
{
    /**
     * @var string $compute Compute shape name, usable as plan_compute in requests.
     */
    #[JsonProperty('compute')]
    public string $compute;

    /**
     * @var value-of<DatabasePlansResponseServiceTypesItemComputeShapesItemFamily> $family Compute family.
     */
    #[JsonProperty('family')]
    public string $family;

    /**
     * @var int $cpu CPU cores per node.
     */
    #[JsonProperty('cpu')]
    public int $cpu;

    /**
     * @var int $memoryGb Memory per node in GB.
     */
    #[JsonProperty('memory_gb')]
    public int $memoryGb;

    /**
     * @var bool $dynamicStorageSupported Whether the storage total can be scaled beyond the base storage via dynamic storage.
     */
    #[JsonProperty('dynamic_storage_supported')]
    public bool $dynamicStorageSupported;

    /**
     * @var array<int> $nodeCounts Node counts available for this compute shape.
     */
    #[JsonProperty('node_counts'), ArrayType(['integer'])]
    public array $nodeCounts;

    /**
     * @var ?array<value-of<DatabasePlansResponseServiceTypesItemComputeShapesItemBackupsItem>> $backups Backup tiers available for this compute shape. Omitted when the shape exposes no named backup tiers.
     */
    #[JsonProperty('backups'), ArrayType(['string'])]
    public ?array $backups;

    /**
     * @var ?DatabasePlansResponseServiceTypesItemComputeShapesItemStorage $storage Storage choices for this compute shape: the distinct base sizes with the total each scales to, plus the shared dynamic-storage rules. Null for shapes without customer storage.
     */
    #[JsonProperty('storage')]
    public ?DatabasePlansResponseServiceTypesItemComputeShapesItemStorage $storage;

    /**
     * @param array{
     *   compute: string,
     *   family: value-of<DatabasePlansResponseServiceTypesItemComputeShapesItemFamily>,
     *   cpu: int,
     *   memoryGb: int,
     *   dynamicStorageSupported: bool,
     *   nodeCounts: array<int>,
     *   backups?: ?array<value-of<DatabasePlansResponseServiceTypesItemComputeShapesItemBackupsItem>>,
     *   storage?: ?DatabasePlansResponseServiceTypesItemComputeShapesItemStorage,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->compute = $values['compute'];
        $this->family = $values['family'];
        $this->cpu = $values['cpu'];
        $this->memoryGb = $values['memoryGb'];
        $this->dynamicStorageSupported = $values['dynamicStorageSupported'];
        $this->nodeCounts = $values['nodeCounts'];
        $this->backups = $values['backups'] ?? null;
        $this->storage = $values['storage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

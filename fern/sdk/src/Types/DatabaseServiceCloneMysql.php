<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for cloning a MySQL service
 */
class DatabaseServiceCloneMysql extends JsonSerializableType
{
    /**
     * @var string $hostnamePrefix Hostname prefix
     */
    #[JsonProperty('hostname_prefix')]
    public string $hostnamePrefix;

    /**
     * @var ?string $plan Deprecated: prefer the plan_* selection fields (plan_compute, plan_node_count, plan_storage_gib, plan_backups). The plan name form remains supported. For componentised (rdb.*) plans the storage segment is the desired TOTAL storage per node: any total reachable from a catalog plan's included storage in the plan's storage steps (within its cap) is a valid plan name, e.g. rdb.standard.2x-2CPU-8GB-120GB-regular selects the 80GB catalog plan with a 40GB dynamic top-up.
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var ?string $planCompute Plan selection: compute shape combining family, CPU and memory as one token, as listed in the plan catalog components. PostgreSQL and MySQL only.
     */
    #[JsonProperty('plan_compute')]
    public ?string $planCompute;

    /**
     * @var ?int $planNodeCount Plan selection: number of nodes.
     */
    #[JsonProperty('plan_node_count')]
    public ?int $planNodeCount;

    /**
     * @var ?int $planStorageGib Plan selection: desired TOTAL storage per node in GiB. Resolution picks the plan whose included storage matches, or tops the closest plan up with dynamic additional storage within the allowed limits. Mutually exclusive with additional_disk_space_gib.
     */
    #[JsonProperty('plan_storage_gib')]
    public ?int $planStorageGib;

    /**
     * @var ?value-of<DatabaseServiceCloneMysqlPlanBackups> $planBackups Plan selection: backup tier. PostgreSQL and MySQL tiered plans only.
     */
    #[JsonProperty('plan_backups')]
    public ?string $planBackups;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?DateTime $cloneTime Clone time
     */
    #[JsonProperty('clone_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $cloneTime;

    /**
     * @var ?string $backupName Backup name
     */
    #[JsonProperty('backup_name')]
    public ?string $backupName;

    /**
     * @var ?string $setServiceUuid Title
     */
    #[JsonProperty('set_service_uuid')]
    public ?string $setServiceUuid;

    /**
     * @var ?string $zone Zone
     */
    #[JsonProperty('zone')]
    public ?string $zone;

    /**
     * @var ?bool $terminationProtection Termination protection
     */
    #[JsonProperty('termination_protection')]
    public ?bool $terminationProtection;

    /**
     * @var ?DatabaseServiceCloneMysqlMaintenance $maintenance Maintenance
     */
    #[JsonProperty('maintenance')]
    public ?DatabaseServiceCloneMysqlMaintenance $maintenance;

    /**
     * @var ?array<DatabaseNetworkCreate> $networks Networks
     */
    #[JsonProperty('networks'), ArrayType([DatabaseNetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<DatabaseLabelCreate> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([DatabaseLabelCreate::class])]
    public ?array $labels;

    /**
     * @var ?int $additionalDiskSpaceGib Additional disk space in GiB. Legacy plans only: componentised (rdb.*) plans set storage as a total via plan_storage_gib or the plan name.
     */
    #[JsonProperty('additional_disk_space_gib')]
    public ?int $additionalDiskSpaceGib;

    /**
     * @var ?DatabaseServicePropertiesMysql $properties
     */
    #[JsonProperty('properties')]
    public ?DatabaseServicePropertiesMysql $properties;

    /**
     * @param array{
     *   hostnamePrefix: string,
     *   plan?: ?string,
     *   planCompute?: ?string,
     *   planNodeCount?: ?int,
     *   planStorageGib?: ?int,
     *   planBackups?: ?value-of<DatabaseServiceCloneMysqlPlanBackups>,
     *   title?: ?string,
     *   cloneTime?: ?DateTime,
     *   backupName?: ?string,
     *   setServiceUuid?: ?string,
     *   zone?: ?string,
     *   terminationProtection?: ?bool,
     *   maintenance?: ?DatabaseServiceCloneMysqlMaintenance,
     *   networks?: ?array<DatabaseNetworkCreate>,
     *   labels?: ?array<DatabaseLabelCreate>,
     *   additionalDiskSpaceGib?: ?int,
     *   properties?: ?DatabaseServicePropertiesMysql,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->hostnamePrefix = $values['hostnamePrefix'];
        $this->plan = $values['plan'] ?? null;
        $this->planCompute = $values['planCompute'] ?? null;
        $this->planNodeCount = $values['planNodeCount'] ?? null;
        $this->planStorageGib = $values['planStorageGib'] ?? null;
        $this->planBackups = $values['planBackups'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->cloneTime = $values['cloneTime'] ?? null;
        $this->backupName = $values['backupName'] ?? null;
        $this->setServiceUuid = $values['setServiceUuid'] ?? null;
        $this->zone = $values['zone'] ?? null;
        $this->terminationProtection = $values['terminationProtection'] ?? null;
        $this->maintenance = $values['maintenance'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->additionalDiskSpaceGib = $values['additionalDiskSpaceGib'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for cloning a Redis service.
 */
class DatabaseServiceCloneRedis extends JsonSerializableType
{
    /**
     * @var string $hostnamePrefix Hostname prefix
     */
    #[JsonProperty('hostname_prefix')]
    public string $hostnamePrefix;

    /**
     * @var ?string $plan Plan
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
     * @var ?value-of<DatabaseServiceCloneRedisPlanBackups> $planBackups Plan selection: backup tier. PostgreSQL and MySQL tiered plans only.
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
     * @var ?DatabaseServiceCloneRedisMaintenance $maintenance Maintenance
     */
    #[JsonProperty('maintenance')]
    public ?DatabaseServiceCloneRedisMaintenance $maintenance;

    /**
     * @var ?array<DatabaseNetworkCreate> $networks
     */
    #[JsonProperty('networks'), ArrayType([DatabaseNetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<DatabaseLabelCreate> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([DatabaseLabelCreate::class])]
    public ?array $labels;

    /**
     * @var ?DatabaseServicePropertiesRedis $properties
     */
    #[JsonProperty('properties')]
    public ?DatabaseServicePropertiesRedis $properties;

    /**
     * @param array{
     *   hostnamePrefix: string,
     *   plan?: ?string,
     *   planCompute?: ?string,
     *   planNodeCount?: ?int,
     *   planStorageGib?: ?int,
     *   planBackups?: ?value-of<DatabaseServiceCloneRedisPlanBackups>,
     *   title?: ?string,
     *   cloneTime?: ?DateTime,
     *   backupName?: ?string,
     *   setServiceUuid?: ?string,
     *   zone?: ?string,
     *   terminationProtection?: ?bool,
     *   maintenance?: ?DatabaseServiceCloneRedisMaintenance,
     *   networks?: ?array<DatabaseNetworkCreate>,
     *   labels?: ?array<DatabaseLabelCreate>,
     *   properties?: ?DatabaseServicePropertiesRedis,
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

<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\DatabaseServiceType;
use Upcloud\Database\Types\DatabaseServiceCreateOpenApiPlanBackups;
use Upcloud\Database\Types\DatabaseServiceCreateOpenApiMaintenance;
use Upcloud\Types\DatabaseNetworkCreate;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\DatabaseLabelCreate;
use Upcloud\Types\DatabaseServiceIntegrationCreate;
use Upcloud\Types\DatabaseServicePropertiesMysql;
use Upcloud\Types\DatabaseServicePropertiesPg;
use Upcloud\Types\DatabaseServicePropertiesRedis;
use Upcloud\Types\DatabaseServicePropertiesOpensearch;
use Upcloud\Types\DatabaseServicePropertiesValkey;
use Upcloud\Core\Types\Union;

class DatabaseServiceCreateOpenApi extends JsonSerializableType
{
    /**
     * @var string $hostnamePrefix Hostname prefix for the service nodes.
     */
    #[JsonProperty('hostname_prefix')]
    public string $hostnamePrefix;

    /**
     * @var string $title Human-readable title for the service.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var value-of<DatabaseServiceType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $zone Zone where the service is created.
     */
    #[JsonProperty('zone')]
    public string $zone;

    /**
     * @var ?string $setServiceUuid Optional UUID to assign to the created service.
     */
    #[JsonProperty('set_service_uuid')]
    public ?string $setServiceUuid;

    /**
     * @var ?string $plan Deprecated: prefer the plan_* selection fields (plan_compute, plan_node_count, plan_storage_gib, plan_backups) for PostgreSQL and MySQL. The plan name remains supported, and required for engines without componentised plans. For componentised (rdb.*) plans the storage segment is the desired TOTAL storage per node: any total reachable from a catalog plan's included storage in the plan's storage steps (within its cap) is a valid plan name, e.g. rdb.standard.2x-2CPU-8GB-120GB-regular selects the 80GB catalog plan with a 40GB dynamic top-up.
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
     * @var ?value-of<DatabaseServiceCreateOpenApiPlanBackups> $planBackups Plan selection: backup tier. PostgreSQL and MySQL tiered plans only.
     */
    #[JsonProperty('plan_backups')]
    public ?string $planBackups;

    /**
     * @var ?int $additionalDiskSpaceGib Additional disk space in GiB. Legacy plans only: componentised (rdb.*) plans set storage as a total via plan_storage_gib or the plan name.
     */
    #[JsonProperty('additional_disk_space_gib')]
    public ?int $additionalDiskSpaceGib;

    /**
     * @var ?bool $terminationProtection When enabled, the service cannot be deleted until termination protection is disabled.
     */
    #[JsonProperty('termination_protection')]
    public ?bool $terminationProtection;

    /**
     * @var ?DatabaseServiceCreateOpenApiMaintenance $maintenance Weekly maintenance window.
     */
    #[JsonProperty('maintenance')]
    public ?DatabaseServiceCreateOpenApiMaintenance $maintenance;

    /**
     * @var ?array<DatabaseNetworkCreate> $networks SDN networks to attach to the service.
     */
    #[JsonProperty('networks'), ArrayType([DatabaseNetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<DatabaseLabelCreate> $labels Labels used for service filtering.
     */
    #[JsonProperty('labels'), ArrayType([DatabaseLabelCreate::class])]
    public ?array $labels;

    /**
     * @var ?array<DatabaseServiceIntegrationCreate> $serviceIntegrations Service integrations to configure on creation.
     */
    #[JsonProperty('service_integrations'), ArrayType([DatabaseServiceIntegrationCreate::class])]
    public ?array $serviceIntegrations;

    /**
     * @var (
     *    DatabaseServicePropertiesMysql
     *   |DatabaseServicePropertiesPg
     *   |DatabaseServicePropertiesRedis
     *   |DatabaseServicePropertiesOpensearch
     *   |DatabaseServicePropertiesValkey
     * )|null $properties Engine-specific configuration properties. The allowed keys depend on the selected service type; provide the property set matching the chosen type.
     */
    #[JsonProperty('properties'), Union(DatabaseServicePropertiesMysql::class, DatabaseServicePropertiesPg::class, DatabaseServicePropertiesRedis::class, DatabaseServicePropertiesOpensearch::class, DatabaseServicePropertiesValkey::class, 'null')]
    public DatabaseServicePropertiesMysql|DatabaseServicePropertiesPg|DatabaseServicePropertiesRedis|DatabaseServicePropertiesOpensearch|DatabaseServicePropertiesValkey|null $properties;

    /**
     * @param array{
     *   hostnamePrefix: string,
     *   title: string,
     *   type: value-of<DatabaseServiceType>,
     *   zone: string,
     *   setServiceUuid?: ?string,
     *   plan?: ?string,
     *   planCompute?: ?string,
     *   planNodeCount?: ?int,
     *   planStorageGib?: ?int,
     *   planBackups?: ?value-of<DatabaseServiceCreateOpenApiPlanBackups>,
     *   additionalDiskSpaceGib?: ?int,
     *   terminationProtection?: ?bool,
     *   maintenance?: ?DatabaseServiceCreateOpenApiMaintenance,
     *   networks?: ?array<DatabaseNetworkCreate>,
     *   labels?: ?array<DatabaseLabelCreate>,
     *   serviceIntegrations?: ?array<DatabaseServiceIntegrationCreate>,
     *   properties?: (
     *    DatabaseServicePropertiesMysql
     *   |DatabaseServicePropertiesPg
     *   |DatabaseServicePropertiesRedis
     *   |DatabaseServicePropertiesOpensearch
     *   |DatabaseServicePropertiesValkey
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->hostnamePrefix = $values['hostnamePrefix'];
        $this->title = $values['title'];
        $this->type = $values['type'];
        $this->zone = $values['zone'];
        $this->setServiceUuid = $values['setServiceUuid'] ?? null;
        $this->plan = $values['plan'] ?? null;
        $this->planCompute = $values['planCompute'] ?? null;
        $this->planNodeCount = $values['planNodeCount'] ?? null;
        $this->planStorageGib = $values['planStorageGib'] ?? null;
        $this->planBackups = $values['planBackups'] ?? null;
        $this->additionalDiskSpaceGib = $values['additionalDiskSpaceGib'] ?? null;
        $this->terminationProtection = $values['terminationProtection'] ?? null;
        $this->maintenance = $values['maintenance'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->serviceIntegrations = $values['serviceIntegrations'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }
}

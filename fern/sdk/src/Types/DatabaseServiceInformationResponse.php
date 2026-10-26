<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Schema for service information response.
 */
class DatabaseServiceInformationResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid The unique identifier for the service.
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $zone The zone where the service is hosted.
     */
    #[JsonProperty('zone')]
    public ?string $zone;

    /**
     * @var ?string $name The name of the service.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $title The title of the service.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $type The type of the service.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $plan The plan of the service. For componentised (rdb.*) plans this is the effective plan name: the storage segment shows the total storage per node the service is configured with, and the same name is accepted back on create, modify and clone.
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var ?DatabasePlanComponentsResponse $planComponents
     */
    #[JsonProperty('plan_components')]
    public ?DatabasePlanComponentsResponse $planComponents;

    /**
     * @var ?int $additionalDiskSpaceGib The additional disk space allocated to the service in GiB. Always 0 for componentised (rdb.*) plans, where storage is expressed only as the total in the plan name and in plan_components.
     */
    #[JsonProperty('additional_disk_space_gib')]
    public ?int $additionalDiskSpaceGib;

    /**
     * @var ?string $state The current state of the service.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?array<string, string> $stateError A map of errors related to the service state.
     */
    #[JsonProperty('state_error'), ArrayType(['string' => 'string'])]
    public ?array $stateError;

    /**
     * @var ?bool $powered Indicates whether the service is powered on.
     */
    #[JsonProperty('powered')]
    public ?bool $powered;

    /**
     * @var ?bool $terminationProtection Indicates whether termination protection is enabled for the service.
     */
    #[JsonProperty('termination_protection')]
    public ?bool $terminationProtection;

    /**
     * @var ?int $nodeCount The number of nodes in the service.
     */
    #[JsonProperty('node_count')]
    public ?int $nodeCount;

    /**
     * @var ?DateTime $createTime The time when the service was created.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?DateTime $updateTime The time when the service was last updated.
     */
    #[JsonProperty('update_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updateTime;

    /**
     * @var ?string $serviceUri The URI for accessing the service.
     */
    #[JsonProperty('service_uri')]
    public ?string $serviceUri;

    /**
     * @var ?array<string, mixed> $serviceUriParams A map of connection parameters for the service.
     */
    #[JsonProperty('service_uri_params'), ArrayType(['string' => 'mixed'])]
    public ?array $serviceUriParams;

    /**
     * @var ?DatabaseMaintenanceWindowResponse $maintenance
     */
    #[JsonProperty('maintenance')]
    public ?DatabaseMaintenanceWindowResponse $maintenance;

    /**
     * @var ?array<string, mixed> $metadata A map of metadata key-value pairs for the service.
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?array<string, mixed> $properties A map of additional properties for the service.
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @var ?array<DatabaseNetworkInformationDetailsResponse> $networks List of network information details associated with the service.
     */
    #[JsonProperty('networks'), ArrayType([DatabaseNetworkInformationDetailsResponse::class])]
    public ?array $networks;

    /**
     * @var ?array<DatabaseNodeStateResponse> $nodeStates The states of individual nodes in the service.
     */
    #[JsonProperty('node_states'), ArrayType([DatabaseNodeStateResponse::class])]
    public ?array $nodeStates;

    /**
     * @var ?array<DatabaseLabelInformationResponse> $labels List of label information associated with the service.
     */
    #[JsonProperty('labels'), ArrayType([DatabaseLabelInformationResponse::class])]
    public ?array $labels;

    /**
     * @var ?array<DatabaseBackupResponse> $backups List of backups associated with the service.
     */
    #[JsonProperty('backups'), ArrayType([DatabaseBackupResponse::class])]
    public ?array $backups;

    /**
     * @var ?array<DatabaseServiceComponentResponse> $components List of service components associated with the service.
     */
    #[JsonProperty('components'), ArrayType([DatabaseServiceComponentResponse::class])]
    public ?array $components;

    /**
     * @var ?array<DatabaseConnectionPoolResponse> $connectionPools List of connection pools associated with the service.
     */
    #[JsonProperty('connection_pools'), ArrayType([DatabaseConnectionPoolResponse::class])]
    public ?array $connectionPools;

    /**
     * @var ?array<DatabaseUserResponse> $users List of users associated with the service.
     */
    #[JsonProperty('users'), ArrayType([DatabaseUserResponse::class])]
    public ?array $users;

    /**
     * @var ?array<LogicalDatabaseResponse> $databases
     */
    #[JsonProperty('databases'), ArrayType([LogicalDatabaseResponse::class])]
    public ?array $databases;

    /**
     * @var ?array<DatabaseAclResponse> $acls List of ACLs associated with the service.
     */
    #[JsonProperty('acls'), ArrayType([DatabaseAclResponse::class])]
    public ?array $acls;

    /**
     * @var ?array<DatabaseServiceIntegrationResponse> $serviceIntegrations List of service integrations associated with the service.
     */
    #[JsonProperty('service_integrations'), ArrayType([DatabaseServiceIntegrationResponse::class])]
    public ?array $serviceIntegrations;

    /**
     * @param array{
     *   uuid?: ?string,
     *   zone?: ?string,
     *   name?: ?string,
     *   title?: ?string,
     *   type?: ?string,
     *   plan?: ?string,
     *   planComponents?: ?DatabasePlanComponentsResponse,
     *   additionalDiskSpaceGib?: ?int,
     *   state?: ?string,
     *   stateError?: ?array<string, string>,
     *   powered?: ?bool,
     *   terminationProtection?: ?bool,
     *   nodeCount?: ?int,
     *   createTime?: ?DateTime,
     *   updateTime?: ?DateTime,
     *   serviceUri?: ?string,
     *   serviceUriParams?: ?array<string, mixed>,
     *   maintenance?: ?DatabaseMaintenanceWindowResponse,
     *   metadata?: ?array<string, mixed>,
     *   properties?: ?array<string, mixed>,
     *   networks?: ?array<DatabaseNetworkInformationDetailsResponse>,
     *   nodeStates?: ?array<DatabaseNodeStateResponse>,
     *   labels?: ?array<DatabaseLabelInformationResponse>,
     *   backups?: ?array<DatabaseBackupResponse>,
     *   components?: ?array<DatabaseServiceComponentResponse>,
     *   connectionPools?: ?array<DatabaseConnectionPoolResponse>,
     *   users?: ?array<DatabaseUserResponse>,
     *   databases?: ?array<LogicalDatabaseResponse>,
     *   acls?: ?array<DatabaseAclResponse>,
     *   serviceIntegrations?: ?array<DatabaseServiceIntegrationResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->zone = $values['zone'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->plan = $values['plan'] ?? null;
        $this->planComponents = $values['planComponents'] ?? null;
        $this->additionalDiskSpaceGib = $values['additionalDiskSpaceGib'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->stateError = $values['stateError'] ?? null;
        $this->powered = $values['powered'] ?? null;
        $this->terminationProtection = $values['terminationProtection'] ?? null;
        $this->nodeCount = $values['nodeCount'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->updateTime = $values['updateTime'] ?? null;
        $this->serviceUri = $values['serviceUri'] ?? null;
        $this->serviceUriParams = $values['serviceUriParams'] ?? null;
        $this->maintenance = $values['maintenance'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->nodeStates = $values['nodeStates'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->backups = $values['backups'] ?? null;
        $this->components = $values['components'] ?? null;
        $this->connectionPools = $values['connectionPools'] ?? null;
        $this->users = $values['users'] ?? null;
        $this->databases = $values['databases'] ?? null;
        $this->acls = $values['acls'] ?? null;
        $this->serviceIntegrations = $values['serviceIntegrations'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

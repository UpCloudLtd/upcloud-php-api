<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * valkey properties
 */
class DatabaseServicePropertiesValkey extends JsonSerializableType
{
    /**
     * @var ?bool $automaticUtilityNetworkIpFilter Automatically allow connections from servers in the utility network within the same zone
     */
    #[JsonProperty('automatic_utility_network_ip_filter')]
    public ?bool $automaticUtilityNetworkIpFilter;

    /**
     * @var ?int $backupHour
     */
    #[JsonProperty('backup_hour')]
    public ?int $backupHour;

    /**
     * @var ?int $backupMinute
     */
    #[JsonProperty('backup_minute')]
    public ?int $backupMinute;

    /**
     * @var ?bool $frequentSnapshots When enabled, Valkey will create frequent local RDB snapshots. When disabled, Valkey will only take RDB snapshots when a backup is created, based on the backup schedule. This setting is ignored when `valkey_persistence` is set to `off`.
     */
    #[JsonProperty('frequent_snapshots')]
    public ?bool $frequentSnapshots;

    /**
     * @var ?array<string> $ipFilter Allow incoming connections from CIDR address block, e.g. '10.20.0.0/16'
     */
    #[JsonProperty('ip_filter'), ArrayType(['string'])]
    public ?array $ipFilter;

    /**
     * @var ?DatabaseServicePropertiesValkeyMigration $migration
     */
    #[JsonProperty('migration')]
    public ?DatabaseServicePropertiesValkeyMigration $migration;

    /**
     * @var ?bool $publicAccess Allow access to the service from the public Internet
     */
    #[JsonProperty('public_access')]
    public ?bool $publicAccess;

    /**
     * @var ?bool $publicAccessPrometheus Allow access to Prometheus metrics from the public Internet
     */
    #[JsonProperty('public_access_prometheus')]
    public ?bool $publicAccessPrometheus;

    /**
     * @var ?bool $serviceLog Store logs for the service so that they are available in the HTTP API and console.
     */
    #[JsonProperty('service_log')]
    public ?bool $serviceLog;

    /**
     * @var ?value-of<DatabaseServicePropertiesValkeyValkeyAclChannelsDefault> $valkeyAclChannelsDefault Determines default pub/sub channels' ACL for new users if ACL is not supplied. When this option is not defined, all_channels is assumed to keep backward compatibility. This option doesn't affect Valkey configuration acl-pubsub-default.
     */
    #[JsonProperty('valkey_acl_channels_default')]
    public ?string $valkeyAclChannelsDefault;

    /**
     * @var ?int $valkeyActiveDefragIgnoreBytes Minimum amount of fragmentation waste, in bytes, before active defragmentation starts. Only takes effect when `valkey_activedefrag` is enabled.
     */
    #[JsonProperty('valkey_active_defrag_ignore_bytes')]
    public ?int $valkeyActiveDefragIgnoreBytes;

    /**
     * @var ?int $valkeyActiveDefragThresholdLower Minimum percentage of fragmentation before active defragmentation starts. Only takes effect when `valkey_activedefrag` is enabled.
     */
    #[JsonProperty('valkey_active_defrag_threshold_lower')]
    public ?int $valkeyActiveDefragThresholdLower;

    /**
     * @var ?int $valkeyActiveExpireEffort Valkey reclaims expired keys both when accessed and in the background. The background process scans for expired keys to free memory. Increasing the active-expire-effort setting (default 1, max 10) uses more CPU to reclaim expired keys faster, reducing memory usage but potentially increasing latency.
     */
    #[JsonProperty('valkey_active_expire_effort')]
    public ?int $valkeyActiveExpireEffort;

    /**
     * @var ?bool $valkeyActivedefrag Enable active memory defragmentation. When enabled, Valkey relocates objects off sparsely-used memory pages to reduce fragmentation and return memory to the operating system. Defragmentation runs on the main thread and consumes CPU, so it may increase latency under load.
     */
    #[JsonProperty('valkey_activedefrag')]
    public ?bool $valkeyActivedefrag;

    /**
     * @var ?int $valkeyIoThreads Set Valkey IO thread count. Changing this will cause a restart of the Valkey service.
     */
    #[JsonProperty('valkey_io_threads')]
    public ?int $valkeyIoThreads;

    /**
     * @var ?int $valkeyLfuDecayTime
     */
    #[JsonProperty('valkey_lfu_decay_time')]
    public ?int $valkeyLfuDecayTime;

    /**
     * @var ?int $valkeyLfuLogFactor
     */
    #[JsonProperty('valkey_lfu_log_factor')]
    public ?int $valkeyLfuLogFactor;

    /**
     * @var ?value-of<DatabaseServicePropertiesValkeyValkeyMaxmemoryPolicy> $valkeyMaxmemoryPolicy
     */
    #[JsonProperty('valkey_maxmemory_policy')]
    public ?string $valkeyMaxmemoryPolicy;

    /**
     * @var ?string $valkeyNotifyKeyspaceEvents
     */
    #[JsonProperty('valkey_notify_keyspace_events')]
    public ?string $valkeyNotifyKeyspaceEvents;

    /**
     * @var ?int $valkeyNumberOfDatabases Set number of Valkey databases. Changing this will cause a restart of the Valkey service.
     */
    #[JsonProperty('valkey_number_of_databases')]
    public ?int $valkeyNumberOfDatabases;

    /**
     * @var ?value-of<DatabaseServicePropertiesValkeyValkeyPersistence> $valkeyPersistence Controls whether Valkey writes RDB dumps to disk. With `rdb`, RDB dumps are written for backups on the backup schedule and, if `frequent_snapshots` is enabled, every 10 minutes so the service can recover recent data after a restart. With `off`, no RDB dumps are written at all: backups and forking are unavailable, `frequent_snapshots` and `backup_hour`/`backup_minute` have no effect, and all data is lost if the service restarts or is powered off.
     */
    #[JsonProperty('valkey_persistence')]
    public ?string $valkeyPersistence;

    /**
     * @var ?int $valkeyPubsubClientOutputBufferLimit Set output buffer limit for pub / sub clients in MB. The value is the hard limit, the soft limit is 1/4 of the hard limit. When setting the limit, be mindful of the available memory in the selected service plan.
     */
    #[JsonProperty('valkey_pubsub_client_output_buffer_limit')]
    public ?int $valkeyPubsubClientOutputBufferLimit;

    /**
     * @var ?bool $valkeySsl
     */
    #[JsonProperty('valkey_ssl')]
    public ?bool $valkeySsl;

    /**
     * @var ?int $valkeyTimeout
     */
    #[JsonProperty('valkey_timeout')]
    public ?int $valkeyTimeout;

    /**
     * @var ?value-of<DatabaseServicePropertiesValkeyValkeyVersion> $valkeyVersion
     */
    #[JsonProperty('valkey_version')]
    public ?string $valkeyVersion;

    /**
     * @param array{
     *   automaticUtilityNetworkIpFilter?: ?bool,
     *   backupHour?: ?int,
     *   backupMinute?: ?int,
     *   frequentSnapshots?: ?bool,
     *   ipFilter?: ?array<string>,
     *   migration?: ?DatabaseServicePropertiesValkeyMigration,
     *   publicAccess?: ?bool,
     *   publicAccessPrometheus?: ?bool,
     *   serviceLog?: ?bool,
     *   valkeyAclChannelsDefault?: ?value-of<DatabaseServicePropertiesValkeyValkeyAclChannelsDefault>,
     *   valkeyActiveDefragIgnoreBytes?: ?int,
     *   valkeyActiveDefragThresholdLower?: ?int,
     *   valkeyActiveExpireEffort?: ?int,
     *   valkeyActivedefrag?: ?bool,
     *   valkeyIoThreads?: ?int,
     *   valkeyLfuDecayTime?: ?int,
     *   valkeyLfuLogFactor?: ?int,
     *   valkeyMaxmemoryPolicy?: ?value-of<DatabaseServicePropertiesValkeyValkeyMaxmemoryPolicy>,
     *   valkeyNotifyKeyspaceEvents?: ?string,
     *   valkeyNumberOfDatabases?: ?int,
     *   valkeyPersistence?: ?value-of<DatabaseServicePropertiesValkeyValkeyPersistence>,
     *   valkeyPubsubClientOutputBufferLimit?: ?int,
     *   valkeySsl?: ?bool,
     *   valkeyTimeout?: ?int,
     *   valkeyVersion?: ?value-of<DatabaseServicePropertiesValkeyValkeyVersion>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automaticUtilityNetworkIpFilter = $values['automaticUtilityNetworkIpFilter'] ?? null;
        $this->backupHour = $values['backupHour'] ?? null;
        $this->backupMinute = $values['backupMinute'] ?? null;
        $this->frequentSnapshots = $values['frequentSnapshots'] ?? null;
        $this->ipFilter = $values['ipFilter'] ?? null;
        $this->migration = $values['migration'] ?? null;
        $this->publicAccess = $values['publicAccess'] ?? null;
        $this->publicAccessPrometheus = $values['publicAccessPrometheus'] ?? null;
        $this->serviceLog = $values['serviceLog'] ?? null;
        $this->valkeyAclChannelsDefault = $values['valkeyAclChannelsDefault'] ?? null;
        $this->valkeyActiveDefragIgnoreBytes = $values['valkeyActiveDefragIgnoreBytes'] ?? null;
        $this->valkeyActiveDefragThresholdLower = $values['valkeyActiveDefragThresholdLower'] ?? null;
        $this->valkeyActiveExpireEffort = $values['valkeyActiveExpireEffort'] ?? null;
        $this->valkeyActivedefrag = $values['valkeyActivedefrag'] ?? null;
        $this->valkeyIoThreads = $values['valkeyIoThreads'] ?? null;
        $this->valkeyLfuDecayTime = $values['valkeyLfuDecayTime'] ?? null;
        $this->valkeyLfuLogFactor = $values['valkeyLfuLogFactor'] ?? null;
        $this->valkeyMaxmemoryPolicy = $values['valkeyMaxmemoryPolicy'] ?? null;
        $this->valkeyNotifyKeyspaceEvents = $values['valkeyNotifyKeyspaceEvents'] ?? null;
        $this->valkeyNumberOfDatabases = $values['valkeyNumberOfDatabases'] ?? null;
        $this->valkeyPersistence = $values['valkeyPersistence'] ?? null;
        $this->valkeyPubsubClientOutputBufferLimit = $values['valkeyPubsubClientOutputBufferLimit'] ?? null;
        $this->valkeySsl = $values['valkeySsl'] ?? null;
        $this->valkeyTimeout = $values['valkeyTimeout'] ?? null;
        $this->valkeyVersion = $values['valkeyVersion'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

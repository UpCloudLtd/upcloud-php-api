<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * redis properties
 */
class DatabaseServicePropertiesRedis extends JsonSerializableType
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
     * @var ?array<string> $ipFilter Allow incoming connections from CIDR address block, e.g. '10.20.0.0/16'
     */
    #[JsonProperty('ip_filter'), ArrayType(['string'])]
    public ?array $ipFilter;

    /**
     * @var ?DatabaseServicePropertiesRedisMigration $migration
     */
    #[JsonProperty('migration')]
    public ?DatabaseServicePropertiesRedisMigration $migration;

    /**
     * @var ?bool $publicAccess Allow access to the service from the public Internet
     */
    #[JsonProperty('public_access')]
    public ?bool $publicAccess;

    /**
     * @var ?bool $publicAccessPrometheus Allow access to Prometheus monitoring from the public Internet
     */
    #[JsonProperty('public_access_prometheus')]
    public ?bool $publicAccessPrometheus;

    /**
     * @var ?value-of<DatabaseServicePropertiesRedisRedisAclChannelsDefault> $redisAclChannelsDefault Determines default pub/sub channels' ACL for new users if ACL is not supplied. When this option is not defined, all_channels is assumed to keep backward compatibility. This option doesn't affect Redis configuration acl-pubsub-default.
     */
    #[JsonProperty('redis_acl_channels_default')]
    public ?string $redisAclChannelsDefault;

    /**
     * @var ?int $redisIoThreads Set Redis IO thread count. Changing this will cause a restart of the Redis service.
     */
    #[JsonProperty('redis_io_threads')]
    public ?int $redisIoThreads;

    /**
     * @var ?int $redisLfuDecayTime
     */
    #[JsonProperty('redis_lfu_decay_time')]
    public ?int $redisLfuDecayTime;

    /**
     * @var ?int $redisLfuLogFactor
     */
    #[JsonProperty('redis_lfu_log_factor')]
    public ?int $redisLfuLogFactor;

    /**
     * @var ?value-of<DatabaseServicePropertiesRedisRedisMaxmemoryPolicy> $redisMaxmemoryPolicy
     */
    #[JsonProperty('redis_maxmemory_policy')]
    public ?string $redisMaxmemoryPolicy;

    /**
     * @var ?string $redisNotifyKeyspaceEvents
     */
    #[JsonProperty('redis_notify_keyspace_events')]
    public ?string $redisNotifyKeyspaceEvents;

    /**
     * @var ?int $redisNumberOfDatabases Set number of Redis databases. Changing this will cause a restart of the Redis service.
     */
    #[JsonProperty('redis_number_of_databases')]
    public ?int $redisNumberOfDatabases;

    /**
     * @var ?value-of<DatabaseServicePropertiesRedisRedisPersistence> $redisPersistence When persistence is 'rdb', Redis does RDB dumps each 10 minutes if any key is changed. Also RDB dumps are done according to the backup schedule for backup purposes. When persistence is 'off', no RDB dumps or backups are done, so data can be lost at any moment if the service is restarted for any reason, or if the service is powered off. Also, the service can't be forked.
     */
    #[JsonProperty('redis_persistence')]
    public ?string $redisPersistence;

    /**
     * @var ?int $redisPubsubClientOutputBufferLimit Set output buffer limit for pub / sub clients in MB. The value is the hard limit, the soft limit is 1/4 of the hard limit. When setting the limit, be mindful of the available memory in the selected service plan.
     */
    #[JsonProperty('redis_pubsub_client_output_buffer_limit')]
    public ?int $redisPubsubClientOutputBufferLimit;

    /**
     * @var ?bool $redisSsl
     */
    #[JsonProperty('redis_ssl')]
    public ?bool $redisSsl;

    /**
     * @var ?int $redisTimeout
     */
    #[JsonProperty('redis_timeout')]
    public ?int $redisTimeout;

    /**
     * @var ?value-of<DatabaseServicePropertiesRedisRedisVersion> $redisVersion
     */
    #[JsonProperty('redis_version')]
    public ?string $redisVersion;

    /**
     * @var ?bool $serviceLog Store logs for the service so that they are available in the HTTP API and console.
     */
    #[JsonProperty('service_log')]
    public ?bool $serviceLog;

    /**
     * @param array{
     *   automaticUtilityNetworkIpFilter?: ?bool,
     *   backupHour?: ?int,
     *   backupMinute?: ?int,
     *   ipFilter?: ?array<string>,
     *   migration?: ?DatabaseServicePropertiesRedisMigration,
     *   publicAccess?: ?bool,
     *   publicAccessPrometheus?: ?bool,
     *   redisAclChannelsDefault?: ?value-of<DatabaseServicePropertiesRedisRedisAclChannelsDefault>,
     *   redisIoThreads?: ?int,
     *   redisLfuDecayTime?: ?int,
     *   redisLfuLogFactor?: ?int,
     *   redisMaxmemoryPolicy?: ?value-of<DatabaseServicePropertiesRedisRedisMaxmemoryPolicy>,
     *   redisNotifyKeyspaceEvents?: ?string,
     *   redisNumberOfDatabases?: ?int,
     *   redisPersistence?: ?value-of<DatabaseServicePropertiesRedisRedisPersistence>,
     *   redisPubsubClientOutputBufferLimit?: ?int,
     *   redisSsl?: ?bool,
     *   redisTimeout?: ?int,
     *   redisVersion?: ?value-of<DatabaseServicePropertiesRedisRedisVersion>,
     *   serviceLog?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automaticUtilityNetworkIpFilter = $values['automaticUtilityNetworkIpFilter'] ?? null;
        $this->backupHour = $values['backupHour'] ?? null;
        $this->backupMinute = $values['backupMinute'] ?? null;
        $this->ipFilter = $values['ipFilter'] ?? null;
        $this->migration = $values['migration'] ?? null;
        $this->publicAccess = $values['publicAccess'] ?? null;
        $this->publicAccessPrometheus = $values['publicAccessPrometheus'] ?? null;
        $this->redisAclChannelsDefault = $values['redisAclChannelsDefault'] ?? null;
        $this->redisIoThreads = $values['redisIoThreads'] ?? null;
        $this->redisLfuDecayTime = $values['redisLfuDecayTime'] ?? null;
        $this->redisLfuLogFactor = $values['redisLfuLogFactor'] ?? null;
        $this->redisMaxmemoryPolicy = $values['redisMaxmemoryPolicy'] ?? null;
        $this->redisNotifyKeyspaceEvents = $values['redisNotifyKeyspaceEvents'] ?? null;
        $this->redisNumberOfDatabases = $values['redisNumberOfDatabases'] ?? null;
        $this->redisPersistence = $values['redisPersistence'] ?? null;
        $this->redisPubsubClientOutputBufferLimit = $values['redisPubsubClientOutputBufferLimit'] ?? null;
        $this->redisSsl = $values['redisSsl'] ?? null;
        $this->redisTimeout = $values['redisTimeout'] ?? null;
        $this->redisVersion = $values['redisVersion'] ?? null;
        $this->serviceLog = $values['serviceLog'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

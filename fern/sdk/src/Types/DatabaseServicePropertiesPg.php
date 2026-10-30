<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * pg properties
 */
class DatabaseServicePropertiesPg extends JsonSerializableType
{
    /**
     * @var ?string $adminPassword
     */
    #[JsonProperty('admin_password')]
    public ?string $adminPassword;

    /**
     * @var ?string $adminUsername
     */
    #[JsonProperty('admin_username')]
    public ?string $adminUsername;

    /**
     * @var ?bool $automaticUtilityNetworkIpFilter Automatically allow connections from servers in the utility network within the same zone
     */
    #[JsonProperty('automatic_utility_network_ip_filter')]
    public ?bool $automaticUtilityNetworkIpFilter;

    /**
     * @var ?float $autovacuumAnalyzeScaleFactor Specifies a fraction of the table size to add to autovacuum_analyze_threshold when deciding whether to trigger an ANALYZE (e.g. `0.2` for 20% of the table size). The default is `0.2`.
     */
    #[JsonProperty('autovacuum_analyze_scale_factor')]
    public ?float $autovacuumAnalyzeScaleFactor;

    /**
     * @var ?int $autovacuumAnalyzeThreshold Specifies the minimum number of inserted, updated or deleted tuples needed to trigger an ANALYZE in any one table. The default is `50`.
     */
    #[JsonProperty('autovacuum_analyze_threshold')]
    public ?int $autovacuumAnalyzeThreshold;

    /**
     * @var ?int $autovacuumFreezeMaxAge Specifies the maximum age (in transactions) that a table's pg_class.relfrozenxid field can attain before a VACUUM operation is forced to prevent transaction ID wraparound within the table. The system launches autovacuum processes to prevent wraparound even when autovacuum is otherwise disabled. Changing this parameter causes a service restart.
     */
    #[JsonProperty('autovacuum_freeze_max_age')]
    public ?int $autovacuumFreezeMaxAge;

    /**
     * @var ?int $autovacuumMaxWorkers Specifies the maximum number of autovacuum processes (other than the autovacuum launcher) that may be running at any one time. The default is `3`. Changing this parameter causes a service restart.
     */
    #[JsonProperty('autovacuum_max_workers')]
    public ?int $autovacuumMaxWorkers;

    /**
     * @var ?int $autovacuumNaptime Specifies the minimum delay between autovacuum runs on any given database. The delay is measured in seconds. The default is `60`.
     */
    #[JsonProperty('autovacuum_naptime')]
    public ?int $autovacuumNaptime;

    /**
     * @var ?int $autovacuumVacuumCostDelay Specifies the cost delay value that will be used in automatic VACUUM operations. If `-1` is specified, the regular vacuum_cost_delay value will be used. The default is `2` (upstream default).
     */
    #[JsonProperty('autovacuum_vacuum_cost_delay')]
    public ?int $autovacuumVacuumCostDelay;

    /**
     * @var ?int $autovacuumVacuumCostLimit Specifies the cost limit value that will be used in automatic VACUUM operations. If `-1` is specified, the regular vacuum_cost_limit value will be used. The default is `-1` (upstream default).
     */
    #[JsonProperty('autovacuum_vacuum_cost_limit')]
    public ?int $autovacuumVacuumCostLimit;

    /**
     * @var ?float $autovacuumVacuumScaleFactor Specifies a fraction of the table size to add to autovacuum_vacuum_threshold when deciding whether to trigger a VACUUM (e.g. `0.2` for 20% of the table size). The default is `0.2`.
     */
    #[JsonProperty('autovacuum_vacuum_scale_factor')]
    public ?float $autovacuumVacuumScaleFactor;

    /**
     * @var ?int $autovacuumVacuumThreshold Specifies the minimum number of updated or deleted tuples needed to trigger a VACUUM in any one table. The default is `50`.
     */
    #[JsonProperty('autovacuum_vacuum_threshold')]
    public ?int $autovacuumVacuumThreshold;

    /**
     * @var ?int $backupHour
     */
    #[JsonProperty('backup_hour')]
    public ?int $backupHour;

    /**
     * @var ?int $backupIntervalHours Interval in hours between automatic backups. Minimum value is 3 hours. Must be a divisor of 24 (3, 4, 6, 8, 12, 24).  (Applicable to ACU plans only)
     */
    #[JsonProperty('backup_interval_hours')]
    public ?int $backupIntervalHours;

    /**
     * @var ?int $backupMinute
     */
    #[JsonProperty('backup_minute')]
    public ?int $backupMinute;

    /**
     * @var ?int $backupRetentionDays Number of days to retain automatic backups. Backups older than this value will be automatically deleted. (Applicable to ACU plans only)
     */
    #[JsonProperty('backup_retention_days')]
    public ?int $backupRetentionDays;

    /**
     * @var ?int $bgwriterDelay Specifies the delay between activity rounds for the background writer in milliseconds. The default is `200`.
     */
    #[JsonProperty('bgwriter_delay')]
    public ?int $bgwriterDelay;

    /**
     * @var ?int $bgwriterFlushAfter Whenever more than bgwriter_flush_after bytes have been written by the background writer, attempt to force the OS to issue these writes to the underlying storage. Specified in kilobytes. Setting of 0 disables forced writeback. The default is `512`.
     */
    #[JsonProperty('bgwriter_flush_after')]
    public ?int $bgwriterFlushAfter;

    /**
     * @var ?int $bgwriterLruMaxpages In each round, no more than this many buffers will be written by the background writer. Setting this to zero disables background writing. The default is `100`.
     */
    #[JsonProperty('bgwriter_lru_maxpages')]
    public ?int $bgwriterLruMaxpages;

    /**
     * @var ?float $bgwriterLruMultiplier The average recent need for new buffers is multiplied by bgwriter_lru_multiplier to arrive at an estimate of the number that will be needed during the next round, (up to bgwriter_lru_maxpages). 1.0 represents a “just in time” policy of writing exactly the number of buffers predicted to be needed. Larger values provide some cushion against spikes in demand, while smaller values intentionally leave writes to be done by server processes. The default is `2.0`.
     */
    #[JsonProperty('bgwriter_lru_multiplier')]
    public ?float $bgwriterLruMultiplier;

    /**
     * @var ?int $deadlockTimeout This is the amount of time, in milliseconds, to wait on a lock before checking to see if there is a deadlock condition. The default is `1000` (upstream default).
     */
    #[JsonProperty('deadlock_timeout')]
    public ?int $deadlockTimeout;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgDefaultToastCompression> $defaultToastCompression Specifies the default TOAST compression method for values of compressible columns. The default is `lz4`. Only available for PostgreSQL 14+.
     */
    #[JsonProperty('default_toast_compression')]
    public ?string $defaultToastCompression;

    /**
     * @var ?bool $enableHaReplicaDns Creates a dedicated read-only DNS that automatically falls back to the primary if standby nodes are unavailable. It switches back when a standby recovers.
     */
    #[JsonProperty('enable_ha_replica_dns')]
    public ?bool $enableHaReplicaDns;

    /**
     * @var ?int $idleInTransactionSessionTimeout Time out sessions with open transactions after this number of milliseconds
     */
    #[JsonProperty('idle_in_transaction_session_timeout')]
    public ?int $idleInTransactionSessionTimeout;

    /**
     * @var ?int $ioCombineLimit EXPERIMENTAL: Controls the largest I/O size in operations that combine I/O in 8kB units. Version 17 and up only.
     */
    #[JsonProperty('io_combine_limit')]
    public ?int $ioCombineLimit;

    /**
     * @var ?int $ioMaxCombineLimit EXPERIMENTAL: Controls the largest I/O size in operations that combine I/O in 8kB units, and silently limits the user-settable parameter io_combine_limit. Version 18 and up only. Changing this parameter causes a service restart.
     */
    #[JsonProperty('io_max_combine_limit')]
    public ?int $ioMaxCombineLimit;

    /**
     * @var ?int $ioMaxConcurrency EXPERIMENTAL: Controls the maximum number of I/O operations that one process can execute simultaneously. Version 18 and up only. Changing this parameter causes a service restart.
     */
    #[JsonProperty('io_max_concurrency')]
    public ?int $ioMaxConcurrency;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgIoMethod> $ioMethod EXPERIMENTAL: Controls the maximum number of I/O operations that one process can execute simultaneously. Version 18 and up only. Changing this parameter causes a service restart.
     */
    #[JsonProperty('io_method')]
    public ?string $ioMethod;

    /**
     * @var ?int $ioWorkers EXPERIMENTAL: Number of IO worker processes, for io_method=worker. Version 18 and up only.
     */
    #[JsonProperty('io_workers')]
    public ?int $ioWorkers;

    /**
     * @var ?array<string> $ipFilter Allow incoming connections from CIDR address block, e.g. '10.20.0.0/16'
     */
    #[JsonProperty('ip_filter'), ArrayType(['string'])]
    public ?array $ipFilter;

    /**
     * @var ?bool $jit Controls system-wide use of Just-in-Time Compilation (JIT).
     */
    #[JsonProperty('jit')]
    public ?bool $jit;

    /**
     * @var ?int $logAutovacuumMinDuration Causes each action executed by autovacuum to be logged if it ran for at least the specified number of milliseconds. Setting this to zero logs all autovacuum actions. Minus-one disables logging autovacuum actions. The default is `1000`.
     */
    #[JsonProperty('log_autovacuum_min_duration')]
    public ?int $logAutovacuumMinDuration;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgLogErrorVerbosity> $logErrorVerbosity Controls the amount of detail written in the server log for each message that is logged.
     */
    #[JsonProperty('log_error_verbosity')]
    public ?string $logErrorVerbosity;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgLogLinePrefix> $logLinePrefix Choose from one of the available log formats.
     */
    #[JsonProperty('log_line_prefix')]
    public ?string $logLinePrefix;

    /**
     * @var ?int $logMinDurationStatement Log statements that take more than this number of milliseconds to run, -1 disables
     */
    #[JsonProperty('log_min_duration_statement')]
    public ?int $logMinDurationStatement;

    /**
     * @var ?int $logTempFiles Log statements for each temporary file created larger than this number of kilobytes, -1 disables
     */
    #[JsonProperty('log_temp_files')]
    public ?int $logTempFiles;

    /**
     * @var ?int $maxConnections Sets the PostgreSQL maximum number of concurrent connections to the database server. For services with a read replica, first increase the read replica's value. After the change is applied to the replica, you can increase the primary service's value. Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_connections')]
    public ?int $maxConnections;

    /**
     * @var ?int $maxFilesPerProcess PostgreSQL maximum number of files that can be open per process. The default is `1000` (upstream default). Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_files_per_process')]
    public ?int $maxFilesPerProcess;

    /**
     * @var ?int $maxLocksPerTransaction PostgreSQL maximum locks per transaction. Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_locks_per_transaction')]
    public ?int $maxLocksPerTransaction;

    /**
     * @var ?int $maxLogicalReplicationWorkers PostgreSQL maximum logical replication workers (taken from the pool defined by max_worker_processes). The default is `4` (upstream default). Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_logical_replication_workers')]
    public ?int $maxLogicalReplicationWorkers;

    /**
     * @var ?int $maxParallelWorkers Sets the maximum number of workers that the system can support for parallel queries. The default is `8` (upstream default).
     */
    #[JsonProperty('max_parallel_workers')]
    public ?int $maxParallelWorkers;

    /**
     * @var ?int $maxParallelWorkersPerGather Sets the maximum number of workers that can be started by a single Gather or Gather Merge node. The default is `2` (upstream default).
     */
    #[JsonProperty('max_parallel_workers_per_gather')]
    public ?int $maxParallelWorkersPerGather;

    /**
     * @var ?int $maxPredLocksPerTransaction PostgreSQL maximum predicate locks per transaction. The default is `64` (upstream default). Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_pred_locks_per_transaction')]
    public ?int $maxPredLocksPerTransaction;

    /**
     * @var ?int $maxPreparedTransactions PostgreSQL maximum prepared transactions. The default is `0`. Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_prepared_transactions')]
    public ?int $maxPreparedTransactions;

    /**
     * @var ?int $maxReplicationSlots PostgreSQL maximum replication slots. The default is `20`. Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_replication_slots')]
    public ?int $maxReplicationSlots;

    /**
     * @var ?int $maxSlotWalKeepSize PostgreSQL maximum WAL size (MB) reserved for replication slots. If `-1` is specified, replication slots may retain an unlimited amount of WAL files. The default is `-1` (upstream default). wal_keep_size minimum WAL size setting takes precedence over this.
     */
    #[JsonProperty('max_slot_wal_keep_size')]
    public ?int $maxSlotWalKeepSize;

    /**
     * @var ?int $maxStackDepth Maximum depth of the stack in bytes. The default is `2097152` (upstream default).
     */
    #[JsonProperty('max_stack_depth')]
    public ?int $maxStackDepth;

    /**
     * @var ?int $maxStandbyArchiveDelay Max standby archive delay in milliseconds. The default is `30000` (upstream default).
     */
    #[JsonProperty('max_standby_archive_delay')]
    public ?int $maxStandbyArchiveDelay;

    /**
     * @var ?int $maxStandbyStreamingDelay Max standby streaming delay in milliseconds. The default is `30000` (upstream default).
     */
    #[JsonProperty('max_standby_streaming_delay')]
    public ?int $maxStandbyStreamingDelay;

    /**
     * @var ?int $maxSyncWorkersPerSubscription Maximum number of synchronization workers per subscription. The default is `2`.
     */
    #[JsonProperty('max_sync_workers_per_subscription')]
    public ?int $maxSyncWorkersPerSubscription;

    /**
     * @var ?int $maxWalSenders PostgreSQL maximum WAL senders. The default is `20`. Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_wal_senders')]
    public ?int $maxWalSenders;

    /**
     * @var ?int $maxWorkerProcesses Sets the maximum number of background processes that the system can support. The default is `8`. Changing this parameter causes a service restart.
     */
    #[JsonProperty('max_worker_processes')]
    public ?int $maxWorkerProcesses;

    /**
     * @var ?DatabaseServicePropertiesPgMigration $migration
     */
    #[JsonProperty('migration')]
    public ?DatabaseServicePropertiesPgMigration $migration;

    /**
     * @var ?int $nodeCount
     */
    #[JsonProperty('node_count')]
    public ?int $nodeCount;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgPasswordEncryption> $passwordEncryption Chooses the algorithm for encrypting passwords.
     */
    #[JsonProperty('password_encryption')]
    public ?string $passwordEncryption;

    /**
     * @var ?int $pgPartmanBgwInterval Sets the time interval in seconds to run pg_partman's scheduled tasks. The default is `3600`.
     */
    #[JsonProperty('pg_partman_bgw_interval')]
    public ?int $pgPartmanBgwInterval;

    /**
     * @var ?string $pgPartmanBgwRole Controls which role to use for pg_partman's scheduled background tasks.
     */
    #[JsonProperty('pg_partman_bgw_role')]
    public ?string $pgPartmanBgwRole;

    /**
     * @var ?bool $pgStatMonitorEnable Enable the pg_stat_monitor extension. Changing this parameter causes a service restart. When this extension is enabled, pg_stat_statements results for utility commands are unreliable
     */
    #[JsonProperty('pg_stat_monitor_enable')]
    public ?bool $pgStatMonitorEnable;

    /**
     * @var ?bool $pgStatMonitorPgsmEnableQueryPlan Enables or disables query plan monitoring. Only available for PostgreSQL 13+.
     */
    #[JsonProperty('pg_stat_monitor_pgsm_enable_query_plan')]
    public ?bool $pgStatMonitorPgsmEnableQueryPlan;

    /**
     * @var ?int $pgStatMonitorPgsmMaxBuckets Sets the maximum number of buckets. Changing this parameter causes a service restart. Only available for PostgreSQL 13+.
     */
    #[JsonProperty('pg_stat_monitor_pgsm_max_buckets')]
    public ?int $pgStatMonitorPgsmMaxBuckets;

    /**
     * @var ?bool $pgStatPlansEnable Enable the pg_stat_plans extension. Changing this parameter causes a service restart. Tracks execution plans for SQL queries
     */
    #[JsonProperty('pg_stat_plans_enable')]
    public ?bool $pgStatPlansEnable;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgPgStatPlansTrack> $pgStatPlansTrack Controls which statements' plans are tracked. Specify top to track top-level statements (those issued directly by clients), all to also track nested statements (such as statements invoked within functions), or none to disable plan tracking. The default is `top`.
     */
    #[JsonProperty('pg_stat_plans_track')]
    public ?string $pgStatPlansTrack;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgPgStatStatementsTrack> $pgStatStatementsTrack Controls which statements are counted. Specify top to track top-level statements (those issued directly by clients), all to also track nested statements (such as statements invoked within functions), or none to disable statement statistics collection. The default is `top`.
     */
    #[JsonProperty('pg_stat_statements_track')]
    public ?string $pgStatStatementsTrack;

    /**
     * @var ?DatabaseServicePropertiesPgPgaudit $pgaudit System-wide settings for the pgaudit extension.
     */
    #[JsonProperty('pgaudit')]
    public ?DatabaseServicePropertiesPgPgaudit $pgaudit;

    /**
     * @var ?DatabaseServicePropertiesPgPgbouncer $pgbouncer System-wide settings for pgbouncer.
     */
    #[JsonProperty('pgbouncer')]
    public ?DatabaseServicePropertiesPgPgbouncer $pgbouncer;

    /**
     * @var ?DatabaseServicePropertiesPgPglookout $pglookout System-wide settings for pglookout.
     */
    #[JsonProperty('pglookout')]
    public ?DatabaseServicePropertiesPgPglookout $pglookout;

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
     * @var ?float $sharedBuffersPercentage Percentage of total RAM that the database server uses for shared memory buffers. Valid range is 20-60 (float), which corresponds to 20% - 60%. This setting adjusts the shared_buffers configuration value. Changing this parameter causes a service restart.
     */
    #[JsonProperty('shared_buffers_percentage')]
    public ?float $sharedBuffersPercentage;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgSynchronousCommit> $synchronousCommit Sets the current transaction's synchronization level. The default is `off`. This setting takes precedence over `synchronous_replication`.
     */
    #[JsonProperty('synchronous_commit')]
    public ?string $synchronousCommit;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgSynchronousReplication> $synchronousReplication This setting is deprecated. Use synchronous_commit instead. Any change to this setting will automatically update synchronous_commit. Setting the value to quorum changes synchronous_commit to remote_write, while setting it to off changes synchronous_commit to off.
     */
    #[JsonProperty('synchronous_replication')]
    public ?string $synchronousReplication;

    /**
     * @var ?int $tempFileLimit PostgreSQL temporary file limit in KiB, -1 for unlimited
     */
    #[JsonProperty('temp_file_limit')]
    public ?int $tempFileLimit;

    /**
     * @var ?DatabaseServicePropertiesPgTimescaledb $timescaledb System-wide settings for the timescaledb extension
     */
    #[JsonProperty('timescaledb')]
    public ?DatabaseServicePropertiesPgTimescaledb $timescaledb;

    /**
     * @var ?string $timezone PostgreSQL service timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var ?int $trackActivityQuerySize Specifies the number of bytes reserved to track the currently executing command for each active session. Changing this parameter causes a service restart.
     */
    #[JsonProperty('track_activity_query_size')]
    public ?int $trackActivityQuerySize;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgTrackCommitTimestamp> $trackCommitTimestamp Record commit time of transactions. Changing this parameter causes a service restart.
     */
    #[JsonProperty('track_commit_timestamp')]
    public ?string $trackCommitTimestamp;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgTrackFunctions> $trackFunctions Enables tracking of function call counts and time used.
     */
    #[JsonProperty('track_functions')]
    public ?string $trackFunctions;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgTrackIoTiming> $trackIoTiming Enables timing of database I/O calls. The default is `off`. When on, it will repeatedly query the operating system for the current time, which may cause significant overhead on some platforms.
     */
    #[JsonProperty('track_io_timing')]
    public ?string $trackIoTiming;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgVariant> $variant
     */
    #[JsonProperty('variant')]
    public ?string $variant;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgVersion> $version
     */
    #[JsonProperty('version')]
    public ?string $version;

    /**
     * @var ?int $walSenderTimeout Terminate replication connections that are inactive for longer than this amount of time, in milliseconds. Setting this value to zero disables the timeout.
     */
    #[JsonProperty('wal_sender_timeout')]
    public ?int $walSenderTimeout;

    /**
     * @var ?int $walWriterDelay WAL flush interval in milliseconds. The default is `200`. Setting this parameter to a lower value may negatively impact performance.
     */
    #[JsonProperty('wal_writer_delay')]
    public ?int $walWriterDelay;

    /**
     * @var ?int $workMem Sets the maximum amount of memory to be used by a query operation (such as a sort or hash table) before writing to temporary disk files, in MB. The default is 1MB + 0.075% of total RAM (up to 32MB).
     */
    #[JsonProperty('work_mem')]
    public ?int $workMem;

    /**
     * @param array{
     *   adminPassword?: ?string,
     *   adminUsername?: ?string,
     *   automaticUtilityNetworkIpFilter?: ?bool,
     *   autovacuumAnalyzeScaleFactor?: ?float,
     *   autovacuumAnalyzeThreshold?: ?int,
     *   autovacuumFreezeMaxAge?: ?int,
     *   autovacuumMaxWorkers?: ?int,
     *   autovacuumNaptime?: ?int,
     *   autovacuumVacuumCostDelay?: ?int,
     *   autovacuumVacuumCostLimit?: ?int,
     *   autovacuumVacuumScaleFactor?: ?float,
     *   autovacuumVacuumThreshold?: ?int,
     *   backupHour?: ?int,
     *   backupIntervalHours?: ?int,
     *   backupMinute?: ?int,
     *   backupRetentionDays?: ?int,
     *   bgwriterDelay?: ?int,
     *   bgwriterFlushAfter?: ?int,
     *   bgwriterLruMaxpages?: ?int,
     *   bgwriterLruMultiplier?: ?float,
     *   deadlockTimeout?: ?int,
     *   defaultToastCompression?: ?value-of<DatabaseServicePropertiesPgDefaultToastCompression>,
     *   enableHaReplicaDns?: ?bool,
     *   idleInTransactionSessionTimeout?: ?int,
     *   ioCombineLimit?: ?int,
     *   ioMaxCombineLimit?: ?int,
     *   ioMaxConcurrency?: ?int,
     *   ioMethod?: ?value-of<DatabaseServicePropertiesPgIoMethod>,
     *   ioWorkers?: ?int,
     *   ipFilter?: ?array<string>,
     *   jit?: ?bool,
     *   logAutovacuumMinDuration?: ?int,
     *   logErrorVerbosity?: ?value-of<DatabaseServicePropertiesPgLogErrorVerbosity>,
     *   logLinePrefix?: ?value-of<DatabaseServicePropertiesPgLogLinePrefix>,
     *   logMinDurationStatement?: ?int,
     *   logTempFiles?: ?int,
     *   maxConnections?: ?int,
     *   maxFilesPerProcess?: ?int,
     *   maxLocksPerTransaction?: ?int,
     *   maxLogicalReplicationWorkers?: ?int,
     *   maxParallelWorkers?: ?int,
     *   maxParallelWorkersPerGather?: ?int,
     *   maxPredLocksPerTransaction?: ?int,
     *   maxPreparedTransactions?: ?int,
     *   maxReplicationSlots?: ?int,
     *   maxSlotWalKeepSize?: ?int,
     *   maxStackDepth?: ?int,
     *   maxStandbyArchiveDelay?: ?int,
     *   maxStandbyStreamingDelay?: ?int,
     *   maxSyncWorkersPerSubscription?: ?int,
     *   maxWalSenders?: ?int,
     *   maxWorkerProcesses?: ?int,
     *   migration?: ?DatabaseServicePropertiesPgMigration,
     *   nodeCount?: ?int,
     *   passwordEncryption?: ?value-of<DatabaseServicePropertiesPgPasswordEncryption>,
     *   pgPartmanBgwInterval?: ?int,
     *   pgPartmanBgwRole?: ?string,
     *   pgStatMonitorEnable?: ?bool,
     *   pgStatMonitorPgsmEnableQueryPlan?: ?bool,
     *   pgStatMonitorPgsmMaxBuckets?: ?int,
     *   pgStatPlansEnable?: ?bool,
     *   pgStatPlansTrack?: ?value-of<DatabaseServicePropertiesPgPgStatPlansTrack>,
     *   pgStatStatementsTrack?: ?value-of<DatabaseServicePropertiesPgPgStatStatementsTrack>,
     *   pgaudit?: ?DatabaseServicePropertiesPgPgaudit,
     *   pgbouncer?: ?DatabaseServicePropertiesPgPgbouncer,
     *   pglookout?: ?DatabaseServicePropertiesPgPglookout,
     *   publicAccess?: ?bool,
     *   publicAccessPrometheus?: ?bool,
     *   serviceLog?: ?bool,
     *   sharedBuffersPercentage?: ?float,
     *   synchronousCommit?: ?value-of<DatabaseServicePropertiesPgSynchronousCommit>,
     *   synchronousReplication?: ?value-of<DatabaseServicePropertiesPgSynchronousReplication>,
     *   tempFileLimit?: ?int,
     *   timescaledb?: ?DatabaseServicePropertiesPgTimescaledb,
     *   timezone?: ?string,
     *   trackActivityQuerySize?: ?int,
     *   trackCommitTimestamp?: ?value-of<DatabaseServicePropertiesPgTrackCommitTimestamp>,
     *   trackFunctions?: ?value-of<DatabaseServicePropertiesPgTrackFunctions>,
     *   trackIoTiming?: ?value-of<DatabaseServicePropertiesPgTrackIoTiming>,
     *   variant?: ?value-of<DatabaseServicePropertiesPgVariant>,
     *   version?: ?value-of<DatabaseServicePropertiesPgVersion>,
     *   walSenderTimeout?: ?int,
     *   walWriterDelay?: ?int,
     *   workMem?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adminPassword = $values['adminPassword'] ?? null;
        $this->adminUsername = $values['adminUsername'] ?? null;
        $this->automaticUtilityNetworkIpFilter = $values['automaticUtilityNetworkIpFilter'] ?? null;
        $this->autovacuumAnalyzeScaleFactor = $values['autovacuumAnalyzeScaleFactor'] ?? null;
        $this->autovacuumAnalyzeThreshold = $values['autovacuumAnalyzeThreshold'] ?? null;
        $this->autovacuumFreezeMaxAge = $values['autovacuumFreezeMaxAge'] ?? null;
        $this->autovacuumMaxWorkers = $values['autovacuumMaxWorkers'] ?? null;
        $this->autovacuumNaptime = $values['autovacuumNaptime'] ?? null;
        $this->autovacuumVacuumCostDelay = $values['autovacuumVacuumCostDelay'] ?? null;
        $this->autovacuumVacuumCostLimit = $values['autovacuumVacuumCostLimit'] ?? null;
        $this->autovacuumVacuumScaleFactor = $values['autovacuumVacuumScaleFactor'] ?? null;
        $this->autovacuumVacuumThreshold = $values['autovacuumVacuumThreshold'] ?? null;
        $this->backupHour = $values['backupHour'] ?? null;
        $this->backupIntervalHours = $values['backupIntervalHours'] ?? null;
        $this->backupMinute = $values['backupMinute'] ?? null;
        $this->backupRetentionDays = $values['backupRetentionDays'] ?? null;
        $this->bgwriterDelay = $values['bgwriterDelay'] ?? null;
        $this->bgwriterFlushAfter = $values['bgwriterFlushAfter'] ?? null;
        $this->bgwriterLruMaxpages = $values['bgwriterLruMaxpages'] ?? null;
        $this->bgwriterLruMultiplier = $values['bgwriterLruMultiplier'] ?? null;
        $this->deadlockTimeout = $values['deadlockTimeout'] ?? null;
        $this->defaultToastCompression = $values['defaultToastCompression'] ?? null;
        $this->enableHaReplicaDns = $values['enableHaReplicaDns'] ?? null;
        $this->idleInTransactionSessionTimeout = $values['idleInTransactionSessionTimeout'] ?? null;
        $this->ioCombineLimit = $values['ioCombineLimit'] ?? null;
        $this->ioMaxCombineLimit = $values['ioMaxCombineLimit'] ?? null;
        $this->ioMaxConcurrency = $values['ioMaxConcurrency'] ?? null;
        $this->ioMethod = $values['ioMethod'] ?? null;
        $this->ioWorkers = $values['ioWorkers'] ?? null;
        $this->ipFilter = $values['ipFilter'] ?? null;
        $this->jit = $values['jit'] ?? null;
        $this->logAutovacuumMinDuration = $values['logAutovacuumMinDuration'] ?? null;
        $this->logErrorVerbosity = $values['logErrorVerbosity'] ?? null;
        $this->logLinePrefix = $values['logLinePrefix'] ?? null;
        $this->logMinDurationStatement = $values['logMinDurationStatement'] ?? null;
        $this->logTempFiles = $values['logTempFiles'] ?? null;
        $this->maxConnections = $values['maxConnections'] ?? null;
        $this->maxFilesPerProcess = $values['maxFilesPerProcess'] ?? null;
        $this->maxLocksPerTransaction = $values['maxLocksPerTransaction'] ?? null;
        $this->maxLogicalReplicationWorkers = $values['maxLogicalReplicationWorkers'] ?? null;
        $this->maxParallelWorkers = $values['maxParallelWorkers'] ?? null;
        $this->maxParallelWorkersPerGather = $values['maxParallelWorkersPerGather'] ?? null;
        $this->maxPredLocksPerTransaction = $values['maxPredLocksPerTransaction'] ?? null;
        $this->maxPreparedTransactions = $values['maxPreparedTransactions'] ?? null;
        $this->maxReplicationSlots = $values['maxReplicationSlots'] ?? null;
        $this->maxSlotWalKeepSize = $values['maxSlotWalKeepSize'] ?? null;
        $this->maxStackDepth = $values['maxStackDepth'] ?? null;
        $this->maxStandbyArchiveDelay = $values['maxStandbyArchiveDelay'] ?? null;
        $this->maxStandbyStreamingDelay = $values['maxStandbyStreamingDelay'] ?? null;
        $this->maxSyncWorkersPerSubscription = $values['maxSyncWorkersPerSubscription'] ?? null;
        $this->maxWalSenders = $values['maxWalSenders'] ?? null;
        $this->maxWorkerProcesses = $values['maxWorkerProcesses'] ?? null;
        $this->migration = $values['migration'] ?? null;
        $this->nodeCount = $values['nodeCount'] ?? null;
        $this->passwordEncryption = $values['passwordEncryption'] ?? null;
        $this->pgPartmanBgwInterval = $values['pgPartmanBgwInterval'] ?? null;
        $this->pgPartmanBgwRole = $values['pgPartmanBgwRole'] ?? null;
        $this->pgStatMonitorEnable = $values['pgStatMonitorEnable'] ?? null;
        $this->pgStatMonitorPgsmEnableQueryPlan = $values['pgStatMonitorPgsmEnableQueryPlan'] ?? null;
        $this->pgStatMonitorPgsmMaxBuckets = $values['pgStatMonitorPgsmMaxBuckets'] ?? null;
        $this->pgStatPlansEnable = $values['pgStatPlansEnable'] ?? null;
        $this->pgStatPlansTrack = $values['pgStatPlansTrack'] ?? null;
        $this->pgStatStatementsTrack = $values['pgStatStatementsTrack'] ?? null;
        $this->pgaudit = $values['pgaudit'] ?? null;
        $this->pgbouncer = $values['pgbouncer'] ?? null;
        $this->pglookout = $values['pglookout'] ?? null;
        $this->publicAccess = $values['publicAccess'] ?? null;
        $this->publicAccessPrometheus = $values['publicAccessPrometheus'] ?? null;
        $this->serviceLog = $values['serviceLog'] ?? null;
        $this->sharedBuffersPercentage = $values['sharedBuffersPercentage'] ?? null;
        $this->synchronousCommit = $values['synchronousCommit'] ?? null;
        $this->synchronousReplication = $values['synchronousReplication'] ?? null;
        $this->tempFileLimit = $values['tempFileLimit'] ?? null;
        $this->timescaledb = $values['timescaledb'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->trackActivityQuerySize = $values['trackActivityQuerySize'] ?? null;
        $this->trackCommitTimestamp = $values['trackCommitTimestamp'] ?? null;
        $this->trackFunctions = $values['trackFunctions'] ?? null;
        $this->trackIoTiming = $values['trackIoTiming'] ?? null;
        $this->variant = $values['variant'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->walSenderTimeout = $values['walSenderTimeout'] ?? null;
        $this->walWriterDelay = $values['walWriterDelay'] ?? null;
        $this->workMem = $values['workMem'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

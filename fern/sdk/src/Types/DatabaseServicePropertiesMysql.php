<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * mysql properties
 */
class DatabaseServicePropertiesMysql extends JsonSerializableType
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
     * @var ?bool $automaticSpPrivileges When enabled, the server automatically grants the EXECUTE and ALTER ROUTINE privileges to the creator of a stored routine and drops them when the routine is dropped.
     */
    #[JsonProperty('automatic_sp_privileges')]
    public ?bool $automaticSpPrivileges;

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
     * @var ?int $binlogRetentionPeriod Warning: reducing this value can make a large batch of binary logs eligible for purge at once. Depending on the volume, this can sometimes stall the MySQL commit path and block writes until the purge completes. To stay on the safe side, prefer lowering the value gradually in small decrements during a low-traffic window rather than dropping it drastically in one step.
     */
    #[JsonProperty('binlog_retention_period')]
    public ?int $binlogRetentionPeriod;

    /**
     * @var ?int $connectTimeout The number of seconds that the mysqld server waits for a connect packet before responding with Bad handshake
     */
    #[JsonProperty('connect_timeout')]
    public ?int $connectTimeout;

    /**
     * @var ?string $defaultTimeZone Default server time zone as an offset from UTC (from -12:00 to +12:00), a time zone name, or 'SYSTEM' to use the MySQL server default.
     */
    #[JsonProperty('default_time_zone')]
    public ?string $defaultTimeZone;

    /**
     * @var ?int $divPrecisionIncrement Number of digits by which to increase the scale of the result of division operations performed with the / operator. Default is 4.
     */
    #[JsonProperty('div_precision_increment')]
    public ?int $divPrecisionIncrement;

    /**
     * @var ?bool $endMarkersInJson Whether optimizer JSON output such as EXPLAIN FORMAT=JSON adds end markers that repeat a structure's key near its closing bracket, making large JSON structures easier to read.
     */
    #[JsonProperty('end_markers_in_json')]
    public ?bool $endMarkersInJson;

    /**
     * @var ?int $eqRangeIndexDiveLimit The number of equality ranges in a query at or above which the optimizer switches from index dives to index statistics when estimating the number of qualifying rows. 0 means always use index dives. Default is 200.
     */
    #[JsonProperty('eq_range_index_dive_limit')]
    public ?int $eqRangeIndexDiveLimit;

    /**
     * @var ?int $groupConcatMaxLen The maximum permitted result length in bytes for the GROUP_CONCAT() function.
     */
    #[JsonProperty('group_concat_max_len')]
    public ?int $groupConcatMaxLen;

    /**
     * @var ?int $informationSchemaStatsExpiry The time, in seconds, before cached statistics expire
     */
    #[JsonProperty('information_schema_stats_expiry')]
    public ?int $informationSchemaStatsExpiry;

    /**
     * @var ?bool $innodbAdaptiveHashIndex Whether InnoDB adaptive hash indexing is enabled. The optimal setting is workload-dependent: it speeds up lookups for some workloads but its internal latch can become a contention point under high concurrency, in which case disabling it can improve throughput.
     */
    #[JsonProperty('innodb_adaptive_hash_index')]
    public ?bool $innodbAdaptiveHashIndex;

    /**
     * @var ?int $innodbChangeBufferMaxSize Maximum size for the InnoDB change buffer, as a percentage of the total size of the buffer pool. Default is 25
     */
    #[JsonProperty('innodb_change_buffer_max_size')]
    public ?int $innodbChangeBufferMaxSize;

    /**
     * @var ?int $innodbFlushNeighbors Specifies whether flushing a page from the InnoDB buffer pool also flushes other dirty pages in the same extent (default is 1): 0 - dirty pages in the same extent are not flushed, 1 - flush contiguous dirty pages in the same extent, 2 - flush dirty pages in the same extent
     */
    #[JsonProperty('innodb_flush_neighbors')]
    public ?int $innodbFlushNeighbors;

    /**
     * @var ?bool $innodbFtEnableStopword Whether stopword processing is applied when creating or rebuilding an InnoDB FULLTEXT index. Enabled by default.
     */
    #[JsonProperty('innodb_ft_enable_stopword')]
    public ?bool $innodbFtEnableStopword;

    /**
     * @var ?int $innodbFtMaxTokenSize Maximum length of words that are stored in an InnoDB FULLTEXT index. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_ft_max_token_size')]
    public ?int $innodbFtMaxTokenSize;

    /**
     * @var ?int $innodbFtMinTokenSize Minimum length of words that are stored in an InnoDB FULLTEXT index. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_ft_min_token_size')]
    public ?int $innodbFtMinTokenSize;

    /**
     * @var ?int $innodbFtNumWordOptimize Number of words processed during each OPTIMIZE TABLE operation on an InnoDB FULLTEXT index. Default is 2000.
     */
    #[JsonProperty('innodb_ft_num_word_optimize')]
    public ?int $innodbFtNumWordOptimize;

    /**
     * @var ?int $innodbFtResultCacheLimit Maximum memory in bytes used per query for the InnoDB FULLTEXT search query result cache. UpCloud sizes this automatically based on the service plan's memory; setting a value overrides the calculated default.
     */
    #[JsonProperty('innodb_ft_result_cache_limit')]
    public ?int $innodbFtResultCacheLimit;

    /**
     * @var ?string $innodbFtServerStopwordTable This option is used to specify your own InnoDB FULLTEXT index stopword list for all InnoDB tables.
     */
    #[JsonProperty('innodb_ft_server_stopword_table')]
    public ?string $innodbFtServerStopwordTable;

    /**
     * @var ?string $innodbFtUserStopwordTable This option is used to specify your own InnoDB FULLTEXT index stopword list for specific InnoDB tables.
     */
    #[JsonProperty('innodb_ft_user_stopword_table')]
    public ?string $innodbFtUserStopwordTable;

    /**
     * @var ?int $innodbIoCapacity The number of I/O operations per second (IOPS) available to InnoDB background tasks, such as flushing pages from the buffer pool and merging data from the change buffer. Set this to a value appropriate for the underlying storage; it must not exceed innodb_io_capacity_max.
     */
    #[JsonProperty('innodb_io_capacity')]
    public ?int $innodbIoCapacity;

    /**
     * @var ?int $innodbIoCapacityMax The maximum number of I/O operations per second (IOPS) that InnoDB background tasks may perform when flushing falls behind. Defaults to twice innodb_io_capacity (minimum 2000). This must be greater than or equal to innodb_io_capacity.
     */
    #[JsonProperty('innodb_io_capacity_max')]
    public ?int $innodbIoCapacityMax;

    /**
     * @var ?int $innodbLockWaitTimeout The length of time in seconds an InnoDB transaction waits for a row lock before giving up. Default is 120.
     */
    #[JsonProperty('innodb_lock_wait_timeout')]
    public ?int $innodbLockWaitTimeout;

    /**
     * @var ?int $innodbLogBufferSize The size in bytes of the buffer that InnoDB uses to write to the log files on disk. Requests above 15% of the RAM provided by your service plan are rejected, because a larger buffer leaves less memory for the buffer pool and client connections.
     */
    #[JsonProperty('innodb_log_buffer_size')]
    public ?int $innodbLogBufferSize;

    /**
     * @var ?int $innodbOnlineAlterLogMaxSize The upper limit in bytes on the size of the temporary log files used during online DDL operations for InnoDB tables.
     */
    #[JsonProperty('innodb_online_alter_log_max_size')]
    public ?int $innodbOnlineAlterLogMaxSize;

    /**
     * @var ?bool $innodbOptimizeFulltextOnly When enabled, OPTIMIZE TABLE on InnoDB tables only updates the FULLTEXT index instead of rebuilding the table. Intended to be enabled temporarily during FULLTEXT index maintenance and disabled afterwards; while enabled, OPTIMIZE TABLE does not reclaim table space.
     */
    #[JsonProperty('innodb_optimize_fulltext_only')]
    public ?bool $innodbOptimizeFulltextOnly;

    /**
     * @var ?bool $innodbPrintAllDeadlocks When enabled, information about all deadlocks in InnoDB user transactions is recorded in the error log. Disabled by default.
     */
    #[JsonProperty('innodb_print_all_deadlocks')]
    public ?bool $innodbPrintAllDeadlocks;

    /**
     * @var ?int $innodbReadIoThreads The number of I/O threads for read operations in InnoDB. Default is 4. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_read_io_threads')]
    public ?int $innodbReadIoThreads;

    /**
     * @var ?bool $innodbRollbackOnTimeout When enabled a transaction timeout causes InnoDB to abort and roll back the entire transaction. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_rollback_on_timeout')]
    public ?bool $innodbRollbackOnTimeout;

    /**
     * @var ?int $innodbThreadConcurrency Defines the maximum number of threads permitted inside of InnoDB. Default is 0 (infinite concurrency - no limit)
     */
    #[JsonProperty('innodb_thread_concurrency')]
    public ?int $innodbThreadConcurrency;

    /**
     * @var ?int $innodbWriteIoThreads The number of I/O threads for write operations in InnoDB. Default is 4. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_write_io_threads')]
    public ?int $innodbWriteIoThreads;

    /**
     * @var ?int $interactiveTimeout The number of seconds the server waits for activity on an interactive connection before closing it.
     */
    #[JsonProperty('interactive_timeout')]
    public ?int $interactiveTimeout;

    /**
     * @var ?value-of<DatabaseServicePropertiesMysqlInternalTmpMemStorageEngine> $internalTmpMemStorageEngine The storage engine for in-memory internal temporary tables.
     */
    #[JsonProperty('internal_tmp_mem_storage_engine')]
    public ?string $internalTmpMemStorageEngine;

    /**
     * @var ?array<string> $ipFilter Allow incoming connections from CIDR address block, e.g. '10.20.0.0/16'
     */
    #[JsonProperty('ip_filter'), ArrayType(['string'])]
    public ?array $ipFilter;

    /**
     * @var ?value-of<DatabaseServicePropertiesMysqlLogOutput> $logOutput The slow log output destination when slow_query_log is ON. To enable MySQL AI Insights, choose INSIGHTS. To use MySQL AI Insights and the mysql.slow_log table at the same time, choose INSIGHTS,TABLE. To only use the mysql.slow_log table, choose TABLE. To silence slow logs, choose NONE.
     */
    #[JsonProperty('log_output')]
    public ?string $logOutput;

    /**
     * @var ?float $longQueryTime The slow_query_logs work as SQL statements that take more than long_query_time seconds to execute.
     */
    #[JsonProperty('long_query_time')]
    public ?float $longQueryTime;

    /**
     * @var ?int $lowerCaseTableNames Sets how table and database names are stored and compared. 0 = case-sensitive (default), 1 = names stored lowercase, comparisons are case-insensitive. This option can only be set when creating the service and cannot be changed later. See https://dev.mysql.com/doc/refman/8.0/en/identifier-case-sensitivity.html for details.
     */
    #[JsonProperty('lower_case_table_names')]
    public ?int $lowerCaseTableNames;

    /**
     * @var ?int $maxAllowedPacket Size of the largest message in bytes that can be received by the server. Default is 67108864 (64M). Statements and rows larger than this are rejected with a packet too large error.
     */
    #[JsonProperty('max_allowed_packet')]
    public ?int $maxAllowedPacket;

    /**
     * @var ?int $maxConnections The maximum permitted number of simultaneous client connections. Lower this to reserve memory for other work. The value cannot exceed the limit provided by your service plan. Upgrading the plan does not raise a value you have set explicitly, so increase it yourself after an upgrade.
     */
    #[JsonProperty('max_connections')]
    public ?int $maxConnections;

    /**
     * @var ?int $maxExecutionTime Execution timeout in milliseconds for read-only top-level SELECT statements. 0 (the default) means no timeout.
     */
    #[JsonProperty('max_execution_time')]
    public ?int $maxExecutionTime;

    /**
     * @var ?int $maxHeapTableSize Limits the size of internal in-memory tables. Also set tmp_table_size. Default is 16777216 (16M)
     */
    #[JsonProperty('max_heap_table_size')]
    public ?int $maxHeapTableSize;

    /**
     * @var ?int $maxSeeksForKey Limit on the assumed maximum number of index seeks when looking up rows based on a key. Lowering this value causes the optimizer to prefer index lookups over table scans.
     */
    #[JsonProperty('max_seeks_for_key')]
    public ?int $maxSeeksForKey;

    /**
     * @var ?int $maxUserConnections The maximum number of simultaneous connections permitted to any single user account. 0, the default, means no per-account limit. Any other value must be at least 10 below max_connections, so that monitoring and your own admin sessions can still connect when an application saturates its own limit. UpCloud's replication and management connections are unaffected however low you set this.
     */
    #[JsonProperty('max_user_connections')]
    public ?int $maxUserConnections;

    /**
     * @var ?DatabaseServicePropertiesMysqlMigration $migration
     */
    #[JsonProperty('migration')]
    public ?DatabaseServicePropertiesMysqlMigration $migration;

    /**
     * @var ?DatabaseServicePropertiesMysqlMysqlIncrementalBackup $mysqlIncrementalBackup
     */
    #[JsonProperty('mysql_incremental_backup')]
    public ?DatabaseServicePropertiesMysqlMysqlIncrementalBackup $mysqlIncrementalBackup;

    /**
     * @var ?int $netBufferLength Start sizes of connection buffer and result buffer. Default is 16384 (16K). Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('net_buffer_length')]
    public ?int $netBufferLength;

    /**
     * @var ?int $netReadTimeout The number of seconds to wait for more data from a connection before aborting the read.
     */
    #[JsonProperty('net_read_timeout')]
    public ?int $netReadTimeout;

    /**
     * @var ?int $netWriteTimeout The number of seconds to wait for a block to be written to a connection before aborting the write.
     */
    #[JsonProperty('net_write_timeout')]
    public ?int $netWriteTimeout;

    /**
     * @var ?int $optimizerPruneLevel Controls the heuristics applied during query optimization to prune less-promising partial plans from the optimizer search space. 0 disables heuristics (exhaustive search); 1 prunes plans based on the number of rows retrieved.
     */
    #[JsonProperty('optimizer_prune_level')]
    public ?int $optimizerPruneLevel;

    /**
     * @var ?int $optimizerSearchDepth Maximum depth of search performed by the query optimizer when choosing a join order. Larger values produce better plans for joins over many tables but take longer to compile; 0 lets the optimizer choose the depth automatically.
     */
    #[JsonProperty('optimizer_search_depth')]
    public ?int $optimizerSearchDepth;

    /**
     * @var ?string $optimizerSwitch Comma-separated list of optimizer flag assignments in the form flag=on|off|default, or the single value 'default' to reset all flags. Flags not listed keep their current values. Controls query optimizer behaviors such as index merge, hash join and semijoin strategies.
     */
    #[JsonProperty('optimizer_switch')]
    public ?string $optimizerSwitch;

    /**
     * @var ?int $performanceSchemaEventsStatementsHistorySize The number of rows per thread in the events_statements_history table. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('performance_schema_events_statements_history_size')]
    public ?int $performanceSchemaEventsStatementsHistorySize;

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
     * @var ?int $relayLogSpaceLimit The maximum amount of space in bytes to use for all relay logs while replicating from an external migration source. When the limit is reached, the replication I/O thread stops fetching relay log events until the SQL thread has caught up. Raise this to give a large migration a bigger relay-log budget; ensure the service disk is sized accordingly. The setting applies only on the node replicating from the external source; standby nodes always use the UpCloud-managed default (the smaller of 5 GiB and 30% of the service disk), which is also used when this option is left unset. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('relay_log_space_limit')]
    public ?int $relayLogSpaceLimit;

    /**
     * @var ?bool $serviceLog Store logs for the service so that they are available in the HTTP API and console.
     */
    #[JsonProperty('service_log')]
    public ?bool $serviceLog;

    /**
     * @var ?bool $slowQueryLog Slow query log enables capturing of slow queries. Setting slow_query_log to false also truncates the mysql.slow_log table.
     */
    #[JsonProperty('slow_query_log')]
    public ?bool $slowQueryLog;

    /**
     * @var ?int $sortBufferSize Sort buffer size in bytes for ORDER BY optimization. Default is 262144 (256K). Requests above 2% of the RAM provided by your service plan are rejected, because the buffer is allocated per session and its cost multiplies with the connection count.
     */
    #[JsonProperty('sort_buffer_size')]
    public ?int $sortBufferSize;

    /**
     * @var ?string $sqlMode Global SQL mode. Set to empty to use MySQL server defaults. When creating a new service and not setting this field UpCloud default SQL mode (strict, SQL standard compliant) will be assigned.
     */
    #[JsonProperty('sql_mode')]
    public ?string $sqlMode;

    /**
     * @var ?bool $sqlRequirePrimaryKey Require primary key to be defined for new tables or old tables modified with ALTER TABLE and fail if missing. It is recommended to always have primary keys because various functionality may break if any large table is missing them.
     */
    #[JsonProperty('sql_require_primary_key')]
    public ?bool $sqlRequirePrimaryKey;

    /**
     * @var ?int $tmpTableSize Limits the size of internal in-memory tables. Also set max_heap_table_size. Default is 16777216 (16M)
     */
    #[JsonProperty('tmp_table_size')]
    public ?int $tmpTableSize;

    /**
     * @var ?value-of<DatabaseServicePropertiesMysqlVersion> $version
     */
    #[JsonProperty('version')]
    public ?string $version;

    /**
     * @var ?int $waitTimeout The number of seconds the server waits for activity on a noninteractive connection before closing it. Requests to set this below 30 are rejected, because a shorter timeout closes your own idle connections between statements.
     */
    #[JsonProperty('wait_timeout')]
    public ?int $waitTimeout;

    /**
     * @var ?bool $windowingUseHighPrecision Whether window functions are computed to high precision. Disabling this trades exactness for speed in window function evaluation.
     */
    #[JsonProperty('windowing_use_high_precision')]
    public ?bool $windowingUseHighPrecision;

    /**
     * @param array{
     *   adminPassword?: ?string,
     *   adminUsername?: ?string,
     *   automaticSpPrivileges?: ?bool,
     *   automaticUtilityNetworkIpFilter?: ?bool,
     *   backupHour?: ?int,
     *   backupMinute?: ?int,
     *   binlogRetentionPeriod?: ?int,
     *   connectTimeout?: ?int,
     *   defaultTimeZone?: ?string,
     *   divPrecisionIncrement?: ?int,
     *   endMarkersInJson?: ?bool,
     *   eqRangeIndexDiveLimit?: ?int,
     *   groupConcatMaxLen?: ?int,
     *   informationSchemaStatsExpiry?: ?int,
     *   innodbAdaptiveHashIndex?: ?bool,
     *   innodbChangeBufferMaxSize?: ?int,
     *   innodbFlushNeighbors?: ?int,
     *   innodbFtEnableStopword?: ?bool,
     *   innodbFtMaxTokenSize?: ?int,
     *   innodbFtMinTokenSize?: ?int,
     *   innodbFtNumWordOptimize?: ?int,
     *   innodbFtResultCacheLimit?: ?int,
     *   innodbFtServerStopwordTable?: ?string,
     *   innodbFtUserStopwordTable?: ?string,
     *   innodbIoCapacity?: ?int,
     *   innodbIoCapacityMax?: ?int,
     *   innodbLockWaitTimeout?: ?int,
     *   innodbLogBufferSize?: ?int,
     *   innodbOnlineAlterLogMaxSize?: ?int,
     *   innodbOptimizeFulltextOnly?: ?bool,
     *   innodbPrintAllDeadlocks?: ?bool,
     *   innodbReadIoThreads?: ?int,
     *   innodbRollbackOnTimeout?: ?bool,
     *   innodbThreadConcurrency?: ?int,
     *   innodbWriteIoThreads?: ?int,
     *   interactiveTimeout?: ?int,
     *   internalTmpMemStorageEngine?: ?value-of<DatabaseServicePropertiesMysqlInternalTmpMemStorageEngine>,
     *   ipFilter?: ?array<string>,
     *   logOutput?: ?value-of<DatabaseServicePropertiesMysqlLogOutput>,
     *   longQueryTime?: ?float,
     *   lowerCaseTableNames?: ?int,
     *   maxAllowedPacket?: ?int,
     *   maxConnections?: ?int,
     *   maxExecutionTime?: ?int,
     *   maxHeapTableSize?: ?int,
     *   maxSeeksForKey?: ?int,
     *   maxUserConnections?: ?int,
     *   migration?: ?DatabaseServicePropertiesMysqlMigration,
     *   mysqlIncrementalBackup?: ?DatabaseServicePropertiesMysqlMysqlIncrementalBackup,
     *   netBufferLength?: ?int,
     *   netReadTimeout?: ?int,
     *   netWriteTimeout?: ?int,
     *   optimizerPruneLevel?: ?int,
     *   optimizerSearchDepth?: ?int,
     *   optimizerSwitch?: ?string,
     *   performanceSchemaEventsStatementsHistorySize?: ?int,
     *   publicAccess?: ?bool,
     *   publicAccessPrometheus?: ?bool,
     *   relayLogSpaceLimit?: ?int,
     *   serviceLog?: ?bool,
     *   slowQueryLog?: ?bool,
     *   sortBufferSize?: ?int,
     *   sqlMode?: ?string,
     *   sqlRequirePrimaryKey?: ?bool,
     *   tmpTableSize?: ?int,
     *   version?: ?value-of<DatabaseServicePropertiesMysqlVersion>,
     *   waitTimeout?: ?int,
     *   windowingUseHighPrecision?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adminPassword = $values['adminPassword'] ?? null;
        $this->adminUsername = $values['adminUsername'] ?? null;
        $this->automaticSpPrivileges = $values['automaticSpPrivileges'] ?? null;
        $this->automaticUtilityNetworkIpFilter = $values['automaticUtilityNetworkIpFilter'] ?? null;
        $this->backupHour = $values['backupHour'] ?? null;
        $this->backupMinute = $values['backupMinute'] ?? null;
        $this->binlogRetentionPeriod = $values['binlogRetentionPeriod'] ?? null;
        $this->connectTimeout = $values['connectTimeout'] ?? null;
        $this->defaultTimeZone = $values['defaultTimeZone'] ?? null;
        $this->divPrecisionIncrement = $values['divPrecisionIncrement'] ?? null;
        $this->endMarkersInJson = $values['endMarkersInJson'] ?? null;
        $this->eqRangeIndexDiveLimit = $values['eqRangeIndexDiveLimit'] ?? null;
        $this->groupConcatMaxLen = $values['groupConcatMaxLen'] ?? null;
        $this->informationSchemaStatsExpiry = $values['informationSchemaStatsExpiry'] ?? null;
        $this->innodbAdaptiveHashIndex = $values['innodbAdaptiveHashIndex'] ?? null;
        $this->innodbChangeBufferMaxSize = $values['innodbChangeBufferMaxSize'] ?? null;
        $this->innodbFlushNeighbors = $values['innodbFlushNeighbors'] ?? null;
        $this->innodbFtEnableStopword = $values['innodbFtEnableStopword'] ?? null;
        $this->innodbFtMaxTokenSize = $values['innodbFtMaxTokenSize'] ?? null;
        $this->innodbFtMinTokenSize = $values['innodbFtMinTokenSize'] ?? null;
        $this->innodbFtNumWordOptimize = $values['innodbFtNumWordOptimize'] ?? null;
        $this->innodbFtResultCacheLimit = $values['innodbFtResultCacheLimit'] ?? null;
        $this->innodbFtServerStopwordTable = $values['innodbFtServerStopwordTable'] ?? null;
        $this->innodbFtUserStopwordTable = $values['innodbFtUserStopwordTable'] ?? null;
        $this->innodbIoCapacity = $values['innodbIoCapacity'] ?? null;
        $this->innodbIoCapacityMax = $values['innodbIoCapacityMax'] ?? null;
        $this->innodbLockWaitTimeout = $values['innodbLockWaitTimeout'] ?? null;
        $this->innodbLogBufferSize = $values['innodbLogBufferSize'] ?? null;
        $this->innodbOnlineAlterLogMaxSize = $values['innodbOnlineAlterLogMaxSize'] ?? null;
        $this->innodbOptimizeFulltextOnly = $values['innodbOptimizeFulltextOnly'] ?? null;
        $this->innodbPrintAllDeadlocks = $values['innodbPrintAllDeadlocks'] ?? null;
        $this->innodbReadIoThreads = $values['innodbReadIoThreads'] ?? null;
        $this->innodbRollbackOnTimeout = $values['innodbRollbackOnTimeout'] ?? null;
        $this->innodbThreadConcurrency = $values['innodbThreadConcurrency'] ?? null;
        $this->innodbWriteIoThreads = $values['innodbWriteIoThreads'] ?? null;
        $this->interactiveTimeout = $values['interactiveTimeout'] ?? null;
        $this->internalTmpMemStorageEngine = $values['internalTmpMemStorageEngine'] ?? null;
        $this->ipFilter = $values['ipFilter'] ?? null;
        $this->logOutput = $values['logOutput'] ?? null;
        $this->longQueryTime = $values['longQueryTime'] ?? null;
        $this->lowerCaseTableNames = $values['lowerCaseTableNames'] ?? null;
        $this->maxAllowedPacket = $values['maxAllowedPacket'] ?? null;
        $this->maxConnections = $values['maxConnections'] ?? null;
        $this->maxExecutionTime = $values['maxExecutionTime'] ?? null;
        $this->maxHeapTableSize = $values['maxHeapTableSize'] ?? null;
        $this->maxSeeksForKey = $values['maxSeeksForKey'] ?? null;
        $this->maxUserConnections = $values['maxUserConnections'] ?? null;
        $this->migration = $values['migration'] ?? null;
        $this->mysqlIncrementalBackup = $values['mysqlIncrementalBackup'] ?? null;
        $this->netBufferLength = $values['netBufferLength'] ?? null;
        $this->netReadTimeout = $values['netReadTimeout'] ?? null;
        $this->netWriteTimeout = $values['netWriteTimeout'] ?? null;
        $this->optimizerPruneLevel = $values['optimizerPruneLevel'] ?? null;
        $this->optimizerSearchDepth = $values['optimizerSearchDepth'] ?? null;
        $this->optimizerSwitch = $values['optimizerSwitch'] ?? null;
        $this->performanceSchemaEventsStatementsHistorySize = $values['performanceSchemaEventsStatementsHistorySize'] ?? null;
        $this->publicAccess = $values['publicAccess'] ?? null;
        $this->publicAccessPrometheus = $values['publicAccessPrometheus'] ?? null;
        $this->relayLogSpaceLimit = $values['relayLogSpaceLimit'] ?? null;
        $this->serviceLog = $values['serviceLog'] ?? null;
        $this->slowQueryLog = $values['slowQueryLog'] ?? null;
        $this->sortBufferSize = $values['sortBufferSize'] ?? null;
        $this->sqlMode = $values['sqlMode'] ?? null;
        $this->sqlRequirePrimaryKey = $values['sqlRequirePrimaryKey'] ?? null;
        $this->tmpTableSize = $values['tmpTableSize'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->waitTimeout = $values['waitTimeout'] ?? null;
        $this->windowingUseHighPrecision = $values['windowingUseHighPrecision'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

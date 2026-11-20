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
     * @var ?int $binlogRetentionPeriod By default, the longest retention you can set is 86400 seconds (24 hours). To keep binary logs for longer, up to 1814400 seconds (21 days), contact UpCloud support. If the service has enough disk space for the additional binary logs, UpCloud raises the limit for the whole project. Warning: reducing this value can make a large batch of binary logs eligible for purge at once. Depending on the volume, this can sometimes stall the MySQL commit path and block writes until the purge completes. To stay on the safe side, prefer lowering the value gradually in small decrements during a low-traffic window rather than dropping it drastically in one step.
     */
    #[JsonProperty('binlog_retention_period')]
    public ?int $binlogRetentionPeriod;

    /**
     * @var ?value-of<DatabaseServicePropertiesMysqlCollationServer> $collationServer The default collation for databases created without one, which their new tables then inherit. Only collations of the utf8mb4 character set are accepted. Databases UpCloud creates, defaultdb and those added through the API or Console, keep utf8mb4_0900_ai_ci. Changing it leaves existing databases as they are. A change applies to new connections at once. After the next server restart, for example at maintenance, an upgrade, a plan change or a node replacement, sessions reset with COM_RESET_CONNECTION also compare strings with this collation, which a change without a restart does not do. Every 0900 collation except utf8mb4_0900_ai_ci has an id above 255, so after that restart MySQL announces a wrong character set to connecting clients. Clients that take their character set from the server, such as PHP mysqli and PDO without a charset option and MySQL Connector/NET (MySql.Data) without CharSet, must then set utf8mb4 themselves. Default is utf8mb4_0900_ai_ci.
     */
    #[JsonProperty('collation_server')]
    public ?string $collationServer;

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
     * @var ?value-of<DatabaseServicePropertiesMysqlEventScheduler> $eventScheduler Whether the event scheduler runs the events created with CREATE EVENT. Set OFF to stop every event on the service without dropping it, and ON to start them again. A change applies at once, without a restart. Events take effect only on the primary node. After a failover, they are re-enabled on the new primary. Default is ON.
     */
    #[JsonProperty('event_scheduler')]
    public ?string $eventScheduler;

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
     * @var ?int $innodbFtCacheSize The size in bytes of the InnoDB FULLTEXT index cache for each table. Pending index updates are flushed to disk when the cache reaches this limit. innodb_ft_total_cache_size controls the combined cache limit for all tables. Default is 8000000. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_ft_cache_size')]
    public ?int $innodbFtCacheSize;

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
     * @var ?int $innodbFtSortPllDegree The number of parallel threads used to tokenize and index text when building an InnoDB FULLTEXT index. Default is 2. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_ft_sort_pll_degree')]
    public ?int $innodbFtSortPllDegree;

    /**
     * @var ?int $innodbFtTotalCacheSize The combined memory limit in bytes for InnoDB FULLTEXT index caches across all tables. When an index operation reaches this limit, InnoDB forces cached index updates to disk to reduce memory usage. Values above 5% of plan RAM are rejected. Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_ft_total_cache_size')]
    public ?int $innodbFtTotalCacheSize;

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
     * @var ?float $innodbMaxDirtyPagesPct Percentage of dirty pages in the InnoDB buffer pool at which InnoDB starts flushing aggressively. Lowering it spreads write I/O more evenly and shortens crash recovery, at the cost of flushing pages that might have been modified again. Must stay at or above innodb_max_dirty_pages_pct_lwm. Default is 90.
     */
    #[JsonProperty('innodb_max_dirty_pages_pct')]
    public ?float $innodbMaxDirtyPagesPct;

    /**
     * @var ?float $innodbMaxDirtyPagesPctLwm Percentage of dirty pages in the InnoDB buffer pool at which InnoDB starts pre-flushing, to keep the dirty page ratio from reaching innodb_max_dirty_pages_pct. 0 turns pre-flushing off. Cannot be set above innodb_max_dirty_pages_pct. Default is 10.
     */
    #[JsonProperty('innodb_max_dirty_pages_pct_lwm')]
    public ?float $innodbMaxDirtyPagesPctLwm;

    /**
     * @var ?int $innodbMaxPurgeLag Number of outstanding transactions the InnoDB purge operation may fall behind by before INSERT, UPDATE and DELETE are delayed to let it catch up. The delay applies per row and grows with the lag, and it is capped by innodb_max_purge_lag_delay, which has to be set as well for this option to have any effect. Default is 0, which never delays anything.
     */
    #[JsonProperty('innodb_max_purge_lag')]
    public ?int $innodbMaxPurgeLag;

    /**
     * @var ?int $innodbMaxPurgeLagDelay Cap in microseconds on the per-row delay innodb_max_purge_lag applies to INSERT, UPDATE and DELETE. MySQL clamps the delay to this value unconditionally, so while this is 0 no delay is ever applied and innodb_max_purge_lag on its own does nothing. Both options must be non-zero for either to take effect. Default is 0.
     */
    #[JsonProperty('innodb_max_purge_lag_delay')]
    public ?int $innodbMaxPurgeLagDelay;

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
     * @var ?int $innodbSortBufferSize The size in bytes of the sort buffer used when creating InnoDB indexes. Also controls the read and write buffer sizes for the temporary log used during online DDL operations. Default is 1048576 (1 MiB). Changing this parameter will lead to a restart of the MySQL service.
     */
    #[JsonProperty('innodb_sort_buffer_size')]
    public ?int $innodbSortBufferSize;

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
     * @var ?float $longQueryTime The slow_query_logs work as SQL statements that take more than long_query_time seconds to execute. Requests to set this below 0.05 seconds are rejected. Lower values log almost every statement, which can fill the disk, and AI Insights ignores queries under 50 ms.
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
     * @var ?int $schemaDefinitionCache The number of schema definition objects the data dictionary object cache can hold. Raise it above the number of schemas on the service to keep their definitions in memory. Each cached definition uses a small amount of memory, and the cache never holds more than the service's own schemas, so a high value costs nothing extra on a service with few schemas. Default is 256.
     */
    #[JsonProperty('schema_definition_cache')]
    public ?int $schemaDefinitionCache;

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
     * @var ?int $tablespaceDefinitionCache The number of tablespace definition objects the data dictionary object cache can hold. Each InnoDB table stored in its own file is a separate tablespace, so raise it above the number of tables on the service to keep their tablespace definitions in memory. Each cached definition uses a small amount of memory, and the cache never holds more than the service's own tables, so a high value costs nothing extra on a service with few tables. Default is 256.
     */
    #[JsonProperty('tablespace_definition_cache')]
    public ?int $tablespaceDefinitionCache;

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
     *   collationServer?: ?value-of<DatabaseServicePropertiesMysqlCollationServer>,
     *   connectTimeout?: ?int,
     *   defaultTimeZone?: ?string,
     *   divPrecisionIncrement?: ?int,
     *   endMarkersInJson?: ?bool,
     *   eqRangeIndexDiveLimit?: ?int,
     *   eventScheduler?: ?value-of<DatabaseServicePropertiesMysqlEventScheduler>,
     *   groupConcatMaxLen?: ?int,
     *   informationSchemaStatsExpiry?: ?int,
     *   innodbAdaptiveHashIndex?: ?bool,
     *   innodbChangeBufferMaxSize?: ?int,
     *   innodbFlushNeighbors?: ?int,
     *   innodbFtCacheSize?: ?int,
     *   innodbFtEnableStopword?: ?bool,
     *   innodbFtMaxTokenSize?: ?int,
     *   innodbFtMinTokenSize?: ?int,
     *   innodbFtNumWordOptimize?: ?int,
     *   innodbFtResultCacheLimit?: ?int,
     *   innodbFtServerStopwordTable?: ?string,
     *   innodbFtSortPllDegree?: ?int,
     *   innodbFtTotalCacheSize?: ?int,
     *   innodbFtUserStopwordTable?: ?string,
     *   innodbIoCapacity?: ?int,
     *   innodbIoCapacityMax?: ?int,
     *   innodbLockWaitTimeout?: ?int,
     *   innodbLogBufferSize?: ?int,
     *   innodbMaxDirtyPagesPct?: ?float,
     *   innodbMaxDirtyPagesPctLwm?: ?float,
     *   innodbMaxPurgeLag?: ?int,
     *   innodbMaxPurgeLagDelay?: ?int,
     *   innodbOnlineAlterLogMaxSize?: ?int,
     *   innodbOptimizeFulltextOnly?: ?bool,
     *   innodbPrintAllDeadlocks?: ?bool,
     *   innodbReadIoThreads?: ?int,
     *   innodbRollbackOnTimeout?: ?bool,
     *   innodbSortBufferSize?: ?int,
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
     *   schemaDefinitionCache?: ?int,
     *   serviceLog?: ?bool,
     *   slowQueryLog?: ?bool,
     *   sortBufferSize?: ?int,
     *   sqlMode?: ?string,
     *   sqlRequirePrimaryKey?: ?bool,
     *   tablespaceDefinitionCache?: ?int,
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
        $this->collationServer = $values['collationServer'] ?? null;
        $this->connectTimeout = $values['connectTimeout'] ?? null;
        $this->defaultTimeZone = $values['defaultTimeZone'] ?? null;
        $this->divPrecisionIncrement = $values['divPrecisionIncrement'] ?? null;
        $this->endMarkersInJson = $values['endMarkersInJson'] ?? null;
        $this->eqRangeIndexDiveLimit = $values['eqRangeIndexDiveLimit'] ?? null;
        $this->eventScheduler = $values['eventScheduler'] ?? null;
        $this->groupConcatMaxLen = $values['groupConcatMaxLen'] ?? null;
        $this->informationSchemaStatsExpiry = $values['informationSchemaStatsExpiry'] ?? null;
        $this->innodbAdaptiveHashIndex = $values['innodbAdaptiveHashIndex'] ?? null;
        $this->innodbChangeBufferMaxSize = $values['innodbChangeBufferMaxSize'] ?? null;
        $this->innodbFlushNeighbors = $values['innodbFlushNeighbors'] ?? null;
        $this->innodbFtCacheSize = $values['innodbFtCacheSize'] ?? null;
        $this->innodbFtEnableStopword = $values['innodbFtEnableStopword'] ?? null;
        $this->innodbFtMaxTokenSize = $values['innodbFtMaxTokenSize'] ?? null;
        $this->innodbFtMinTokenSize = $values['innodbFtMinTokenSize'] ?? null;
        $this->innodbFtNumWordOptimize = $values['innodbFtNumWordOptimize'] ?? null;
        $this->innodbFtResultCacheLimit = $values['innodbFtResultCacheLimit'] ?? null;
        $this->innodbFtServerStopwordTable = $values['innodbFtServerStopwordTable'] ?? null;
        $this->innodbFtSortPllDegree = $values['innodbFtSortPllDegree'] ?? null;
        $this->innodbFtTotalCacheSize = $values['innodbFtTotalCacheSize'] ?? null;
        $this->innodbFtUserStopwordTable = $values['innodbFtUserStopwordTable'] ?? null;
        $this->innodbIoCapacity = $values['innodbIoCapacity'] ?? null;
        $this->innodbIoCapacityMax = $values['innodbIoCapacityMax'] ?? null;
        $this->innodbLockWaitTimeout = $values['innodbLockWaitTimeout'] ?? null;
        $this->innodbLogBufferSize = $values['innodbLogBufferSize'] ?? null;
        $this->innodbMaxDirtyPagesPct = $values['innodbMaxDirtyPagesPct'] ?? null;
        $this->innodbMaxDirtyPagesPctLwm = $values['innodbMaxDirtyPagesPctLwm'] ?? null;
        $this->innodbMaxPurgeLag = $values['innodbMaxPurgeLag'] ?? null;
        $this->innodbMaxPurgeLagDelay = $values['innodbMaxPurgeLagDelay'] ?? null;
        $this->innodbOnlineAlterLogMaxSize = $values['innodbOnlineAlterLogMaxSize'] ?? null;
        $this->innodbOptimizeFulltextOnly = $values['innodbOptimizeFulltextOnly'] ?? null;
        $this->innodbPrintAllDeadlocks = $values['innodbPrintAllDeadlocks'] ?? null;
        $this->innodbReadIoThreads = $values['innodbReadIoThreads'] ?? null;
        $this->innodbRollbackOnTimeout = $values['innodbRollbackOnTimeout'] ?? null;
        $this->innodbSortBufferSize = $values['innodbSortBufferSize'] ?? null;
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
        $this->schemaDefinitionCache = $values['schemaDefinitionCache'] ?? null;
        $this->serviceLog = $values['serviceLog'] ?? null;
        $this->slowQueryLog = $values['slowQueryLog'] ?? null;
        $this->sortBufferSize = $values['sortBufferSize'] ?? null;
        $this->sqlMode = $values['sqlMode'] ?? null;
        $this->sqlRequirePrimaryKey = $values['sqlRequirePrimaryKey'] ?? null;
        $this->tablespaceDefinitionCache = $values['tablespaceDefinitionCache'] ?? null;
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

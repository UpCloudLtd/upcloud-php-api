<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;
use Upcloud\Core\Types\ArrayType;

/**
 * opensearch properties
 */
class DatabaseServicePropertiesOpensearch extends JsonSerializableType
{
    /**
     * @var ?bool $actionAutoCreateIndexEnabled Explicitly allow or block automatic creation of indices. Defaults to true
     */
    #[JsonProperty('action_auto_create_index_enabled')]
    public ?bool $actionAutoCreateIndexEnabled;

    /**
     * @var ?bool $actionDestructiveRequiresName
     */
    #[JsonProperty('action_destructive_requires_name')]
    public ?bool $actionDestructiveRequiresName;

    /**
     * @var ?DatabaseServicePropertiesOpensearchAuthFailureListeners $authFailureListeners
     */
    #[JsonProperty('auth_failure_listeners')]
    public ?DatabaseServicePropertiesOpensearchAuthFailureListeners $authFailureListeners;

    /**
     * @var ?bool $automaticUtilityNetworkIpFilter Automatically allow connections from servers in the utility network within the same zone
     */
    #[JsonProperty('automatic_utility_network_ip_filter')]
    public ?bool $automaticUtilityNetworkIpFilter;

    /**
     * @var (
     *    int
     *   |float
     * )|null $clusterFilecacheRemoteDataRatio Defines a limit of how much total remote data can be referenced as a ratio of the size of the disk reserved for the file cache. This is designed to be a safeguard to prevent oversubscribing a cluster. Defaults to 0.
     */
    #[JsonProperty('cluster_filecache_remote_data_ratio'), Union('integer', 'float', 'null')]
    public int|float|null $clusterFilecacheRemoteDataRatio;

    /**
     * @var ?int $clusterMaxShardsPerNode Controls the number of shards allowed in the cluster per data node
     */
    #[JsonProperty('cluster_max_shards_per_node')]
    public ?int $clusterMaxShardsPerNode;

    /**
     * @var ?DatabaseServicePropertiesOpensearchClusterRemoteStore $clusterRemoteStore
     */
    #[JsonProperty('cluster_remote_store')]
    public ?DatabaseServicePropertiesOpensearchClusterRemoteStore $clusterRemoteStore;

    /**
     * @var ?bool $clusterRoutingAllocationBalancePreferPrimary When set to true, OpenSearch attempts to evenly distribute the primary shards between the cluster nodes. Enabling this setting does not always guarantee an equal number of primary shards on each node, especially in the event of a failover. Changing this setting to false after it was set to true does not invoke redistribution of primary shards. Default is false.
     */
    #[JsonProperty('cluster_routing_allocation_balance_prefer_primary')]
    public ?bool $clusterRoutingAllocationBalancePreferPrimary;

    /**
     * @var ?int $clusterRoutingAllocationNodeConcurrentRecoveries How many concurrent incoming/outgoing shard recoveries (normally replicas) are allowed to happen on a node. Defaults to node cpu count * 2.
     */
    #[JsonProperty('cluster_routing_allocation_node_concurrent_recoveries')]
    public ?int $clusterRoutingAllocationNodeConcurrentRecoveries;

    /**
     * @var ?DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlog $clusterSearchRequestSlowlog
     */
    #[JsonProperty('cluster_search_request_slowlog')]
    public ?DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlog $clusterSearchRequestSlowlog;

    /**
     * @var ?string $customDomain Serve the web frontend using a custom CNAME pointing to the UpCloud DNS name. When you set a custom domain for a service deployed in a VPC, the service certificate is only created for the public-* hostname and the custom domain.
     */
    #[JsonProperty('custom_domain')]
    public ?string $customDomain;

    /**
     * @var ?array<DatabaseServicePropertiesOpensearchCustomKeystoresItem> $customKeystores Allow to register custom keystores in OpenSearch
     */
    #[JsonProperty('custom_keystores'), ArrayType([DatabaseServicePropertiesOpensearchCustomKeystoresItem::class])]
    public ?array $customKeystores;

    /**
     * @var ?array<DatabaseServicePropertiesOpensearchCustomReposItem> $customRepos Allow to register object storage repositories in OpenSearch
     */
    #[JsonProperty('custom_repos'), ArrayType([DatabaseServicePropertiesOpensearchCustomReposItem::class])]
    public ?array $customRepos;

    /**
     * @var ?DatabaseServicePropertiesOpensearchDiskWatermarks $diskWatermarks
     */
    #[JsonProperty('disk_watermarks')]
    public ?DatabaseServicePropertiesOpensearchDiskWatermarks $diskWatermarks;

    /**
     * @var ?value-of<DatabaseServicePropertiesOpensearchElasticsearchVersion> $elasticsearchVersion
     */
    #[JsonProperty('elasticsearch_version')]
    public ?string $elasticsearchVersion;

    /**
     * @var ?string $emailSenderName This should be identical to the Sender name defined in Opensearch dashboards
     */
    #[JsonProperty('email_sender_name')]
    public ?string $emailSenderName;

    /**
     * @var ?string $emailSenderPassword Sender password for Opensearch alerts to authenticate with SMTP server
     */
    #[JsonProperty('email_sender_password')]
    public ?string $emailSenderPassword;

    /**
     * @var ?string $emailSenderUsername
     */
    #[JsonProperty('email_sender_username')]
    public ?string $emailSenderUsername;

    /**
     * @var ?bool $enableRemoteBackedStorage
     */
    #[JsonProperty('enable_remote_backed_storage')]
    public ?bool $enableRemoteBackedStorage;

    /**
     * @var ?bool $enableSearchableSnapshots
     */
    #[JsonProperty('enable_searchable_snapshots')]
    public ?bool $enableSearchableSnapshots;

    /**
     * @var ?bool $enableSecurityAudit
     */
    #[JsonProperty('enable_security_audit')]
    public ?bool $enableSecurityAudit;

    /**
     * @var ?bool $enableSnapshotApi Enable/Disable snapshot API for custom repositories, this requires security management to be enabled
     */
    #[JsonProperty('enable_snapshot_api')]
    public ?bool $enableSnapshotApi;

    /**
     * @var ?int $httpMaxContentLength Maximum content length for HTTP requests to the OpenSearch HTTP API, in bytes.
     */
    #[JsonProperty('http_max_content_length')]
    public ?int $httpMaxContentLength;

    /**
     * @var ?int $httpMaxHeaderSize The max size of allowed headers, in bytes
     */
    #[JsonProperty('http_max_header_size')]
    public ?int $httpMaxHeaderSize;

    /**
     * @var ?int $httpMaxInitialLineLength The max length of an HTTP URL, in bytes
     */
    #[JsonProperty('http_max_initial_line_length')]
    public ?int $httpMaxInitialLineLength;

    /**
     * @var ?array<DatabaseServicePropertiesOpensearchIndexPatternsItem> $indexPatterns
     */
    #[JsonProperty('index_patterns'), ArrayType([DatabaseServicePropertiesOpensearchIndexPatternsItem::class])]
    public ?array $indexPatterns;

    /**
     * @var ?DatabaseServicePropertiesOpensearchIndexRollup $indexRollup
     */
    #[JsonProperty('index_rollup')]
    public ?DatabaseServicePropertiesOpensearchIndexRollup $indexRollup;

    /**
     * @var ?DatabaseServicePropertiesOpensearchIndexTemplate $indexTemplate
     */
    #[JsonProperty('index_template')]
    public ?DatabaseServicePropertiesOpensearchIndexTemplate $indexTemplate;

    /**
     * @var ?int $indicesFielddataCacheSize Relative amount. Maximum amount of heap memory used for field data cache. This is an expert setting; decreasing the value too much will increase overhead of loading field data; too much memory used for field data cache will decrease amount of heap available for other operations.
     */
    #[JsonProperty('indices_fielddata_cache_size')]
    public ?int $indicesFielddataCacheSize;

    /**
     * @var ?int $indicesMemoryIndexBufferSize Percentage value. Default is 10%. Total amount of heap used for indexing buffer, before writing segments to disk. This is an expert setting. Too low value will slow down indexing; too high value will increase indexing performance but causes performance issues for query performance.
     */
    #[JsonProperty('indices_memory_index_buffer_size')]
    public ?int $indicesMemoryIndexBufferSize;

    /**
     * @var ?int $indicesMemoryMaxIndexBufferSize Absolute value. Default is unbound. Doesn't work without indices.memory.index_buffer_size. Maximum amount of heap used for query cache, an absolute indices.memory.index_buffer_size maximum hard limit.
     */
    #[JsonProperty('indices_memory_max_index_buffer_size')]
    public ?int $indicesMemoryMaxIndexBufferSize;

    /**
     * @var ?int $indicesMemoryMinIndexBufferSize Absolute value. Default is 48mb. Doesn't work without indices.memory.index_buffer_size. Minimum amount of heap used for query cache, an absolute indices.memory.index_buffer_size minimal hard limit.
     */
    #[JsonProperty('indices_memory_min_index_buffer_size')]
    public ?int $indicesMemoryMinIndexBufferSize;

    /**
     * @var ?int $indicesQueriesCacheSize Percentage value. Default is 10%. Maximum amount of heap used for query cache. This is an expert setting. Too low value will decrease query performance and increase performance for other operations; too high value will cause issues with other OpenSearch functionality.
     */
    #[JsonProperty('indices_queries_cache_size')]
    public ?int $indicesQueriesCacheSize;

    /**
     * @var ?int $indicesQueryBoolMaxClauseCount Maximum number of clauses Lucene BooleanQuery can have. The default value (1024) is relatively high, and increasing it may cause performance issues. Investigate other approaches first before increasing this value.
     */
    #[JsonProperty('indices_query_bool_max_clause_count')]
    public ?int $indicesQueryBoolMaxClauseCount;

    /**
     * @var ?int $indicesRecoveryMaxBytesPerSec Limits total inbound and outbound recovery traffic for each node. Applies to both peer recoveries as well as snapshot recoveries (i.e., restores from a snapshot). Defaults to 40mb
     */
    #[JsonProperty('indices_recovery_max_bytes_per_sec')]
    public ?int $indicesRecoveryMaxBytesPerSec;

    /**
     * @var ?int $indicesRecoveryMaxConcurrentFileChunks Number of file chunks sent in parallel for each recovery. Defaults to 2.
     */
    #[JsonProperty('indices_recovery_max_concurrent_file_chunks')]
    public ?int $indicesRecoveryMaxConcurrentFileChunks;

    /**
     * @var ?array<string> $ipFilter Allow incoming connections from CIDR address block, e.g. '10.20.0.0/16'
     */
    #[JsonProperty('ip_filter'), ArrayType(['string'])]
    public ?array $ipFilter;

    /**
     * @var ?bool $ismEnabled
     */
    #[JsonProperty('ism_enabled')]
    public ?bool $ismEnabled;

    /**
     * @var ?bool $ismHistoryEnabled
     */
    #[JsonProperty('ism_history_enabled')]
    public ?bool $ismHistoryEnabled;

    /**
     * @var ?int $ismHistoryMaxAge
     */
    #[JsonProperty('ism_history_max_age')]
    public ?int $ismHistoryMaxAge;

    /**
     * @var ?int $ismHistoryMaxDocs
     */
    #[JsonProperty('ism_history_max_docs')]
    public ?int $ismHistoryMaxDocs;

    /**
     * @var ?int $ismHistoryRolloverCheckPeriod
     */
    #[JsonProperty('ism_history_rollover_check_period')]
    public ?int $ismHistoryRolloverCheckPeriod;

    /**
     * @var ?int $ismHistoryRolloverRetentionPeriod
     */
    #[JsonProperty('ism_history_rollover_retention_period')]
    public ?int $ismHistoryRolloverRetentionPeriod;

    /**
     * @var ?DatabaseServicePropertiesOpensearchJwt $jwt
     */
    #[JsonProperty('jwt')]
    public ?DatabaseServicePropertiesOpensearchJwt $jwt;

    /**
     * @var ?bool $keepIndexRefreshInterval UpCloud automation resets index.refresh_interval to default value for every index to be sure that indices are always visible to search. If it doesn't fit your case, you can disable this by setting up this flag to true.
     */
    #[JsonProperty('keep_index_refresh_interval')]
    public ?bool $keepIndexRefreshInterval;

    /**
     * @var ?bool $knnMemoryCircuitBreakerEnabled Enable or disable KNN memory circuit breaker. Defaults to true.
     */
    #[JsonProperty('knn_memory_circuit_breaker_enabled')]
    public ?bool $knnMemoryCircuitBreakerEnabled;

    /**
     * @var ?int $knnMemoryCircuitBreakerLimit Maximum amount of memory in percentage that can be used for the KNN index. Defaults to 50% of the JVM heap size. 0 is used to set it to null which can be used to invalidate caches.
     */
    #[JsonProperty('knn_memory_circuit_breaker_limit')]
    public ?int $knnMemoryCircuitBreakerLimit;

    /**
     * @var ?bool $mlCommonsConnectorAccessControlEnabled When set to true, the setting allows admins to control access and permissions to the connector API using backend_roles. Defaults to false.
     */
    #[JsonProperty('ml_commons_connector_access_control_enabled')]
    public ?bool $mlCommonsConnectorAccessControlEnabled;

    /**
     * @var ?bool $mlCommonsModelAccessControlEnabled Enable or disable model access control for ML Commons. When enabled, access to ML models is controlled by security permissions. Defaults to false.
     */
    #[JsonProperty('ml_commons_model_access_control_enabled')]
    public ?bool $mlCommonsModelAccessControlEnabled;

    /**
     * @var ?int $mlCommonsNativeMemoryThreshold Native memory threshold percentage for ML Commons. Controls the maximum percentage of native memory that can be used by ML Commons operations. Defaults to 90%.
     */
    #[JsonProperty('ml_commons_native_memory_threshold')]
    public ?int $mlCommonsNativeMemoryThreshold;

    /**
     * @var ?bool $mlCommonsOnlyRunOnMlNode Enable or disable running ML Commons tasks only on ML nodes. When enabled, ML tasks will only execute on nodes designated as ML nodes. Defaults to true.
     */
    #[JsonProperty('ml_commons_only_run_on_ml_node')]
    public ?bool $mlCommonsOnlyRunOnMlNode;

    /**
     * @var ?array<string> $mlCommonsTrustedConnectorEndpointsRegex Adds the trusted endpoints to the cluster settings. Supports Java regex expressions.
     */
    #[JsonProperty('ml_commons_trusted_connector_endpoints_regex'), ArrayType(['string'])]
    public ?array $mlCommonsTrustedConnectorEndpointsRegex;

    /**
     * @var ?string $nodeSearchCacheSize Defines a limit of how much total remote data can be referenced as a ratio of the size of the disk reserved for the file cache. This is designed to be a safeguard to prevent oversubscribing a cluster. Defaults to 5gb. Requires restarting all OpenSearch nodes.
     */
    #[JsonProperty('node_search_cache_size')]
    public ?string $nodeSearchCacheSize;

    /**
     * @var ?DatabaseServicePropertiesOpensearchOpenid $openid
     */
    #[JsonProperty('openid')]
    public ?DatabaseServicePropertiesOpensearchOpenid $openid;

    /**
     * @var ?DatabaseServicePropertiesOpensearchOpensearchDashboards $opensearchDashboards
     */
    #[JsonProperty('opensearch_dashboards')]
    public ?DatabaseServicePropertiesOpensearchOpensearchDashboards $opensearchDashboards;

    /**
     * @var ?bool $overrideMainResponseVersion Compatibility mode sets OpenSearch to report its version as 7.10 so clients continue to work. Default is false. Deprecated and ignored for service version 3.3 and higher.
     */
    #[JsonProperty('override_main_response_version')]
    public ?bool $overrideMainResponseVersion;

    /**
     * @var ?bool $pluginsAlertingFilterByBackendRoles Enable or disable filtering of alerting by backend roles. Requires Security plugin. Defaults to false
     */
    #[JsonProperty('plugins_alerting_filter_by_backend_roles')]
    public ?bool $pluginsAlertingFilterByBackendRoles;

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
     * @var ?array<?string> $reindexRemoteWhitelist Whitelisted addresses for reindexing. Changing this value will cause all OpenSearch instances to restart.
     */
    #[JsonProperty('reindex_remote_whitelist'), ArrayType([new Union('string', 'null')])]
    public ?array $reindexRemoteWhitelist;

    /**
     * @var ?DatabaseServicePropertiesOpensearchRemoteStore $remoteStore
     */
    #[JsonProperty('remote_store')]
    public ?DatabaseServicePropertiesOpensearchRemoteStore $remoteStore;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSaml $saml
     */
    #[JsonProperty('saml')]
    public ?DatabaseServicePropertiesOpensearchSaml $saml;

    /**
     * @var ?string $scriptMaxCompilationsRate Script compilation circuit breaker limits the number of inline script compilations within a period of time. Default is use-context
     */
    #[JsonProperty('script_max_compilations_rate')]
    public ?string $scriptMaxCompilationsRate;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSearchBackpressure $searchBackpressure
     */
    #[JsonProperty('search_backpressure')]
    public ?DatabaseServicePropertiesOpensearchSearchBackpressure $searchBackpressure;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueries $searchInsightsTopQueries
     */
    #[JsonProperty('search_insights_top_queries')]
    public ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueries $searchInsightsTopQueries;

    /**
     * @var ?int $searchMaxBuckets Maximum number of aggregation buckets allowed in a single response. OpenSearch default value is used when this is not defined.
     */
    #[JsonProperty('search_max_buckets')]
    public ?int $searchMaxBuckets;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSegrep $segrep
     */
    #[JsonProperty('segrep')]
    public ?DatabaseServicePropertiesOpensearchSegrep $segrep;

    /**
     * @var ?bool $serviceLog Store logs for the service so that they are available in the HTTP API and console.
     */
    #[JsonProperty('service_log')]
    public ?bool $serviceLog;

    /**
     * @var ?DatabaseServicePropertiesOpensearchShardIndexingPressure $shardIndexingPressure
     */
    #[JsonProperty('shard_indexing_pressure')]
    public ?DatabaseServicePropertiesOpensearchShardIndexingPressure $shardIndexingPressure;

    /**
     * @var ?int $threadPoolAnalyzeQueueSize Size for the thread pool queue. See documentation for exact details.
     */
    #[JsonProperty('thread_pool_analyze_queue_size')]
    public ?int $threadPoolAnalyzeQueueSize;

    /**
     * @var ?int $threadPoolAnalyzeSize Size for the thread pool. See documentation for exact details. Do note this may have maximum value depending on CPU count - value is automatically lowered if set to higher than maximum value.
     */
    #[JsonProperty('thread_pool_analyze_size')]
    public ?int $threadPoolAnalyzeSize;

    /**
     * @var ?int $threadPoolForceMergeSize Size for the thread pool. See documentation for exact details. Do note this may have maximum value depending on CPU count - value is automatically lowered if set to higher than maximum value.
     */
    #[JsonProperty('thread_pool_force_merge_size')]
    public ?int $threadPoolForceMergeSize;

    /**
     * @var ?int $threadPoolGetQueueSize Size for the thread pool queue. See documentation for exact details.
     */
    #[JsonProperty('thread_pool_get_queue_size')]
    public ?int $threadPoolGetQueueSize;

    /**
     * @var ?int $threadPoolGetSize Size for the thread pool. See documentation for exact details. Do note this may have maximum value depending on CPU count - value is automatically lowered if set to higher than maximum value.
     */
    #[JsonProperty('thread_pool_get_size')]
    public ?int $threadPoolGetSize;

    /**
     * @var ?int $threadPoolSearchQueueSize Size for the thread pool queue. See documentation for exact details.
     */
    #[JsonProperty('thread_pool_search_queue_size')]
    public ?int $threadPoolSearchQueueSize;

    /**
     * @var ?int $threadPoolSearchSize Size for the thread pool. See documentation for exact details. Do note this may have maximum value depending on CPU count - value is automatically lowered if set to higher than maximum value.
     */
    #[JsonProperty('thread_pool_search_size')]
    public ?int $threadPoolSearchSize;

    /**
     * @var ?int $threadPoolSearchThrottledQueueSize Size for the thread pool queue. See documentation for exact details.
     */
    #[JsonProperty('thread_pool_search_throttled_queue_size')]
    public ?int $threadPoolSearchThrottledQueueSize;

    /**
     * @var ?int $threadPoolSearchThrottledSize Size for the thread pool. See documentation for exact details. Do note this may have maximum value depending on CPU count - value is automatically lowered if set to higher than maximum value.
     */
    #[JsonProperty('thread_pool_search_throttled_size')]
    public ?int $threadPoolSearchThrottledSize;

    /**
     * @var ?int $threadPoolWriteQueueSize Size for the thread pool queue. See documentation for exact details.
     */
    #[JsonProperty('thread_pool_write_queue_size')]
    public ?int $threadPoolWriteQueueSize;

    /**
     * @var ?int $threadPoolWriteSize Size for the thread pool. See documentation for exact details. Do note this may have maximum value depending on CPU count - value is automatically lowered if set to higher than maximum value.
     */
    #[JsonProperty('thread_pool_write_size')]
    public ?int $threadPoolWriteSize;

    /**
     * @var ?value-of<DatabaseServicePropertiesOpensearchVersion> $version
     */
    #[JsonProperty('version')]
    public ?string $version;

    /**
     * @param array{
     *   actionAutoCreateIndexEnabled?: ?bool,
     *   actionDestructiveRequiresName?: ?bool,
     *   authFailureListeners?: ?DatabaseServicePropertiesOpensearchAuthFailureListeners,
     *   automaticUtilityNetworkIpFilter?: ?bool,
     *   clusterFilecacheRemoteDataRatio?: (
     *    int
     *   |float
     * )|null,
     *   clusterMaxShardsPerNode?: ?int,
     *   clusterRemoteStore?: ?DatabaseServicePropertiesOpensearchClusterRemoteStore,
     *   clusterRoutingAllocationBalancePreferPrimary?: ?bool,
     *   clusterRoutingAllocationNodeConcurrentRecoveries?: ?int,
     *   clusterSearchRequestSlowlog?: ?DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlog,
     *   customDomain?: ?string,
     *   customKeystores?: ?array<DatabaseServicePropertiesOpensearchCustomKeystoresItem>,
     *   customRepos?: ?array<DatabaseServicePropertiesOpensearchCustomReposItem>,
     *   diskWatermarks?: ?DatabaseServicePropertiesOpensearchDiskWatermarks,
     *   elasticsearchVersion?: ?value-of<DatabaseServicePropertiesOpensearchElasticsearchVersion>,
     *   emailSenderName?: ?string,
     *   emailSenderPassword?: ?string,
     *   emailSenderUsername?: ?string,
     *   enableRemoteBackedStorage?: ?bool,
     *   enableSearchableSnapshots?: ?bool,
     *   enableSecurityAudit?: ?bool,
     *   enableSnapshotApi?: ?bool,
     *   httpMaxContentLength?: ?int,
     *   httpMaxHeaderSize?: ?int,
     *   httpMaxInitialLineLength?: ?int,
     *   indexPatterns?: ?array<DatabaseServicePropertiesOpensearchIndexPatternsItem>,
     *   indexRollup?: ?DatabaseServicePropertiesOpensearchIndexRollup,
     *   indexTemplate?: ?DatabaseServicePropertiesOpensearchIndexTemplate,
     *   indicesFielddataCacheSize?: ?int,
     *   indicesMemoryIndexBufferSize?: ?int,
     *   indicesMemoryMaxIndexBufferSize?: ?int,
     *   indicesMemoryMinIndexBufferSize?: ?int,
     *   indicesQueriesCacheSize?: ?int,
     *   indicesQueryBoolMaxClauseCount?: ?int,
     *   indicesRecoveryMaxBytesPerSec?: ?int,
     *   indicesRecoveryMaxConcurrentFileChunks?: ?int,
     *   ipFilter?: ?array<string>,
     *   ismEnabled?: ?bool,
     *   ismHistoryEnabled?: ?bool,
     *   ismHistoryMaxAge?: ?int,
     *   ismHistoryMaxDocs?: ?int,
     *   ismHistoryRolloverCheckPeriod?: ?int,
     *   ismHistoryRolloverRetentionPeriod?: ?int,
     *   jwt?: ?DatabaseServicePropertiesOpensearchJwt,
     *   keepIndexRefreshInterval?: ?bool,
     *   knnMemoryCircuitBreakerEnabled?: ?bool,
     *   knnMemoryCircuitBreakerLimit?: ?int,
     *   mlCommonsConnectorAccessControlEnabled?: ?bool,
     *   mlCommonsModelAccessControlEnabled?: ?bool,
     *   mlCommonsNativeMemoryThreshold?: ?int,
     *   mlCommonsOnlyRunOnMlNode?: ?bool,
     *   mlCommonsTrustedConnectorEndpointsRegex?: ?array<string>,
     *   nodeSearchCacheSize?: ?string,
     *   openid?: ?DatabaseServicePropertiesOpensearchOpenid,
     *   opensearchDashboards?: ?DatabaseServicePropertiesOpensearchOpensearchDashboards,
     *   overrideMainResponseVersion?: ?bool,
     *   pluginsAlertingFilterByBackendRoles?: ?bool,
     *   publicAccess?: ?bool,
     *   publicAccessPrometheus?: ?bool,
     *   reindexRemoteWhitelist?: ?array<?string>,
     *   remoteStore?: ?DatabaseServicePropertiesOpensearchRemoteStore,
     *   saml?: ?DatabaseServicePropertiesOpensearchSaml,
     *   scriptMaxCompilationsRate?: ?string,
     *   searchBackpressure?: ?DatabaseServicePropertiesOpensearchSearchBackpressure,
     *   searchInsightsTopQueries?: ?DatabaseServicePropertiesOpensearchSearchInsightsTopQueries,
     *   searchMaxBuckets?: ?int,
     *   segrep?: ?DatabaseServicePropertiesOpensearchSegrep,
     *   serviceLog?: ?bool,
     *   shardIndexingPressure?: ?DatabaseServicePropertiesOpensearchShardIndexingPressure,
     *   threadPoolAnalyzeQueueSize?: ?int,
     *   threadPoolAnalyzeSize?: ?int,
     *   threadPoolForceMergeSize?: ?int,
     *   threadPoolGetQueueSize?: ?int,
     *   threadPoolGetSize?: ?int,
     *   threadPoolSearchQueueSize?: ?int,
     *   threadPoolSearchSize?: ?int,
     *   threadPoolSearchThrottledQueueSize?: ?int,
     *   threadPoolSearchThrottledSize?: ?int,
     *   threadPoolWriteQueueSize?: ?int,
     *   threadPoolWriteSize?: ?int,
     *   version?: ?value-of<DatabaseServicePropertiesOpensearchVersion>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->actionAutoCreateIndexEnabled = $values['actionAutoCreateIndexEnabled'] ?? null;
        $this->actionDestructiveRequiresName = $values['actionDestructiveRequiresName'] ?? null;
        $this->authFailureListeners = $values['authFailureListeners'] ?? null;
        $this->automaticUtilityNetworkIpFilter = $values['automaticUtilityNetworkIpFilter'] ?? null;
        $this->clusterFilecacheRemoteDataRatio = $values['clusterFilecacheRemoteDataRatio'] ?? null;
        $this->clusterMaxShardsPerNode = $values['clusterMaxShardsPerNode'] ?? null;
        $this->clusterRemoteStore = $values['clusterRemoteStore'] ?? null;
        $this->clusterRoutingAllocationBalancePreferPrimary = $values['clusterRoutingAllocationBalancePreferPrimary'] ?? null;
        $this->clusterRoutingAllocationNodeConcurrentRecoveries = $values['clusterRoutingAllocationNodeConcurrentRecoveries'] ?? null;
        $this->clusterSearchRequestSlowlog = $values['clusterSearchRequestSlowlog'] ?? null;
        $this->customDomain = $values['customDomain'] ?? null;
        $this->customKeystores = $values['customKeystores'] ?? null;
        $this->customRepos = $values['customRepos'] ?? null;
        $this->diskWatermarks = $values['diskWatermarks'] ?? null;
        $this->elasticsearchVersion = $values['elasticsearchVersion'] ?? null;
        $this->emailSenderName = $values['emailSenderName'] ?? null;
        $this->emailSenderPassword = $values['emailSenderPassword'] ?? null;
        $this->emailSenderUsername = $values['emailSenderUsername'] ?? null;
        $this->enableRemoteBackedStorage = $values['enableRemoteBackedStorage'] ?? null;
        $this->enableSearchableSnapshots = $values['enableSearchableSnapshots'] ?? null;
        $this->enableSecurityAudit = $values['enableSecurityAudit'] ?? null;
        $this->enableSnapshotApi = $values['enableSnapshotApi'] ?? null;
        $this->httpMaxContentLength = $values['httpMaxContentLength'] ?? null;
        $this->httpMaxHeaderSize = $values['httpMaxHeaderSize'] ?? null;
        $this->httpMaxInitialLineLength = $values['httpMaxInitialLineLength'] ?? null;
        $this->indexPatterns = $values['indexPatterns'] ?? null;
        $this->indexRollup = $values['indexRollup'] ?? null;
        $this->indexTemplate = $values['indexTemplate'] ?? null;
        $this->indicesFielddataCacheSize = $values['indicesFielddataCacheSize'] ?? null;
        $this->indicesMemoryIndexBufferSize = $values['indicesMemoryIndexBufferSize'] ?? null;
        $this->indicesMemoryMaxIndexBufferSize = $values['indicesMemoryMaxIndexBufferSize'] ?? null;
        $this->indicesMemoryMinIndexBufferSize = $values['indicesMemoryMinIndexBufferSize'] ?? null;
        $this->indicesQueriesCacheSize = $values['indicesQueriesCacheSize'] ?? null;
        $this->indicesQueryBoolMaxClauseCount = $values['indicesQueryBoolMaxClauseCount'] ?? null;
        $this->indicesRecoveryMaxBytesPerSec = $values['indicesRecoveryMaxBytesPerSec'] ?? null;
        $this->indicesRecoveryMaxConcurrentFileChunks = $values['indicesRecoveryMaxConcurrentFileChunks'] ?? null;
        $this->ipFilter = $values['ipFilter'] ?? null;
        $this->ismEnabled = $values['ismEnabled'] ?? null;
        $this->ismHistoryEnabled = $values['ismHistoryEnabled'] ?? null;
        $this->ismHistoryMaxAge = $values['ismHistoryMaxAge'] ?? null;
        $this->ismHistoryMaxDocs = $values['ismHistoryMaxDocs'] ?? null;
        $this->ismHistoryRolloverCheckPeriod = $values['ismHistoryRolloverCheckPeriod'] ?? null;
        $this->ismHistoryRolloverRetentionPeriod = $values['ismHistoryRolloverRetentionPeriod'] ?? null;
        $this->jwt = $values['jwt'] ?? null;
        $this->keepIndexRefreshInterval = $values['keepIndexRefreshInterval'] ?? null;
        $this->knnMemoryCircuitBreakerEnabled = $values['knnMemoryCircuitBreakerEnabled'] ?? null;
        $this->knnMemoryCircuitBreakerLimit = $values['knnMemoryCircuitBreakerLimit'] ?? null;
        $this->mlCommonsConnectorAccessControlEnabled = $values['mlCommonsConnectorAccessControlEnabled'] ?? null;
        $this->mlCommonsModelAccessControlEnabled = $values['mlCommonsModelAccessControlEnabled'] ?? null;
        $this->mlCommonsNativeMemoryThreshold = $values['mlCommonsNativeMemoryThreshold'] ?? null;
        $this->mlCommonsOnlyRunOnMlNode = $values['mlCommonsOnlyRunOnMlNode'] ?? null;
        $this->mlCommonsTrustedConnectorEndpointsRegex = $values['mlCommonsTrustedConnectorEndpointsRegex'] ?? null;
        $this->nodeSearchCacheSize = $values['nodeSearchCacheSize'] ?? null;
        $this->openid = $values['openid'] ?? null;
        $this->opensearchDashboards = $values['opensearchDashboards'] ?? null;
        $this->overrideMainResponseVersion = $values['overrideMainResponseVersion'] ?? null;
        $this->pluginsAlertingFilterByBackendRoles = $values['pluginsAlertingFilterByBackendRoles'] ?? null;
        $this->publicAccess = $values['publicAccess'] ?? null;
        $this->publicAccessPrometheus = $values['publicAccessPrometheus'] ?? null;
        $this->reindexRemoteWhitelist = $values['reindexRemoteWhitelist'] ?? null;
        $this->remoteStore = $values['remoteStore'] ?? null;
        $this->saml = $values['saml'] ?? null;
        $this->scriptMaxCompilationsRate = $values['scriptMaxCompilationsRate'] ?? null;
        $this->searchBackpressure = $values['searchBackpressure'] ?? null;
        $this->searchInsightsTopQueries = $values['searchInsightsTopQueries'] ?? null;
        $this->searchMaxBuckets = $values['searchMaxBuckets'] ?? null;
        $this->segrep = $values['segrep'] ?? null;
        $this->serviceLog = $values['serviceLog'] ?? null;
        $this->shardIndexingPressure = $values['shardIndexingPressure'] ?? null;
        $this->threadPoolAnalyzeQueueSize = $values['threadPoolAnalyzeQueueSize'] ?? null;
        $this->threadPoolAnalyzeSize = $values['threadPoolAnalyzeSize'] ?? null;
        $this->threadPoolForceMergeSize = $values['threadPoolForceMergeSize'] ?? null;
        $this->threadPoolGetQueueSize = $values['threadPoolGetQueueSize'] ?? null;
        $this->threadPoolGetSize = $values['threadPoolGetSize'] ?? null;
        $this->threadPoolSearchQueueSize = $values['threadPoolSearchQueueSize'] ?? null;
        $this->threadPoolSearchSize = $values['threadPoolSearchSize'] ?? null;
        $this->threadPoolSearchThrottledQueueSize = $values['threadPoolSearchThrottledQueueSize'] ?? null;
        $this->threadPoolSearchThrottledSize = $values['threadPoolSearchThrottledSize'] ?? null;
        $this->threadPoolWriteQueueSize = $values['threadPoolWriteQueueSize'] ?? null;
        $this->threadPoolWriteSize = $values['threadPoolWriteSize'] ?? null;
        $this->version = $values['version'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

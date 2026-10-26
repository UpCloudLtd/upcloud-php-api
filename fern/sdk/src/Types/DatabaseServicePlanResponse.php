<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema definition for a service plan
 */
class DatabaseServicePlanResponse extends JsonSerializableType
{
    /**
     * @var ?DatabaseBackupConfigResponse $backupConfig
     */
    #[JsonProperty('backup_config')]
    public ?DatabaseBackupConfigResponse $backupConfig;

    /**
     * @var ?DatabaseBackupConfigResponse $backupConfigPg
     */
    #[JsonProperty('backup_config_pg')]
    public ?DatabaseBackupConfigResponse $backupConfigPg;

    /**
     * @var ?DatabaseBackupConfigResponse $backupConfigMysql
     */
    #[JsonProperty('backup_config_mysql')]
    public ?DatabaseBackupConfigResponse $backupConfigMysql;

    /**
     * @var ?DatabaseBackupConfigResponse $backupConfigRedis
     */
    #[JsonProperty('backup_config_redis')]
    public ?DatabaseBackupConfigResponse $backupConfigRedis;

    /**
     * @var ?DatabaseBackupConfigResponse $backupConfigValkey
     */
    #[JsonProperty('backup_config_valkey')]
    public ?DatabaseBackupConfigResponse $backupConfigValkey;

    /**
     * @var ?DatabaseBackupConfigOpenSearchResponse $backupConfigOpensearch
     */
    #[JsonProperty('backup_config_opensearch')]
    public ?DatabaseBackupConfigOpenSearchResponse $backupConfigOpensearch;

    /**
     * @var ?int $nodeCount Number of nodes in the service plan
     */
    #[JsonProperty('node_count')]
    public ?int $nodeCount;

    /**
     * @var ?DatabaseServicePlanResponseZones $zones
     */
    #[JsonProperty('zones')]
    public ?DatabaseServicePlanResponseZones $zones;

    /**
     * @var ?string $plan Name of the service plan
     */
    #[JsonProperty('plan')]
    public ?string $plan;

    /**
     * @var ?int $coreNumber Number of CPU cores per node
     */
    #[JsonProperty('core_number')]
    public ?int $coreNumber;

    /**
     * @var ?int $storageSize Storage size in MiB per node
     */
    #[JsonProperty('storage_size')]
    public ?int $storageSize;

    /**
     * @var ?int $memoryAmount Memory amount in MB per node
     */
    #[JsonProperty('memory_amount')]
    public ?int $memoryAmount;

    /**
     * @var ?DatabasePlanComponentsResponse $components
     */
    #[JsonProperty('components')]
    public ?DatabasePlanComponentsResponse $components;

    /**
     * @param array{
     *   backupConfig?: ?DatabaseBackupConfigResponse,
     *   backupConfigPg?: ?DatabaseBackupConfigResponse,
     *   backupConfigMysql?: ?DatabaseBackupConfigResponse,
     *   backupConfigRedis?: ?DatabaseBackupConfigResponse,
     *   backupConfigValkey?: ?DatabaseBackupConfigResponse,
     *   backupConfigOpensearch?: ?DatabaseBackupConfigOpenSearchResponse,
     *   nodeCount?: ?int,
     *   zones?: ?DatabaseServicePlanResponseZones,
     *   plan?: ?string,
     *   coreNumber?: ?int,
     *   storageSize?: ?int,
     *   memoryAmount?: ?int,
     *   components?: ?DatabasePlanComponentsResponse,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backupConfig = $values['backupConfig'] ?? null;
        $this->backupConfigPg = $values['backupConfigPg'] ?? null;
        $this->backupConfigMysql = $values['backupConfigMysql'] ?? null;
        $this->backupConfigRedis = $values['backupConfigRedis'] ?? null;
        $this->backupConfigValkey = $values['backupConfigValkey'] ?? null;
        $this->backupConfigOpensearch = $values['backupConfigOpensearch'] ?? null;
        $this->nodeCount = $values['nodeCount'] ?? null;
        $this->zones = $values['zones'] ?? null;
        $this->plan = $values['plan'] ?? null;
        $this->coreNumber = $values['coreNumber'] ?? null;
        $this->storageSize = $values['storageSize'] ?? null;
        $this->memoryAmount = $values['memoryAmount'] ?? null;
        $this->components = $values['components'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

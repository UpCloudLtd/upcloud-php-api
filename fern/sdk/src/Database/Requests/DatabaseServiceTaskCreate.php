<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Database\Types\DatabaseServiceTaskCreateDatasetImport;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Database\Types\DatabaseServiceTaskCreateMigrationCheck;
use Upcloud\Database\Types\DatabaseServiceTaskCreateUpgradeCheck;

class DatabaseServiceTaskCreate extends JsonSerializableType
{
    /**
     * @var ?DatabaseServiceTaskCreateDatasetImport $datasetImport
     */
    #[JsonProperty('dataset_import')]
    public ?DatabaseServiceTaskCreateDatasetImport $datasetImport;

    /**
     * @var ?DatabaseServiceTaskCreateMigrationCheck $migrationCheck
     */
    #[JsonProperty('migration_check')]
    public ?DatabaseServiceTaskCreateMigrationCheck $migrationCheck;

    /**
     * @var ?DatabaseServiceTaskCreateUpgradeCheck $upgradeCheck
     */
    #[JsonProperty('upgrade_check')]
    public ?DatabaseServiceTaskCreateUpgradeCheck $upgradeCheck;

    /**
     * @var ?string $targetVersion The target version for upgrade operations.
     */
    #[JsonProperty('target_version')]
    public ?string $targetVersion;

    /**
     * @var string $operation The operation to be performed.
     */
    #[JsonProperty('operation')]
    public string $operation;

    /**
     * @param array{
     *   operation: string,
     *   datasetImport?: ?DatabaseServiceTaskCreateDatasetImport,
     *   migrationCheck?: ?DatabaseServiceTaskCreateMigrationCheck,
     *   upgradeCheck?: ?DatabaseServiceTaskCreateUpgradeCheck,
     *   targetVersion?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->datasetImport = $values['datasetImport'] ?? null;
        $this->migrationCheck = $values['migrationCheck'] ?? null;
        $this->upgradeCheck = $values['upgradeCheck'] ?? null;
        $this->targetVersion = $values['targetVersion'] ?? null;
        $this->operation = $values['operation'];
    }
}

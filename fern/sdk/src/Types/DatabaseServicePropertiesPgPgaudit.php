<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * System-wide settings for the pgaudit extension.
 */
class DatabaseServicePropertiesPgPgaudit extends JsonSerializableType
{
    /**
     * @var ?bool $featureEnabled Enable pgaudit extension. When enabled, pgaudit extension will be automatically installed.Otherwise, extension will be uninstalled but auditing configurations will be preserved.
     */
    #[JsonProperty('feature_enabled')]
    public ?bool $featureEnabled;

    /**
     * @var ?array<value-of<DatabaseServicePropertiesPgPgauditLogItem>> $log Specifies which classes of statements will be logged by session audit logging.
     */
    #[JsonProperty('log'), ArrayType(['string'])]
    public ?array $log;

    /**
     * Specifies that session logging should be enabled in the case where all relations
     * in a statement are in pg_catalog.
     *
     * @var ?bool $logCatalog
     */
    #[JsonProperty('log_catalog')]
    public ?bool $logCatalog;

    /**
     * @var ?bool $logClient Specifies whether log messages will be visible to a client process such as psql.
     */
    #[JsonProperty('log_client')]
    public ?bool $logClient;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgPgauditLogLevel> $logLevel Specifies the log level that will be used for log entries.
     */
    #[JsonProperty('log_level')]
    public ?string $logLevel;

    /**
     * Crop parameters representation and whole statements if they exceed this threshold.
     * A (default) value of -1 disable the truncation.
     *
     * @var ?int $logMaxStringLength
     */
    #[JsonProperty('log_max_string_length')]
    public ?int $logMaxStringLength;

    /**
     * This GUC allows to turn off logging nested statements, that is, statements that are
     * executed as part of another ExecutorRun.
     *
     * @var ?bool $logNestedStatements
     */
    #[JsonProperty('log_nested_statements')]
    public ?bool $logNestedStatements;

    /**
     * @var ?bool $logParameter Specifies that audit logging should include the parameters that were passed with the statement.
     */
    #[JsonProperty('log_parameter')]
    public ?bool $logParameter;

    /**
     * Specifies that parameter values longer than this setting (in bytes) should not be logged,
     * but replaced with <long param suppressed>.
     *
     * @var ?int $logParameterMaxSize
     */
    #[JsonProperty('log_parameter_max_size')]
    public ?int $logParameterMaxSize;

    /**
     * Specifies whether session audit logging should create a separate log entry
     * for each relation (TABLE, VIEW, etc.) referenced in a SELECT or DML statement.
     *
     * @var ?bool $logRelation
     */
    #[JsonProperty('log_relation')]
    public ?bool $logRelation;

    /**
     * @var ?bool $logRows
     */
    #[JsonProperty('log_rows')]
    public ?bool $logRows;

    /**
     * @var ?bool $logStatement Specifies whether logging will include the statement text and parameters (if enabled).
     */
    #[JsonProperty('log_statement')]
    public ?bool $logStatement;

    /**
     * Specifies whether logging will include the statement text and parameters with
     * the first log entry for a statement/substatement combination or with every entry.
     *
     * @var ?bool $logStatementOnce
     */
    #[JsonProperty('log_statement_once')]
    public ?bool $logStatementOnce;

    /**
     * @var ?string $role Specifies the master role to use for object audit logging.
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @param array{
     *   featureEnabled?: ?bool,
     *   log?: ?array<value-of<DatabaseServicePropertiesPgPgauditLogItem>>,
     *   logCatalog?: ?bool,
     *   logClient?: ?bool,
     *   logLevel?: ?value-of<DatabaseServicePropertiesPgPgauditLogLevel>,
     *   logMaxStringLength?: ?int,
     *   logNestedStatements?: ?bool,
     *   logParameter?: ?bool,
     *   logParameterMaxSize?: ?int,
     *   logRelation?: ?bool,
     *   logRows?: ?bool,
     *   logStatement?: ?bool,
     *   logStatementOnce?: ?bool,
     *   role?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->featureEnabled = $values['featureEnabled'] ?? null;
        $this->log = $values['log'] ?? null;
        $this->logCatalog = $values['logCatalog'] ?? null;
        $this->logClient = $values['logClient'] ?? null;
        $this->logLevel = $values['logLevel'] ?? null;
        $this->logMaxStringLength = $values['logMaxStringLength'] ?? null;
        $this->logNestedStatements = $values['logNestedStatements'] ?? null;
        $this->logParameter = $values['logParameter'] ?? null;
        $this->logParameterMaxSize = $values['logParameterMaxSize'] ?? null;
        $this->logRelation = $values['logRelation'] ?? null;
        $this->logRows = $values['logRows'] ?? null;
        $this->logStatement = $values['logStatement'] ?? null;
        $this->logStatementOnce = $values['logStatementOnce'] ?? null;
        $this->role = $values['role'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

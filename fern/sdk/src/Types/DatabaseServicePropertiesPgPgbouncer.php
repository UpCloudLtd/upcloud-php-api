<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * System-wide settings for pgbouncer.
 */
class DatabaseServicePropertiesPgPgbouncer extends JsonSerializableType
{
    /**
     * @var ?int $autodbIdleTimeout
     */
    #[JsonProperty('autodb_idle_timeout')]
    public ?int $autodbIdleTimeout;

    /**
     * @var ?int $autodbMaxDbConnections
     */
    #[JsonProperty('autodb_max_db_connections')]
    public ?int $autodbMaxDbConnections;

    /**
     * @var ?value-of<DatabaseServicePropertiesPgPgbouncerAutodbPoolMode> $autodbPoolMode
     */
    #[JsonProperty('autodb_pool_mode')]
    public ?string $autodbPoolMode;

    /**
     * @var ?int $autodbPoolSize
     */
    #[JsonProperty('autodb_pool_size')]
    public ?int $autodbPoolSize;

    /**
     * @var ?array<value-of<DatabaseServicePropertiesPgPgbouncerIgnoreStartupParametersItem>> $ignoreStartupParameters
     */
    #[JsonProperty('ignore_startup_parameters'), ArrayType(['string'])]
    public ?array $ignoreStartupParameters;

    /**
     * @var ?int $maxPreparedStatements
     */
    #[JsonProperty('max_prepared_statements')]
    public ?int $maxPreparedStatements;

    /**
     * @var ?int $minPoolSize
     */
    #[JsonProperty('min_pool_size')]
    public ?int $minPoolSize;

    /**
     * @var ?float $serverConnectTimeout
     */
    #[JsonProperty('server_connect_timeout')]
    public ?float $serverConnectTimeout;

    /**
     * @var ?int $serverIdleTimeout
     */
    #[JsonProperty('server_idle_timeout')]
    public ?int $serverIdleTimeout;

    /**
     * @var ?int $serverLifetime
     */
    #[JsonProperty('server_lifetime')]
    public ?int $serverLifetime;

    /**
     * @var ?float $serverLoginRetry
     */
    #[JsonProperty('server_login_retry')]
    public ?float $serverLoginRetry;

    /**
     * @var ?bool $serverResetQueryAlways
     */
    #[JsonProperty('server_reset_query_always')]
    public ?bool $serverResetQueryAlways;

    /**
     * @param array{
     *   autodbIdleTimeout?: ?int,
     *   autodbMaxDbConnections?: ?int,
     *   autodbPoolMode?: ?value-of<DatabaseServicePropertiesPgPgbouncerAutodbPoolMode>,
     *   autodbPoolSize?: ?int,
     *   ignoreStartupParameters?: ?array<value-of<DatabaseServicePropertiesPgPgbouncerIgnoreStartupParametersItem>>,
     *   maxPreparedStatements?: ?int,
     *   minPoolSize?: ?int,
     *   serverConnectTimeout?: ?float,
     *   serverIdleTimeout?: ?int,
     *   serverLifetime?: ?int,
     *   serverLoginRetry?: ?float,
     *   serverResetQueryAlways?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->autodbIdleTimeout = $values['autodbIdleTimeout'] ?? null;
        $this->autodbMaxDbConnections = $values['autodbMaxDbConnections'] ?? null;
        $this->autodbPoolMode = $values['autodbPoolMode'] ?? null;
        $this->autodbPoolSize = $values['autodbPoolSize'] ?? null;
        $this->ignoreStartupParameters = $values['ignoreStartupParameters'] ?? null;
        $this->maxPreparedStatements = $values['maxPreparedStatements'] ?? null;
        $this->minPoolSize = $values['minPoolSize'] ?? null;
        $this->serverConnectTimeout = $values['serverConnectTimeout'] ?? null;
        $this->serverIdleTimeout = $values['serverIdleTimeout'] ?? null;
        $this->serverLifetime = $values['serverLifetime'] ?? null;
        $this->serverLoginRetry = $values['serverLoginRetry'] ?? null;
        $this->serverResetQueryAlways = $values['serverResetQueryAlways'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

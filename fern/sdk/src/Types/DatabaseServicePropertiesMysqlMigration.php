<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesMysqlMigration extends JsonSerializableType
{
    /**
     * @var ?string $dbname
     */
    #[JsonProperty('dbname')]
    public ?string $dbname;

    /**
     * @var ?value-of<DatabaseServicePropertiesMysqlMigrationDumpTool> $dumpTool Experimental! Tool to use for database dump and restore during migration. Default: mysqldump
     */
    #[JsonProperty('dump_tool')]
    public ?string $dumpTool;

    /**
     * @var string $host
     */
    #[JsonProperty('host')]
    public string $host;

    /**
     * @var ?string $ignoreDbs
     */
    #[JsonProperty('ignore_dbs')]
    public ?string $ignoreDbs;

    /**
     * @var ?string $ignoreRoles
     */
    #[JsonProperty('ignore_roles')]
    public ?string $ignoreRoles;

    /**
     * @var ?value-of<DatabaseServicePropertiesMysqlMigrationMethod> $method
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?string $password
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * @var int $port
     */
    #[JsonProperty('port')]
    public int $port;

    /**
     * @var ?bool $reestablishReplication
     */
    #[JsonProperty('reestablish_replication')]
    public ?bool $reestablishReplication;

    /**
     * @var ?bool $ssl
     */
    #[JsonProperty('ssl')]
    public ?bool $ssl;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   host: string,
     *   port: int,
     *   dbname?: ?string,
     *   dumpTool?: ?value-of<DatabaseServicePropertiesMysqlMigrationDumpTool>,
     *   ignoreDbs?: ?string,
     *   ignoreRoles?: ?string,
     *   method?: ?value-of<DatabaseServicePropertiesMysqlMigrationMethod>,
     *   password?: ?string,
     *   reestablishReplication?: ?bool,
     *   ssl?: ?bool,
     *   username?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dbname = $values['dbname'] ?? null;
        $this->dumpTool = $values['dumpTool'] ?? null;
        $this->host = $values['host'];
        $this->ignoreDbs = $values['ignoreDbs'] ?? null;
        $this->ignoreRoles = $values['ignoreRoles'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->password = $values['password'] ?? null;
        $this->port = $values['port'];
        $this->reestablishReplication = $values['reestablishReplication'] ?? null;
        $this->ssl = $values['ssl'] ?? null;
        $this->username = $values['username'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

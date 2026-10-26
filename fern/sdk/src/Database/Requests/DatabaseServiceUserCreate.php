<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Database\Types\DatabaseServiceUserCreateRedisAccessControl;
use Upcloud\Database\Types\DatabaseServiceUserCreatePgAccessControl;
use Upcloud\Database\Types\DatabaseServiceUserCreateOpensearchAccessControl;
use Upcloud\Database\Types\DatabaseServiceUserCreateValkeyAccessControl;

class DatabaseServiceUserCreate extends JsonSerializableType
{
    /**
     * @var string $username The username of the service user
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var ?string $password The password of the service user
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * @var ?string $authentication The authentication method for the service user
     */
    #[JsonProperty('authentication')]
    public ?string $authentication;

    /**
     * @var ?DatabaseServiceUserCreateRedisAccessControl $redisAccessControl Redis access control settings
     */
    #[JsonProperty('redis_access_control')]
    public ?DatabaseServiceUserCreateRedisAccessControl $redisAccessControl;

    /**
     * @var ?DatabaseServiceUserCreatePgAccessControl $pgAccessControl PostgreSQL access control settings
     */
    #[JsonProperty('pg_access_control')]
    public ?DatabaseServiceUserCreatePgAccessControl $pgAccessControl;

    /**
     * @var ?DatabaseServiceUserCreateOpensearchAccessControl $opensearchAccessControl OpenSearch access control settings
     */
    #[JsonProperty('opensearch_access_control')]
    public ?DatabaseServiceUserCreateOpensearchAccessControl $opensearchAccessControl;

    /**
     * @var ?DatabaseServiceUserCreateValkeyAccessControl $valkeyAccessControl Valkey access control settings
     */
    #[JsonProperty('valkey_access_control')]
    public ?DatabaseServiceUserCreateValkeyAccessControl $valkeyAccessControl;

    /**
     * @param array{
     *   username: string,
     *   password?: ?string,
     *   authentication?: ?string,
     *   redisAccessControl?: ?DatabaseServiceUserCreateRedisAccessControl,
     *   pgAccessControl?: ?DatabaseServiceUserCreatePgAccessControl,
     *   opensearchAccessControl?: ?DatabaseServiceUserCreateOpensearchAccessControl,
     *   valkeyAccessControl?: ?DatabaseServiceUserCreateValkeyAccessControl,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->username = $values['username'];
        $this->password = $values['password'] ?? null;
        $this->authentication = $values['authentication'] ?? null;
        $this->redisAccessControl = $values['redisAccessControl'] ?? null;
        $this->pgAccessControl = $values['pgAccessControl'] ?? null;
        $this->opensearchAccessControl = $values['opensearchAccessControl'] ?? null;
        $this->valkeyAccessControl = $values['valkeyAccessControl'] ?? null;
    }
}

<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyRedisAccessControl;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyPgAccessControl;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyOpensearchAccessControl;
use Upcloud\Database\Types\DatabaseServiceUserAclModifyValkeyAccessControl;

class DatabaseServiceUserAclModify extends JsonSerializableType
{
    /**
     * @var ?DatabaseServiceUserAclModifyRedisAccessControl $redisAccessControl Redis ACL modification schema
     */
    #[JsonProperty('redis_access_control')]
    public ?DatabaseServiceUserAclModifyRedisAccessControl $redisAccessControl;

    /**
     * @var ?DatabaseServiceUserAclModifyPgAccessControl $pgAccessControl PostgreSQL replication permission modification schema
     */
    #[JsonProperty('pg_access_control')]
    public ?DatabaseServiceUserAclModifyPgAccessControl $pgAccessControl;

    /**
     * @var ?DatabaseServiceUserAclModifyOpensearchAccessControl $opensearchAccessControl OpenSearch index permission modification schema
     */
    #[JsonProperty('opensearch_access_control')]
    public ?DatabaseServiceUserAclModifyOpensearchAccessControl $opensearchAccessControl;

    /**
     * @var ?DatabaseServiceUserAclModifyValkeyAccessControl $valkeyAccessControl Valkey ACL modification schema
     */
    #[JsonProperty('valkey_access_control')]
    public ?DatabaseServiceUserAclModifyValkeyAccessControl $valkeyAccessControl;

    /**
     * @param array{
     *   redisAccessControl?: ?DatabaseServiceUserAclModifyRedisAccessControl,
     *   pgAccessControl?: ?DatabaseServiceUserAclModifyPgAccessControl,
     *   opensearchAccessControl?: ?DatabaseServiceUserAclModifyOpensearchAccessControl,
     *   valkeyAccessControl?: ?DatabaseServiceUserAclModifyValkeyAccessControl,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->redisAccessControl = $values['redisAccessControl'] ?? null;
        $this->pgAccessControl = $values['pgAccessControl'] ?? null;
        $this->opensearchAccessControl = $values['opensearchAccessControl'] ?? null;
        $this->valkeyAccessControl = $values['valkeyAccessControl'] ?? null;
    }
}

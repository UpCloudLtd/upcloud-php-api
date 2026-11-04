<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\DatabaseMysqlClone;
use Upcloud\Types\DatabasePostgresqlClone;
use Upcloud\Types\DatabaseRedisClone;
use Upcloud\Types\DatabaseOpensearchClone;
use Upcloud\Types\DatabaseValkeyClone;

class CloneDatabaseRequest extends JsonSerializableType
{
    /**
     * @var (
     *    DatabaseMysqlClone
     *   |DatabasePostgresqlClone
     *   |DatabaseRedisClone
     *   |DatabaseOpensearchClone
     *   |DatabaseValkeyClone
     * ) $body
     */
    public DatabaseMysqlClone|DatabasePostgresqlClone|DatabaseRedisClone|DatabaseOpensearchClone|DatabaseValkeyClone $body;

    /**
     * @param array{
     *   body: (
     *    DatabaseMysqlClone
     *   |DatabasePostgresqlClone
     *   |DatabaseRedisClone
     *   |DatabaseOpensearchClone
     *   |DatabaseValkeyClone
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

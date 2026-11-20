<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\DatabaseServiceCloneMysql;
use Upcloud\Types\DatabaseServiceClonePg;
use Upcloud\Types\DatabaseServiceCloneRedis;
use Upcloud\Types\DatabaseServiceCloneOpensearch;
use Upcloud\Types\DatabaseServiceCloneValkey;

class CloneDatabaseRequest extends JsonSerializableType
{
    /**
     * @var (
     *    DatabaseServiceCloneMysql
     *   |DatabaseServiceClonePg
     *   |DatabaseServiceCloneRedis
     *   |DatabaseServiceCloneOpensearch
     *   |DatabaseServiceCloneValkey
     * ) $body
     */
    public DatabaseServiceCloneMysql|DatabaseServiceClonePg|DatabaseServiceCloneRedis|DatabaseServiceCloneOpensearch|DatabaseServiceCloneValkey $body;

    /**
     * @param array{
     *   body: (
     *    DatabaseServiceCloneMysql
     *   |DatabaseServiceClonePg
     *   |DatabaseServiceCloneRedis
     *   |DatabaseServiceCloneOpensearch
     *   |DatabaseServiceCloneValkey
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

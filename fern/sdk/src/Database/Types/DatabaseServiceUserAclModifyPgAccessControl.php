<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * PostgreSQL replication permission modification schema
 */
class DatabaseServiceUserAclModifyPgAccessControl extends JsonSerializableType
{
    /**
     * @var bool $allowReplication Flag to allow or disallow replication
     */
    #[JsonProperty('allow_replication')]
    public bool $allowReplication;

    /**
     * @param array{
     *   allowReplication: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->allowReplication = $values['allowReplication'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

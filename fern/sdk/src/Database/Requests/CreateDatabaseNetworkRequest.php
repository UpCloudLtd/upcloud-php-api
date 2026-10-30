<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\DatabaseNetworkCreate;

class CreateDatabaseNetworkRequest extends JsonSerializableType
{
    /**
     * @var DatabaseNetworkCreate $body
     */
    public DatabaseNetworkCreate $body;

    /**
     * @param array{
     *   body: DatabaseNetworkCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

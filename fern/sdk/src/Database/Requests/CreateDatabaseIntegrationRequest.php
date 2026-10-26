<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\DatabaseServiceIntegrationCreate;

class CreateDatabaseIntegrationRequest extends JsonSerializableType
{
    /**
     * @var DatabaseServiceIntegrationCreate $body
     */
    public DatabaseServiceIntegrationCreate $body;

    /**
     * @param array{
     *   body: DatabaseServiceIntegrationCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\DatabaseLabelCreate;

class CreateDatabaseLabelRequest extends JsonSerializableType
{
    /**
     * @var DatabaseLabelCreate $body
     */
    public DatabaseLabelCreate $body;

    /**
     * @param array{
     *   body: DatabaseLabelCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

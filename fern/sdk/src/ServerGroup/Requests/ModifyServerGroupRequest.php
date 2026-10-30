<?php

namespace Upcloud\ServerGroup\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ServerGroupModify;

class ModifyServerGroupRequest extends JsonSerializableType
{
    /**
     * @var ServerGroupModify $body
     */
    public ServerGroupModify $body;

    /**
     * @param array{
     *   body: ServerGroupModify,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

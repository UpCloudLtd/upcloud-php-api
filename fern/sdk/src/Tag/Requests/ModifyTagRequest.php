<?php

namespace Upcloud\Tag\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\Tag;

class ModifyTagRequest extends JsonSerializableType
{
    /**
     * @var Tag $body
     */
    public Tag $body;

    /**
     * @param array{
     *   body: Tag,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

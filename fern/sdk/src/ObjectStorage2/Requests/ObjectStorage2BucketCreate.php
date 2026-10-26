<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2BucketCreate extends JsonSerializableType
{
    /**
     * @var string $name Must be unique within the service, and should contain only alphanumeric, .,- and _.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
    }
}

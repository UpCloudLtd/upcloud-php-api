<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * The input of the job.
 */
class ObjectStorage2JobResponseInput extends JsonSerializableType
{
    /**
     * @var value-of<ObjectStorage2JobResponseInputType> $type Type of the job.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ObjectStorage2JobInputItemResponse $source
     */
    #[JsonProperty('source')]
    public ObjectStorage2JobInputItemResponse $source;

    /**
     * @var ObjectStorage2JobInputItemResponse $target
     */
    #[JsonProperty('target')]
    public ObjectStorage2JobInputItemResponse $target;

    /**
     * @param array{
     *   type: value-of<ObjectStorage2JobResponseInputType>,
     *   source: ObjectStorage2JobInputItemResponse,
     *   target: ObjectStorage2JobInputItemResponse,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->source = $values['source'];
        $this->target = $values['target'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

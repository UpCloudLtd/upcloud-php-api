<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\ObjectStorage2\Types\ObjectStorage2JobInputCreateType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ObjectStorage2JobInputItemCreate;

class ObjectStorage2JobInputCreate extends JsonSerializableType
{
    /**
     * @var ?string $validateOnly Only validate the request without applying any changes.
     */
    public ?string $validateOnly;

    /**
     * @var value-of<ObjectStorage2JobInputCreateType> $type The type of the job.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ObjectStorage2JobInputItemCreate $source
     */
    #[JsonProperty('source')]
    public ObjectStorage2JobInputItemCreate $source;

    /**
     * @var ObjectStorage2JobInputItemCreate $target
     */
    #[JsonProperty('target')]
    public ObjectStorage2JobInputItemCreate $target;

    /**
     * @param array{
     *   type: value-of<ObjectStorage2JobInputCreateType>,
     *   source: ObjectStorage2JobInputItemCreate,
     *   target: ObjectStorage2JobInputItemCreate,
     *   validateOnly?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->validateOnly = $values['validateOnly'] ?? null;
        $this->type = $values['type'];
        $this->source = $values['source'];
        $this->target = $values['target'];
    }
}

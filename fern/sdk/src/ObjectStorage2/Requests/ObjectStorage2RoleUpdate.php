<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2RoleUpdate extends JsonSerializableType
{
    /**
     * @var ?string $description New description for the role.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $maxSessionDuration New maximum session duration in seconds.
     */
    #[JsonProperty('max_session_duration')]
    public ?int $maxSessionDuration;

    /**
     * @param array{
     *   description?: ?string,
     *   maxSessionDuration?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->maxSessionDuration = $values['maxSessionDuration'] ?? null;
    }
}

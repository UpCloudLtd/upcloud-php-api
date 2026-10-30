<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for assuming a role with a policy document.
 */
class ObjectStorage2AssumeRolePolicyResponse extends JsonSerializableType
{
    /**
     * @var ?string $document
     */
    #[JsonProperty('document')]
    public ?string $document;

    /**
     * @param array{
     *   document?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->document = $values['document'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2AssumeRolePolicyRequest extends JsonSerializableType
{
    /**
     * @var string $document The assume role policy document that grants an entity permission to assume the role.
     */
    #[JsonProperty('document')]
    public string $document;

    /**
     * @param array{
     *   document: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->document = $values['document'];
    }
}

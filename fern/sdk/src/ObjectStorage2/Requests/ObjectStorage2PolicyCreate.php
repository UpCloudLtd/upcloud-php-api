<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2PolicyCreate extends JsonSerializableType
{
    /**
     * @var string $name Unique name of the policy.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description The policy description.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var string $document A valid, URL-encoded policy document.
     */
    #[JsonProperty('document')]
    public string $document;

    /**
     * @param array{
     *   name: string,
     *   document: string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->document = $values['document'];
    }
}

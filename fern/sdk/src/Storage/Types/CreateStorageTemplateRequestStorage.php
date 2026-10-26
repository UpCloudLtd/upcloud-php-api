<?php

namespace Upcloud\Storage\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Parameters for creating a template from the block storage.
 */
class CreateStorageTemplateRequestStorage extends JsonSerializableType
{
    /**
     * @var string $title A short, informational description of the template.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @param array{
     *   title: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

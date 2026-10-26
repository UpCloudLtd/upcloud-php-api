<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2PolicyVersionCreate extends JsonSerializableType
{
    /**
     * @var string $document A valid, URL-encoded policy document.
     */
    #[JsonProperty('document')]
    public string $document;

    /**
     * @var bool $isDefault Set this version as the default.
     */
    #[JsonProperty('is_default')]
    public bool $isDefault;

    /**
     * @param array{
     *   document: string,
     *   isDefault: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->document = $values['document'];
        $this->isDefault = $values['isDefault'];
    }
}

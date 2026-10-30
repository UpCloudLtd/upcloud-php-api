<?php

namespace Upcloud\Storage\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Storage\Types\CreateStorageTemplateRequestStorage;
use Upcloud\Core\Json\JsonProperty;

class CreateStorageTemplateRequest extends JsonSerializableType
{
    /**
     * @var CreateStorageTemplateRequestStorage $storage Parameters for creating a template from the block storage.
     */
    #[JsonProperty('storage')]
    public CreateStorageTemplateRequestStorage $storage;

    /**
     * @param array{
     *   storage: CreateStorageTemplateRequestStorage,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->storage = $values['storage'];
    }
}

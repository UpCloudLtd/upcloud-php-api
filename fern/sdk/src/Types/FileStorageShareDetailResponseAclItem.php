<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class FileStorageShareDetailResponseAclItem extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $target
     */
    #[JsonProperty('target')]
    public ?string $target;

    /**
     * @var ?string $permission
     */
    #[JsonProperty('permission')]
    public ?string $permission;

    /**
     * @param array{
     *   name?: ?string,
     *   target?: ?string,
     *   permission?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->target = $values['target'] ?? null;
        $this->permission = $values['permission'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

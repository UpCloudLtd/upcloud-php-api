<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A single permission object.
 */
class Permission extends JsonSerializableType
{
    /**
     * @var ?PermissionDocument $permission
     */
    #[JsonProperty('permission')]
    public ?PermissionDocument $permission;

    /**
     * @param array{
     *   permission?: ?PermissionDocument,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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

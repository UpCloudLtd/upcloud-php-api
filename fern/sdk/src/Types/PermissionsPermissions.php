<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class PermissionsPermissions extends JsonSerializableType
{
    /**
     * @var array<PermissionDocument> $permission
     */
    #[JsonProperty('permission'), ArrayType([PermissionDocument::class])]
    public array $permission;

    /**
     * @param array{
     *   permission: array<PermissionDocument>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->permission = $values['permission'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

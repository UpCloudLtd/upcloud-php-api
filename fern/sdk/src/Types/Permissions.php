<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * List of permissions.
 */
class Permissions extends JsonSerializableType
{
    /**
     * @var PermissionsPermissions $permissions
     */
    #[JsonProperty('permissions')]
    public PermissionsPermissions $permissions;

    /**
     * @param array{
     *   permissions: PermissionsPermissions,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->permissions = $values['permissions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

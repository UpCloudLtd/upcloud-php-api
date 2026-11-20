<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ContainerRegistryPermissionsItem;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryUserModify extends JsonSerializableType
{
    /**
     * @var ?array<value-of<ContainerRegistryPermissionsItem>> $permissions
     */
    #[JsonProperty('permissions'), ArrayType(['string'])]
    public ?array $permissions;

    /**
     * @var ?bool $active Whether the user account is active
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @var ?string $displayName Human-readable display name
     */
    #[JsonProperty('display_name')]
    public ?string $displayName;

    /**
     * @var ?string $email Email address
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $description Description of the user or their purpose
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   permissions?: ?array<value-of<ContainerRegistryPermissionsItem>>,
     *   active?: ?bool,
     *   displayName?: ?string,
     *   email?: ?string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->permissions = $values['permissions'] ?? null;
        $this->active = $values['active'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->description = $values['description'] ?? null;
    }
}

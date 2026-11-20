<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ContainerRegistryPermissionsItem;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryUserCreate extends JsonSerializableType
{
    /**
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var string $password Password for authentication. At most 72 bytes; the registry stores it as a bcrypt hash, which refuses anything longer.
     */
    #[JsonProperty('password')]
    public string $password;

    /**
     * @var array<value-of<ContainerRegistryPermissionsItem>> $permissions
     */
    #[JsonProperty('permissions'), ArrayType(['string'])]
    public array $permissions;

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
     *   username: string,
     *   password: string,
     *   permissions: array<value-of<ContainerRegistryPermissionsItem>>,
     *   displayName?: ?string,
     *   email?: ?string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->username = $values['username'];
        $this->password = $values['password'];
        $this->permissions = $values['permissions'];
        $this->displayName = $values['displayName'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->description = $values['description'] ?? null;
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

class ContainerRegistryUserDetailResponse extends JsonSerializableType
{
    /**
     * @var string $serviceUuid
     */
    #[JsonProperty('service_uuid')]
    public string $serviceUuid;

    /**
     * @var string $username Username for authentication
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var array<value-of<ContainerRegistryPermissionsItem>> $permissions
     */
    #[JsonProperty('permissions'), ArrayType(['string'])]
    public array $permissions;

    /**
     * @var bool $managed True for the service owner the platform creates (upadmin). It holds every permission and cannot be changed or deleted; change its password with POST /users/upadmin/password or rotate it with POST /credentials.
     */
    #[JsonProperty('managed')]
    public bool $managed;

    /**
     * @var bool $active Whether the user account is active
     */
    #[JsonProperty('active')]
    public bool $active;

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
     * @var DateTime $createdAt Timestamp when the user was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the user was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?DateTime $lastLoginAt Timestamp of the last login, null if never logged in
     */
    #[JsonProperty('last_login_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastLoginAt;

    /**
     * @param array{
     *   serviceUuid: string,
     *   username: string,
     *   permissions: array<value-of<ContainerRegistryPermissionsItem>>,
     *   managed: bool,
     *   active: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   displayName?: ?string,
     *   email?: ?string,
     *   description?: ?string,
     *   lastLoginAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serviceUuid = $values['serviceUuid'];
        $this->username = $values['username'];
        $this->permissions = $values['permissions'];
        $this->managed = $values['managed'];
        $this->active = $values['active'];
        $this->displayName = $values['displayName'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->lastLoginAt = $values['lastLoginAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

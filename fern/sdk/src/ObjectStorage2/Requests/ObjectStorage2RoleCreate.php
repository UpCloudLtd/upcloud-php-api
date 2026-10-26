<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ObjectStorage2RoleTag;
use Upcloud\Core\Types\ArrayType;

class ObjectStorage2RoleCreate extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $assumeRolePolicyDocument The policy document that grants an entity permission to assume the role.
     */
    #[JsonProperty('assume_role_policy_document')]
    public string $assumeRolePolicyDocument;

    /**
     * @var ?string $description Description of the role.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $maxSessionDuration Maximum session duration in seconds.
     */
    #[JsonProperty('max_session_duration')]
    public ?int $maxSessionDuration;

    /**
     * @var ?string $permissionsBoundary Policy name to set as the permissions boundary.
     */
    #[JsonProperty('permissions_boundary')]
    public ?string $permissionsBoundary;

    /**
     * @var ?array<ObjectStorage2RoleTag> $tags Tags to attach to the role (max 50).
     */
    #[JsonProperty('tags'), ArrayType([ObjectStorage2RoleTag::class])]
    public ?array $tags;

    /**
     * @param array{
     *   name: string,
     *   assumeRolePolicyDocument: string,
     *   description?: ?string,
     *   maxSessionDuration?: ?int,
     *   permissionsBoundary?: ?string,
     *   tags?: ?array<ObjectStorage2RoleTag>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->assumeRolePolicyDocument = $values['assumeRolePolicyDocument'];
        $this->description = $values['description'] ?? null;
        $this->maxSessionDuration = $values['maxSessionDuration'] ?? null;
        $this->permissionsBoundary = $values['permissionsBoundary'] ?? null;
        $this->tags = $values['tags'] ?? null;
    }
}

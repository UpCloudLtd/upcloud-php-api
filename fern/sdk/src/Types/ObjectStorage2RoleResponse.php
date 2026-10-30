<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for detailed information about a specific role.
 */
class ObjectStorage2RoleResponse extends JsonSerializableType
{
    /**
     * @var ?string $arn
     */
    #[JsonProperty('arn')]
    public ?string $arn;

    /**
     * @var ?string $assumeRolePolicyDocument
     */
    #[JsonProperty('assume_role_policy_document')]
    public ?string $assumeRolePolicyDocument;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?array<ObjectStorage2RoleResponseInlinePoliciesItem> $inlinePolicies
     */
    #[JsonProperty('inline_policies'), ArrayType([ObjectStorage2RoleResponseInlinePoliciesItem::class])]
    public ?array $inlinePolicies;

    /**
     * @var ?int $maxSessionDuration
     */
    #[JsonProperty('max_session_duration')]
    public ?int $maxSessionDuration;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $permissionsBoundary
     */
    #[JsonProperty('permissions_boundary')]
    public ?string $permissionsBoundary;

    /**
     * @var ?array<ObjectStorage2PolicyAttachmentResponse> $policies
     */
    #[JsonProperty('policies'), ArrayType([ObjectStorage2PolicyAttachmentResponse::class])]
    public ?array $policies;

    /**
     * @var ?array<ObjectStorage2TagResponse> $tags
     */
    #[JsonProperty('tags'), ArrayType([ObjectStorage2TagResponse::class])]
    public ?array $tags;

    /**
     * @param array{
     *   arn?: ?string,
     *   assumeRolePolicyDocument?: ?string,
     *   createdAt?: ?DateTime,
     *   description?: ?string,
     *   inlinePolicies?: ?array<ObjectStorage2RoleResponseInlinePoliciesItem>,
     *   maxSessionDuration?: ?int,
     *   name?: ?string,
     *   permissionsBoundary?: ?string,
     *   policies?: ?array<ObjectStorage2PolicyAttachmentResponse>,
     *   tags?: ?array<ObjectStorage2TagResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->arn = $values['arn'] ?? null;
        $this->assumeRolePolicyDocument = $values['assumeRolePolicyDocument'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->inlinePolicies = $values['inlinePolicies'] ?? null;
        $this->maxSessionDuration = $values['maxSessionDuration'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->permissionsBoundary = $values['permissionsBoundary'] ?? null;
        $this->policies = $values['policies'] ?? null;
        $this->tags = $values['tags'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

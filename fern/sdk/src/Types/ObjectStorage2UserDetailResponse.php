<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for user details.
 */
class ObjectStorage2UserDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?string $arn
     */
    #[JsonProperty('arn')]
    public ?string $arn;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<ObjectStorage2AccessKeyDetailResponse> $accessKeys
     */
    #[JsonProperty('access_keys'), ArrayType([ObjectStorage2AccessKeyDetailResponse::class])]
    public ?array $accessKeys;

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
     * @var ?string $permissionsBoundary
     */
    #[JsonProperty('permissions_boundary')]
    public ?string $permissionsBoundary;

    /**
     * @param array{
     *   username?: ?string,
     *   arn?: ?string,
     *   createdAt?: ?DateTime,
     *   accessKeys?: ?array<ObjectStorage2AccessKeyDetailResponse>,
     *   policies?: ?array<ObjectStorage2PolicyAttachmentResponse>,
     *   tags?: ?array<ObjectStorage2TagResponse>,
     *   permissionsBoundary?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->username = $values['username'] ?? null;
        $this->arn = $values['arn'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->accessKeys = $values['accessKeys'] ?? null;
        $this->policies = $values['policies'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->permissionsBoundary = $values['permissionsBoundary'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

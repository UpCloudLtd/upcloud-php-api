<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;
use Upcloud\Core\Types\ArrayType;

/**
 * A token.
 */
class AccountTokensGetTokenResponse extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name The name of the token. Does not need to be unique.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $createdAt Token creation time.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $expiresAt The requested expiry time of the token, in RFC3339 format (2025-10-12T07:20:50.52Z). Needs to be in the future and maximum of 1 year in the future.
     */
    #[JsonProperty('expires_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var ?DateTime $lastUsedAt The last time the token was used.
     */
    #[JsonProperty('last_used_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUsedAt;

    /**
     * @var ?bool $canCreateTokens Whether the token can create other tokens.
     */
    #[JsonProperty('can_create_tokens')]
    public ?bool $canCreateTokens;

    /**
     * @var ?bool $gui Token is for internal GUI use. Can not be used externally.
     */
    #[JsonProperty('gui')]
    public ?bool $gui;

    /**
     * @var ?array<string> $allowedIpRanges List of IP ranges that are allowed to authenticate with the token. Empty list denies access from everywhere. If unset, the default list will be the IP filters of the account. If no IP filters are defined for the account either, the default will be ["0.0.0.0/0", "::/0"], i.e. allow from any address.
     */
    #[JsonProperty('allowed_ip_ranges'), ArrayType(['string'])]
    public ?array $allowedIpRanges;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   createdAt?: ?DateTime,
     *   expiresAt?: ?DateTime,
     *   lastUsedAt?: ?DateTime,
     *   canCreateTokens?: ?bool,
     *   gui?: ?bool,
     *   allowedIpRanges?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->lastUsedAt = $values['lastUsedAt'] ?? null;
        $this->canCreateTokens = $values['canCreateTokens'] ?? null;
        $this->gui = $values['gui'] ?? null;
        $this->allowedIpRanges = $values['allowedIpRanges'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

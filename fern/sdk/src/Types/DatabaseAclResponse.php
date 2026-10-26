<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for an Access Control List (ACL) entry.
 */
class DatabaseAclResponse extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier for the ACL entry.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $permission The permission level for the ACL entry.
     */
    #[JsonProperty('permission')]
    public ?string $permission;

    /**
     * @var ?string $topic The topic associated with the ACL entry.
     */
    #[JsonProperty('topic')]
    public ?string $topic;

    /**
     * @var ?string $username The username associated with the ACL entry.
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   id?: ?string,
     *   permission?: ?string,
     *   topic?: ?string,
     *   username?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->permission = $values['permission'] ?? null;
        $this->topic = $values['topic'] ?? null;
        $this->username = $values['username'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

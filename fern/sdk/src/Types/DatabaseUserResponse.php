<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for a user response.
 */
class DatabaseUserResponse extends JsonSerializableType
{
    /**
     * @var ?string $username The username of the user.
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?string $password The password of the user.
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * @var ?string $authentication The authentication method used by the user.
     */
    #[JsonProperty('authentication')]
    public ?string $authentication;

    /**
     * @var ?string $type The type of the user.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?DatabasePgAccessControlResponse $pgAccessControl
     */
    #[JsonProperty('pg_access_control')]
    public ?DatabasePgAccessControlResponse $pgAccessControl;

    /**
     * @var ?DatabaseRedisAccessControlResponse $redisAccessControl
     */
    #[JsonProperty('redis_access_control')]
    public ?DatabaseRedisAccessControlResponse $redisAccessControl;

    /**
     * @var ?DatabaseValkeyAccessControlResponse $valkeyAccessControl
     */
    #[JsonProperty('valkey_access_control')]
    public ?DatabaseValkeyAccessControlResponse $valkeyAccessControl;

    /**
     * @var ?DatabaseOpenSearchAccessControlResponse $opensearchAccessControl
     */
    #[JsonProperty('opensearch_access_control')]
    public ?DatabaseOpenSearchAccessControlResponse $opensearchAccessControl;

    /**
     * @param array{
     *   username?: ?string,
     *   password?: ?string,
     *   authentication?: ?string,
     *   type?: ?string,
     *   pgAccessControl?: ?DatabasePgAccessControlResponse,
     *   redisAccessControl?: ?DatabaseRedisAccessControlResponse,
     *   valkeyAccessControl?: ?DatabaseValkeyAccessControlResponse,
     *   opensearchAccessControl?: ?DatabaseOpenSearchAccessControlResponse,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->username = $values['username'] ?? null;
        $this->password = $values['password'] ?? null;
        $this->authentication = $values['authentication'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->pgAccessControl = $values['pgAccessControl'] ?? null;
        $this->redisAccessControl = $values['redisAccessControl'] ?? null;
        $this->valkeyAccessControl = $values['valkeyAccessControl'] ?? null;
        $this->opensearchAccessControl = $values['opensearchAccessControl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\ServerLegacyBoolean;
use Upcloud\Core\Json\JsonProperty;

class ServerRebuildServerRebuildLoginUser extends JsonSerializableType
{
    /**
     * @var ?value-of<ServerLegacyBoolean> $createPassword
     */
    #[JsonProperty('create_password')]
    public ?string $createPassword;

    /**
     * @var ?ServerRebuildServerRebuildLoginUserSshKeys $sshKeys
     */
    #[JsonProperty('ssh_keys')]
    public ?ServerRebuildServerRebuildLoginUserSshKeys $sshKeys;

    /**
     * @var ?string $username Login username.
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   createPassword?: ?value-of<ServerLegacyBoolean>,
     *   sshKeys?: ?ServerRebuildServerRebuildLoginUserSshKeys,
     *   username?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createPassword = $values['createPassword'] ?? null;
        $this->sshKeys = $values['sshKeys'] ?? null;
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

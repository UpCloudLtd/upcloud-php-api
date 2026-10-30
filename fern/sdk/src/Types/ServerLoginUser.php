<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Login user configuration for Cloud Server creation
 */
class ServerLoginUser extends JsonSerializableType
{
    /**
     * @var ?value-of<ServerBooleanYesno> $createPassword
     */
    #[JsonProperty('create_password')]
    public ?string $createPassword;

    /**
     * @var ?ServerLoginUserSshKeys $sshKeys
     */
    #[JsonProperty('ssh_keys')]
    public ?ServerLoginUserSshKeys $sshKeys;

    /**
     * @var ?string $username Username for logging in to the Cloud Server
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   createPassword?: ?value-of<ServerBooleanYesno>,
     *   sshKeys?: ?ServerLoginUserSshKeys,
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

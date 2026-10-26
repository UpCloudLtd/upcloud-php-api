<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerLoginUserSshKeys extends JsonSerializableType
{
    /**
     * @var array<string> $sshKey
     */
    #[JsonProperty('ssh_key'), ArrayType(['string'])]
    public array $sshKey;

    /**
     * @param array{
     *   sshKey: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sshKey = $values['sshKey'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

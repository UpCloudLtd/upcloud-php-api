<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryCredentialsResponse extends JsonSerializableType
{
    /**
     * @var string $registryUrl URL of the container registry
     */
    #[JsonProperty('registry_url')]
    public string $registryUrl;

    /**
     * @var string $username Username for registry authentication
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var string $password Password for registry authentication
     */
    #[JsonProperty('password')]
    public string $password;

    /**
     * @var string $dockerLoginCommand Pre-formatted docker login command
     */
    #[JsonProperty('docker_login_command')]
    public string $dockerLoginCommand;

    /**
     * @param array{
     *   registryUrl: string,
     *   username: string,
     *   password: string,
     *   dockerLoginCommand: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->registryUrl = $values['registryUrl'];
        $this->username = $values['username'];
        $this->password = $values['password'];
        $this->dockerLoginCommand = $values['dockerLoginCommand'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

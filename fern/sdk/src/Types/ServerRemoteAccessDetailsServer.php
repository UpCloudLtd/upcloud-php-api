<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class ServerRemoteAccessDetailsServer extends JsonSerializableType
{
    /**
     * @var value-of<ServerState> $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var string $vncHost
     */
    #[JsonProperty('vnc_host')]
    public string $vncHost;

    /**
     * @var string $vncPassword
     */
    #[JsonProperty('vnc_password')]
    public string $vncPassword;

    /**
     * @var (
     *    int
     *   |value-of<ServerVncPortOne>
     * ) $vncPort
     */
    #[JsonProperty('vnc_port'), Union('integer', 'string')]
    public int|string $vncPort;

    /**
     * @var value-of<ServerRemoteAccessType> $remoteAccessType
     */
    #[JsonProperty('remote_access_type')]
    public string $remoteAccessType;

    /**
     * @var value-of<ServerRemoteAccessEnabled> $remoteAccessEnabled
     */
    #[JsonProperty('remote_access_enabled')]
    public string $remoteAccessEnabled;

    /**
     * @var string $remoteAccessPassword
     */
    #[JsonProperty('remote_access_password')]
    public string $remoteAccessPassword;

    /**
     * @param array{
     *   state: value-of<ServerState>,
     *   vncHost: string,
     *   vncPassword: string,
     *   vncPort: (
     *    int
     *   |value-of<ServerVncPortOne>
     * ),
     *   remoteAccessType: value-of<ServerRemoteAccessType>,
     *   remoteAccessEnabled: value-of<ServerRemoteAccessEnabled>,
     *   remoteAccessPassword: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->state = $values['state'];
        $this->vncHost = $values['vncHost'];
        $this->vncPassword = $values['vncPassword'];
        $this->vncPort = $values['vncPort'];
        $this->remoteAccessType = $values['remoteAccessType'];
        $this->remoteAccessEnabled = $values['remoteAccessEnabled'];
        $this->remoteAccessPassword = $values['remoteAccessPassword'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

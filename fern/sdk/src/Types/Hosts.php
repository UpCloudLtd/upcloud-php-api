<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Container object for available private cloud hosts.
 */
class Hosts extends JsonSerializableType
{
    /**
     * @var HostsHosts $hosts Collection of available private cloud hosts.
     */
    #[JsonProperty('hosts')]
    public HostsHosts $hosts;

    /**
     * @param array{
     *   hosts: HostsHosts,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->hosts = $values['hosts'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

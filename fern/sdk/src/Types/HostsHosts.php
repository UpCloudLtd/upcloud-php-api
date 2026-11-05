<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Collection of available private cloud hosts.
 */
class HostsHosts extends JsonSerializableType
{
    /**
     * @var array<HostDetails> $host Available private cloud hosts.
     */
    #[JsonProperty('host'), ArrayType([HostDetails::class])]
    public array $host;

    /**
     * @param array{
     *   host: array<HostDetails>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->host = $values['host'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

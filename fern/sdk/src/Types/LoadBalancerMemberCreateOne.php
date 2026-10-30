<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMemberCreateOne extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMemberCreateOneType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $ip Fallback IP address (IPv4 or IPv6)
     */
    #[JsonProperty('ip')]
    public ?string $ip;

    /**
     * @var ?int $port Target Port
     */
    #[JsonProperty('port')]
    public ?int $port;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMemberCreateOneType>,
     *   ip?: ?string,
     *   port?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->ip = $values['ip'] ?? null;
        $this->port = $values['port'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

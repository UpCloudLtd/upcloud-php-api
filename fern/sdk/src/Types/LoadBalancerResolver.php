<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents a DNS resolver configuration for a load balancer service, defining the nameservers, retry behavior, and caching rules used to resolve backend hostnames.
 */
class LoadBalancerResolver extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name assigned to the DNS resolver.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<string> $nameservers List of DNS nameserver addresses (with optional port) used to resolve backend member hostnames.
     */
    #[JsonProperty('nameservers'), ArrayType(['string'])]
    public array $nameservers;

    /**
     * @var int $retries Number of retry attempts for failed DNS queries.
     */
    #[JsonProperty('retries')]
    public int $retries;

    /**
     * @var int $timeout Initial timeout in milliseconds for DNS query responses.
     */
    #[JsonProperty('timeout')]
    public int $timeout;

    /**
     * @var int $timeoutRetry Timeout in milliseconds for DNS query retry attempts.
     */
    #[JsonProperty('timeout_retry')]
    public int $timeoutRetry;

    /**
     * @var int $cacheValid Time in seconds to cache valid (successful) DNS responses.
     */
    #[JsonProperty('cache_valid')]
    public int $cacheValid;

    /**
     * @var int $cacheInvalid Time in seconds to cache invalid (failed) DNS responses.
     */
    #[JsonProperty('cache_invalid')]
    public int $cacheInvalid;

    /**
     * @var DateTime $createdAt Timestamp when the DNS resolver was created (RFC 3339 format).
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the DNS resolver was last updated (RFC 3339 format).
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   name: string,
     *   nameservers: array<string>,
     *   retries: int,
     *   timeout: int,
     *   timeoutRetry: int,
     *   cacheValid: int,
     *   cacheInvalid: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->nameservers = $values['nameservers'];
        $this->retries = $values['retries'];
        $this->timeout = $values['timeout'];
        $this->timeoutRetry = $values['timeoutRetry'];
        $this->cacheValid = $values['cacheValid'];
        $this->cacheInvalid = $values['cacheInvalid'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class LoadBalancerResolverModify extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the resolver
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $nameservers Nameservers
     */
    #[JsonProperty('nameservers'), ArrayType(['string'])]
    public ?array $nameservers;

    /**
     * @var ?int $retries Number of retries on failure
     */
    #[JsonProperty('retries')]
    public ?int $retries;

    /**
     * @var ?int $timeout Timeout for the query in seconds
     */
    #[JsonProperty('timeout')]
    public ?int $timeout;

    /**
     * @var ?int $timeoutRetry Timeout for the query retries in seconds
     */
    #[JsonProperty('timeout_retry')]
    public ?int $timeoutRetry;

    /**
     * @var ?int $cacheValid Time in seconds to cache valid results
     */
    #[JsonProperty('cache_valid')]
    public ?int $cacheValid;

    /**
     * @var ?int $cacheInvalid Time in seconds to cache invalid results
     */
    #[JsonProperty('cache_invalid')]
    public ?int $cacheInvalid;

    /**
     * @param array{
     *   name?: ?string,
     *   nameservers?: ?array<string>,
     *   retries?: ?int,
     *   timeout?: ?int,
     *   timeoutRetry?: ?int,
     *   cacheValid?: ?int,
     *   cacheInvalid?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->nameservers = $values['nameservers'] ?? null;
        $this->retries = $values['retries'] ?? null;
        $this->timeout = $values['timeout'] ?? null;
        $this->timeoutRetry = $values['timeoutRetry'] ?? null;
        $this->cacheValid = $values['cacheValid'] ?? null;
        $this->cacheInvalid = $values['cacheInvalid'] ?? null;
    }
}

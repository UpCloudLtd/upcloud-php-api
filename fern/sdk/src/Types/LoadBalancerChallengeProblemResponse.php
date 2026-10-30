<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Represents a problem encountered during ACME challenge validation for a specific hostname. Includes detailed error information following the Problem Details (RFC7807) format.
 */
class LoadBalancerChallengeProblemResponse extends JsonSerializableType
{
    /**
     * @var string $hostname The hostname for which the ACME challenge validation failed or encountered an error.
     */
    #[JsonProperty('hostname')]
    public string $hostname;

    /**
     * @var LoadBalancerProblemResponse $problem
     */
    #[JsonProperty('problem')]
    public LoadBalancerProblemResponse $problem;

    /**
     * @param array{
     *   hostname: string,
     *   problem: LoadBalancerProblemResponse,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->hostname = $values['hostname'];
        $this->problem = $values['problem'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

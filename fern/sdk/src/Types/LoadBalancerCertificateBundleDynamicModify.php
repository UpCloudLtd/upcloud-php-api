<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Load Balancer certificate bundle dynamic type
 */
class LoadBalancerCertificateBundleDynamicModify extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the bundle
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $hostnames Array of hostnames
     */
    #[JsonProperty('hostnames'), ArrayType(['string'])]
    public ?array $hostnames;

    /**
     * @var ?array<LoadBalancerLabelCreate> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([LoadBalancerLabelCreate::class])]
    public ?array $labels;

    /**
     * @var ?string $challengeKey Unique key used for ACME DNS challenge validation when obtaining certificates dynamically.
     */
    #[JsonProperty('challenge_key')]
    public ?string $challengeKey;

    /**
     * @param array{
     *   name?: ?string,
     *   hostnames?: ?array<string>,
     *   labels?: ?array<LoadBalancerLabelCreate>,
     *   challengeKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->hostnames = $values['hostnames'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->challengeKey = $values['challengeKey'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

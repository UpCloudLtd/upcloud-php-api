<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Load Balancer certificate bundle manual type
 */
class LoadBalancerCertificateBundleManualModify extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the bundle
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $certificate Certificate
     */
    #[JsonProperty('certificate')]
    public ?string $certificate;

    /**
     * @var ?string $intermediates Intermediate certificates
     */
    #[JsonProperty('intermediates')]
    public ?string $intermediates;

    /**
     * @var ?string $privateKey Private key
     */
    #[JsonProperty('private_key')]
    public ?string $privateKey;

    /**
     * @var ?array<LoadBalancerLabelCreate> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([LoadBalancerLabelCreate::class])]
    public ?array $labels;

    /**
     * @param array{
     *   name?: ?string,
     *   certificate?: ?string,
     *   intermediates?: ?string,
     *   privateKey?: ?string,
     *   labels?: ?array<LoadBalancerLabelCreate>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->certificate = $values['certificate'] ?? null;
        $this->intermediates = $values['intermediates'] ?? null;
        $this->privateKey = $values['privateKey'] ?? null;
        $this->labels = $values['labels'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

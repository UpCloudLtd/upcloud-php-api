<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents a certificate bundle used in a load balancer TLS configuration. A bundle may be manually uploaded, dynamically issued via ACME, or represent an authority certificate. It includes certificate data, challenge details, and metadata about its lifecycle.
 */
class LoadBalancerCertificateBundle extends JsonSerializableType
{
    /**
     * @var string $uuid Unique identifier for the certificate bundle.
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var string $name Human-readable name assigned to the certificate bundle.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<LoadBalancerCertificateBundleTlsType> $tlsType The certificate bundle type. Determines how the certificate is provisioned and managed.
     */
    #[JsonProperty('tls_type')]
    public string $tlsType;

    /**
     * @var value-of<LoadBalancerCertificateBundleOperationalState> $operationalState Current operational state of the certificate bundle.
     */
    #[JsonProperty('operational_state')]
    public string $operationalState;

    /**
     * @var ?string $certificate PEM-encoded certificate data (base64).
     */
    #[JsonProperty('certificate')]
    public ?string $certificate;

    /**
     * @var ?string $intermediates PEM-encoded intermediate certificates (base64).
     */
    #[JsonProperty('intermediates')]
    public ?string $intermediates;

    /**
     * @var ?array<string> $hostnames List of hostnames covered by this certificate bundle.
     */
    #[JsonProperty('hostnames'), ArrayType(['string'])]
    public ?array $hostnames;

    /**
     * @var ?array<LoadBalancerChallengeProblemResponse> $challengeProblems Problems reported during ACME challenge validation.
     */
    #[JsonProperty('challenge_problems'), ArrayType([LoadBalancerChallengeProblemResponse::class])]
    public ?array $challengeProblems;

    /**
     * @var ?value-of<LoadBalancerCertificateBundleKeyType> $keyType Type of private key used for this certificate bundle.
     */
    #[JsonProperty('key_type')]
    public ?string $keyType;

    /**
     * @var ?array<LoadBalancerEmbeddedServiceResponse> $services List of load balancer services that use this certificate bundle.
     */
    #[JsonProperty('services'), ArrayType([LoadBalancerEmbeddedServiceResponse::class])]
    public ?array $services;

    /**
     * @var ?DateTime $notBefore The start date and time of certificate validity.
     */
    #[JsonProperty('not_before'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $notBefore;

    /**
     * @var ?DateTime $notAfter The expiration date and time of certificate validity.
     */
    #[JsonProperty('not_after'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $notAfter;

    /**
     * @var ?array<LoadBalancerLabelResponse> $labels List of labels attached to this certificate bundle.
     */
    #[JsonProperty('labels'), ArrayType([LoadBalancerLabelResponse::class])]
    public ?array $labels;

    /**
     * @var DateTime $createdAt Timestamp when this certificate bundle was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when this certificate bundle was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   uuid: string,
     *   name: string,
     *   tlsType: value-of<LoadBalancerCertificateBundleTlsType>,
     *   operationalState: value-of<LoadBalancerCertificateBundleOperationalState>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   certificate?: ?string,
     *   intermediates?: ?string,
     *   hostnames?: ?array<string>,
     *   challengeProblems?: ?array<LoadBalancerChallengeProblemResponse>,
     *   keyType?: ?value-of<LoadBalancerCertificateBundleKeyType>,
     *   services?: ?array<LoadBalancerEmbeddedServiceResponse>,
     *   notBefore?: ?DateTime,
     *   notAfter?: ?DateTime,
     *   labels?: ?array<LoadBalancerLabelResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
        $this->name = $values['name'];
        $this->tlsType = $values['tlsType'];
        $this->operationalState = $values['operationalState'];
        $this->certificate = $values['certificate'] ?? null;
        $this->intermediates = $values['intermediates'] ?? null;
        $this->hostnames = $values['hostnames'] ?? null;
        $this->challengeProblems = $values['challengeProblems'] ?? null;
        $this->keyType = $values['keyType'] ?? null;
        $this->services = $values['services'] ?? null;
        $this->notBefore = $values['notBefore'] ?? null;
        $this->notAfter = $values['notAfter'] ?? null;
        $this->labels = $values['labels'] ?? null;
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

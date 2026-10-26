<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class KubernetesAuthenticationIssuerConfig extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $issuerUrl
     */
    #[JsonProperty('issuer_url')]
    public string $issuerUrl;

    /**
     * @var ?string $discoveryUrl
     */
    #[JsonProperty('discovery_url')]
    public ?string $discoveryUrl;

    /**
     * @var array<string> $audiences Accepted audiences for tokens from this issuer. The first audience is used as the OIDC client id in generated kubeconfigs by default; the OIDC kubeconfig endpoint's `audience` query parameter can select a different one.
     */
    #[JsonProperty('audiences'), ArrayType(['string'])]
    public array $audiences;

    /**
     * @var ?value-of<KubernetesAuthenticationIssuerConfigAudienceMatchPolicy> $audienceMatchPolicy
     */
    #[JsonProperty('audience_match_policy')]
    public ?string $audienceMatchPolicy;

    /**
     * @var ?string $certificateAuthority Base64-encoded PEM certificate authority bundle.
     */
    #[JsonProperty('certificate_authority')]
    public ?string $certificateAuthority;

    /**
     * @var ?KubernetesClaimMappings $claimMappings
     */
    #[JsonProperty('claim_mappings')]
    public ?KubernetesClaimMappings $claimMappings;

    /**
     * @var ?array<KubernetesClaimValidationRule> $claimValidationRules
     */
    #[JsonProperty('claim_validation_rules'), ArrayType([KubernetesClaimValidationRule::class])]
    public ?array $claimValidationRules;

    /**
     * @var ?array<KubernetesUserValidationRule> $userValidationRules
     */
    #[JsonProperty('user_validation_rules'), ArrayType([KubernetesUserValidationRule::class])]
    public ?array $userValidationRules;

    /**
     * @param array{
     *   name: string,
     *   issuerUrl: string,
     *   audiences: array<string>,
     *   discoveryUrl?: ?string,
     *   audienceMatchPolicy?: ?value-of<KubernetesAuthenticationIssuerConfigAudienceMatchPolicy>,
     *   certificateAuthority?: ?string,
     *   claimMappings?: ?KubernetesClaimMappings,
     *   claimValidationRules?: ?array<KubernetesClaimValidationRule>,
     *   userValidationRules?: ?array<KubernetesUserValidationRule>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->issuerUrl = $values['issuerUrl'];
        $this->discoveryUrl = $values['discoveryUrl'] ?? null;
        $this->audiences = $values['audiences'];
        $this->audienceMatchPolicy = $values['audienceMatchPolicy'] ?? null;
        $this->certificateAuthority = $values['certificateAuthority'] ?? null;
        $this->claimMappings = $values['claimMappings'] ?? null;
        $this->claimValidationRules = $values['claimValidationRules'] ?? null;
        $this->userValidationRules = $values['userValidationRules'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

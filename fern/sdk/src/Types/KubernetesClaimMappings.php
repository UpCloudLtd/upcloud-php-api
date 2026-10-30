<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Rules for mapping token claims to Kubernetes user attributes.
 */
class KubernetesClaimMappings extends JsonSerializableType
{
    /**
     * @var ?KubernetesPrefixedClaimOrExpression $username
     */
    #[JsonProperty('username')]
    public ?KubernetesPrefixedClaimOrExpression $username;

    /**
     * @var ?KubernetesPrefixedClaimOrExpression $groups
     */
    #[JsonProperty('groups')]
    public ?KubernetesPrefixedClaimOrExpression $groups;

    /**
     * @var ?KubernetesClaimOrExpression $uid
     */
    #[JsonProperty('uid')]
    public ?KubernetesClaimOrExpression $uid;

    /**
     * @var ?array<KubernetesExtraMapping> $extra
     */
    #[JsonProperty('extra'), ArrayType([KubernetesExtraMapping::class])]
    public ?array $extra;

    /**
     * @param array{
     *   username?: ?KubernetesPrefixedClaimOrExpression,
     *   groups?: ?KubernetesPrefixedClaimOrExpression,
     *   uid?: ?KubernetesClaimOrExpression,
     *   extra?: ?array<KubernetesExtraMapping>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->username = $values['username'] ?? null;
        $this->groups = $values['groups'] ?? null;
        $this->uid = $values['uid'] ?? null;
        $this->extra = $values['extra'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

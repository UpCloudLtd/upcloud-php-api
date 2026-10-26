<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Response schema for a list of firewall ruleset rules.
 */
class FirewallRulesetFirewallRuleListResponse extends JsonSerializableType
{
    /**
     * @var array<FirewallRulesetRuleDetailResponse> $rules
     */
    #[JsonProperty('rules'), ArrayType([FirewallRulesetRuleDetailResponse::class])]
    public array $rules;

    /**
     * @param array{
     *   rules: array<FirewallRulesetRuleDetailResponse>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rules = $values['rules'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

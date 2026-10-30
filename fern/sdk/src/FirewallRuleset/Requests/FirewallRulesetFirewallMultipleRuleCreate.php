<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FirewallRulesetFirewallRuleCreate;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class FirewallRulesetFirewallMultipleRuleCreate extends JsonSerializableType
{
    /**
     * @var array<FirewallRulesetFirewallRuleCreate> $rules
     */
    #[JsonProperty('rules'), ArrayType([FirewallRulesetFirewallRuleCreate::class])]
    public array $rules;

    /**
     * @param array{
     *   rules: array<FirewallRulesetFirewallRuleCreate>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rules = $values['rules'];
    }
}

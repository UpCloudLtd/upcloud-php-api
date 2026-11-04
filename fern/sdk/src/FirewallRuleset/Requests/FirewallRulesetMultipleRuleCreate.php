<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FirewallRulesetRuleCreate;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class FirewallRulesetMultipleRuleCreate extends JsonSerializableType
{
    /**
     * @var array<FirewallRulesetRuleCreate> $rules
     */
    #[JsonProperty('rules'), ArrayType([FirewallRulesetRuleCreate::class])]
    public array $rules;

    /**
     * @param array{
     *   rules: array<FirewallRulesetRuleCreate>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rules = $values['rules'];
    }
}

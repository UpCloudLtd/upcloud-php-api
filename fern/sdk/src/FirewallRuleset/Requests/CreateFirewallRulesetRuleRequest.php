<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FirewallRulesetRuleCreate;

class CreateFirewallRulesetRuleRequest extends JsonSerializableType
{
    /**
     * @var FirewallRulesetRuleCreate $body
     */
    public FirewallRulesetRuleCreate $body;

    /**
     * @param array{
     *   body: FirewallRulesetRuleCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

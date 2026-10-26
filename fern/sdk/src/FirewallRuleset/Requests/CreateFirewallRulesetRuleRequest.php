<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FirewallRulesetFirewallRuleCreate;

class CreateFirewallRulesetRuleRequest extends JsonSerializableType
{
    /**
     * @var FirewallRulesetFirewallRuleCreate $body
     */
    public FirewallRulesetFirewallRuleCreate $body;

    /**
     * @param array{
     *   body: FirewallRulesetFirewallRuleCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

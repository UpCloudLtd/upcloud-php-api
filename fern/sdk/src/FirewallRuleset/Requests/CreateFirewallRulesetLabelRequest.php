<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FirewallRulesetCreateLabel;

class CreateFirewallRulesetLabelRequest extends JsonSerializableType
{
    /**
     * @var FirewallRulesetCreateLabel $body
     */
    public FirewallRulesetCreateLabel $body;

    /**
     * @param array{
     *   body: FirewallRulesetCreateLabel,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

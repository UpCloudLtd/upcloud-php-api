<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\FirewallRulesetLabelCreate;

class CreateFirewallRulesetLabelRequest extends JsonSerializableType
{
    /**
     * @var FirewallRulesetLabelCreate $body
     */
    public FirewallRulesetLabelCreate $body;

    /**
     * @param array{
     *   body: FirewallRulesetLabelCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}

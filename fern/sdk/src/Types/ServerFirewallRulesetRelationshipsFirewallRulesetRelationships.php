<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ServerFirewallRulesetRelationshipsFirewallRulesetRelationships extends JsonSerializableType
{
    /**
     * @var array<ServerFirewallRulesetRelationshipDetails> $private Private firewall rulesets attached to the Cloud Server.
     */
    #[JsonProperty('private'), ArrayType([ServerFirewallRulesetRelationshipDetails::class])]
    public array $private;

    /**
     * @param array{
     *   private: array<ServerFirewallRulesetRelationshipDetails>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->private = $values['private'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

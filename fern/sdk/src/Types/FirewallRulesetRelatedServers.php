<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Accessible Cloud Servers related to a private firewall ruleset and their private ruleset relationships.
 */
class FirewallRulesetRelatedServers extends JsonSerializableType
{
    /**
     * @var array<FirewallRulesetRelatedServersServersItem> $servers Cloud Servers visible to the authenticated account that are related to the ruleset.
     */
    #[JsonProperty('servers'), ArrayType([FirewallRulesetRelatedServersServersItem::class])]
    public array $servers;

    /**
     * @param array{
     *   servers: array<FirewallRulesetRelatedServersServersItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->servers = $values['servers'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

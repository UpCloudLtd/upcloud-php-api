<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Relationship between a Cloud Server and a firewall ruleset.
 */
class ServerFirewallRulesetRelationship extends JsonSerializableType
{
    /**
     * @var string $firewallRulesetUuid
     */
    #[JsonProperty('firewall_ruleset_uuid')]
    public string $firewallRulesetUuid;

    /**
     * @var string $serverUuid
     */
    #[JsonProperty('server_uuid')]
    public string $serverUuid;

    /**
     * @var value-of<ServerFirewallRulesetRelationshipType> $type Network interface class to which the ruleset applies.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   firewallRulesetUuid: string,
     *   serverUuid: string,
     *   type: value-of<ServerFirewallRulesetRelationshipType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRulesetUuid = $values['firewallRulesetUuid'];
        $this->serverUuid = $values['serverUuid'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

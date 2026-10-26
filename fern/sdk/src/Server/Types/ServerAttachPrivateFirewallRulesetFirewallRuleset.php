<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Private firewall ruleset to attach.
 */
class ServerAttachPrivateFirewallRulesetFirewallRuleset extends JsonSerializableType
{
    /**
     * @var string $firewallRulesetUuid
     */
    #[JsonProperty('firewall_ruleset_uuid')]
    public string $firewallRulesetUuid;

    /**
     * @param array{
     *   firewallRulesetUuid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firewallRulesetUuid = $values['firewallRulesetUuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

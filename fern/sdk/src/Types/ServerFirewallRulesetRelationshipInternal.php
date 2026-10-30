<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Firewall ruleset relationship with Unix timestamps.
 */
class ServerFirewallRulesetRelationshipInternal extends JsonSerializableType
{
    /**
     * @var ?int $appliedVersion
     */
    #[JsonProperty('applied_version')]
    public ?int $appliedVersion;

    /**
     * @var int $createdAt
     */
    #[JsonProperty('created_at')]
    public int $createdAt;

    /**
     * @var string $firewallRulesetUuid
     */
    #[JsonProperty('firewall_ruleset_uuid')]
    public string $firewallRulesetUuid;

    /**
     * @var ?int $lastAppliedAt
     */
    #[JsonProperty('last_applied_at')]
    public ?int $lastAppliedAt;

    /**
     * @var string $serverUuid
     */
    #[JsonProperty('server_uuid')]
    public string $serverUuid;

    /**
     * @var value-of<ServerFirewallRulesetRelationshipInternalType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?int $updatedAt
     */
    #[JsonProperty('updated_at')]
    public ?int $updatedAt;

    /**
     * @var int $version
     */
    #[JsonProperty('version')]
    public int $version;

    /**
     * @param array{
     *   createdAt: int,
     *   firewallRulesetUuid: string,
     *   serverUuid: string,
     *   type: value-of<ServerFirewallRulesetRelationshipInternalType>,
     *   version: int,
     *   appliedVersion?: ?int,
     *   lastAppliedAt?: ?int,
     *   updatedAt?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->appliedVersion = $values['appliedVersion'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->firewallRulesetUuid = $values['firewallRulesetUuid'];
        $this->lastAppliedAt = $values['lastAppliedAt'] ?? null;
        $this->serverUuid = $values['serverUuid'];
        $this->type = $values['type'];
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->version = $values['version'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

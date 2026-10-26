<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Detailed private firewall ruleset relationship for a Cloud Server.
 */
class ServerFirewallRulesetRelationshipDetails extends JsonSerializableType
{
    /**
     * @var ?int $appliedVersion Ruleset version most recently applied to the Cloud Server.
     */
    #[JsonProperty('applied_version')]
    public ?int $appliedVersion;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var string $firewallRulesetUuid
     */
    #[JsonProperty('firewall_ruleset_uuid')]
    public string $firewallRulesetUuid;

    /**
     * @var ?DateTime $lastAppliedAt Time when this ruleset was last applied, or null if it has not been applied.
     */
    #[JsonProperty('last_applied_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastAppliedAt;

    /**
     * @var string $serverUuid
     */
    #[JsonProperty('server_uuid')]
    public string $serverUuid;

    /**
     * @var value-of<ServerFirewallRulesetRelationshipDetailsType> $type Network interface class to which the ruleset applies.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?DateTime $updatedAt Time when the relationship was last updated, or null if it has not been updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var int $version Ruleset version selected for the relationship.
     */
    #[JsonProperty('version')]
    public int $version;

    /**
     * @param array{
     *   createdAt: DateTime,
     *   firewallRulesetUuid: string,
     *   serverUuid: string,
     *   type: value-of<ServerFirewallRulesetRelationshipDetailsType>,
     *   version: int,
     *   appliedVersion?: ?int,
     *   lastAppliedAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
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

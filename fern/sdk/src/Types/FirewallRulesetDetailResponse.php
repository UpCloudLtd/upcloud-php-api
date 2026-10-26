<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Response schema for firewall ruleset details, including UUID, name, description, stateful, enabled, labels and serverUUID.
 */
class FirewallRulesetDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name Name of the firewall ruleset
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $description Description of the firewall ruleset
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $stateful
     */
    #[JsonProperty('stateful')]
    public ?bool $stateful;

    /**
     * @var ?int $version
     */
    #[JsonProperty('version')]
    public ?int $version;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?bool $defaultDnsRulesEnabled
     */
    #[JsonProperty('default_dns_rules_enabled')]
    public ?bool $defaultDnsRulesEnabled;

    /**
     * @var ?array<FirewallRulesetCreateLabel> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([FirewallRulesetCreateLabel::class])]
    public ?array $labels;

    /**
     * @var ?string $serverUuid
     */
    #[JsonProperty('server_uuid')]
    public ?string $serverUuid;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   description?: ?string,
     *   stateful?: ?bool,
     *   version?: ?int,
     *   enabled?: ?bool,
     *   defaultDnsRulesEnabled?: ?bool,
     *   labels?: ?array<FirewallRulesetCreateLabel>,
     *   serverUuid?: ?string,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->stateful = $values['stateful'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->defaultDnsRulesEnabled = $values['defaultDnsRulesEnabled'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->serverUuid = $values['serverUuid'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

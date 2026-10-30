<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FirewallRulesetCreateLabel;
use Upcloud\Core\Types\ArrayType;

class CreateFirewallRuleset extends JsonSerializableType
{
    /**
     * @var string $name Name of the firewall ruleset
     */
    #[JsonProperty('name')]
    public string $name;

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
     * @param array{
     *   name: string,
     *   description?: ?string,
     *   stateful?: ?bool,
     *   enabled?: ?bool,
     *   defaultDnsRulesEnabled?: ?bool,
     *   labels?: ?array<FirewallRulesetCreateLabel>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->stateful = $values['stateful'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->defaultDnsRulesEnabled = $values['defaultDnsRulesEnabled'] ?? null;
        $this->labels = $values['labels'] ?? null;
    }
}

<?php

namespace Upcloud\FirewallRuleset\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\FirewallRulesetCreateLabel;
use Upcloud\Core\Types\ArrayType;

class FirewallRulesetModify extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the ruleset
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $description Description of the firewall ruleset
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?array<FirewallRulesetCreateLabel> $labels Labels
     */
    #[JsonProperty('labels'), ArrayType([FirewallRulesetCreateLabel::class])]
    public ?array $labels;

    /**
     * @var ?bool $enabled Enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?bool $defaultDnsRulesEnabled
     */
    #[JsonProperty('default_dns_rules_enabled')]
    public ?bool $defaultDnsRulesEnabled;

    /**
     * @param array{
     *   name?: ?string,
     *   description?: ?string,
     *   labels?: ?array<FirewallRulesetCreateLabel>,
     *   enabled?: ?bool,
     *   defaultDnsRulesEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->defaultDnsRulesEnabled = $values['defaultDnsRulesEnabled'] ?? null;
    }
}

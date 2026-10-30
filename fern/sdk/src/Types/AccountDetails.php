<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Detailed account information and limits.
 */
class AccountDetails extends JsonSerializableType
{
    /**
     * @var AccountResourceLimits $resourceLimits
     */
    #[JsonProperty('resource_limits')]
    public AccountResourceLimits $resourceLimits;

    /**
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var ?float $credits
     */
    #[JsonProperty('credits')]
    public ?float $credits;

    /**
     * @var ?AccountCreditsBreakdown $creditsBreakdown
     */
    #[JsonProperty('credits_breakdown')]
    public ?AccountCreditsBreakdown $creditsBreakdown;

    /**
     * @var ?int $trialMode
     */
    #[JsonProperty('trial_mode')]
    public ?int $trialMode;

    /**
     * @param array{
     *   resourceLimits: AccountResourceLimits,
     *   username: string,
     *   credits?: ?float,
     *   creditsBreakdown?: ?AccountCreditsBreakdown,
     *   trialMode?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resourceLimits = $values['resourceLimits'];
        $this->username = $values['username'];
        $this->credits = $values['credits'] ?? null;
        $this->creditsBreakdown = $values['creditsBreakdown'] ?? null;
        $this->trialMode = $values['trialMode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

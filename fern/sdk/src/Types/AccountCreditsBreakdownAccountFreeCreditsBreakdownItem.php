<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class AccountCreditsBreakdownAccountFreeCreditsBreakdownItem extends JsonSerializableType
{
    /**
     * @var string $freeCreditType Type identifier for the free credit grant.
     */
    #[JsonProperty('free_credit_type')]
    public string $freeCreditType;

    /**
     * @var float $freeCredits Amount of free credits.
     */
    #[JsonProperty('free_credits')]
    public float $freeCredits;

    /**
     * @var ?DateTime $freeCreditsExpire Expiry date-time of the free credits in ISO 8601 format. Absent if the credits do not expire.
     */
    #[JsonProperty('free_credits_expire'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $freeCreditsExpire;

    /**
     * @param array{
     *   freeCreditType: string,
     *   freeCredits: float,
     *   freeCreditsExpire?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->freeCreditType = $values['freeCreditType'];
        $this->freeCredits = $values['freeCredits'];
        $this->freeCreditsExpire = $values['freeCreditsExpire'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

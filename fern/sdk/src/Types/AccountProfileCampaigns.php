<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class AccountProfileCampaigns extends JsonSerializableType
{
    /**
     * @var array<mixed> $campaign
     */
    #[JsonProperty('campaign'), ArrayType(['mixed'])]
    public array $campaign;

    /**
     * @param array{
     *   campaign: array<mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->campaign = $values['campaign'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

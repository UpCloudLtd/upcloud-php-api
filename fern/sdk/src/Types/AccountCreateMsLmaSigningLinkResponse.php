<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for Microsoft LMA signing link creation.
 */
class AccountCreateMsLmaSigningLinkResponse extends JsonSerializableType
{
    /**
     * @var ?AccountCreateMsLmaSigningLinkResponseSigningStatus $signingStatus
     */
    #[JsonProperty('signing_status')]
    public ?AccountCreateMsLmaSigningLinkResponseSigningStatus $signingStatus;

    /**
     * @param array{
     *   signingStatus?: ?AccountCreateMsLmaSigningLinkResponseSigningStatus,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->signingStatus = $values['signingStatus'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class AccountCreateMsLmaSigningLinkResponseSigningStatus extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $initiated
     */
    #[JsonProperty('initiated'), Date(Date::TYPE_DATETIME)]
    public DateTime $initiated;

    /**
     * @var DateTime $signedAt
     */
    #[JsonProperty('signed_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $signedAt;

    /**
     * @var string $signingLink
     */
    #[JsonProperty('signing_link')]
    public string $signingLink;

    /**
     * @var value-of<AccountCreateMsLmaSigningLinkResponseSigningStatusState> $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @param array{
     *   id: string,
     *   initiated: DateTime,
     *   signedAt: DateTime,
     *   signingLink: string,
     *   state: value-of<AccountCreateMsLmaSigningLinkResponseSigningStatusState>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->initiated = $values['initiated'];
        $this->signedAt = $values['signedAt'];
        $this->signingLink = $values['signingLink'];
        $this->state = $values['state'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

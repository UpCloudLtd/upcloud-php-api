<?php

namespace Upcloud\Partner\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Partner\Types\PartnerCreateAccountContactDetails;

class PartnerCreateAccount extends JsonSerializableType
{
    /**
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var string $password
     */
    #[JsonProperty('password')]
    public string $password;

    /**
     * @var ?PartnerCreateAccountContactDetails $contactDetails
     */
    #[JsonProperty('contact_details')]
    public ?PartnerCreateAccountContactDetails $contactDetails;

    /**
     * @param array{
     *   username: string,
     *   password: string,
     *   contactDetails?: ?PartnerCreateAccountContactDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->username = $values['username'];
        $this->password = $values['password'];
        $this->contactDetails = $values['contactDetails'] ?? null;
    }
}

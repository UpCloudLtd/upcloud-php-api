<?php

namespace Upcloud\Partner\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class PartnerCreateAccountContactDetails extends JsonSerializableType
{
    /**
     * @var ?string $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?string $city
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $company
     */
    #[JsonProperty('company')]
    public ?string $company;

    /**
     * @var string $country
     */
    #[JsonProperty('country')]
    public string $country;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $firstName
     */
    #[JsonProperty('first_name')]
    public string $firstName;

    /**
     * @var string $lastName
     */
    #[JsonProperty('last_name')]
    public string $lastName;

    /**
     * @var string $phone
     */
    #[JsonProperty('phone')]
    public string $phone;

    /**
     * @var ?string $postalCode
     */
    #[JsonProperty('postal_code')]
    public ?string $postalCode;

    /**
     * @var ?string $state State or province, if applicable. Required for some countries.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $vatNumber
     */
    #[JsonProperty('vat_number')]
    public ?string $vatNumber;

    /**
     * @param array{
     *   country: string,
     *   email: string,
     *   firstName: string,
     *   lastName: string,
     *   phone: string,
     *   address?: ?string,
     *   city?: ?string,
     *   company?: ?string,
     *   postalCode?: ?string,
     *   state?: ?string,
     *   vatNumber?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'] ?? null;
        $this->city = $values['city'] ?? null;
        $this->company = $values['company'] ?? null;
        $this->country = $values['country'];
        $this->email = $values['email'];
        $this->firstName = $values['firstName'];
        $this->lastName = $values['lastName'];
        $this->phone = $values['phone'];
        $this->postalCode = $values['postalCode'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->vatNumber = $values['vatNumber'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

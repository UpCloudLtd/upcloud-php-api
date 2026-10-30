<?php

namespace Upcloud\Account\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\AccountBooleanYesno;
use Upcloud\Types\AccountLabel;
use Upcloud\Core\Types\ArrayType;

class CreateSubaccountRequestSubAccount extends JsonSerializableType
{
    /**
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var ?string $password
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('first_name')]
    public ?string $firstName;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('last_name')]
    public ?string $lastName;

    /**
     * @var ?string $company
     */
    #[JsonProperty('company')]
    public ?string $company;

    /**
     * @var ?string $vatNumber
     */
    #[JsonProperty('vat_number')]
    public ?string $vatNumber;

    /**
     * @var ?string $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?string $postalCode
     */
    #[JsonProperty('postal_code')]
    public ?string $postalCode;

    /**
     * @var ?string $city
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $state
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $country
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $phone
     */
    #[JsonProperty('phone')]
    public string $phone;

    /**
     * @var string $language
     */
    #[JsonProperty('language')]
    public string $language;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var string $timezone
     */
    #[JsonProperty('timezone')]
    public string $timezone;

    /**
     * @var ?value-of<AccountBooleanYesno> $allowApi
     */
    #[JsonProperty('allow_api')]
    public ?string $allowApi;

    /**
     * @var ?value-of<AccountBooleanYesno> $allowGui
     */
    #[JsonProperty('allow_gui')]
    public ?string $allowGui;

    /**
     * @var ?CreateSubaccountRequestSubAccountRoles $roles
     */
    #[JsonProperty('roles')]
    public ?CreateSubaccountRequestSubAccountRoles $roles;

    /**
     * @var ?array<AccountLabel> $labels
     */
    #[JsonProperty('labels'), ArrayType([AccountLabel::class])]
    public ?array $labels;

    /**
     * @var ?CreateSubaccountRequestSubAccountIpFilters $ipFilters
     */
    #[JsonProperty('ip_filters')]
    public ?CreateSubaccountRequestSubAccountIpFilters $ipFilters;

    /**
     * @var ?array<string, mixed> $serverAccess
     */
    #[JsonProperty('server_access'), ArrayType(['string' => 'mixed'])]
    public ?array $serverAccess;

    /**
     * @var ?array<string, mixed> $storageAccess
     */
    #[JsonProperty('storage_access'), ArrayType(['string' => 'mixed'])]
    public ?array $storageAccess;

    /**
     * @var ?array<string, mixed> $networkAccess
     */
    #[JsonProperty('network_access'), ArrayType(['string' => 'mixed'])]
    public ?array $networkAccess;

    /**
     * @var ?array<string, mixed> $tagAccess
     */
    #[JsonProperty('tag_access'), ArrayType(['string' => 'mixed'])]
    public ?array $tagAccess;

    /**
     * @var ?value-of<AccountBooleanYesno> $enable3rdPartyServices
     */
    #[JsonProperty('enable_3rd_party_services')]
    public ?string $enable3rdPartyServices;

    /**
     * @param array{
     *   username: string,
     *   email: string,
     *   phone: string,
     *   language: string,
     *   timezone: string,
     *   password?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   company?: ?string,
     *   vatNumber?: ?string,
     *   address?: ?string,
     *   postalCode?: ?string,
     *   city?: ?string,
     *   state?: ?string,
     *   country?: ?string,
     *   currency?: ?string,
     *   allowApi?: ?value-of<AccountBooleanYesno>,
     *   allowGui?: ?value-of<AccountBooleanYesno>,
     *   roles?: ?CreateSubaccountRequestSubAccountRoles,
     *   labels?: ?array<AccountLabel>,
     *   ipFilters?: ?CreateSubaccountRequestSubAccountIpFilters,
     *   serverAccess?: ?array<string, mixed>,
     *   storageAccess?: ?array<string, mixed>,
     *   networkAccess?: ?array<string, mixed>,
     *   tagAccess?: ?array<string, mixed>,
     *   enable3rdPartyServices?: ?value-of<AccountBooleanYesno>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->username = $values['username'];
        $this->password = $values['password'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->company = $values['company'] ?? null;
        $this->vatNumber = $values['vatNumber'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->postalCode = $values['postalCode'] ?? null;
        $this->city = $values['city'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->email = $values['email'];
        $this->phone = $values['phone'];
        $this->language = $values['language'];
        $this->currency = $values['currency'] ?? null;
        $this->timezone = $values['timezone'];
        $this->allowApi = $values['allowApi'] ?? null;
        $this->allowGui = $values['allowGui'] ?? null;
        $this->roles = $values['roles'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->ipFilters = $values['ipFilters'] ?? null;
        $this->serverAccess = $values['serverAccess'] ?? null;
        $this->storageAccess = $values['storageAccess'] ?? null;
        $this->networkAccess = $values['networkAccess'] ?? null;
        $this->tagAccess = $values['tagAccess'] ?? null;
        $this->enable3rdPartyServices = $values['enable3rdPartyServices'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

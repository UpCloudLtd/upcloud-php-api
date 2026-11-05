<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Main account or subaccount profile fields.
 */
class AccountProfile extends JsonSerializableType
{
    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?value-of<AccountProfileType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $mainAccount
     */
    #[JsonProperty('main_account')]
    public ?string $mainAccount;

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
     * @var ?string $country Three-letter country code, or an empty string when unset.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

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
     * @var ?AccountProfileCampaigns $campaigns
     */
    #[JsonProperty('campaigns')]
    public ?AccountProfileCampaigns $campaigns;

    /**
     * @var ?AccountProfileRoles $roles
     */
    #[JsonProperty('roles')]
    public ?AccountProfileRoles $roles;

    /**
     * @var ?array<AccountLabel> $labels
     */
    #[JsonProperty('labels'), ArrayType([AccountLabel::class])]
    public ?array $labels;

    /**
     * @var ?AccountProfileIpFilters $ipFilters
     */
    #[JsonProperty('ip_filters')]
    public ?AccountProfileIpFilters $ipFilters;

    /**
     * @var ?AccountProfileServerAccess $serverAccess
     */
    #[JsonProperty('server_access')]
    public ?AccountProfileServerAccess $serverAccess;

    /**
     * @var ?AccountProfileStorageAccess $storageAccess
     */
    #[JsonProperty('storage_access')]
    public ?AccountProfileStorageAccess $storageAccess;

    /**
     * @var ?AccountProfileNetworkAccess $networkAccess
     */
    #[JsonProperty('network_access')]
    public ?AccountProfileNetworkAccess $networkAccess;

    /**
     * @var ?AccountProfileTagAccess $tagAccess
     */
    #[JsonProperty('tag_access')]
    public ?AccountProfileTagAccess $tagAccess;

    /**
     * @var ?value-of<AccountBooleanYesno> $enable3rdPartyServices
     */
    #[JsonProperty('enable_3rd_party_services')]
    public ?string $enable3rdPartyServices;

    /**
     * @var ?string $simpleBackup
     */
    #[JsonProperty('simple_backup')]
    public ?string $simpleBackup;

    /**
     * @var ?string $abuseEmail
     */
    #[JsonProperty('abuse_email')]
    public ?string $abuseEmail;

    /**
     * @param array{
     *   username?: ?string,
     *   type?: ?value-of<AccountProfileType>,
     *   mainAccount?: ?string,
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
     *   email?: ?string,
     *   phone?: ?string,
     *   language?: ?string,
     *   currency?: ?string,
     *   timezone?: ?string,
     *   allowApi?: ?value-of<AccountBooleanYesno>,
     *   allowGui?: ?value-of<AccountBooleanYesno>,
     *   campaigns?: ?AccountProfileCampaigns,
     *   roles?: ?AccountProfileRoles,
     *   labels?: ?array<AccountLabel>,
     *   ipFilters?: ?AccountProfileIpFilters,
     *   serverAccess?: ?AccountProfileServerAccess,
     *   storageAccess?: ?AccountProfileStorageAccess,
     *   networkAccess?: ?AccountProfileNetworkAccess,
     *   tagAccess?: ?AccountProfileTagAccess,
     *   enable3rdPartyServices?: ?value-of<AccountBooleanYesno>,
     *   simpleBackup?: ?string,
     *   abuseEmail?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->username = $values['username'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->mainAccount = $values['mainAccount'] ?? null;
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
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->allowApi = $values['allowApi'] ?? null;
        $this->allowGui = $values['allowGui'] ?? null;
        $this->campaigns = $values['campaigns'] ?? null;
        $this->roles = $values['roles'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->ipFilters = $values['ipFilters'] ?? null;
        $this->serverAccess = $values['serverAccess'] ?? null;
        $this->storageAccess = $values['storageAccess'] ?? null;
        $this->networkAccess = $values['networkAccess'] ?? null;
        $this->tagAccess = $values['tagAccess'] ?? null;
        $this->enable3rdPartyServices = $values['enable3rdPartyServices'] ?? null;
        $this->simpleBackup = $values['simpleBackup'] ?? null;
        $this->abuseEmail = $values['abuseEmail'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

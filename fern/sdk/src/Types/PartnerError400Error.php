<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Exception;
use Upcloud\Core\Json\JsonDecoder;

class PartnerError400Error extends JsonSerializableType
{
    /**
     * @var (
     *    'ADDRESS_INVALID'
     *   |'CITY_INVALID'
     *   |'COMPANY_INVALID'
     *   |'COUNTRY_INVALID'
     *   |'COUNTRY_MISSING'
     *   |'EMAIL_INVALID'
     *   |'EMAIL_MISSING'
     *   |'FIRST_NAME_INVALID'
     *   |'FIRST_NAME_MISSING'
     *   |'LAST_NAME_INVALID'
     *   |'LAST_NAME_MISSING'
     *   |'PASSWORD_INVALID'
     *   |'PASSWORD_MISSING'
     *   |'PHONE_INVALID'
     *   |'PHONE_MISSING'
     *   |'POSTAL_CODE_INVALID'
     *   |'POSTAL_CODE_MISSING'
     *   |'_unknown'
     * ) $errorCode
     */
    public readonly string $errorCode;

    /**
     * @var (
     *    PartnerError400AddressInvalid
     *   |PartnerError400CityInvalid
     *   |PartnerError400CompanyInvalid
     *   |PartnerError400CountryInvalid
     *   |PartnerError400CountryMissing
     *   |PartnerError400EmailInvalid
     *   |PartnerError400EmailMissing
     *   |PartnerError400FirstNameInvalid
     *   |PartnerError400FirstNameMissing
     *   |PartnerError400LastNameInvalid
     *   |PartnerError400LastNameMissing
     *   |PartnerError400PasswordInvalid
     *   |PartnerError400PasswordMissing
     *   |PartnerError400PhoneInvalid
     *   |PartnerError400PhoneMissing
     *   |PartnerError400PostalCodeInvalid
     *   |PartnerError400PostalCodeMissing
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   errorCode: (
     *    'ADDRESS_INVALID'
     *   |'CITY_INVALID'
     *   |'COMPANY_INVALID'
     *   |'COUNTRY_INVALID'
     *   |'COUNTRY_MISSING'
     *   |'EMAIL_INVALID'
     *   |'EMAIL_MISSING'
     *   |'FIRST_NAME_INVALID'
     *   |'FIRST_NAME_MISSING'
     *   |'LAST_NAME_INVALID'
     *   |'LAST_NAME_MISSING'
     *   |'PASSWORD_INVALID'
     *   |'PASSWORD_MISSING'
     *   |'PHONE_INVALID'
     *   |'PHONE_MISSING'
     *   |'POSTAL_CODE_INVALID'
     *   |'POSTAL_CODE_MISSING'
     *   |'_unknown'
     * ),
     *   value: (
     *    PartnerError400AddressInvalid
     *   |PartnerError400CityInvalid
     *   |PartnerError400CompanyInvalid
     *   |PartnerError400CountryInvalid
     *   |PartnerError400CountryMissing
     *   |PartnerError400EmailInvalid
     *   |PartnerError400EmailMissing
     *   |PartnerError400FirstNameInvalid
     *   |PartnerError400FirstNameMissing
     *   |PartnerError400LastNameInvalid
     *   |PartnerError400LastNameMissing
     *   |PartnerError400PasswordInvalid
     *   |PartnerError400PasswordMissing
     *   |PartnerError400PhoneInvalid
     *   |PartnerError400PhoneMissing
     *   |PartnerError400PostalCodeInvalid
     *   |PartnerError400PostalCodeMissing
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->errorCode = $values['errorCode'];
        $this->value = $values['value'];
    }

    /**
     * @param PartnerError400AddressInvalid $addressInvalid
     * @return PartnerError400Error
     */
    public static function addressInvalid(PartnerError400AddressInvalid $addressInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'ADDRESS_INVALID',
            'value' => $addressInvalid,
        ]);
    }

    /**
     * @param PartnerError400CityInvalid $cityInvalid
     * @return PartnerError400Error
     */
    public static function cityInvalid(PartnerError400CityInvalid $cityInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'CITY_INVALID',
            'value' => $cityInvalid,
        ]);
    }

    /**
     * @param PartnerError400CompanyInvalid $companyInvalid
     * @return PartnerError400Error
     */
    public static function companyInvalid(PartnerError400CompanyInvalid $companyInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'COMPANY_INVALID',
            'value' => $companyInvalid,
        ]);
    }

    /**
     * @param PartnerError400CountryInvalid $countryInvalid
     * @return PartnerError400Error
     */
    public static function countryInvalid(PartnerError400CountryInvalid $countryInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'COUNTRY_INVALID',
            'value' => $countryInvalid,
        ]);
    }

    /**
     * @param PartnerError400CountryMissing $countryMissing
     * @return PartnerError400Error
     */
    public static function countryMissing(PartnerError400CountryMissing $countryMissing): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'COUNTRY_MISSING',
            'value' => $countryMissing,
        ]);
    }

    /**
     * @param PartnerError400EmailInvalid $emailInvalid
     * @return PartnerError400Error
     */
    public static function emailInvalid(PartnerError400EmailInvalid $emailInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'EMAIL_INVALID',
            'value' => $emailInvalid,
        ]);
    }

    /**
     * @param PartnerError400EmailMissing $emailMissing
     * @return PartnerError400Error
     */
    public static function emailMissing(PartnerError400EmailMissing $emailMissing): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'EMAIL_MISSING',
            'value' => $emailMissing,
        ]);
    }

    /**
     * @param PartnerError400FirstNameInvalid $firstNameInvalid
     * @return PartnerError400Error
     */
    public static function firstNameInvalid(PartnerError400FirstNameInvalid $firstNameInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'FIRST_NAME_INVALID',
            'value' => $firstNameInvalid,
        ]);
    }

    /**
     * @param PartnerError400FirstNameMissing $firstNameMissing
     * @return PartnerError400Error
     */
    public static function firstNameMissing(PartnerError400FirstNameMissing $firstNameMissing): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'FIRST_NAME_MISSING',
            'value' => $firstNameMissing,
        ]);
    }

    /**
     * @param PartnerError400LastNameInvalid $lastNameInvalid
     * @return PartnerError400Error
     */
    public static function lastNameInvalid(PartnerError400LastNameInvalid $lastNameInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'LAST_NAME_INVALID',
            'value' => $lastNameInvalid,
        ]);
    }

    /**
     * @param PartnerError400LastNameMissing $lastNameMissing
     * @return PartnerError400Error
     */
    public static function lastNameMissing(PartnerError400LastNameMissing $lastNameMissing): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'LAST_NAME_MISSING',
            'value' => $lastNameMissing,
        ]);
    }

    /**
     * @param PartnerError400PasswordInvalid $passwordInvalid
     * @return PartnerError400Error
     */
    public static function passwordInvalid(PartnerError400PasswordInvalid $passwordInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'PASSWORD_INVALID',
            'value' => $passwordInvalid,
        ]);
    }

    /**
     * @param PartnerError400PasswordMissing $passwordMissing
     * @return PartnerError400Error
     */
    public static function passwordMissing(PartnerError400PasswordMissing $passwordMissing): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'PASSWORD_MISSING',
            'value' => $passwordMissing,
        ]);
    }

    /**
     * @param PartnerError400PhoneInvalid $phoneInvalid
     * @return PartnerError400Error
     */
    public static function phoneInvalid(PartnerError400PhoneInvalid $phoneInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'PHONE_INVALID',
            'value' => $phoneInvalid,
        ]);
    }

    /**
     * @param PartnerError400PhoneMissing $phoneMissing
     * @return PartnerError400Error
     */
    public static function phoneMissing(PartnerError400PhoneMissing $phoneMissing): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'PHONE_MISSING',
            'value' => $phoneMissing,
        ]);
    }

    /**
     * @param PartnerError400PostalCodeInvalid $postalCodeInvalid
     * @return PartnerError400Error
     */
    public static function postalCodeInvalid(PartnerError400PostalCodeInvalid $postalCodeInvalid): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'POSTAL_CODE_INVALID',
            'value' => $postalCodeInvalid,
        ]);
    }

    /**
     * @param PartnerError400PostalCodeMissing $postalCodeMissing
     * @return PartnerError400Error
     */
    public static function postalCodeMissing(PartnerError400PostalCodeMissing $postalCodeMissing): PartnerError400Error
    {
        return new PartnerError400Error([
            'errorCode' => 'POSTAL_CODE_MISSING',
            'value' => $postalCodeMissing,
        ]);
    }

    /**
     * @return bool
     */
    public function isAddressInvalid(): bool
    {
        return $this->value instanceof PartnerError400AddressInvalid && $this->errorCode === 'ADDRESS_INVALID';
    }

    /**
     * @return PartnerError400AddressInvalid
     */
    public function asAddressInvalid(): PartnerError400AddressInvalid
    {
        if (!($this->value instanceof PartnerError400AddressInvalid && $this->errorCode === 'ADDRESS_INVALID')) {
            throw new Exception(
                "Expected ADDRESS_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCityInvalid(): bool
    {
        return $this->value instanceof PartnerError400CityInvalid && $this->errorCode === 'CITY_INVALID';
    }

    /**
     * @return PartnerError400CityInvalid
     */
    public function asCityInvalid(): PartnerError400CityInvalid
    {
        if (!($this->value instanceof PartnerError400CityInvalid && $this->errorCode === 'CITY_INVALID')) {
            throw new Exception(
                "Expected CITY_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCompanyInvalid(): bool
    {
        return $this->value instanceof PartnerError400CompanyInvalid && $this->errorCode === 'COMPANY_INVALID';
    }

    /**
     * @return PartnerError400CompanyInvalid
     */
    public function asCompanyInvalid(): PartnerError400CompanyInvalid
    {
        if (!($this->value instanceof PartnerError400CompanyInvalid && $this->errorCode === 'COMPANY_INVALID')) {
            throw new Exception(
                "Expected COMPANY_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCountryInvalid(): bool
    {
        return $this->value instanceof PartnerError400CountryInvalid && $this->errorCode === 'COUNTRY_INVALID';
    }

    /**
     * @return PartnerError400CountryInvalid
     */
    public function asCountryInvalid(): PartnerError400CountryInvalid
    {
        if (!($this->value instanceof PartnerError400CountryInvalid && $this->errorCode === 'COUNTRY_INVALID')) {
            throw new Exception(
                "Expected COUNTRY_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCountryMissing(): bool
    {
        return $this->value instanceof PartnerError400CountryMissing && $this->errorCode === 'COUNTRY_MISSING';
    }

    /**
     * @return PartnerError400CountryMissing
     */
    public function asCountryMissing(): PartnerError400CountryMissing
    {
        if (!($this->value instanceof PartnerError400CountryMissing && $this->errorCode === 'COUNTRY_MISSING')) {
            throw new Exception(
                "Expected COUNTRY_MISSING; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEmailInvalid(): bool
    {
        return $this->value instanceof PartnerError400EmailInvalid && $this->errorCode === 'EMAIL_INVALID';
    }

    /**
     * @return PartnerError400EmailInvalid
     */
    public function asEmailInvalid(): PartnerError400EmailInvalid
    {
        if (!($this->value instanceof PartnerError400EmailInvalid && $this->errorCode === 'EMAIL_INVALID')) {
            throw new Exception(
                "Expected EMAIL_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEmailMissing(): bool
    {
        return $this->value instanceof PartnerError400EmailMissing && $this->errorCode === 'EMAIL_MISSING';
    }

    /**
     * @return PartnerError400EmailMissing
     */
    public function asEmailMissing(): PartnerError400EmailMissing
    {
        if (!($this->value instanceof PartnerError400EmailMissing && $this->errorCode === 'EMAIL_MISSING')) {
            throw new Exception(
                "Expected EMAIL_MISSING; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFirstNameInvalid(): bool
    {
        return $this->value instanceof PartnerError400FirstNameInvalid && $this->errorCode === 'FIRST_NAME_INVALID';
    }

    /**
     * @return PartnerError400FirstNameInvalid
     */
    public function asFirstNameInvalid(): PartnerError400FirstNameInvalid
    {
        if (!($this->value instanceof PartnerError400FirstNameInvalid && $this->errorCode === 'FIRST_NAME_INVALID')) {
            throw new Exception(
                "Expected FIRST_NAME_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFirstNameMissing(): bool
    {
        return $this->value instanceof PartnerError400FirstNameMissing && $this->errorCode === 'FIRST_NAME_MISSING';
    }

    /**
     * @return PartnerError400FirstNameMissing
     */
    public function asFirstNameMissing(): PartnerError400FirstNameMissing
    {
        if (!($this->value instanceof PartnerError400FirstNameMissing && $this->errorCode === 'FIRST_NAME_MISSING')) {
            throw new Exception(
                "Expected FIRST_NAME_MISSING; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isLastNameInvalid(): bool
    {
        return $this->value instanceof PartnerError400LastNameInvalid && $this->errorCode === 'LAST_NAME_INVALID';
    }

    /**
     * @return PartnerError400LastNameInvalid
     */
    public function asLastNameInvalid(): PartnerError400LastNameInvalid
    {
        if (!($this->value instanceof PartnerError400LastNameInvalid && $this->errorCode === 'LAST_NAME_INVALID')) {
            throw new Exception(
                "Expected LAST_NAME_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isLastNameMissing(): bool
    {
        return $this->value instanceof PartnerError400LastNameMissing && $this->errorCode === 'LAST_NAME_MISSING';
    }

    /**
     * @return PartnerError400LastNameMissing
     */
    public function asLastNameMissing(): PartnerError400LastNameMissing
    {
        if (!($this->value instanceof PartnerError400LastNameMissing && $this->errorCode === 'LAST_NAME_MISSING')) {
            throw new Exception(
                "Expected LAST_NAME_MISSING; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPasswordInvalid(): bool
    {
        return $this->value instanceof PartnerError400PasswordInvalid && $this->errorCode === 'PASSWORD_INVALID';
    }

    /**
     * @return PartnerError400PasswordInvalid
     */
    public function asPasswordInvalid(): PartnerError400PasswordInvalid
    {
        if (!($this->value instanceof PartnerError400PasswordInvalid && $this->errorCode === 'PASSWORD_INVALID')) {
            throw new Exception(
                "Expected PASSWORD_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPasswordMissing(): bool
    {
        return $this->value instanceof PartnerError400PasswordMissing && $this->errorCode === 'PASSWORD_MISSING';
    }

    /**
     * @return PartnerError400PasswordMissing
     */
    public function asPasswordMissing(): PartnerError400PasswordMissing
    {
        if (!($this->value instanceof PartnerError400PasswordMissing && $this->errorCode === 'PASSWORD_MISSING')) {
            throw new Exception(
                "Expected PASSWORD_MISSING; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPhoneInvalid(): bool
    {
        return $this->value instanceof PartnerError400PhoneInvalid && $this->errorCode === 'PHONE_INVALID';
    }

    /**
     * @return PartnerError400PhoneInvalid
     */
    public function asPhoneInvalid(): PartnerError400PhoneInvalid
    {
        if (!($this->value instanceof PartnerError400PhoneInvalid && $this->errorCode === 'PHONE_INVALID')) {
            throw new Exception(
                "Expected PHONE_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPhoneMissing(): bool
    {
        return $this->value instanceof PartnerError400PhoneMissing && $this->errorCode === 'PHONE_MISSING';
    }

    /**
     * @return PartnerError400PhoneMissing
     */
    public function asPhoneMissing(): PartnerError400PhoneMissing
    {
        if (!($this->value instanceof PartnerError400PhoneMissing && $this->errorCode === 'PHONE_MISSING')) {
            throw new Exception(
                "Expected PHONE_MISSING; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPostalCodeInvalid(): bool
    {
        return $this->value instanceof PartnerError400PostalCodeInvalid && $this->errorCode === 'POSTAL_CODE_INVALID';
    }

    /**
     * @return PartnerError400PostalCodeInvalid
     */
    public function asPostalCodeInvalid(): PartnerError400PostalCodeInvalid
    {
        if (!($this->value instanceof PartnerError400PostalCodeInvalid && $this->errorCode === 'POSTAL_CODE_INVALID')) {
            throw new Exception(
                "Expected POSTAL_CODE_INVALID; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPostalCodeMissing(): bool
    {
        return $this->value instanceof PartnerError400PostalCodeMissing && $this->errorCode === 'POSTAL_CODE_MISSING';
    }

    /**
     * @return PartnerError400PostalCodeMissing
     */
    public function asPostalCodeMissing(): PartnerError400PostalCodeMissing
    {
        if (!($this->value instanceof PartnerError400PostalCodeMissing && $this->errorCode === 'POSTAL_CODE_MISSING')) {
            throw new Exception(
                "Expected POSTAL_CODE_MISSING; got " . $this->errorCode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['error_code'] = $this->errorCode;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->errorCode) {
            case 'ADDRESS_INVALID':
                $value = $this->asAddressInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'CITY_INVALID':
                $value = $this->asCityInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'COMPANY_INVALID':
                $value = $this->asCompanyInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'COUNTRY_INVALID':
                $value = $this->asCountryInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'COUNTRY_MISSING':
                $value = $this->asCountryMissing()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EMAIL_INVALID':
                $value = $this->asEmailInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EMAIL_MISSING':
                $value = $this->asEmailMissing()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'FIRST_NAME_INVALID':
                $value = $this->asFirstNameInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'FIRST_NAME_MISSING':
                $value = $this->asFirstNameMissing()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'LAST_NAME_INVALID':
                $value = $this->asLastNameInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'LAST_NAME_MISSING':
                $value = $this->asLastNameMissing()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'PASSWORD_INVALID':
                $value = $this->asPasswordInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'PASSWORD_MISSING':
                $value = $this->asPasswordMissing()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'PHONE_INVALID':
                $value = $this->asPhoneInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'PHONE_MISSING':
                $value = $this->asPhoneMissing()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'POSTAL_CODE_INVALID':
                $value = $this->asPostalCodeInvalid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'POSTAL_CODE_MISSING':
                $value = $this->asPostalCodeMissing()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param string $json
     */
    public static function fromJson(string $json): static
    {
        $decodedJson = JsonDecoder::decode($json);
        if (!is_array($decodedJson)) {
            throw new Exception("Unexpected non-array decoded type: " . gettype($decodedJson));
        }
        return self::jsonDeserialize($decodedJson);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('error_code', $data)) {
            throw new Exception(
                "JSON data is missing property 'error_code'",
            );
        }
        $errorCode = $data['error_code'];
        if (!(is_string($errorCode))) {
            throw new Exception(
                "Expected property 'errorCode' in JSON data to be string, instead received " . get_debug_type($data['error_code']),
            );
        }

        $args['errorCode'] = $errorCode;
        switch ($errorCode) {
            case 'ADDRESS_INVALID':
                $args['value'] = PartnerError400AddressInvalid::jsonDeserialize($data);
                break;
            case 'CITY_INVALID':
                $args['value'] = PartnerError400CityInvalid::jsonDeserialize($data);
                break;
            case 'COMPANY_INVALID':
                $args['value'] = PartnerError400CompanyInvalid::jsonDeserialize($data);
                break;
            case 'COUNTRY_INVALID':
                $args['value'] = PartnerError400CountryInvalid::jsonDeserialize($data);
                break;
            case 'COUNTRY_MISSING':
                $args['value'] = PartnerError400CountryMissing::jsonDeserialize($data);
                break;
            case 'EMAIL_INVALID':
                $args['value'] = PartnerError400EmailInvalid::jsonDeserialize($data);
                break;
            case 'EMAIL_MISSING':
                $args['value'] = PartnerError400EmailMissing::jsonDeserialize($data);
                break;
            case 'FIRST_NAME_INVALID':
                $args['value'] = PartnerError400FirstNameInvalid::jsonDeserialize($data);
                break;
            case 'FIRST_NAME_MISSING':
                $args['value'] = PartnerError400FirstNameMissing::jsonDeserialize($data);
                break;
            case 'LAST_NAME_INVALID':
                $args['value'] = PartnerError400LastNameInvalid::jsonDeserialize($data);
                break;
            case 'LAST_NAME_MISSING':
                $args['value'] = PartnerError400LastNameMissing::jsonDeserialize($data);
                break;
            case 'PASSWORD_INVALID':
                $args['value'] = PartnerError400PasswordInvalid::jsonDeserialize($data);
                break;
            case 'PASSWORD_MISSING':
                $args['value'] = PartnerError400PasswordMissing::jsonDeserialize($data);
                break;
            case 'PHONE_INVALID':
                $args['value'] = PartnerError400PhoneInvalid::jsonDeserialize($data);
                break;
            case 'PHONE_MISSING':
                $args['value'] = PartnerError400PhoneMissing::jsonDeserialize($data);
                break;
            case 'POSTAL_CODE_INVALID':
                $args['value'] = PartnerError400PostalCodeInvalid::jsonDeserialize($data);
                break;
            case 'POSTAL_CODE_MISSING':
                $args['value'] = PartnerError400PostalCodeMissing::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['errorCode'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}

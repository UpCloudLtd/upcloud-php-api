<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccount extends JsonSerializableType
{
    /**
     * @var string $account
     */
    #[JsonProperty('account')]
    public string $account;

    /**
     * @var ?string $key Azure account secret key. One of key or sas_token should be specified
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?string $sasToken A shared access signatures (SAS) token. One of key or sas_token should be specified
     */
    #[JsonProperty('sas_token')]
    public ?string $sasToken;

    /**
     * @param array{
     *   account: string,
     *   key?: ?string,
     *   sasToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->account = $values['account'];
        $this->key = $values['key'] ?? null;
        $this->sasToken = $values['sasToken'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

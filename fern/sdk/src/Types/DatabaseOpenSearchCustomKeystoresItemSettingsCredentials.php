<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseOpenSearchCustomKeystoresItemSettingsCredentials extends JsonSerializableType
{
    /**
     * @var DatabaseOpenSearchCustomKeystoresItemSettingsCredentialsCredentials $credentials
     */
    #[JsonProperty('credentials')]
    public DatabaseOpenSearchCustomKeystoresItemSettingsCredentialsCredentials $credentials;

    /**
     * @param array{
     *   credentials: DatabaseOpenSearchCustomKeystoresItemSettingsCredentialsCredentials,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->credentials = $values['credentials'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

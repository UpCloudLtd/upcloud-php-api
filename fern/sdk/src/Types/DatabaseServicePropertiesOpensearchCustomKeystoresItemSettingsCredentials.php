<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentials extends JsonSerializableType
{
    /**
     * @var DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentialsCredentials $credentials
     */
    #[JsonProperty('credentials')]
    public DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentialsCredentials $credentials;

    /**
     * @param array{
     *   credentials: DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentialsCredentials,
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

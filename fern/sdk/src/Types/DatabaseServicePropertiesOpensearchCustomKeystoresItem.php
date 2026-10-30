<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class DatabaseServicePropertiesOpensearchCustomKeystoresItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var (
     *    DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccount
     *   |DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentials
     *   |DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccessKey
     * ) $settings
     */
    #[JsonProperty('settings'), Union(DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccount::class, DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentials::class, DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccessKey::class)]
    public DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccount|DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentials|DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccessKey $settings;

    /**
     * @var value-of<DatabaseServicePropertiesOpensearchCustomKeystoresItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   name: string,
     *   settings: (
     *    DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccount
     *   |DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentials
     *   |DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccessKey
     * ),
     *   type: value-of<DatabaseServicePropertiesOpensearchCustomKeystoresItemType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->settings = $values['settings'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

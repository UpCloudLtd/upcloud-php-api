<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class DatabaseServicePropertiesOpensearchCustomReposItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var (
     *    DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccount
     *   |DatabaseServicePropertiesOpensearchCustomReposItemSettingsCredentials
     *   |DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccessKey
     * ) $settings
     */
    #[JsonProperty('settings'), Union(DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccount::class, DatabaseServicePropertiesOpensearchCustomReposItemSettingsCredentials::class, DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccessKey::class)]
    public DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccount|DatabaseServicePropertiesOpensearchCustomReposItemSettingsCredentials|DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccessKey $settings;

    /**
     * @var value-of<DatabaseServicePropertiesOpensearchCustomReposItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   name: string,
     *   settings: (
     *    DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccount
     *   |DatabaseServicePropertiesOpensearchCustomReposItemSettingsCredentials
     *   |DatabaseServicePropertiesOpensearchCustomReposItemSettingsAccessKey
     * ),
     *   type: value-of<DatabaseServicePropertiesOpensearchCustomReposItemType>,
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

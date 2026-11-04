<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class DatabaseOpenSearchCustomReposItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var (
     *    DatabaseOpenSearchCustomReposItemSettingsAccount
     *   |DatabaseOpenSearchCustomReposItemSettingsCredentials
     *   |DatabaseOpenSearchCustomReposItemSettingsAccessKey
     * ) $settings
     */
    #[JsonProperty('settings'), Union(DatabaseOpenSearchCustomReposItemSettingsAccount::class, DatabaseOpenSearchCustomReposItemSettingsCredentials::class, DatabaseOpenSearchCustomReposItemSettingsAccessKey::class)]
    public DatabaseOpenSearchCustomReposItemSettingsAccount|DatabaseOpenSearchCustomReposItemSettingsCredentials|DatabaseOpenSearchCustomReposItemSettingsAccessKey $settings;

    /**
     * @var value-of<DatabaseOpenSearchCustomReposItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   name: string,
     *   settings: (
     *    DatabaseOpenSearchCustomReposItemSettingsAccount
     *   |DatabaseOpenSearchCustomReposItemSettingsCredentials
     *   |DatabaseOpenSearchCustomReposItemSettingsAccessKey
     * ),
     *   type: value-of<DatabaseOpenSearchCustomReposItemType>,
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

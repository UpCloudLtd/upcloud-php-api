<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class DatabaseOpenSearchCustomKeystoresItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var (
     *    DatabaseOpenSearchCustomKeystoresItemSettingsAccount
     *   |DatabaseOpenSearchCustomKeystoresItemSettingsCredentials
     *   |DatabaseOpenSearchCustomKeystoresItemSettingsAccessKey
     * ) $settings
     */
    #[JsonProperty('settings'), Union(DatabaseOpenSearchCustomKeystoresItemSettingsAccount::class, DatabaseOpenSearchCustomKeystoresItemSettingsCredentials::class, DatabaseOpenSearchCustomKeystoresItemSettingsAccessKey::class)]
    public DatabaseOpenSearchCustomKeystoresItemSettingsAccount|DatabaseOpenSearchCustomKeystoresItemSettingsCredentials|DatabaseOpenSearchCustomKeystoresItemSettingsAccessKey $settings;

    /**
     * @var value-of<DatabaseOpenSearchCustomKeystoresItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   name: string,
     *   settings: (
     *    DatabaseOpenSearchCustomKeystoresItemSettingsAccount
     *   |DatabaseOpenSearchCustomKeystoresItemSettingsCredentials
     *   |DatabaseOpenSearchCustomKeystoresItemSettingsAccessKey
     * ),
     *   type: value-of<DatabaseOpenSearchCustomKeystoresItemType>,
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

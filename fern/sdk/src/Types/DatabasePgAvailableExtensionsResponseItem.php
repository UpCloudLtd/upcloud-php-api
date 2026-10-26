<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class DatabasePgAvailableExtensionsResponseItem extends JsonSerializableType
{
    /**
     * @var string $version The PostgreSQL major version
     */
    #[JsonProperty('version')]
    public string $version;

    /**
     * @var array<DatabasePgAvailableExtensionsResponseItemExtensionsItem> $extensions List of available extensions for this PostgreSQL version
     */
    #[JsonProperty('extensions'), ArrayType([DatabasePgAvailableExtensionsResponseItemExtensionsItem::class])]
    public array $extensions;

    /**
     * @param array{
     *   version: string,
     *   extensions: array<DatabasePgAvailableExtensionsResponseItemExtensionsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->version = $values['version'];
        $this->extensions = $values['extensions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

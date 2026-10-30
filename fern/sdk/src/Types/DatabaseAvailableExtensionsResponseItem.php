<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class DatabaseAvailableExtensionsResponseItem extends JsonSerializableType
{
    /**
     * @var string $defaultVersion The default version of the extension
     */
    #[JsonProperty('default_version')]
    public string $defaultVersion;

    /**
     * @var string $name The name of the PostgreSQL extension
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<string> $versions List of available versions for this extension
     */
    #[JsonProperty('versions'), ArrayType(['string'])]
    public array $versions;

    /**
     * @param array{
     *   defaultVersion: string,
     *   name: string,
     *   versions: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->defaultVersion = $values['defaultVersion'];
        $this->name = $values['name'];
        $this->versions = $values['versions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

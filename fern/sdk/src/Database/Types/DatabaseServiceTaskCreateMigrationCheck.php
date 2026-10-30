<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceTaskCreateMigrationCheck extends JsonSerializableType
{
    /**
     * @var ?string $ignoreDbs Databases to ignore during the migration check, separated by commas.
     */
    #[JsonProperty('ignore_dbs')]
    public ?string $ignoreDbs;

    /**
     * @var ?string $ignoreRoles
     */
    #[JsonProperty('ignore_roles')]
    public ?string $ignoreRoles;

    /**
     * @var ?string $method The migration method to be used.
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var string $sourceServiceUri The URI of the source service for migration.
     */
    #[JsonProperty('source_service_uri')]
    public string $sourceServiceUri;

    /**
     * @param array{
     *   sourceServiceUri: string,
     *   ignoreDbs?: ?string,
     *   ignoreRoles?: ?string,
     *   method?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ignoreDbs = $values['ignoreDbs'] ?? null;
        $this->ignoreRoles = $values['ignoreRoles'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->sourceServiceUri = $values['sourceServiceUri'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

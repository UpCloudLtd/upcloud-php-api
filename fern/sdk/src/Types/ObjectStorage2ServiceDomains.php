<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Service domains with their static website hosting status
 */
class ObjectStorage2ServiceDomains extends JsonSerializableType
{
    /**
     * @var array<ObjectStorage2ServiceDomainsDomainsItem> $domains List of all service domains (public, private, custom) with their static website hosting availability and configuration status
     */
    #[JsonProperty('domains'), ArrayType([ObjectStorage2ServiceDomainsDomainsItem::class])]
    public array $domains;

    /**
     * @param array{
     *   domains: array<ObjectStorage2ServiceDomainsDomainsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domains = $values['domains'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

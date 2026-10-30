<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2ServiceDomainsDomainsItem extends JsonSerializableType
{
    /**
     * @var string $domain Domain name (e.g., unc38.local.upbucket.com)
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @var value-of<ObjectStorage2ServiceDomainsDomainsItemType> $type Type of domain (public endpoint, private endpoint, or custom domain)
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var bool $active Whether this domain is active and ready to use (always true for enabled public/private endpoints, true for custom domains only if certificate is ready)
     */
    #[JsonProperty('active')]
    public bool $active;

    /**
     * @var bool $staticWebsiteConfigured Whether static website hosting is configured for this domain
     */
    #[JsonProperty('static_website_configured')]
    public bool $staticWebsiteConfigured;

    /**
     * @param array{
     *   domain: string,
     *   type: value-of<ObjectStorage2ServiceDomainsDomainsItemType>,
     *   active: bool,
     *   staticWebsiteConfigured: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domain = $values['domain'];
        $this->type = $values['type'];
        $this->active = $values['active'];
        $this->staticWebsiteConfigured = $values['staticWebsiteConfigured'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

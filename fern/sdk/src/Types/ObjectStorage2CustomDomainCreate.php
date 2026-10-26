<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for creating a custom domain.
 */
class ObjectStorage2CustomDomainCreate extends JsonSerializableType
{
    /**
     * @var value-of<ObjectStorage2CustomDomainCreateType> $type Type of the custom domain. At the moment only public is accepted.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?value-of<ObjectStorage2CustomDomainCreateMode> $mode Purpose of the domain. 'api' for S3 API access (creates base URL), 'static-website' for static website hosting (no base URL). Cannot be changed after creation.
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var string $domainName Custom domain to be added. Supports both apex domains (example.com) and subdomains (objects.example.com).
     */
    #[JsonProperty('domain_name')]
    public string $domainName;

    /**
     * @param array{
     *   type: value-of<ObjectStorage2CustomDomainCreateType>,
     *   domainName: string,
     *   mode?: ?value-of<ObjectStorage2CustomDomainCreateMode>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->mode = $values['mode'] ?? null;
        $this->domainName = $values['domainName'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

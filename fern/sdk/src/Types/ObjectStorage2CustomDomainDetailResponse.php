<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for custom domain details.
 */
class ObjectStorage2CustomDomainDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $domainName Custom domain name. Supports both apex domains and subdomains.
     */
    #[JsonProperty('domain_name')]
    public ?string $domainName;

    /**
     * @var ?string $type Endpoint type for the custom domain.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?value-of<ObjectStorage2CustomDomainDetailResponseMode> $mode Purpose of the domain. 'api' for S3 API access, 'static-website' for static website hosting.
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @param array{
     *   domainName?: ?string,
     *   type?: ?string,
     *   mode?: ?value-of<ObjectStorage2CustomDomainDetailResponseMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->domainName = $values['domainName'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->mode = $values['mode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

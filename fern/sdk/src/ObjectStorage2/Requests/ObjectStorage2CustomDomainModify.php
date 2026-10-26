<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\ObjectStorage2\Types\ObjectStorage2CustomDomainModifyType;
use Upcloud\Core\Json\JsonProperty;

class ObjectStorage2CustomDomainModify extends JsonSerializableType
{
    /**
     * @var ?value-of<ObjectStorage2CustomDomainModifyType> $type Type of the custom domain.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $domainName New modified custom domain. Supports both apex domains (example.com) and subdomains (objects.example.com).
     */
    #[JsonProperty('domain_name')]
    public ?string $domainName;

    /**
     * @param array{
     *   type?: ?value-of<ObjectStorage2CustomDomainModifyType>,
     *   domainName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->domainName = $values['domainName'] ?? null;
    }
}

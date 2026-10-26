<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response schema for endpoint details.
 */
class ObjectStorage2EndpointResponse extends JsonSerializableType
{
    /**
     * @var ?string $domainName
     */
    #[JsonProperty('domain_name')]
    public ?string $domainName;

    /**
     * @var ?string $iamUrl
     */
    #[JsonProperty('iam_url')]
    public ?string $iamUrl;

    /**
     * @var ?string $stsUrl
     */
    #[JsonProperty('sts_url')]
    public ?string $stsUrl;

    /**
     * @var ?value-of<ObjectStorage2EndpointResponseType> $type The network access type of the endpoint
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?value-of<ObjectStorage2EndpointResponseMode> $mode The operational mode of the endpoint: 'api' for S3/IAM/STS access, 'static-website' for static website hosting
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @param array{
     *   domainName?: ?string,
     *   iamUrl?: ?string,
     *   stsUrl?: ?string,
     *   type?: ?value-of<ObjectStorage2EndpointResponseType>,
     *   mode?: ?value-of<ObjectStorage2EndpointResponseMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->domainName = $values['domainName'] ?? null;
        $this->iamUrl = $values['iamUrl'] ?? null;
        $this->stsUrl = $values['stsUrl'] ?? null;
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

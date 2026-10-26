<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Load Balancer TLS Config
 */
class LoadBalancerTlsConfigCreate extends JsonSerializableType
{
    /**
     * @var string $name Name of the config
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $certificateBundleUuid Certificate Bundle UUID
     */
    #[JsonProperty('certificate_bundle_uuid')]
    public string $certificateBundleUuid;

    /**
     * @param array{
     *   name: string,
     *   certificateBundleUuid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->certificateBundleUuid = $values['certificateBundleUuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

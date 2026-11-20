<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryTagDigestRequest extends JsonSerializableType
{
    /**
     * @var string $digest OCI manifest digest the tag should point at. The digest must already exist in the same repository.
     */
    #[JsonProperty('digest')]
    public string $digest;

    /**
     * @param array{
     *   digest: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->digest = $values['digest'];
    }
}

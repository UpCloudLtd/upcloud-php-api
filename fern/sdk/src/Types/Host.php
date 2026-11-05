<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Container object for a private cloud host.
 */
class Host extends JsonSerializableType
{
    /**
     * @var HostDetails $host
     */
    #[JsonProperty('host')]
    public HostDetails $host;

    /**
     * @param array{
     *   host: HostDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->host = $values['host'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

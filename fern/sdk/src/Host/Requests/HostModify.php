<?php

namespace Upcloud\Host\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Host\Types\HostModifyHost;
use Upcloud\Core\Json\JsonProperty;

class HostModify extends JsonSerializableType
{
    /**
     * @var HostModifyHost $host Host properties to modify.
     */
    #[JsonProperty('host')]
    public HostModifyHost $host;

    /**
     * @param array{
     *   host: HostModifyHost,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->host = $values['host'];
    }
}

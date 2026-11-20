<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchClusterSearchRequestSlowlogThreshold extends JsonSerializableType
{
    /**
     * @var ?string $debug
     */
    #[JsonProperty('debug')]
    public ?string $debug;

    /**
     * @var ?string $info
     */
    #[JsonProperty('info')]
    public ?string $info;

    /**
     * @var ?string $trace
     */
    #[JsonProperty('trace')]
    public ?string $trace;

    /**
     * @var ?string $warn
     */
    #[JsonProperty('warn')]
    public ?string $warn;

    /**
     * @param array{
     *   debug?: ?string,
     *   info?: ?string,
     *   trace?: ?string,
     *   warn?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->debug = $values['debug'] ?? null;
        $this->info = $values['info'] ?? null;
        $this->trace = $values['trace'] ?? null;
        $this->warn = $values['warn'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

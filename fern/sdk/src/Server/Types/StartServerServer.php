<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class StartServerServer extends JsonSerializableType
{
    /**
     * @var ?int $avoidHost
     */
    #[JsonProperty('avoid_host')]
    public ?int $avoidHost;

    /**
     * @var ?int $host
     */
    #[JsonProperty('host')]
    public ?int $host;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<StartServerServerStartType> $startType Whether to wait for the Cloud Server to start.
     */
    #[JsonProperty('start_type')]
    public ?string $startType;

    /**
     * @param array{
     *   avoidHost?: ?int,
     *   host?: ?int,
     *   reason?: ?string,
     *   startType?: ?value-of<StartServerServerStartType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->avoidHost = $values['avoidHost'] ?? null;
        $this->host = $values['host'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->startType = $values['startType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

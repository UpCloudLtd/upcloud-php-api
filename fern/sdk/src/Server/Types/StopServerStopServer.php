<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class StopServerStopServer extends JsonSerializableType
{
    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<StopServerStopServerStopType> $stopType Type of stop operation.
     */
    #[JsonProperty('stop_type')]
    public ?string $stopType;

    /**
     * @var ?string $timeout Soft-stop timeout in seconds.
     */
    #[JsonProperty('timeout')]
    public ?string $timeout;

    /**
     * @param array{
     *   reason?: ?string,
     *   stopType?: ?value-of<StopServerStopServerStopType>,
     *   timeout?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->reason = $values['reason'] ?? null;
        $this->stopType = $values['stopType'] ?? null;
        $this->timeout = $values['timeout'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

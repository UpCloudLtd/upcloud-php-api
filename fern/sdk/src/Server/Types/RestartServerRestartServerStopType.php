<?php

namespace Upcloud\Server\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class RestartServerRestartServerStopType extends JsonSerializableType
{
    /**
     * @var value-of<RestartServerRestartServerStopTypeStopType> $stopType
     */
    #[JsonProperty('stop_type')]
    public string $stopType;

    /**
     * @param array{
     *   stopType: value-of<RestartServerRestartServerStopTypeStopType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->stopType = $values['stopType'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * A general error response indicating that the request could not be fulfilled due to a technical issue.
 */
class EventsError extends JsonSerializableType
{
    /**
     * @var EventsErrorError $error
     */
    #[JsonProperty('error')]
    public EventsErrorError $error;

    /**
     * @param array{
     *   error: EventsErrorError,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

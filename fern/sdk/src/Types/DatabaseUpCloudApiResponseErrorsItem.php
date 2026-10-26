<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseUpCloudApiResponseErrorsItem extends JsonSerializableType
{
    /**
     * @var ?string $message A descriptive error message.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $moreInfo A URL pointing to more information about the error.
     */
    #[JsonProperty('more_info')]
    public ?string $moreInfo;

    /**
     * @var ?int $status The HTTP status code associated with the error.
     */
    #[JsonProperty('status')]
    public ?int $status;

    /**
     * @param array{
     *   message?: ?string,
     *   moreInfo?: ?string,
     *   status?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->moreInfo = $values['moreInfo'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

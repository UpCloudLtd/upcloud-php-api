<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for UpCloud API error responses.
 */
class DatabaseUpcloudApiResponse extends JsonSerializableType
{
    /**
     * @var ?array<DatabaseUpcloudApiResponseErrorsItem> $errors A list of error messages returned by UpCloud's API.
     */
    #[JsonProperty('errors'), ArrayType([DatabaseUpcloudApiResponseErrorsItem::class])]
    public ?array $errors;

    /**
     * @var ?string $message The time the backup was created.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @param array{
     *   errors?: ?array<DatabaseUpcloudApiResponseErrorsItem>,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->message = $values['message'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

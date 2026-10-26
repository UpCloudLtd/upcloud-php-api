<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema for error responses from the API.
 */
class FirewallRulesetErrorResponse extends JsonSerializableType
{
    /**
     * @var string $type Error code string.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $title Short description of the error.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $correlationId Unique identifier for the request, useful for debugging.
     */
    #[JsonProperty('correlation_id')]
    public string $correlationId;

    /**
     * @var int $status HTTP status code associated with the error.
     */
    #[JsonProperty('status')]
    public int $status;

    /**
     * @var ?array<mixed> $invalidParams List of invalid parameters in the request.
     */
    #[JsonProperty('invalid_params'), ArrayType(['mixed'])]
    public ?array $invalidParams;

    /**
     * @param array{
     *   type: string,
     *   title: string,
     *   correlationId: string,
     *   status: int,
     *   invalidParams?: ?array<mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->title = $values['title'];
        $this->correlationId = $values['correlationId'];
        $this->status = $values['status'];
        $this->invalidParams = $values['invalidParams'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

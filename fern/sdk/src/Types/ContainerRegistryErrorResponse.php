<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryErrorResponse extends JsonSerializableType
{
    /**
     * @var string $type URI reference identifying the error type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $title Short human-readable summary of the error
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var int $status HTTP status code
     */
    #[JsonProperty('status')]
    public int $status;

    /**
     * @var ?string $correlationId Unique identifier for request tracing
     */
    #[JsonProperty('correlation_id')]
    public ?string $correlationId;

    /**
     * @var ?array<ContainerRegistryErrorResponseInvalidParamsItem> $invalidParams List of invalid parameters and their validation errors
     */
    #[JsonProperty('invalid_params'), ArrayType([ContainerRegistryErrorResponseInvalidParamsItem::class])]
    public ?array $invalidParams;

    /**
     * @param array{
     *   type: string,
     *   title: string,
     *   status: int,
     *   correlationId?: ?string,
     *   invalidParams?: ?array<ContainerRegistryErrorResponseInvalidParamsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->title = $values['title'];
        $this->status = $values['status'];
        $this->correlationId = $values['correlationId'] ?? null;
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

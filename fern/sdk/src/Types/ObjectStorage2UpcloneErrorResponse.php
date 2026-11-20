<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Error response following RFC 9457 (application/problem+json).
 */
class ObjectStorage2UpcloneErrorResponse extends JsonSerializableType
{
    /**
     * @var ?string $type URI to a page describing the problem. Omitted when no error code is available.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var string $title Human-readable description of the problem.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $detail Human-readable description specific to this occurrence of the problem.
     */
    #[JsonProperty('detail')]
    public ?string $detail;

    /**
     * @var ?array<ObjectStorage2UpcloneErrorResponseInvalidParamsItem> $invalidParams Parts of the request that caused the problem.
     */
    #[JsonProperty('invalid_params'), ArrayType([ObjectStorage2UpcloneErrorResponseInvalidParamsItem::class])]
    public ?array $invalidParams;

    /**
     * @var ?string $correlationId Identifier of the request that caused the problem.
     */
    #[JsonProperty('correlation_id')]
    public ?string $correlationId;

    /**
     * @var int $status HTTP status code.
     */
    #[JsonProperty('status')]
    public int $status;

    /**
     * @param array{
     *   title: string,
     *   status: int,
     *   type?: ?string,
     *   detail?: ?string,
     *   invalidParams?: ?array<ObjectStorage2UpcloneErrorResponseInvalidParamsItem>,
     *   correlationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'] ?? null;
        $this->title = $values['title'];
        $this->detail = $values['detail'] ?? null;
        $this->invalidParams = $values['invalidParams'] ?? null;
        $this->correlationId = $values['correlationId'] ?? null;
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

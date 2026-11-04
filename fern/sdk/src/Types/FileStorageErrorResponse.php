<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * RFC 9457 problem details returned by the API.
 */
class FileStorageErrorResponse extends JsonSerializableType
{
    /**
     * @var value-of<FileStorageErrorResponseType> $type URI identifying the UpCloud API error type. The URI fragment contains the stable error code.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $title Short description of the error.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $detail Human-readable information specific to this occurrence of the problem.
     */
    #[JsonProperty('detail')]
    public ?string $detail;

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
     * @var ?array<FileStorageErrorResponseInvalidParamsItem> $invalidParams Fields that failed request validation. Present only when field-specific validation details are available.
     */
    #[JsonProperty('invalid_params'), ArrayType([FileStorageErrorResponseInvalidParamsItem::class])]
    public ?array $invalidParams;

    /**
     * @param array{
     *   type: value-of<FileStorageErrorResponseType>,
     *   title: string,
     *   correlationId: string,
     *   status: int,
     *   detail?: ?string,
     *   invalidParams?: ?array<FileStorageErrorResponseInvalidParamsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->title = $values['title'];
        $this->detail = $values['detail'] ?? null;
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

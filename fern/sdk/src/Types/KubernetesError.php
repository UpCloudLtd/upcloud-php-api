<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Response error
 */
class KubernetesError extends JsonSerializableType
{
    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var int $status
     */
    #[JsonProperty('status')]
    public int $status;

    /**
     * @var ?string $invalidParams
     */
    #[JsonProperty('invalid_params')]
    public ?string $invalidParams;

    /**
     * @var string $correlationId
     */
    #[JsonProperty('correlation_id')]
    public string $correlationId;

    /**
     * @param array{
     *   type: string,
     *   title: string,
     *   status: int,
     *   correlationId: string,
     *   invalidParams?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->title = $values['title'];
        $this->status = $values['status'];
        $this->invalidParams = $values['invalidParams'] ?? null;
        $this->correlationId = $values['correlationId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

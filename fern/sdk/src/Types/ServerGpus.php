<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * GPUs attached to a Cloud Server. The array is empty when no GPUs are attached.
 */
class ServerGpus extends JsonSerializableType
{
    /**
     * @var array<ServerGpusGpusItem> $gpus
     */
    #[JsonProperty('gpus'), ArrayType([ServerGpusGpusItem::class])]
    public array $gpus;

    /**
     * @param array{
     *   gpus: array<ServerGpusGpusItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->gpus = $values['gpus'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

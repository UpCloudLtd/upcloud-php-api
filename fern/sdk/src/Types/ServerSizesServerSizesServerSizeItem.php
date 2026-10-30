<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerSizesServerSizesServerSizeItem extends JsonSerializableType
{
    /**
     * @var string $coreNumber Number of CPU cores
     */
    #[JsonProperty('core_number')]
    public string $coreNumber;

    /**
     * @var string $memoryAmount Amount of memory in MB
     */
    #[JsonProperty('memory_amount')]
    public string $memoryAmount;

    /**
     * @param array{
     *   coreNumber: string,
     *   memoryAmount: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->coreNumber = $values['coreNumber'];
        $this->memoryAmount = $values['memoryAmount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

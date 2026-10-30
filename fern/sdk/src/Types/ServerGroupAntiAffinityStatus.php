<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Status of anti-affinity policy
 */
class ServerGroupAntiAffinityStatus extends JsonSerializableType
{
    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @var value-of<ServerGroupAntiAffinityStatusStatus> $status Indicates whether the anti-affinity policy is currently being met ('met') or not ('unmet')
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   uuid: string,
     *   status: value-of<ServerGroupAntiAffinityStatusStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uuid = $values['uuid'];
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

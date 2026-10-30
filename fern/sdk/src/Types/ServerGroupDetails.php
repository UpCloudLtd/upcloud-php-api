<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Details of a server group
 */
class ServerGroupDetails extends JsonSerializableType
{
    /**
     * @var value-of<ServerGroupAntiAffinity> $antiAffinity
     */
    #[JsonProperty('anti_affinity')]
    public string $antiAffinity;

    /**
     * @var array<ServerGroupAntiAffinityStatus> $antiAffinityStatus
     */
    #[JsonProperty('anti_affinity_status'), ArrayType([ServerGroupAntiAffinityStatus::class])]
    public array $antiAffinityStatus;

    /**
     * @var ServerGroupDetailsLabels $labels List of labels associated with the server group.
     */
    #[JsonProperty('labels')]
    public ServerGroupDetailsLabels $labels;

    /**
     * @var ServerGroupDetailsServers $servers List of servers associated with the server group.
     */
    #[JsonProperty('servers')]
    public ServerGroupDetailsServers $servers;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $uuid
     */
    #[JsonProperty('uuid')]
    public string $uuid;

    /**
     * @param array{
     *   antiAffinity: value-of<ServerGroupAntiAffinity>,
     *   antiAffinityStatus: array<ServerGroupAntiAffinityStatus>,
     *   labels: ServerGroupDetailsLabels,
     *   servers: ServerGroupDetailsServers,
     *   title: string,
     *   uuid: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->antiAffinity = $values['antiAffinity'];
        $this->antiAffinityStatus = $values['antiAffinityStatus'];
        $this->labels = $values['labels'];
        $this->servers = $values['servers'];
        $this->title = $values['title'];
        $this->uuid = $values['uuid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

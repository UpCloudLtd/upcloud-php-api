<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerGroupModifyServerGroup extends JsonSerializableType
{
    /**
     * @var ?string $title The name of the server group
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?ServerGroupServers $servers
     */
    #[JsonProperty('servers')]
    public ?ServerGroupServers $servers;

    /**
     * @var ?ServerGroupModifyServerGroupLabels $labels Labels to categorize the server group
     */
    #[JsonProperty('labels')]
    public ?ServerGroupModifyServerGroupLabels $labels;

    /**
     * @var ?value-of<ServerGroupAntiAffinity> $antiAffinity
     */
    #[JsonProperty('anti_affinity')]
    public ?string $antiAffinity;

    /**
     * @param array{
     *   title?: ?string,
     *   servers?: ?ServerGroupServers,
     *   labels?: ?ServerGroupModifyServerGroupLabels,
     *   antiAffinity?: ?value-of<ServerGroupAntiAffinity>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->title = $values['title'] ?? null;
        $this->servers = $values['servers'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->antiAffinity = $values['antiAffinity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchSearchBackpressure extends JsonSerializableType
{
    /**
     * @var ?value-of<DatabaseServicePropertiesOpensearchSearchBackpressureMode> $mode The search backpressure mode. Valid values are monitor_only, enforced, or disabled. Default is monitor_only
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSearchBackpressureNodeDuress $nodeDuress
     */
    #[JsonProperty('node_duress')]
    public ?DatabaseServicePropertiesOpensearchSearchBackpressureNodeDuress $nodeDuress;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSearchBackpressureSearchShardTask $searchShardTask
     */
    #[JsonProperty('search_shard_task')]
    public ?DatabaseServicePropertiesOpensearchSearchBackpressureSearchShardTask $searchShardTask;

    /**
     * @var ?DatabaseServicePropertiesOpensearchSearchBackpressureSearchTask $searchTask
     */
    #[JsonProperty('search_task')]
    public ?DatabaseServicePropertiesOpensearchSearchBackpressureSearchTask $searchTask;

    /**
     * @param array{
     *   mode?: ?value-of<DatabaseServicePropertiesOpensearchSearchBackpressureMode>,
     *   nodeDuress?: ?DatabaseServicePropertiesOpensearchSearchBackpressureNodeDuress,
     *   searchShardTask?: ?DatabaseServicePropertiesOpensearchSearchBackpressureSearchShardTask,
     *   searchTask?: ?DatabaseServicePropertiesOpensearchSearchBackpressureSearchTask,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mode = $values['mode'] ?? null;
        $this->nodeDuress = $values['nodeDuress'] ?? null;
        $this->searchShardTask = $values['searchShardTask'] ?? null;
        $this->searchTask = $values['searchTask'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

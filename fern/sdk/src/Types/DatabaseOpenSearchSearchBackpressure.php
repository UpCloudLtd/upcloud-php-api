<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseOpenSearchSearchBackpressure extends JsonSerializableType
{
    /**
     * @var ?value-of<DatabaseOpenSearchSearchBackpressureMode> $mode The search backpressure mode. Valid values are monitor_only, enforced, or disabled. Default is monitor_only
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?DatabaseOpenSearchSearchBackpressureNodeDuress $nodeDuress
     */
    #[JsonProperty('node_duress')]
    public ?DatabaseOpenSearchSearchBackpressureNodeDuress $nodeDuress;

    /**
     * @var ?DatabaseOpenSearchSearchBackpressureSearchShardTask $searchShardTask
     */
    #[JsonProperty('search_shard_task')]
    public ?DatabaseOpenSearchSearchBackpressureSearchShardTask $searchShardTask;

    /**
     * @var ?DatabaseOpenSearchSearchBackpressureSearchTask $searchTask
     */
    #[JsonProperty('search_task')]
    public ?DatabaseOpenSearchSearchBackpressureSearchTask $searchTask;

    /**
     * @param array{
     *   mode?: ?value-of<DatabaseOpenSearchSearchBackpressureMode>,
     *   nodeDuress?: ?DatabaseOpenSearchSearchBackpressureNodeDuress,
     *   searchShardTask?: ?DatabaseOpenSearchSearchBackpressureSearchShardTask,
     *   searchTask?: ?DatabaseOpenSearchSearchBackpressureSearchTask,
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

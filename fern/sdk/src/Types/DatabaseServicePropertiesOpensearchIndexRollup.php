<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchIndexRollup extends JsonSerializableType
{
    /**
     * @var ?bool $rollupDashboardsEnabled Whether rollups are enabled in OpenSearch Dashboards. Defaults to true.
     */
    #[JsonProperty('rollup_dashboards_enabled')]
    public ?bool $rollupDashboardsEnabled;

    /**
     * @var ?bool $rollupEnabled Whether the rollup plugin is enabled. Defaults to true.
     */
    #[JsonProperty('rollup_enabled')]
    public ?bool $rollupEnabled;

    /**
     * @var ?int $rollupSearchBackoffCount How many retries the plugin should attempt for failed rollup jobs. Defaults to 5.
     */
    #[JsonProperty('rollup_search_backoff_count')]
    public ?int $rollupSearchBackoffCount;

    /**
     * @var ?int $rollupSearchBackoffMillis The backoff time between retries for failed rollup jobs. Defaults to 1000ms.
     */
    #[JsonProperty('rollup_search_backoff_millis')]
    public ?int $rollupSearchBackoffMillis;

    /**
     * @var ?bool $rollupSearchSearchAllJobs Whether OpenSearch should return all jobs that match all specified search terms. If disabled, OpenSearch returns just one, as opposed to all, of the jobs that matches the search terms. Defaults to false.
     */
    #[JsonProperty('rollup_search_search_all_jobs')]
    public ?bool $rollupSearchSearchAllJobs;

    /**
     * @param array{
     *   rollupDashboardsEnabled?: ?bool,
     *   rollupEnabled?: ?bool,
     *   rollupSearchBackoffCount?: ?int,
     *   rollupSearchBackoffMillis?: ?int,
     *   rollupSearchSearchAllJobs?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->rollupDashboardsEnabled = $values['rollupDashboardsEnabled'] ?? null;
        $this->rollupEnabled = $values['rollupEnabled'] ?? null;
        $this->rollupSearchBackoffCount = $values['rollupSearchBackoffCount'] ?? null;
        $this->rollupSearchBackoffMillis = $values['rollupSearchBackoffMillis'] ?? null;
        $this->rollupSearchSearchAllJobs = $values['rollupSearchSearchAllJobs'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

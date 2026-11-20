<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchSearchBackpressureSearchTask extends JsonSerializableType
{
    /**
     * @var ?float $cancellationBurst The maximum number of search tasks to cancel in a single iteration of the observer thread. Default is 5.0
     */
    #[JsonProperty('cancellation_burst')]
    public ?float $cancellationBurst;

    /**
     * @var ?float $cancellationRate The maximum number of search tasks to cancel per millisecond of elapsed time. Default is 0.003
     */
    #[JsonProperty('cancellation_rate')]
    public ?float $cancellationRate;

    /**
     * @var ?float $cancellationRatio The maximum number of search tasks to cancel, as a percentage of successful search task completions. Default is 0.1
     */
    #[JsonProperty('cancellation_ratio')]
    public ?float $cancellationRatio;

    /**
     * @var ?int $cpuTimeMillisThreshold The CPU usage threshold (in milliseconds) required for an individual parent task before it is considered for cancellation. Default is 30000
     */
    #[JsonProperty('cpu_time_millis_threshold')]
    public ?int $cpuTimeMillisThreshold;

    /**
     * @var ?int $elapsedTimeMillisThreshold The elapsed time threshold (in milliseconds) required for an individual parent task before it is considered for cancellation. Default is 45000
     */
    #[JsonProperty('elapsed_time_millis_threshold')]
    public ?int $elapsedTimeMillisThreshold;

    /**
     * @var ?int $heapMovingAverageWindowSize The window size used to calculate the rolling average of the heap usage for the completed parent tasks. Default is 10
     */
    #[JsonProperty('heap_moving_average_window_size')]
    public ?int $heapMovingAverageWindowSize;

    /**
     * @var ?float $heapPercentThreshold The heap usage threshold (as a percentage) required for an individual parent task before it is considered for cancellation. Default is 0.2
     */
    #[JsonProperty('heap_percent_threshold')]
    public ?float $heapPercentThreshold;

    /**
     * @var ?float $heapVariance The heap usage variance required for an individual parent task before it is considered for cancellation. A task is considered for cancellation when taskHeapUsage is greater than or equal to heapUsageMovingAverage * variance. Default is 2.0
     */
    #[JsonProperty('heap_variance')]
    public ?float $heapVariance;

    /**
     * @var ?float $totalHeapPercentThreshold The heap usage threshold (as a percentage) required for the sum of heap usages of all search tasks before cancellation is applied. Default is 0.5
     */
    #[JsonProperty('total_heap_percent_threshold')]
    public ?float $totalHeapPercentThreshold;

    /**
     * @param array{
     *   cancellationBurst?: ?float,
     *   cancellationRate?: ?float,
     *   cancellationRatio?: ?float,
     *   cpuTimeMillisThreshold?: ?int,
     *   elapsedTimeMillisThreshold?: ?int,
     *   heapMovingAverageWindowSize?: ?int,
     *   heapPercentThreshold?: ?float,
     *   heapVariance?: ?float,
     *   totalHeapPercentThreshold?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cancellationBurst = $values['cancellationBurst'] ?? null;
        $this->cancellationRate = $values['cancellationRate'] ?? null;
        $this->cancellationRatio = $values['cancellationRatio'] ?? null;
        $this->cpuTimeMillisThreshold = $values['cpuTimeMillisThreshold'] ?? null;
        $this->elapsedTimeMillisThreshold = $values['elapsedTimeMillisThreshold'] ?? null;
        $this->heapMovingAverageWindowSize = $values['heapMovingAverageWindowSize'] ?? null;
        $this->heapPercentThreshold = $values['heapPercentThreshold'] ?? null;
        $this->heapVariance = $values['heapVariance'] ?? null;
        $this->totalHeapPercentThreshold = $values['totalHeapPercentThreshold'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

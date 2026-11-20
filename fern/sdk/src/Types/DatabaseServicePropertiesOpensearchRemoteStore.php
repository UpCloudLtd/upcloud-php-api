<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchRemoteStore extends JsonSerializableType
{
    /**
     * @var ?float $segmentPressureBytesLagVarianceFactor The variance factor that is used together with the moving average to calculate the dynamic bytes lag threshold for activating remote segment backpressure. Defaults to 10.
     */
    #[JsonProperty('segment.pressure.bytes_lag.variance_factor')]
    public ?float $segmentPressureBytesLagVarianceFactor;

    /**
     * @var ?int $segmentPressureConsecutiveFailuresLimit The minimum consecutive failure count for activating remote segment backpressure. Defaults to 5.
     */
    #[JsonProperty('segment.pressure.consecutive_failures.limit')]
    public ?int $segmentPressureConsecutiveFailuresLimit;

    /**
     * @var ?bool $segmentPressureEnabled Enables remote segment backpressure. Default is `true`
     */
    #[JsonProperty('segment.pressure.enabled')]
    public ?bool $segmentPressureEnabled;

    /**
     * @var ?float $segmentPressureTimeLagVarianceFactor The variance factor that is used together with the moving average to calculate the dynamic time lag threshold for activating remote segment backpressure. Defaults to 10.
     */
    #[JsonProperty('segment.pressure.time_lag.variance_factor')]
    public ?float $segmentPressureTimeLagVarianceFactor;

    /**
     * @param array{
     *   segmentPressureBytesLagVarianceFactor?: ?float,
     *   segmentPressureConsecutiveFailuresLimit?: ?int,
     *   segmentPressureEnabled?: ?bool,
     *   segmentPressureTimeLagVarianceFactor?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->segmentPressureBytesLagVarianceFactor = $values['segmentPressureBytesLagVarianceFactor'] ?? null;
        $this->segmentPressureConsecutiveFailuresLimit = $values['segmentPressureConsecutiveFailuresLimit'] ?? null;
        $this->segmentPressureEnabled = $values['segmentPressureEnabled'] ?? null;
        $this->segmentPressureTimeLagVarianceFactor = $values['segmentPressureTimeLagVarianceFactor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

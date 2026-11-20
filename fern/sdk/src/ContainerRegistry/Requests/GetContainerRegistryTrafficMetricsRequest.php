<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Types\ContainerRegistryTrafficResolution;

class GetContainerRegistryTrafficMetricsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $from Start of the window. Defaults to 7 days before to.
     */
    public ?DateTime $from;

    /**
     * @var ?DateTime $to End of the window. Defaults to now.
     */
    public ?DateTime $to;

    /**
     * @var ?value-of<ContainerRegistryTrafficResolution> $resolution Bucket width.
     */
    public ?string $resolution;

    /**
     * @param array{
     *   from?: ?DateTime,
     *   to?: ?DateTime,
     *   resolution?: ?value-of<ContainerRegistryTrafficResolution>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->from = $values['from'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->resolution = $values['resolution'] ?? null;
    }
}

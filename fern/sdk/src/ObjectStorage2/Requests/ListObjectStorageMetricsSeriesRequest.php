<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use DateTime;
use Upcloud\Types\ObjectStorage2QueryParamSort;

class ListObjectStorageMetricsSeriesRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $from Beginning of the time range for which to return metrics.
     */
    public ?DateTime $from;

    /**
     * @var ?DateTime $to End of the time range for which to return metrics.
     */
    public ?DateTime $to;

    /**
     * @var ?string $interval Metrics aggregation interval.
     */
    public ?string $interval;

    /**
     * @var ?value-of<ObjectStorage2QueryParamSort> $sort Order of returned results.
     */
    public ?string $sort;

    /**
     * @var ?int $limit Number of entries to receive at most.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Offset for retrieved results.
     */
    public ?int $offset;

    /**
     * @param array{
     *   from?: ?DateTime,
     *   to?: ?DateTime,
     *   interval?: ?string,
     *   sort?: ?value-of<ObjectStorage2QueryParamSort>,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->from = $values['from'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->interval = $values['interval'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}

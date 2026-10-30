<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ServerDiskStatsSummaryVariableItem extends JsonSerializableType
{
    /**
     * @var string $average Average transfer rate or request rate during the period.
     */
    #[JsonProperty('average')]
    public string $average;

    /**
     * @var string $current Most recent transfer rate or request rate.
     */
    #[JsonProperty('current')]
    public string $current;

    /**
     * @var value-of<ServerDiskStatsSummaryVariableItemTitle> $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $maximum Maximum transfer rate or request rate during the period.
     */
    #[JsonProperty('maximum')]
    public string $maximum;

    /**
     * @var string $total Total transferred data or I/O requests during the period.
     */
    #[JsonProperty('total')]
    public string $total;

    /**
     * @param array{
     *   average: string,
     *   current: string,
     *   title: value-of<ServerDiskStatsSummaryVariableItemTitle>,
     *   maximum: string,
     *   total: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->average = $values['average'];
        $this->current = $values['current'];
        $this->title = $values['title'];
        $this->maximum = $values['maximum'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

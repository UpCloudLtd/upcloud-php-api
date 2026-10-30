<?php

namespace Upcloud\Router\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\RouterLabel;

class RouterCreateRouter extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<RouterCreateRouterStaticRoutesItem> $staticRoutes Static routes that will be added to the routing table of the SDN router
     */
    #[JsonProperty('static_routes'), ArrayType([RouterCreateRouterStaticRoutesItem::class])]
    public ?array $staticRoutes;

    /**
     * @var ?array<RouterLabel> $labels
     */
    #[JsonProperty('labels'), ArrayType([RouterLabel::class])]
    public ?array $labels;

    /**
     * @param array{
     *   name: string,
     *   staticRoutes?: ?array<RouterCreateRouterStaticRoutesItem>,
     *   labels?: ?array<RouterLabel>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->staticRoutes = $values['staticRoutes'] ?? null;
        $this->labels = $values['labels'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

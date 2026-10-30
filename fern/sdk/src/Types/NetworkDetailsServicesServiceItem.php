<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class NetworkDetailsServicesServiceItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<string> $serviceRoutes
     */
    #[JsonProperty('service_routes'), ArrayType(['string'])]
    public array $serviceRoutes;

    /**
     * @param array{
     *   name: string,
     *   serviceRoutes: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->serviceRoutes = $values['serviceRoutes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}

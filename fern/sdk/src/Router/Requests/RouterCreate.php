<?php

namespace Upcloud\Router\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Router\Types\RouterCreateRouter;
use Upcloud\Core\Json\JsonProperty;

class RouterCreate extends JsonSerializableType
{
    /**
     * @var RouterCreateRouter $router
     */
    #[JsonProperty('router')]
    public RouterCreateRouter $router;

    /**
     * @param array{
     *   router: RouterCreateRouter,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->router = $values['router'];
    }
}

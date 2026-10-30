<?php

namespace Upcloud\Router\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Router\Types\RouterModifyRouter;
use Upcloud\Core\Json\JsonProperty;

class RouterModify extends JsonSerializableType
{
    /**
     * @var RouterModifyRouter $routerModifyRouter
     */
    #[JsonProperty('router')]
    public RouterModifyRouter $routerModifyRouter;

    /**
     * @param array{
     *   routerModifyRouter: RouterModifyRouter,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->routerModifyRouter = $values['routerModifyRouter'];
    }
}

<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Routers
{
    /**
     * @var Router[]|null
     */
    private $router;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setRouter($data['router'] ?? null);
    }

    /**
     * @return Router[]|null
     */
    public function getRouter(): ?array
    {
        return $this->router;
    }

    /**
     * @param Router[]|null $router
     * @return Routers
     */
    public function setRouter(?array $router): Routers
    {
        if (is_array($router)) {
            foreach ($router as $item) {
                $this->router[] = $item instanceof Router
                    ? $item
                    : new Router($item);
            }
        } else {
            $this->router = $router;
        }

        return $this;
    }
}

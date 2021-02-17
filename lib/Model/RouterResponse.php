<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class RouterResponse
{
    /**
     * @var Router|null
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
     * @return Router|null
     */
    public function getRouter(): ?Router
    {
        return $this->router;
    }

    /**
     * @param Router|array|null $router
     * @return RouterResponse
     */
    public function setRouter($router): RouterResponse
    {
        if (is_array($router)) {
            $this->router = new Router($router);
        } else {
            $this->router = $router;
        }

        return $this;
    }

}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class RoutersListResponse
{
    /**
     * @var Routers|null
     */
    private $routers;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setRouters($data['routers'] ?? null);
    }

    /**
     * @return Routers|null
     */
    public function getRouters(): ?Routers
    {
        return $this->routers;
    }

    /**
     * @param Routers|array|null $routers
     * @return RoutersListResponse
     */
    public function setRouters($routers): RoutersListResponse
    {
        if (is_array($routers)) {
            $this->routers = new Routers($routers);
        } else {
            $this->routers = $routers;
        }

        return $this;
    }
}



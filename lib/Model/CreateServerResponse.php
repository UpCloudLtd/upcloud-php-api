<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class CreateServerResponse
{
    /**
     * @var Server|null
     */
    private $server;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setServer($data['server'] ?? null);
    }

    /**
     * @return Server|null
     */
    public function getServer(): ?Server
    {
        return $this->server;
    }

    /**
     * @param Server|array|null $server
     * @return CreateServerResponse
     */
    public function setServer($server): CreateServerResponse
    {
        if (is_array($server)) {
            $this->server = new Server($server);
        } else {
            $this->server = $server;
        }

        return $this;
    }
}

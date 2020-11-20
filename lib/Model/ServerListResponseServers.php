<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ServerListResponseServers
{
    /**
     * @var Server[]|null
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
     * @return Server[]|null
     */
    public function getServer(): ?array
    {
        return $this->server;
    }

    /**
     * @param Server[]|null $server
     * @return ServerListResponseServers
     */
    public function setServer(?array $server): ServerListResponseServers
    {
        if (is_array($server)) {
            foreach ($server as $item) {
                $this->server[] = $item instanceof Server ? $item : new Server($item);
            }
        } else {
            $this->server = $server;
        }

        return $this;
    }
}



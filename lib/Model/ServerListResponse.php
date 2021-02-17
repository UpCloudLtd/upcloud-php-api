<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ServerListResponse
{

    /**
     * @var ServerListResponseServers|null
     */
    private $servers;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->servers = $data['servers'] ?? null;
    }

    /**
     * @return ServerListResponseServers|null
     */
    public function getServers(): ?ServerListResponseServers
    {
        return $this->servers;
    }

    /**
     * @param ServerListResponseServers|array|null $servers
     * @return ServerListResponse
     */
    public function setServers($servers): ServerListResponse
    {
        if (is_array($servers)) {
            $this->servers = new ServerListResponseServers($servers);
        } else {
            $this->servers = $servers;
        }

        return $this;
    }

}



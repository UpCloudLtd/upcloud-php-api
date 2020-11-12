<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class StorageServers
{
    /**
     * @var string[]|null
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
     * @return string[]|null
     */
    public function getServer(): ?array
    {
        return $this->server;
    }

    /**
     * @param string[]|null $server
     * @return StorageServers
     */
    public function setServer(?array $server): StorageServers
    {
        if (is_array($server)) {
            foreach ($server as $item) {
                $this->server[] = $item;
            }
        } else {
            $this->server = $server;
        }

        return $this;
    }
}



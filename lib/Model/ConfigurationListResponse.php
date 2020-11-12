<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ConfigurationListResponse
{
    /**
     * @var ConfigurationListResponseServerSizes|null
     */
    private $serverSizes;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->serverSizes = $data['server_sizes'] ?? null;
    }

    /**
     * @return ConfigurationListResponseServerSizes|null
     */
    public function getServerSizes(): ?ConfigurationListResponseServerSizes
    {
        return $this->serverSizes;
    }

    /**
     * @param ConfigurationListResponseServerSizes|array|null $serverSizes
     * @return ConfigurationListResponse
     */
    public function setServerSizes($serverSizes): ConfigurationListResponse
    {
        if (is_array($serverSizes)) {
            $this->serverSizes = new ConfigurationListResponseServerSizes($serverSizes);
        } else {
            $this->serverSizes = $serverSizes;
        }

        return $this;
    }
}



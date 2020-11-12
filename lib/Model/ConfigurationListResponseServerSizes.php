<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ConfigurationListResponseServerSizes
{
    /**
     * @var ServerSize[]|null
     */
    private $serverSize;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setServerSize($data['server_size'] ?? null);
    }

    /**
     * @return ServerSize[]|null
     */
    public function getServerSize(): ?array
    {
        return $this->serverSize;
    }

    /**
     * @param ServerSize[]|array|null $serverSize
     * @return ConfigurationListResponseServerSizes
     */
    public function setServerSize(?array $serverSize): ConfigurationListResponseServerSizes
    {
        if (is_array($serverSize)) {
            foreach ($serverSize as $item) {
                $this->serverSize[] = new ServerSize($item);
            }
        } else {
            $this->serverSize = $serverSize;
        }

        return $this;
    }

}



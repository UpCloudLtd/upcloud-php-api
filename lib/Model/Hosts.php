<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Hosts
{
    /**
     * @var Host[]|null
     */
    private $host;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setHost($data['host'] ?? null);
    }

    /**
     * @return Host[]|null
     */
    public function getHost(): ?array
    {
        return $this->host;
    }

    /**
     * @param Host[]|array|null $host
     * @return Hosts
     */
    public function setHost(?array $host): Hosts
    {
        if (is_array($host)) {
            foreach ($host as $item) {
                $this->host[] = $item instanceof Host
                    ? $item
                    : new Host($item);
            }
        } else {
            $this->host = $host;
        }

        return $this;
    }

}

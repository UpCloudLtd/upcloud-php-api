<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class HostResponse
{
    /**
     * @var Host|null
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
     * @return Host|null
     */
    public function getHost(): ?Host
    {
        return $this->host;
    }

    /**
     * @param Host|array|null $host
     * @return HostResponse
     */
    public function setHost($host): HostResponse
    {
        if (is_array($host)) {
            $this->host =new Host($host);
        } else {
            $this->host = $host;
        }

        return $this;
    }

}

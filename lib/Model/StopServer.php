<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class StopServer extends UpcloudApiRequest
{
    /**
     * @var StopServerRequest|null
     */
    private $stopServer;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->setStopServer($data['stop_server'] ?? null);
    }

    /**
     * @return StopServerRequest|null
     */
    public function getStopServer(): ?StopServerRequest
    {
        return $this->stopServer;
    }

    /**
     * @param StopServerRequest|array|null $stopServer
     * @return StopServer
     */
    public function setStopServer($stopServer): StopServer
    {
        if (is_array($stopServer)) {
            $this->stopServer = new StopServerRequest($stopServer);
        } else {
            $this->stopServer = $stopServer;
        }

        return $this;
    }
}

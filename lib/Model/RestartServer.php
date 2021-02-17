<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class RestartServer extends UpcloudApiRequest
{
    /**
     * @var RestartServerRequest
     */
    private $restartServer;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->restartServer = $data['restart_server'] ??
             new RestartServerRequest;
    }

    /**
     * @return RestartServerRequest
     */
    public function getRestartServer(): RestartServerRequest
    {
        return $this->restartServer;
    }

    /**
     * @param RestartServerRequest|array $restartServer
     * @return RestartServer
     */
    public function setRestartServer($restartServer): RestartServer
    {
        if (is_array($restartServer)) {
            $this->restartServer = new RestartServerRequest($restartServer);
        } else {
            $this->restartServer = $restartServer;
        }

        return $this;
    }
}



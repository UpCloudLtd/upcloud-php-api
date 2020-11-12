<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class ServerRequest extends UpcloudApiRequest
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
        parent::__construct();
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
     * @return $this
     */
    public function setServer($server): self
    {
        if (is_array($server)) {
            $this->server = new Server($server);
        } else {
            $this->server = $server;
        }

        return $this;
    }
}

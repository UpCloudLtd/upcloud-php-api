<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class NetworkRequest extends UpcloudApiRequest
{
    /**
     * @var Network|null
     */
    private $network;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->setNetwork($data['network'] ?? null);
    }

    /**
     * @return Network|null
     */
    public function getNetwork(): ?Network
    {
        return $this->network;
    }

    /**
     * @param Network|array|null $network
     * @return NetworkRequest
     */
    public function setNetwork($network): NetworkRequest
    {
        if (is_array($network)) {
            $this->network = new Network($network);
        } else {
            $this->network = $network;
        }

        return $this;
    }
}

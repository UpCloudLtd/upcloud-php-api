<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class NetworkInterfaceRequest extends UpcloudApiRequest
{
    /**
     * @var NetworkInterface|null
     */
    private $interface;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->setInterface($data['interface'] ?? null);
    }

    /**
     * @return NetworkInterface|null
     */
    public function getInterface(): ?NetworkInterface
    {
        return $this->interface;
    }

    /**
     * @param NetworkInterface|array|null $interface
     * @return NetworkInterfaceRequest
     */
    public function setInterface(?array $interface): NetworkInterfaceRequest
    {
        if (is_array($interface)) {
                $this->interface = new NetworkInterface($interface);
        } else {
            $this->interface = $interface;
        }

        return $this;
    }
}

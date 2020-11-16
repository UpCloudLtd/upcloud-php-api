<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class AttachNetwork
{
    /**
     * @var string[]|null
     */
    private $network;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setNetwork($data['network'] ?? null);
    }

    /**
     * @return string[]|null
     */
    public function getNetwork(): ?array
    {
        return $this->network;
    }

    /**
     * @param string[]|null $network
     * @return AttachNetwork
     */
    public function setNetwork(?array $network): AttachNetwork
    {
        $this->network = $network;

        return $this;
    }
}

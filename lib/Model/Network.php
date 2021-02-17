<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class Network
{
    const TYPE_PUBLIC = 'public';
    const TYPE_PRIVATE = 'private';
    const TYPE_UTILITY = 'utility';


    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $uuid;

    /**
     * @var string|null
     */
    private $zone;

    /**
     * @var string|null
     */
    private $router;

    /**
     * @var IpNetworks|null
     */
    private $ipNetworks;

    /**
     * @var Servers|null
     */
    private $servers;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setName($data['name'] ?? null);
        $this->setType($data['type'] ?? null);
        $this->setUuid($data['uuid'] ?? null);
        $this-> setZone($data['zone'] ?? null);
        $this->setRouter($data['router'] ?? null);
        $this->setIpNetworks($data['ip_networks'] ?? null);
        $this->setServers($data['servers'] ?? null);
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Network
     */
    public function setName(?string $name): Network
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Network
     */
    public function setType(?string $type): Network
    {
        if (!is_null($type)) {
            Assert::oneOf($type, [
                self::TYPE_PRIVATE,
                self::TYPE_PUBLIC,
                self::TYPE_UTILITY,
            ]);
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     * @return Network
     */
    public function setUuid(?string $uuid): Network
    {
        if (!is_null($uuid)) {
            Assert::uuid($uuid);
        }

        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZone(): ?string
    {
        return $this->zone;
    }

    /**
     * @param string|null $zone
     * @return Network
     */
    public function setZone(?string $zone): Network
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRouter(): ?string
    {
        return $this->router;
    }

    /**
     * @param string|null $router
     * @return Network
     */
    public function setRouter(?string $router): Network
    {
        $this->router = $router;

        return $this;
    }

    /**
     * @return IpNetworks|null
     */
    public function getIpNetworks(): ?IpNetworks
    {
        return $this->ipNetworks;
    }

    /**
     * @param IpNetworks|array|null $ipNetworks
     * @return Network
     */
    public function setIpNetworks($ipNetworks): Network
    {
        if (is_array($ipNetworks)) {
            $this->ipNetworks = new IpNetworks($ipNetworks);
        } else {
            $this->ipNetworks = $ipNetworks;
        }


        return $this;
    }

    /**
     * @return Servers|null
     */
    public function getServers(): ?Servers
    {
        return $this->servers;
    }

    /**
     * @param Servers|array|null $servers
     * @return Network
     */
    public function setServers($servers): Network
    {
        if (is_array($servers)) {
            $this->servers = new Servers($servers);
        } else {
            $this->servers = $servers;
        }

        return $this;
    }
}

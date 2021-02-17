<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class Router
{

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
     * @var AttachNetwork|null
     */
    private $attachedNetworks;


    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setName($data['name'] ?? null);
        $this->setType($data['type'] ?? null);
        $this->setUuid($data['uuid'] ?? null);
        $this->setAttachedNetworks($data['attached_networks'] ?? null);
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
     * @return Router
     */
    public function setName(?string $name): Router
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
     * @return Router
     */
    public function setType(?string $type): Router
    {

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
     * @return Router
     */
    public function setUuid(?string $uuid): Router
    {
        if (!is_null($uuid)) {
            Assert::uuid($uuid);
        }

        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return AttachNetwork|null
     */
    public function getAttachedNetworks(): ?AttachNetwork
    {
        return $this->attachedNetworks;
    }

    /**
     * @param AttachNetwork|array|null $attachedNetworks
     * @return Router
     */
    public function setAttachedNetworks($attachedNetworks): Router
    {
        if (is_array($attachedNetworks)) {
            $this->attachedNetworks = new AttachNetwork($attachedNetworks);
        } else {
            $this->attachedNetworks = $attachedNetworks;
        }

        return $this;
    }
}

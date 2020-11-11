<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Tag
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var TagServers|null
     */
    private $servers;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setName($data['name'] ?? null);
        $this->setDescription($data['description'] ?? null);
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
     * @return Tag
     */
    public function setName(?string $name): Tag
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Tag
     */
    public function setDescription(?string $description): Tag
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return TagServers|null
     */
    public function getServers(): ?TagServers
    {
        return $this->servers;
    }

    /**
     * @param TagServers|array|null $servers
     * @return Tag
     */
    public function setServers($servers): Tag
    {
        if (is_array($servers)) {
            $this->servers = new TagServers($servers);
        } else {
            $this->servers = $servers;
        }

        return $this;
    }
}



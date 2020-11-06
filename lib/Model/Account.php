<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Account
{
    /**
     * @var float|null
     */
    private $credits;

    /**
     * @var string|null
     */
    private $username;

    /**
     * @var AccountResourceLimits|null
     */
    private $resourceLimits;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->credits  = $data['credits'] ?? null;
        $this->username = $data['username'] ?? null;
        $this->setResourceLimits($data['resource_limits'] ?? null);
    }

    /**
     * Gets credits
     * @return float|null
     */
    public function getCredits(): ?float
    {
        return $this->credits;
    }

    /**
     * Sets credits
     * @param float|null $credits
     * @return Account
     */
    public function setCredits(?float $credits): Account
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Gets username
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Sets username
     * @param string|null $username
     * @return Account
     */
    public function setUsername(?string $username): Account
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return AccountResourceLimits|null
     */
    public function getResourceLimits(): ?AccountResourceLimits
    {
        return $this->resourceLimits;
    }

    /**
     * @param AccountResourceLimits|array|null $resourceLimits
     * @return Account
     */
    public function setResourceLimits($resourceLimits): Account
    {
        if (is_array($resourceLimits)) {
            $this->resourceLimits = new AccountResourceLimits($resourceLimits);
        } else {
            $this->resourceLimits = $resourceLimits;
        }

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Stat
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $timestamp;

    /**
     * @var string|float|null
     */
    private $value;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setName($data['name'] ?? null);
        $this->setTimestamp($data['timestamp'] ?? null);
        $this->setValue($data['value'] ?? null);
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
     * @return Stat
     */
    public function setName(?string $name): Stat
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    /**
     * @param string|null $timestamp
     * @return Stat
     */
    public function setTimestamp(?string $timestamp): Stat
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float|string|null $value
     * @return Stat
     */
    public function setValue($value): Stat
    {
        $this->value = $value;

        return $this;
    }

}

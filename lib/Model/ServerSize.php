<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ServerSize
{
    /**
     * @var string|float|null
     */
    private $coreNumber;

    /**
     * @var string|float|null
     */
    private $memoryAmount;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setCoreNumber($data['core_number'] ?? null);
        $this->setMemoryAmount($data['memory_amount'] ?? null);
    }

    /**
     * @return float|string|null
     */
    public function getCoreNumber()
    {
        return $this->coreNumber;
    }

    /**
     * @param float|string|null $coreNumber
     * @return ServerSize
     */
    public function setCoreNumber($coreNumber): ServerSize
    {
        $this->coreNumber = $coreNumber;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getMemoryAmount()
    {
        return $this->memoryAmount;
    }

    /**
     * @param float|string|null $memoryAmount
     * @return ServerSize
     */
    public function setMemoryAmount($memoryAmount): ServerSize
    {
        $this->memoryAmount = $memoryAmount;

        return $this;
    }

}



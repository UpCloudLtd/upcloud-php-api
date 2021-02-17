<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class StopServerRequest
{

    const STOP_TYPE_SOFT = 'soft';
    const STOP_TYPE_HARD = 'hard';

    /**
     * @var string
     */
    private $stopType;

    /**
     * @var string|float|null
     */
    private $timeout;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setStopType($data['stop_type'] ?? self::STOP_TYPE_SOFT);
        $this->setTimeout($data['timeout'] ?? null);
    }

    /**
     * @return string
     */
    public function getStopType(): string
    {
        return $this->stopType;
    }

    /**
     * @param string $stopType
     * @return StopServerRequest
     */
    public function setStopType(string $stopType): StopServerRequest
    {
        Assert::oneOf($stopType, [
            self::STOP_TYPE_SOFT,
            self::STOP_TYPE_HARD
        ]);

        $this->stopType = $stopType;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param float|string|null $timeout
     * @return StopServerRequest
     */
    public function setTimeout($timeout): StopServerRequest
    {
        if (!is_null($timeout)) {
            Assert::range($timeout, '1', '600');
        }

        $this->timeout = $timeout;

        return $this;
    }
}



<?php

declare(strict_types=1);


namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class BackupRule
{
    const INTERVAL_DAILY = 'daily';
    const INTERVAL_MON = 'mon';
    const INTERVAL_TUE = 'tue';
    const INTERVAL_WED = 'wed';
    const INTERVAL_THU = 'thu';
    const INTERVAL_FRI = 'fri';
    const INTERVAL_SAT = 'sat';
    const INTERVAL_SUN = 'sun';

    /**
     * @var string|null
     */
    private $interval;

    /**
     * @var string|null
     */
    private $time;

    /**
     * @var string|float|null
     */
    private $retention;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setInterval($data['interval'] ?? null);
        $this->time =  $data['time'] ?? null;
        $this->retention =  $data['retention'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * @param string|null $interval
     * @return BackupRule
     */
    public function setInterval(?string $interval): BackupRule
    {
        if (!is_null($interval)) {
            Assert::oneOf($interval, [
                self::INTERVAL_DAILY,
                self::INTERVAL_MON,
                self::INTERVAL_TUE,
                self::INTERVAL_WED,
                self::INTERVAL_THU,
                self::INTERVAL_FRI,
                self::INTERVAL_SAT,
                self::INTERVAL_SUN,
            ]);
        }

        $this->interval = $interval;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->time;
    }

    /**
     * @param string|null $time
     * @return BackupRule
     */
    public function setTime(?string $time): BackupRule
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return float|string|null
     */
    public function getRetention()
    {
        return $this->retention;
    }

    /**
     * @param float|string|null $retention
     * @return BackupRule
     */
    public function setRetention($retention): BackupRule
    {
        $this->retention = $retention;

        return $this;
    }
}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class RestartServerRequest
{

    const STOP_TYPE_SOFT = 'soft';
    const STOP_TYPE_HARD = 'hard';

    const TIMEOUT_ACTION_DESTROY = 'destroy';
    const TIMEOUT_ACTION_IGNORE = 'ignore';

    /**
     * @var string
     */
    private $stopType;

    /**
     * @var string|null
     */
    private $timeoutAction;

    /**
     * @var float|string|null
     */
    private $timeout;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setStopType($data['stop_type'] ?? self::STOP_TYPE_SOFT);
        $this->setTimeoutAction($data['timeout_action'] ?? null);
        $this->setTimeout($data['timeout'] ?? 60);
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
     * @return RestartServerRequest
     */
    public function setStopType(string $stopType): RestartServerRequest
    {
        Assert::oneOf($stopType, [
            self::STOP_TYPE_SOFT,
            self::STOP_TYPE_HARD
        ]);

        $this->stopType = $stopType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTimeoutAction(): ?string
    {
        return $this->timeoutAction;
    }

    /**
     * @param string|null $timeoutAction
     * @return RestartServerRequest
     */
    public function setTimeoutAction(?string $timeoutAction): RestartServerRequest
    {
        if (!is_null($timeoutAction)) {
            Assert::oneOf($timeoutAction, [
                self::TIMEOUT_ACTION_DESTROY,
                self::TIMEOUT_ACTION_IGNORE
            ]);
        }

        $this->timeoutAction = $timeoutAction;

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
     * @return RestartServerRequest
     */
    public function setTimeout($timeout): RestartServerRequest
    {
        $this->timeout = $timeout;

        return $this;
    }
}

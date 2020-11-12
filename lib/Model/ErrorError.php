<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class ErrorError
{

    /**
     * @var string|null
     */
    private $errorCode;

    /**
     * @var string|null
     */
    private $errorStatus;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setErrorCode($data['error_code'] ?? null);
        $this->setErrorStatus($data['error_status'] ?? null);
    }

    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * @param string|null $errorCode
     * @return ErrorError
     */
    public function setErrorCode(?string $errorCode): ErrorError
    {
        if (!is_null($errorCode)) {
            Assert::oneOf($errorCode, ErrorCode::getAllowableEnumValues());
        }

        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorStatus(): ?string
    {
        return $this->errorStatus;
    }

    /**
     * @param string|null $errorStatus
     * @return ErrorError
     */
    public function setErrorStatus(?string $errorStatus): ErrorError
    {
        if (!is_null($errorStatus)) {
            Assert::oneOf($errorStatus, ErrorStatus::getAllowableEnumValues());
        }

        $this->errorStatus = $errorStatus;

        return $this;
    }
}



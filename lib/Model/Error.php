<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Error
{
    /**
     * @var ErrorError|null
     */
    private $error;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setError($data['error'] ?? null);
    }

    /**
     * @return ErrorError|null
     */
    public function getError(): ?ErrorError
    {
        return $this->error;
    }

    /**
     * @param ErrorError|array|null $error
     * @return Error
     */
    public function setError($error): Error
    {
        if (is_array($error)) {
            $this->error = new ErrorError($error);
        } else {
            $this->error = $error;
        }

        return $this;
    }
}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class AccountResponse
{
    /**
     * @var Account|null
     */
    private $account;

    public function __construct(array $data = null)
    {
        $this->setAccount($data['account'] ?? null);
    }

    /**
     * @return Account|null
     */
    public function getAccount(): ?Account
    {
        return $this->account;
    }

    /**
     * @param Account|array|null $account
     * @return AccountResponse
     */
    public function setAccount($account): AccountResponse
    {
        if (is_array($account)) {
            $this->account = new Account($account);
        } else {
            $this->account = $account;
        }

        return $this;
    }
}

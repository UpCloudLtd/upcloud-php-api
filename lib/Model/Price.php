<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class Price
{
    /**
     * @var float|null
     */
    protected $amount;

    /**
     * @var float|null
     */
    private $price;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setAmount($data['amount'] ?? null);
        $this->setPrice($data['price'] ?? null);
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     * @return Price
     */
    public function setAmount(?float $amount): Price
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return Price
     */
    public function setPrice(?float $price): Price
    {
        $this->price = $price;

        return $this;
    }
}



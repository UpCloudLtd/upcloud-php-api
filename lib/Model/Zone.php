<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class Zone
{
    const PUBLIC_YES = 'yes';
    const PUBLIC_NO = 'no';

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $public;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setId($data['id'] ?? null);
        $this->setDescription($data['description'] ?? null);
        $this->setPublic($data['public'] ?? null);
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return Zone
     */
    public function setId(?string $id): Zone
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Zone
     */
    public function setDescription(?string $description): Zone
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPublic(): ?string
    {
        return $this->public;
    }

    /**
     * @param string|null $public
     * @return Zone
     */
    public function setPublic(?string $public): Zone
    {
        if (!is_null($public)) {
            Assert::oneOf($public, [
                self::PUBLIC_NO,
                self::PUBLIC_YES,
            ]);
        }

        $this->public = $public;

        return $this;
    }

}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class Host
{

    const WINDOWS_ENABLE_NO = 'no';
    const WINDOWS_ENABLE_YES = 'yes';

    /**
     * @var string|float|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $zone;

    /**
     * @var string|null
     */
    private $windowsEnabled;

    /**
     * @var Stats|null
     */
    private $stats;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setId($data['id'] ?? null);
        $this->setDescription($data['description'] ?? null);
        $this->setZone($data['zone'] ?? null);
        $this->setWindowsEnabled($data['windows_enabled'] ?? null);
        $this->setStats($data['stats'] ?? null);
    }

    /**
     * @return float|string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param float|string|null $id
     * @return Host
     */
    public function setId($id): Host
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
     * @return Host
     */
    public function setDescription(?string $description): Host
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZone(): ?string
    {
        return $this->zone;
    }

    /**
     * @param string|null $zone
     * @return Host
     */
    public function setZone(?string $zone): Host
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWindowsEnabled(): ?string
    {
        return $this->windowsEnabled;
    }

    /**
     * @param string|null $windowsEnabled
     * @return Host
     */
    public function setWindowsEnabled(?string $windowsEnabled): Host
    {

        if (!is_null($windowsEnabled)) {
            Assert::oneOf($windowsEnabled, [
                self::WINDOWS_ENABLE_NO,
                self::WINDOWS_ENABLE_YES
            ]);
        }

        $this->windowsEnabled = $windowsEnabled;

        return $this;
    }

    /**
     * @return Stats|null
     */
    public function getStats(): ?Stats
    {
        return $this->stats;
    }

    /**
     * @param Stats|array|null $stats
     * @return Host
     */
    public function setStats($stats): Host
    {
        if (is_array($stats)) {
            $this->stats = new Stats($stats);
        } else {
            $this->stats = $stats;
        }

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ZoneListResponseZones
{
    /**
     * @var Zone[]|null
     */
    private $zone;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setZone($data['zone'] ?? null);
    }

    /**
     * @return Zone[]|null
     */
    public function getZone(): ?array
    {
        return $this->zone;
    }

    /**
     * @param Zone[]|array|null $zone
     * @return ZoneListResponseZones
     */
    public function setZone(?array $zone): ZoneListResponseZones
    {
        if (is_array($zone)) {
            foreach ($zone as $item) {
                $this->zone[] = new Zone($item);
            }
        } else {
            $this->zone = $zone;
        }

        return $this;
    }
}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ZoneListResponse
{
    /**
     * @var ZoneListResponseZones|null
     */
    private $zones;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setZones($data['zones'] ?? null);
    }

    /**
     * @return ZoneListResponseZones|null
     */
    public function getZones(): ?ZoneListResponseZones
    {
        return $this->zones;
    }

    /**
     * @param ZoneListResponseZones|array|null $zones
     * @return ZoneListResponse
     */
    public function setZones($zones): ZoneListResponse
    {
        if (is_array($zones)) {
            $this->zones = new ZoneListResponseZones($zones);
        } else {
            $this->zones = $zones;
        }

        return $this;
    }

}



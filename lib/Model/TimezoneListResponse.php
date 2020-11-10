<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class TimezoneListResponse
{
    /**
     * @var TimezoneListResponseTimezones|null
     */
    private $timezones;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setTimezones($data['timezones'] ?? null);
    }

    /**
     * @return TimezoneListResponseTimezones|null
     */
    public function getTimezones(): ?TimezoneListResponseTimezones
    {
        return $this->timezones;
    }

    /**
     * @param TimezoneListResponseTimezones|array|null $timezones
     * @return TimezoneListResponse
     */
    public function setTimezones($timezones): TimezoneListResponse
    {
        if (is_array($timezones)) {
            $this->timezones = new TimezoneListResponseTimezones($timezones);
        } else {
            $this->timezones = $timezones;
        }

        return $this;
    }
}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class TimezoneListResponseTimezones
{
    /**
     * @var string[]|null
     */
    private $timezone;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setTimezone($data['timezone'] ?? null);
    }

    /**
     * @return string[]|null
     */
    public function getTimezone(): ?array
    {
        return $this->timezone;
    }

    /**
     * @param string[]|null $timezone
     * @return TimezoneListResponseTimezones
     */
    public function setTimezone(?array $timezone): TimezoneListResponseTimezones
    {
        if (is_array($timezone)) {
            foreach ($timezone as $item) {
                $this->timezone[] = $item;
            }
        } else {
            $this->timezone = $timezone;
        }

        return $this;
    }
}



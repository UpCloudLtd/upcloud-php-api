<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ServerState
{
    /**
     * Possible values of this enum
     */
    const STARTED = 'started';
    const STOPPED = 'stopped';
    const MAINTENANCE = 'maintenance';
    const ERROR = 'error';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::STARTED,
            self::STOPPED,
            self::MAINTENANCE,
            self::ERROR,
        ];
    }
}



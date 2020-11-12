<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class StorageState
{
    /**
     * Possible values of this enum
     */
    const ONLINE = 'online';
    const MAINTENANCE = 'maintenance';
    const CLONING = 'cloning';
    const BACKUPING = 'backuping';
    const ERROR = 'error';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ONLINE,
            self::MAINTENANCE,
            self::CLONING,
            self::BACKUPING,
            self::ERROR,
        ];
    }
}



<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class StorageType
{
    /**
     * Possible values of this enum
     */
    const DISK = 'disk';
    const CDROM = 'cdrom';
    const TEMPLATE = 'template';
    const BACKUP = 'backup';
    const NORMAL = 'normal';
    const PUBLIC = 'public';
    const PRIVATE = 'private';
    const FAVORITE = 'favorite';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::DISK,
            self::CDROM,
            self::TEMPLATE,
            self::BACKUP,
            self::NORMAL,
            self::PUBLIC,
            self::PRIVATE,
            self::FAVORITE
        ];
    }
}



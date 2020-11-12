<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class StorageAccessType
{
    /**
     * Possible values of this enum
     */
    const _PUBLIC = 'public';
    const _PRIVATE = 'private';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::_PUBLIC,
            self::_PRIVATE,
        ];
    }
}

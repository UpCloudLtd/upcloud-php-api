<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class StorageTier
{
    /**
     * Possible values of this enum
     */
    const HDD = 'hdd';
    const MAXIOPS = 'maxiops';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::HDD,
            self::MAXIOPS,
        ];
    }
}



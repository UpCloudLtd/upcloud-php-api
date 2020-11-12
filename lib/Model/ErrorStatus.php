<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

/**
 * ErrorStatus Class Doc Comment
 *
 * @category    Class
 * @package     Upcloud\ApiClient
 */
class ErrorStatus
{
    /**
     * Possible values of this enum
     */
    const _400 = '400';
    const _402 = '402';
    const _403 = '403';
    const _404 = '404';
    const _409 = '409';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::_400,
            self::_402,
            self::_403,
            self::_404,
            self::_409,
        ];
    }
}



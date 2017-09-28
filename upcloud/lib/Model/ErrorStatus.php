<?php
/**
 * ErrorStatus
 *
 * PHP version 5
 *
 * @category Class
 * @package  Upcloud\ApiClient
 */

/**
 * Upcloud api
 *
 * The UpCloud API consists of operations used to control resources on UpCloud. The API is a web service interface. HTTPS is used to connect to the API. The API follows the principles of a RESTful web service wherever possible. The base URL for all API operations is  https://api.upcloud.com/. All API operations require authentication.
 *
 * OpenAPI spec version: 1.2.0
 * 
 */


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



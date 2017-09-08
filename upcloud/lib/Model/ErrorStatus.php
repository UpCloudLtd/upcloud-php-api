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
    const 400 = 400;
    const 402 = 402;
    const 403 = 403;
    const 404 = 404;
    const 409 = 409;
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::400,
            self::402,
            self::403,
            self::404,
            self::409,
        ];
    }
}



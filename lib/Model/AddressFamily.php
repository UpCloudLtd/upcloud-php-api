<?php
/**
 * AddressFamily
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
 * AddressFamily Class Doc Comment
 *
 * @category    Class
 * @package     Upcloud\ApiClient
 */
class AddressFamily
{
    /**
     * Possible values of this enum
     */
    const I_PV4 = 'IPv4';
    const I_PV6 = 'IPv6';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::I_PV4,
            self::I_PV6,
        ];
    }
}



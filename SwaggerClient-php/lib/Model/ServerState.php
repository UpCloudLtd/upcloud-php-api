<?php
/**
 * ServerState
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 */

/**
 * Upcloud api
 *
 * The UpCloud API consists of operations used to control resources on UpCloud. The API is a web service interface. HTTPS is used to connect to the API. The API follows the principles of a RESTful web service wherever possible. The base URL for all API operations is  https://api.upcloud.com/. All API operations require authentication.
 *
 * OpenAPI spec version: 1.2.0
 * 
 */


namespace Swagger\Client\Model;

/**
 * ServerState Class Doc Comment
 *
 * @category    Class
 * @description The server state indicates the server&#39;s current status.
 * @package     Swagger\Client
 */
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



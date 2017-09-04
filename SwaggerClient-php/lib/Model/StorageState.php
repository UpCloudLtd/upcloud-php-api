<?php
/**
 * StorageState
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
 * StorageState Class Doc Comment
 *
 * @category    Class
 * @description The storage state indicates the storage&#39;s current status. * &#x60;online&#x60; - The storage resource is ready for use. The storage can be attached or detached. * &#x60;maintenance&#x60; - Maintenance work is currently performed on the storage. The storage may have been newly created or it is being updated by some API operation. * &#x60;cloning&#x60; - The storage resource is currently the clone source for another storage. * &#x60;backuping&#x60; - The storage resource is currently being backed up to another storage. * &#x60;error&#x60; - The storage has encountered an error and is currently inaccessible.
 * @package     Swagger\Client
 */
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



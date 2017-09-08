<?php
/**
 * StorageAccessType
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
 * StorageAccessType Class Doc Comment
 *
 * @category    Class
 * @description Storage access types. * &#x60;public&#x60; (*Public storages*) are visible to all users. Public storages include CD-ROM images and templates. CD-ROM images can be used to install operating systems and to rescue unbootable systems. Templates are used to create servers with a preconfigured operating system. * &#x60;private&#x60; (*Private storages*) - visible only to the specific user account and sub-accounts. Users can only create private storages.
 * @package     Upcloud\ApiClient
 */
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



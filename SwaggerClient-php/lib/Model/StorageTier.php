<?php
/**
 * StorageTier
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
 * StorageTier Class Doc Comment
 *
 * @category    Class
 * @description Storage resources are divided into two tiers: * &#x60;hdd&#x60; (*HDD storages*) - Data is stored on hard disks resulting in lower costs than MaxIOPS. * &#x60;maxiops&#x60; (*MaxIOPS storages*) - Data is stored on MaxIOPS storage arrays resulting in highest throughput and lowest response times.  Storage tiers affect both the performance and price of the storage.
 * @package     Swagger\Client
 */
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



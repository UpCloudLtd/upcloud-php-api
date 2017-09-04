<?php
/**
 * ErrorCode
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
 * ErrorCode Class Doc Comment
 *
 * @category    Class
 * @package     Swagger\Client
 */
class ErrorCode
{
    /**
     * Possible values of this enum
     */
    const ACTION_INVALID = 'ACTION_INVALID';
    const ACTION_MISSING = 'ACTION_MISSING';
    const BOOT_ORDER_INVALID = 'BOOT_ORDER_INVALID';
    const CORE_MEMORY_UNSUPPORTED = 'CORE_MEMORY_UNSUPPORTED';
    const FIREWALL_INVALID = 'FIREWALL_INVALID';
    const CORE_NUMBER_INVALID = 'CORE_NUMBER_INVALID';
    const HOSTNAME_INVALID = 'HOSTNAME_INVALID';
    const HOSTNAME_MISSING = 'HOSTNAME_MISSING';
    const MEMORY_AMOUNT_INVALID = 'MEMORY_AMOUNT_INVALID';
    const NIC_MODEL_INVALID = 'NIC_MODEL_INVALID';
    const PASSWORD_DELIVERY_INVALID = 'PASSWORD_DELIVERY_INVALID';
    const SERVER_TITLE_INVALID = 'SERVER_TITLE_INVALID';
    const SERVER_TITLE_MISSING = 'SERVER_TITLE_MISSING';
    const SIZE_INVALID = 'SIZE_INVALID';
    const SIZE_MISSING = 'SIZE_MISSING';
    const STORAGE_DEVICE_INVALID = 'STORAGE_DEVICE_INVALID';
    const STORAGE_DEVICE_MISSING = 'STORAGE_DEVICE_MISSING';
    const STORAGE_DEVICES_INVALID = 'STORAGE_DEVICES_INVALID';
    const STORAGE_DEVICES_MISSING = 'STORAGE_DEVICES_MISSING';
    const STORAGE_INVALID = 'STORAGE_INVALID';
    const STORAGE_MISSING = 'STORAGE_MISSING';
    const STORAGE_TITLE_INVALID = 'STORAGE_TITLE_INVALID';
    const STORAGE_TITLE_MISSING = 'STORAGE_TITLE_MISSING';
    const TIMEZONE_INVALID = 'TIMEZONE_INVALID';
    const TYPE_INVALID = 'TYPE_INVALID';
    const TIER_INVALID = 'TIER_INVALID';
    const VIDEO_MODEL_INVALID = 'VIDEO_MODEL_INVALID';
    const VNC_INVALID = 'VNC_INVALID';
    const VNC_PASSWORD_INVALID = 'VNC_PASSWORD_INVALID';
    const ZONE_INVALID = 'ZONE_INVALID';
    const ZONE_MISSING = 'ZONE_MISSING';
    const USER_DATA_INVALID = 'USER_DATA_INVALID';
    const INSUFFICIENT_CREDITS = 'INSUFFICIENT_CREDITS';
    const STORAGE_FORBIDDEN = 'STORAGE_FORBIDDEN';
    const PLAN_CORE_NUMBER_ILLEGAL = 'PLAN_CORE_NUMBER_ILLEGAL';
    const PLAN_MEMORY_AMOUNT_ILLEGAL = 'PLAN_MEMORY_AMOUNT_ILLEGAL';
    const TRIAL_PLAN = 'TRIAL_PLAN';
    const STORAGE_NOT_FOUND = 'STORAGE_NOT_FOUND';
    const ZONE_NOT_FOUND = 'ZONE_NOT_FOUND';
    const CDROM_DEVICE_IN_USE = 'CDROM_DEVICE_IN_USE';
    const DEVICE_ADDRESS_IN_USE = 'DEVICE_ADDRESS_IN_USE';
    const IP_ADDRESS_RESOURCES_UNAVAILABLE = 'IP_ADDRESS_RESOURCES_UNAVAILABLE';
    const MULTIPLE_TEMPLATES = 'MULTIPLE_TEMPLATES';
    const PUBLIC_STORAGE_ATTACH = 'PUBLIC_STORAGE_ATTACH';
    const SERVER_RESOURCES_UNAVAILABLE = 'SERVER_RESOURCES_UNAVAILABLE';
    const STORAGE_ATTACHED_AS_CDROM = 'STORAGE_ATTACHED_AS_CDROM';
    const STORAGE_ATTACHED_AS_DISK = 'STORAGE_ATTACHED_AS_DISK';
    const STORAGE_DEVICE_LIMIT_REACHED = 'STORAGE_DEVICE_LIMIT_REACHED';
    const STORAGE_IN_USE = 'STORAGE_IN_USE';
    const STORAGE_RESOURCES_UNAVAILABLE = 'STORAGE_RESOURCES_UNAVAILABLE';
    const STORAGE_STATE_ILLEGAL = 'STORAGE_STATE_ILLEGAL';
    const STORAGE_TYPE_ILLEGAL = 'STORAGE_TYPE_ILLEGAL';
    const ZONE_MISMATCH = 'ZONE_MISMATCH';
    const INVALID_USERNAME = 'INVALID_USERNAME';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ACTION_INVALID,
            self::ACTION_MISSING,
            self::BOOT_ORDER_INVALID,
            self::CORE_MEMORY_UNSUPPORTED,
            self::FIREWALL_INVALID,
            self::CORE_NUMBER_INVALID,
            self::HOSTNAME_INVALID,
            self::HOSTNAME_MISSING,
            self::MEMORY_AMOUNT_INVALID,
            self::NIC_MODEL_INVALID,
            self::PASSWORD_DELIVERY_INVALID,
            self::SERVER_TITLE_INVALID,
            self::SERVER_TITLE_MISSING,
            self::SIZE_INVALID,
            self::SIZE_MISSING,
            self::STORAGE_DEVICE_INVALID,
            self::STORAGE_DEVICE_MISSING,
            self::STORAGE_DEVICES_INVALID,
            self::STORAGE_DEVICES_MISSING,
            self::STORAGE_INVALID,
            self::STORAGE_MISSING,
            self::STORAGE_TITLE_INVALID,
            self::STORAGE_TITLE_MISSING,
            self::TIMEZONE_INVALID,
            self::TYPE_INVALID,
            self::TIER_INVALID,
            self::VIDEO_MODEL_INVALID,
            self::VNC_INVALID,
            self::VNC_PASSWORD_INVALID,
            self::ZONE_INVALID,
            self::ZONE_MISSING,
            self::USER_DATA_INVALID,
            self::INSUFFICIENT_CREDITS,
            self::STORAGE_FORBIDDEN,
            self::PLAN_CORE_NUMBER_ILLEGAL,
            self::PLAN_MEMORY_AMOUNT_ILLEGAL,
            self::TRIAL_PLAN,
            self::STORAGE_NOT_FOUND,
            self::ZONE_NOT_FOUND,
            self::CDROM_DEVICE_IN_USE,
            self::DEVICE_ADDRESS_IN_USE,
            self::IP_ADDRESS_RESOURCES_UNAVAILABLE,
            self::MULTIPLE_TEMPLATES,
            self::PUBLIC_STORAGE_ATTACH,
            self::SERVER_RESOURCES_UNAVAILABLE,
            self::STORAGE_ATTACHED_AS_CDROM,
            self::STORAGE_ATTACHED_AS_DISK,
            self::STORAGE_DEVICE_LIMIT_REACHED,
            self::STORAGE_IN_USE,
            self::STORAGE_RESOURCES_UNAVAILABLE,
            self::STORAGE_STATE_ILLEGAL,
            self::STORAGE_TYPE_ILLEGAL,
            self::ZONE_MISMATCH,
            self::INVALID_USERNAME,
        ];
    }
}



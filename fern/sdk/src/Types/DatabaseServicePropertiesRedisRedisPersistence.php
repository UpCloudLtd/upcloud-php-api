<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesRedisRedisPersistence: string
{
    case Off = "off";
    case Rdb = "rdb";
}

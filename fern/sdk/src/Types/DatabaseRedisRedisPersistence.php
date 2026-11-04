<?php

namespace Upcloud\Types;

enum DatabaseRedisRedisPersistence: string
{
    case Off = "off";
    case Rdb = "rdb";
}

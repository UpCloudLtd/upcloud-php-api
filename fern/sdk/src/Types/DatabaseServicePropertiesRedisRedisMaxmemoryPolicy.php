<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesRedisRedisMaxmemoryPolicy: string
{
    case Noeviction = "noeviction";
    case AllkeysLru = "allkeys-lru";
    case VolatileLru = "volatile-lru";
    case AllkeysRandom = "allkeys-random";
    case VolatileRandom = "volatile-random";
    case VolatileTtl = "volatile-ttl";
    case VolatileLfu = "volatile-lfu";
    case AllkeysLfu = "allkeys-lfu";
}

<?php

namespace Upcloud\Types;

enum DatabaseRedisClonePlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

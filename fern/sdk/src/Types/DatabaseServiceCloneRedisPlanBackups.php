<?php

namespace Upcloud\Types;

enum DatabaseServiceCloneRedisPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

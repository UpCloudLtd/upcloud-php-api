<?php

namespace Upcloud\Types;

enum DatabaseServiceCloneValkeyPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

<?php

namespace Upcloud\Types;

enum DatabaseServiceClonePgPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

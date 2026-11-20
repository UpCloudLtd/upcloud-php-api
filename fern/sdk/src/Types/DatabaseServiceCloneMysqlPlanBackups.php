<?php

namespace Upcloud\Types;

enum DatabaseServiceCloneMysqlPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

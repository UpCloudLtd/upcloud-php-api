<?php

namespace Upcloud\Database\Types;

enum DatabaseServiceModifyOpenapiPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

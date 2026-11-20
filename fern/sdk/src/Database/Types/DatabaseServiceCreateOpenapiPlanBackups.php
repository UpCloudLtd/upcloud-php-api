<?php

namespace Upcloud\Database\Types;

enum DatabaseServiceCreateOpenapiPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

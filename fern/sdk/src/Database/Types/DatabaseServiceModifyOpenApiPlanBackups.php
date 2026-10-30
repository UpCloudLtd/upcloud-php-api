<?php

namespace Upcloud\Database\Types;

enum DatabaseServiceModifyOpenApiPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

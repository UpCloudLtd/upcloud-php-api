<?php

namespace Upcloud\Database\Types;

enum DatabaseServiceCreateOpenApiPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

<?php

namespace Upcloud\Types;

enum DatabasePlanComponentsResponseBackupsName: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

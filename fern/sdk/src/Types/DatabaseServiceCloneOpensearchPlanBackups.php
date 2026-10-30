<?php

namespace Upcloud\Types;

enum DatabaseServiceCloneOpensearchPlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

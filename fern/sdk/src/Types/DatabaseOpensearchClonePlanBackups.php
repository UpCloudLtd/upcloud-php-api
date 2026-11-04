<?php

namespace Upcloud\Types;

enum DatabaseOpensearchClonePlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

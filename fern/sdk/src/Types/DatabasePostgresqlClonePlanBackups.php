<?php

namespace Upcloud\Types;

enum DatabasePostgresqlClonePlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

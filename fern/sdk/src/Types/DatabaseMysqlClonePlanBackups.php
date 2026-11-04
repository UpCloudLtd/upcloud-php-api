<?php

namespace Upcloud\Types;

enum DatabaseMysqlClonePlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

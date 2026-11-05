<?php

namespace Upcloud\Types;

enum DatabaseValkeyClonePlanBackups: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

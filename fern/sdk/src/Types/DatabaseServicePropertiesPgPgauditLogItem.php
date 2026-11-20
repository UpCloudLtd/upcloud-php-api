<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgPgauditLogItem: string
{
    case All = "all";
    case Ddl = "ddl";
    case Function_ = "function";
    case Misc = "misc";
    case MiscSet = "misc_set";
    case Read = "read";
    case Role = "role";
    case Write = "write";
}

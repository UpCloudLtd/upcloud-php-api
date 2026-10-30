<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesMysqlInternalTmpMemStorageEngine: string
{
    case TempTable = "TempTable";
    case Memory = "MEMORY";
}

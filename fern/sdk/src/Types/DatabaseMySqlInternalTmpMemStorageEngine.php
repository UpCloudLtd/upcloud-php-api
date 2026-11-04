<?php

namespace Upcloud\Types;

enum DatabaseMySqlInternalTmpMemStorageEngine: string
{
    case TempTable = "TempTable";
    case Memory = "MEMORY";
}

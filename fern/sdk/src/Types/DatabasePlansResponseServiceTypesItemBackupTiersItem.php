<?php

namespace Upcloud\Types;

enum DatabasePlansResponseServiceTypesItemBackupTiersItem: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

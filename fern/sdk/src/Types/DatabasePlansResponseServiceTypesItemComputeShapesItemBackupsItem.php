<?php

namespace Upcloud\Types;

enum DatabasePlansResponseServiceTypesItemComputeShapesItemBackupsItem: string
{
    case Mini = "mini";
    case Regular = "regular";
    case Extended = "extended";
}

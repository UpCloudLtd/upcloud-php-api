<?php

namespace Upcloud\Types;

enum DatabasePlansResponseServiceTypesItemComputeShapesItemFamily: string
{
    case Development = "development";
    case Standard = "standard";
    case Memory = "memory";
}

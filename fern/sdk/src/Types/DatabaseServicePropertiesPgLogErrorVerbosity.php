<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgLogErrorVerbosity: string
{
    case Terse = "TERSE";
    case Default_ = "DEFAULT";
    case Verbose = "VERBOSE";
}

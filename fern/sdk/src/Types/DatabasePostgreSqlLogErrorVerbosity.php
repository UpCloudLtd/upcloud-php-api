<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlLogErrorVerbosity: string
{
    case Terse = "TERSE";
    case Default_ = "DEFAULT";
    case Verbose = "VERBOSE";
}

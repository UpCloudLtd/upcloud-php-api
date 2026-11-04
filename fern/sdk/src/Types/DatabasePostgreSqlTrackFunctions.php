<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlTrackFunctions: string
{
    case All = "all";
    case Pl = "pl";
    case None = "none";
}

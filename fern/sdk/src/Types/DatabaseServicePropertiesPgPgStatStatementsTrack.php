<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgPgStatStatementsTrack: string
{
    case All = "all";
    case Top = "top";
    case None = "none";
}

<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlPgStatStatementsTrack: string
{
    case All = "all";
    case Top = "top";
    case None = "none";
}

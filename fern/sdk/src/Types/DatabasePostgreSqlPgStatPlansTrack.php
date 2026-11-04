<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlPgStatPlansTrack: string
{
    case All = "all";
    case Top = "top";
    case None = "none";
}

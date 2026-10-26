<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgPgStatPlansTrack: string
{
    case All = "all";
    case Top = "top";
    case None = "none";
}

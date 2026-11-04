<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlTrackCommitTimestamp: string
{
    case Off = "off";
    case On = "on";
}

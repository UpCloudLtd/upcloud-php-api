<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlSynchronousReplication: string
{
    case Quorum = "quorum";
    case Off = "off";
}

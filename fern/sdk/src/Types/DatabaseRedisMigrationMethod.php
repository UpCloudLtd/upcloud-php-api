<?php

namespace Upcloud\Types;

enum DatabaseRedisMigrationMethod: string
{
    case Dump = "dump";
    case Replication = "replication";
}

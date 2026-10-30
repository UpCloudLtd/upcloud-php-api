<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesRedisMigrationMethod: string
{
    case Dump = "dump";
    case Replication = "replication";
}

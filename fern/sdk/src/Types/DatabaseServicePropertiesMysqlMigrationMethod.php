<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesMysqlMigrationMethod: string
{
    case Dump = "dump";
    case Replication = "replication";
}

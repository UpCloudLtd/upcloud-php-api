<?php

namespace Upcloud\Types;

enum DatabaseMySqlMigrationMethod: string
{
    case Dump = "dump";
    case Replication = "replication";
}

<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlMigrationMethod: string
{
    case Dump = "dump";
    case Replication = "replication";
}

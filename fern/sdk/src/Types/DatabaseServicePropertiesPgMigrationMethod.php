<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgMigrationMethod: string
{
    case Dump = "dump";
    case Replication = "replication";
}

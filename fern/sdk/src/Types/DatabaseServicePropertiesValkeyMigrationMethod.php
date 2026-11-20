<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesValkeyMigrationMethod: string
{
    case Dump = "dump";
    case Replication = "replication";
}

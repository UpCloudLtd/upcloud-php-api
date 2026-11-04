<?php

namespace Upcloud\Types;

enum DatabaseValkeyMigrationMethod: string
{
    case Dump = "dump";
    case Replication = "replication";
}

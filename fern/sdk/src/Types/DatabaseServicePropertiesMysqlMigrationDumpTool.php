<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesMysqlMigrationDumpTool: string
{
    case Mysqldump = "mysqldump";
    case Mydumper = "mydumper";
}

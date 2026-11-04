<?php

namespace Upcloud\Types;

enum DatabaseMySqlMigrationDumpTool: string
{
    case Mysqldump = "mysqldump";
    case Mydumper = "mydumper";
}

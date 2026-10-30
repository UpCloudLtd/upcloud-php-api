<?php

namespace Upcloud\Types;

enum DatabasePlansResponseServiceTypesItemType: string
{
    case Mysql = "mysql";
    case Pg = "pg";
}

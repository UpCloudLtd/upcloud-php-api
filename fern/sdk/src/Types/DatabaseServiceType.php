<?php

namespace Upcloud\Types;

enum DatabaseServiceType: string
{
    case Mysql = "mysql";
    case Pg = "pg";
    case Opensearch = "opensearch";
    case Valkey = "valkey";
}

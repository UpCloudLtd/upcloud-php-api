<?php

namespace Upcloud\Types;

enum DatabaseVersionsResponseItemServiceType: string
{
    case Mysql = "mysql";
    case Pg = "pg";
    case Opensearch = "opensearch";
    case Valkey = "valkey";
}

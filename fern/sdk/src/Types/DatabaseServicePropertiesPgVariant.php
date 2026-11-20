<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgVariant: string
{
    case Aiven = "aiven";
    case Timescale = "timescale";
    case PgLake = "pg_lake";
}

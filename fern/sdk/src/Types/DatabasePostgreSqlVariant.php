<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlVariant: string
{
    case Aiven = "aiven";
    case Timescale = "timescale";
}

<?php

namespace Upcloud\Types;

enum DatabasePostgreSqlVersion: string
{
    case Fifteen = "15";
    case Sixteen = "16";
    case Seventeen = "17";
    case Eighteen = "18";
}

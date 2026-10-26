<?php

namespace Upcloud\Types;

enum DatabaseServicePropertiesPgPgauditLogLevel: string
{
    case Debug1 = "debug1";
    case Debug2 = "debug2";
    case Debug3 = "debug3";
    case Debug4 = "debug4";
    case Debug5 = "debug5";
    case Info = "info";
    case Notice = "notice";
    case Warning = "warning";
    case Log = "log";
}

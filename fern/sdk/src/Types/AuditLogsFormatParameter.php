<?php

namespace Upcloud\Types;

enum AuditLogsFormatParameter: string
{
    case Csv = "csv";
    case Json = "json";
}

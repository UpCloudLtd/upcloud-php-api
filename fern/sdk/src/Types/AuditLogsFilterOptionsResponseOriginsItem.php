<?php

namespace Upcloud\Types;

enum AuditLogsFilterOptionsResponseOriginsItem: string
{
    case Api = "api";
    case Gui = "gui";
    case UpcloudInternal = "upcloud_internal";
}

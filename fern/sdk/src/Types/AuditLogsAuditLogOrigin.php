<?php

namespace Upcloud\Types;

enum AuditLogsAuditLogOrigin: string
{
    case Api = "api";
    case Gui = "gui";
    case UpcloudInternal = "upcloud_internal";
}
